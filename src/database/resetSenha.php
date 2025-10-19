<?php

// Inclui os arquivos que estão na MESMA pasta
require_once __DIR__ . '/config.php'; 
require_once __DIR__ . '/auth.php'; 

// Se o usuário já está logado, não deve estar aqui
if (estaLogado()) {
    header('Location: ../../index.php'); 
    exit;
}

$token = null;
$message = '';
$message_class = '';
$show_form = false; // Controla se o formulário deve ser exibido

// 🟢 2. LÓGICA DO MÉTODO GET (Quando o usuário chega pelo link do e-mail)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET['token'])) {
        $message = "Token não fornecido. Link inválido.";
        $message_class = "alert-danger";
    } else {
        $token = $_GET['token'];

        // Verificar o token no banco de dados
        $stmt = $pdo->prepare("SELECT id, token_expira FROM usuarios WHERE token = :token");
        $stmt->execute(['token' => $token]);
        $user = $stmt->fetch();

        if (!$user) {
            $message = "Token inválido. Solicite uma nova recuperação de senha.";
            $message_class = "alert-danger";
        } else {
            // Verificar se o token expirou
            $agora = new DateTime();
            $expira = new DateTime($user['token_expira']);

            if ($agora > $expira) {
                $message = "Seu link de recuperação de senha expirou. Por favor, solicite um novo.";
                $message_class = "alert-danger";
            } else {
                // Token é válido e não expirou, mostrar o formulário
                $show_form = true;
            }
        }
    }
}

// 🟢 3. LÓGICA DO MÉTODO POST (Quando o usuário envia o formulário com a nova senha)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $nova_senha = $_POST['nova_senha'];
    $confirma_senha = $_POST['confirma_senha'];

    // Validar token novamente (por segurança, caso o usuário demore no formulário)
    $stmt = $pdo->prepare("SELECT id, token_expira FROM usuarios WHERE token = :token");
    $stmt->execute(['token' => $token]);
    $user = $stmt->fetch();

    $agora = new DateTime();
    $expira = $user ? new DateTime($user['token_expira']) : null;

    if (!$user || !$expira || $agora > $expira) {
        $message = "Token inválido ou expirado. Tente solicitar a recuperação novamente.";
        $message_class = "alert-danger";
        $show_form = false; // Não mostrar o formulário se o token falhar no POST
    
    } elseif (empty($nova_senha) || empty($confirma_senha)) {
        $message = "Por favor, preencha ambos os campos de senha.";
        $message_class = "alert-danger";
        $show_form = true; // Mostrar formulário novamente com o erro
    
    } elseif ($nova_senha !== $confirma_senha) {
        $message = "As senhas não coincidem. Tente novamente.";
        $message_class = "alert-danger";
        $show_form = true; // Mostrar formulário novamente com o erro
    
    } elseif (strlen($nova_senha) < 8) {
        $message = "A senha deve ter no mínimo 8 caracteres.";
        $message_class = "alert-danger";
        $show_form = true; // Mostrar formulário novamente com o erro
    
    } else {
        // Tudo certo! Atualizar a senha
        $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
        
        // Atualizar a senha E limpar o token para que não possa ser usado novamente
        $stmt = $pdo->prepare("UPDATE usuarios SET senha = :senha, token = NULL, token_expira = NULL WHERE id = :id");
        $stmt->execute([
            'senha' => $nova_senha_hash,
            'id' => $user['id']
        ]);

        // Redirecionar para o login com mensagem de sucesso
        // O login.php está em /src/pages/
        // Este arquivo está em /src/database/, então usamos ../pages/login.php
        header('Location: ../pages/login.php?status=sucesso&msg=' . urlencode('Senha alterada com sucesso! Você já pode fazer o login.'));
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leka Sarandy | Redefinir Senha</title>
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
                <h3 class="mb-3">Redefinir Senha</h3>

                <?php if (!empty($message)): ?>
                <div class="alert <?php echo $message_class; ?>" role="alert">
                    <?php echo htmlspecialchars($message); ?>
                </div>
                <?php endif; ?>

                <?php if ($show_form): ?>
                <p class="text-muted mb-4">Digite sua nova senha abaixo.</p>
                <form action="resetSenha.php" method="POST">

                    <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="nova_senha" name="nova_senha"
                            placeholder="Nova senha" required>
                        <label for="nova_senha"><i class="bi bi-key-fill me-2"></i>Nova Senha</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="confirma_senha" name="confirma_senha"
                            placeholder="Confirme a nova senha" required>
                        <label for="confirma_senha"><i class="bi bi-key-fill me-2"></i>Confirme a Nova Senha</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3">Salvar Nova Senha</button>
                </form>

                <?php else: ?>
                <div class="form-text mt-3">
                    <a href="../pages/login.php"><i class="bi bi-arrow-left me-2"></i>Voltar para o login</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>