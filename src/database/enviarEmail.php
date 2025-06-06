<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(!estaLogado()) {
    header('Location:login.php');
} 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $telefone = $_POST['phone'];
    $mensagem = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        //Configuração do Servidor
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'infolekaeducativa@gmail.com';
        $mail->Password = 'senha'; //Usar senha de aplicativo, PEDIR PARA A LEKA
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //Remetente e Destinatário
        $mail->setFrom($email, $nome);
        $mail->addAddress('infolekaeducativa@gmail.com');
        
        //Conteúdo
        $mail->isHTML(true);
        $mail->Subject = 'Mensagem de Cliente';
        $mail->Body = "
            <strong>Nome:</strong> {$nome} </br> 
            <strong>E-mail:</strong> {$email} </br> 
            <strong>Telefone:</strong> {$telefone} </br></br>
            <strong>Mensagem</strong></br>
            {$mensagem} 
        ";

        $mail->send();
        echo "<script> alert('Mensagem enviada com sucesso!'); window.location.href='index.html';</script>";
    } catch (Exception $e) {
        echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
    }
}
?>