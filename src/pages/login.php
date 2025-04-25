<?php
require_once '../database/auth.php';

// Redireciona se já estiver logado

if(estaLogado()) {
    header('Location: ' .($_SESSION['redirect_url'] ?? 'index.php'));
    exit();
}

//processa o formulário
$erro = null;
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'] ?? '';
    
    if(logarUsuario($email, $senha)) {
        $redirect = $_SESSION['redirect_url'] ?? 'index.php';
        unset($_SESSION['redirect_url']);
        header("Location: $redirect");
        exit();
    } else {
        $erro = 'Credenciais inválidas. Por favor, tente novamente.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../img/logoEmpresa.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>Alessandra Sarandi | Login</title>
    <style>

    </style>
</head>

<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm" id="Navbar">
        <div class="container">
            <a class="navbar-brand text-dark logo" style="display: flex; align-items: center; gap: 10px;"
                href="./index.php">

                <img loading="lazy" src="../img/logoEmpresa.png" style="width: 60px;" alt="logo">

            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link position-relative px-3 py-2" href="../../index.php"
                            style="font-weight: 400;">Início</a>
                    </li>
                    <li class="nav-item"><a class="nav-link position-relative px-3 py-2" href="../../index.php"
                            style="font-weight: 400;">Minha Empresa</a></li>
                    <li class="nav-item"><a class="nav-link position-relative px-3 py-2" href="../../index.php"
                            style="font-weight: 400;">Sobre Mim</a></li>
                    <li class="nav-item"><a class="nav-link position-relative px-3 py-2" href="../pages/contato.php"
                            style="font-weight: 400;">Contato</a></li>
                </ul>
                <div class="d-flex">
                    <button class="btn btn-warning ms-auto p-2 px-3" onclick="location.href='login.php'">
                        Login
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <div class="row vh-100 g-0">
        <!--Lado Esquerdo-->
        <div class="col-lg-6 position-relative d-none d-lg-block">
            <div class="bg-holder login">
            </div>
        </div>

        <!--Lado Direito-->
        <div class="col-lg-6">
            <div class="row align-items-center justify-content-center h-100 g-0 px-4 px-sm-0">
                <div class="col col-sm-6 col-lg-7 col-xl-6">
                    <!--logo-->
                    <a href="" class="d-flex justify-content-center mb-4">
                        <img src="../img/logoEmpresa.png" width="60" class="img-fluid" alt="">
                    </a>

                    <div class="text-center mb-5">
                        <h3 class="fw-bold">Entrar</h3>
                        <p class="text-secondary">Tenha acesso a sua conta</p>
                    </div>

                    <!-- Exibe Erros -->
                    <?php if($erro): ?>
                    <div class="alert alert-danger mb-4"><?=htmlspecialchars($erro)?></div>
                    <?php endif; ?>

                    <!--Login Rede Social-->
                    <button class="btn btn-outline-secondary btn-outline-custom w-100 mb-3">
                        <i class="bi bi-google text-danger me-1 fs-6"></i>
                        Login com Google
                    </button>
                    <button class="btn btn-outline-secondary btn-outline-custom w-100">
                        <i class="bi bi-facebook text-primary me-1 fs-6"></i>
                        Login com Facebook
                    </button>
                    <!--Divisor-->
                    <div class="position-relative">
                        <hr class="text-secondary divider">
                        <div class="divider-content-center">Ou</div>
                    </div>

                    <!--Formulário-->
                    <form action="login.php" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill"></i>
                            </span>
                            <input type="text" name="email" class="form-control form-control-lg fs-6"
                                placeholder="Email" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="bi bi-lock-fill"></i>
                            </span>
                            <input type="password" name="senha" class="form-control form-control-lg fs-6"
                                placeholder="Senha" required>
                        </div>

                        <div class="input-group mb-3 d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="lembrar" name="lembrar">
                                <label for="formCheck" class="form-check-label text-secondary">
                                    <small> Lembrar de mim</small>
                                </label>
                            </div>
                            <div>
                                <small>
                                    <a href="../pages/recuperarSenha.php">
                                        Esqueceu a Senha?
                                    </a>
                                </small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100">Entrar</button>
                    </form>
                    <div class="text-center">
                        <small>Não possui uma conta?
                            <a href="./cadastro.php " class=" fw-bold">Cadastre-se</a>
                        </small>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="../bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</body>

</html>