<?php


require_once __DIR__ . '/config.php';
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../'); 
$dotenv->load();


if (!estaLogado()) {
    header('Location: ../pages/login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nome = htmlspecialchars($_POST['name']);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $telefone = htmlspecialchars($_POST['phone']); 
    $mensagem = htmlspecialchars($_POST['message']);

    $pagina_contato = '../pages/contato.php';

    if (!$email) {
        header("Location: $pagina_contato?status=erro&msg=" . urlencode("Formato de e-mail inválido."));
        exit;
    }

    $mail = new PHPMailer(true);

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    try {
        $mail->isSMTP();
        $mail->Host = $_ENV['SMTP_HOST'];   
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['SMTP_USERNAME'];
        $mail->Password = $_ENV['SMTP_PASSWORD']; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';

        
        $mail->setFrom($_ENV['SMTP_USERNAME'], 'Formulário de Contato');
        
       
        $mail->addReplyTo($email, $nome);
        $mail->addAddress($_ENV['SMTP_USERNAME'], 'Suporte Leka Sarandy');
        
        // --- CONTEÚDO ---
        $mail->isHTML(true);
        $mail->Subject = 'Nova Mensagem do Site - de ' . $nome;
        $mail->Body = "
            <h2>Nova Mensagem do Formulário de Contato</h2>
            <p><strong>Nome:</strong> {$nome}</p> 
            <p><strong>E-mail (Cliente):</strong> {$email}</p> 
            <p><strong>Telefone:</strong> {$telefone}</p>
            <hr>
            <p><strong>Mensagem:</strong></p>
            <p>{$mensagem}</p> 
        ";
        $mail->AltBody = "Nome: {$nome}\nE-mail: {$email}\nTelefone: {$telefone}\n\nMensagem:\n{$mensagem}";

        $mail->send();
        header("Location: $pagina_contato?status=sucesso&msg=" . urlencode("Mensagem enviada com sucesso!"));
        exit;

    } catch (Exception $e) {
        $error_msg = $mail->ErrorInfo;
        header("Location: $pagina_contato?status=erro&msg=" . urlencode("Erro ao enviar: {$error_msg}"));
        exit;
    }
} else {
    header('Location: ../pages/index.php');
    exit;
}
?>