<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../img/logoEmpresa.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/cadastro.css">
    <link rel="stylesheet" href="../css/global.css">
    <title>Alessandra Sarandi | Cadastro</title>
</head>

<body>
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
                    <button class="btn btn-warning ms-auto p-2 px-3" onclick="location.href='../pages/login.php'">
                        Login
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <div class="row vh-100 g-0">
        <!--Lado Direito-->
        <div class="col-lg-6">
            <div class="row align-items-center justify-content-center h-100 g-0 px-4 px-sm-0">
                <div class="col col-sm-6 col-lg-7 col-xl-6">
                    <!--logo-->
                    <a href="" class="d-flex justify-content-center mb-4">
                        <img src="../img/logoEmpresa.png" width="60" class="img-fluid" alt="">
                    </a>

                    <div class="text-center mb-5">
                        <h3 class="fw-bold">Cadastre-se</h3>
                        <p class="text-secondary">Crie sua conta para melhor experiência</p>
                    </div>

                    <!--Login Rede Social-->

                    <!--Divisor-->
                    <div class="position-relative">
                        <hr class="text-secondary divider">
                        <div class="divider-content-center"></div>
                    </div>

                    <!--Formulário-->
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill"></i>
                            </span>
                            <input type="text" class="form-control form-control-lg fs-6" placeholder="Nome" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="bi bi-lock-fill"></i>
                            </span>
                            <input type="password" class="form-control form-control-lg fs-6" placeholder="Senha"
                                required>
                        </div>

                        <div class="input-group mb-3 d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="formCheck">
                                <label for="formCheck" class="form-check-label text-secondary">
                                    <small> Remember Me</small>
                                </label>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100">Entrar</button>
                    </form>
                    <div class="text-center">
                        <small>Já possui uma conta?
                            <a href="./login.php" class=" fw-bold">Entrar</a>
                        </small>

                    </div>
                </div>
            </div>

        </div>
        <!--Lado Esquerdo-->
        <div class="col-lg-6 position-relative d-none d-lg-block">
            <div class="bg-holder cadastro">
            </div>
        </div>
    </div>
    <script src="../bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</body>

</html>