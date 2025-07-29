<?php
require_once '../database/config.php';
require_once '../database/auth.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (estaLogado()) {
   header('Location: ../../index.php');
   exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows === 0) {
        echo "E-mail não encontrado.";
        exit;
    }

    $usuario = $resultado->fetch_assoc();
    $id_usuario = $usuario['id'];

    // Gera um token seguro
    $token = bin2hex(random_bytes(32)); // 64 caracteres
    $expira = date('Y-m-d H:i:s', strtotime('+30 minutes'));

    $stmt = $conn->prepare("UPDATE usuarios SET token_recuperacao = ?, token_expira = ? WHERE id = ?");
    $stmt->bind_param("ssi", $token, $expira, $id_usuario);
    $stmt->execute();

    $link = "https://seudominio.com/resetar_senha.php?token=" . $token;

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'nickolascremasco@gmail.com';
        $mail->Password = '';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('seuemail@seudominio.com', 'Leka Sarandy');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Recuperação de Senha';
        $mail->Body = "
            <p>Olá,</p>
            <p>Você solicitou a redefinição de senha. Clique no link abaixo para continuar:</p>
            <p><a href='$link'>$link</a></p>
            <p>Este link expira em 30 minutos.</p>
        ";

        $mail->send();
        echo "Link enviado para seu e-mail.";
    } catch (Exception $e) {
        echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
    }
}


?>