<?php
require_once '../database/auth.php';
require_once '../database/config.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS-->
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/esqueceuASenha.css">

    <link rel="shortcut icon" href="../img/logoEmpresa.png" type="image/x-icon">

    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!--Fontes-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">

    <title>Leka Sarandy | Esqueceu a Senha</title>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm" id="Navbar">
        <div class="container">
            <a class="navbar-brand text-dark logo" style="display: flex; align-items: center; gap: 10px;"
                href="../../index.php">
                <img src="../img/logoEmpresa.png" style="width: 60px;" alt="logo">
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link position-relative text-black px-3 py-2 "
                            href="../../index.php">Início</a></li>
                    <li class="nav-item"><a class="nav-link  position-relative text-black px-3 py-2"
                            href="../../index.php">Propósito</a>
                    </li>
                    <li class="nav-item"><a class="nav-link  position-relative text-black px-3 py-2"
                            href="../../index.php">Sobre
                            Mim</a></li>
                    <li class="nav-item"><a class="nav-link  position-relative text-black px-3 py-2"
                            href="../pages/contato.php">Contato</a></li>
                </ul>
                <div class="d-flex">

                    <button class="btn btn-warning ms-auto p-2 px-3" onclick="location.href='../pages/login.php'">
                        Login
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Section -->
    <div class="container-fluid form-section d-flex">

        <!-- Imagem lateral -->
        <div class="col-md-6 d-none d-md-block bg-image"></div>

        <!-- Formulário -->
        <div class="col-md-6 d-flex align-items-center justify-content-center bg-light">
            <div class="form-container text-center p-4">
                <img src="../img/logoEmpresa.png" alt="Logo" class="logo-form mb-3">
                <h3 class="mb-3">Recuperar Senha</h3>
                <p class="text-muted mb-4">Informe seu e-mail para receber o link de redefinição.</p>

                <!-- Formulário de envio -->
                <form action="../database/recuperarSenha.php" method="POST">

                    <!-- Email -->
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Seu e-mail"
                            required>
                        <label for="email"><i class="bi bi-envelope-fill me-2"></i>Seu E-mail</label>
                    </div>

                    <!-- Botão -->
                    <button type="submit" class="btn btn-primary w-100 mb-3">Enviar link de recuperação</button>
                </form>

                <!-- Link de retorno -->
                <div class="form-text mt-3">
                    <a href="login.php"><i class="bi bi-arrow-left me-2"></i>Voltar para o login</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>