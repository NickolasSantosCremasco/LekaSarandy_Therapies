<?php
// 🟢 1. INICIALIZAÇÃO E INCLUSÃO DE ARQUIVOS
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../database/config.php';
require_once __DIR__ . '/../database/auth.php';
require_once __DIR__ . '/../database/vendor/autoload.php';

// 🟢 ADICIONE ESTA LINHA PARA IMPORTAR A CLASSE DOTENV
use Dotenv\Dotenv;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$dotenv = Dotenv::createImmutable(__DIR__ . '/../../'); 
$dotenv->load(); 


// Se o usuário já está logado, não há necessidade de estar aqui
if (estaLogado()) {
    header('Location: ../../index.php');
    exit;
}

$message = '';
$message_class = '';

// Verifica se há uma mensagem de status na URL para exibir ao usuário
if (isset($_GET['status']) && isset($_GET['msg'])) {
    $message = htmlspecialchars($_GET['msg']);
    $message_class = ($_GET['status'] == 'sucesso') ? 'alert-success' : 'alert-danger';
}

// 🟢 2. LÓGICA DE ENVIO DO FORMULÁRIO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if (!$email) {
        header("Location: " . $_SERVER['PHP_SELF'] . "?status=erro&msg=" . urlencode("Formato de e-mail inválido."));
        exit;
    }

    // 🟢 CORREÇÃO: Usando PDO consistentemente com seu projeto
    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if (!$user) {
        // 🟢 CORREÇÃO DE SEGURANÇA: Nunca confirme se um e-mail existe.
        header("Location: " . $_SERVER['PHP_SELF'] . "?status=sucesso&msg=" . urlencode("Se o e-mail estiver cadastrado, um link de recuperação foi enviado."));
        exit;
    }

    // Gera um token seguro e data de expiração
    $token = bin2hex(random_bytes(32));
    $expira = date('Y-m-d H:i:s', strtotime('+30 minutes'));

    // 🟢 CORREÇÃO: Usando PDO e os nomes de coluna corretos ('token', 'token_expira')
    $stmt = $pdo->prepare("UPDATE usuarios SET token = :token, token_expira = :expira WHERE id = :id");
    $stmt->execute([
        'token' => $token,
        'expira' => $expira,
        'id' => $user['id']
    ]);

    // 🟢 CORREÇÃO: Link de redefinição dinâmico
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);
    $link = "{$protocol}{$host}{$path}/resetSenha.php?token=" . $token;

    $mail = new PHPMailer(true);
    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
    try {
        // 🟢 CORREÇÃO: Usando variáveis de ambiente para credenciais
        $mail->isSMTP();
        $mail->Host = $_ENV['SMTP_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['SMTP_USERNAME'];
        $mail->Password = $_ENV['SMTP_PASSWORD']; // Para Gmail, use uma "Senha de App"
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';

        // 🟢 CORREÇÃO: Remetente DEVE ser o mesmo e-mail autenticado
        $mail->setFrom($_ENV['SMTP_USERNAME'], 'Suporte Leka Sarandy');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Recuperação de Senha - Leka Sarandy';
        $mail->Body = "
            <h2>Recuperação de Senha</h2>
            <p>Olá,</p>
            <p>Recebemos uma solicitação para redefinir sua senha. Se foi você, clique no link abaixo:</p>
            <p><a href='$link' style='display: inline-block; padding: 10px 20px; background-color: #A34A6A; color: white; text-decoration: none; border-radius: 5px;'>Redefinir Minha Senha</a></p>
            <p>Este link expira em 30 minutos.</p>
            <p>Se você não solicitou esta alteração, pode ignorar este e-mail.</p>
        ";
        $mail->AltBody = "Para redefinir sua senha, acesse o seguinte link: $link";

        $mail->send();
        
        header("Location: " . $_SERVER['PHP_SELF'] . "?status=sucesso&msg=" . urlencode("Link enviado! Verifique sua caixa de entrada e spam."));
        exit;
        
    } catch (Exception $e) {
         // DEBUG: Mostra o erro detalhado do PHPMailer
    echo "Erro detalhado do PHPMailer: " . $mail->ErrorInfo;
    echo "<br><br>Mensagem da Exceção: " . $e->getMessage();
    exit; // Pare o script aqui para podermos ler o erro
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leka Sarandy | Recuperar Senha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/esqueceuASenha.css">
    <link rel="stylesheet" href="../css/global.css">
</head>

<body>
    <div class="container-fluid form-section d-flex">
        <div class="col-md-6 d-none d-md-block bg-image"></div>
        <div class="col-md-6 d-flex align-items-center justify-content-center bg-light">
            <div class="form-container text-center p-4">
                <img src="../img/logoEmpresa.png" alt="Logo" class="logo-form mb-3">
                <h3 class="mb-3">Recuperar Senha</h3>
                <p class="text-muted mb-4">Informe seu e-mail para receber o link de redefinição.</p>

                <?php if (!empty($message)): ?>
                <div class="alert <?php echo $message_class; ?> alert-dismissible fade show" role="alert">
                    <?php echo $message; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>

                <form action="recuperarSenha.php" method="POST">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Seu e-mail"
                            required>
                        <label for="email"><i class="bi bi-envelope-fill me-2"></i>Seu E-mail</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mb-3">Enviar link de recuperação</button>
                </form>
                <div class="form-text mt-3">
                    <a href="login.php"><i class="bi bi-arrow-left me-2"></i>Voltar para o login</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>