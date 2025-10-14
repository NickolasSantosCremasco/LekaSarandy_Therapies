<?php
require_once '../database/auth.php';
require_once '../database/config.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/pesquisaa.css">
    <link rel="stylesheet" href="../css/global.css">

    <!-- Fontes do Site -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


    <!--Montserrat-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!--Ícones-->
    <link rel="shortcut icon" href="../img/logoEmpresa.png" type="image/x-icon">
    <title>Leka Sarandi | Descubra Seu Perfil</title>

</head>

<body>
    <!-- Navbar -->
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
                    <li class="nav-item"><a class="nav-link position-relative text-black px-3 py-2 active"
                            href="../../index.php">Início</a></li>
                    <li class="nav-item"><a class="nav-link  position-relative text-black px-3 py-2"
                            href="../../index.php">Propósito</a></li>
                    <li class="nav-item"><a class="nav-link  position-relative text-black px-3 py-2"
                            href="../../index.php">Sobre
                            Mim</a></li>
                    <li class="nav-item"><a class="nav-link  position-relative text-black px-3 py-2"
                            href="../pages/contato.php">Contato</a></li>
                </ul>
                <div class="d-flex">
                    <?php if(estaLogado()) : ?>
                    <!-- Mostra a imagem do usuário logado -->
                    <div class="d-flex align-items-center flex-column gap-2">
                        <a href="../pages/perfil.php" class="perfil">
                            <img src="../img/usuarioGenerico.jpg" class="border" alt="Usuário"
                                style="width: 60px; height: 60px; border-radius: 50%;">
                        </a>
                        <span
                            class="fw-bold"><?php echo ucfirst(explode(' ', $_SESSION['usuario']['nome'])[0]) ?></span>
                    </div>
                    <?php else : ?>
                    <button class="btn btn-warning ms-auto p-2 px-3" onclick="location.href='../pages/login.php'">
                        Login
                    </button>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </nav>

    <!--Introdução-->
    <section class="intro-section therapeutic-bg">
        <div class="container startContainer">
            <div class="text-center mb-5">
                <h1 class="search-title">Descubra o seu Perfil Terapêutico</h1>
                <p class="highlight">Este teste personalizado irá revelar insights valiosos sobre sua personalidade e
                    necessidades emocionais, ajudando você a encontrar as terapias mais adequadas para o seu bem-estar
                </p>

                <div>
                    <button id="comecarTeste" class="btn btn-primary start-btn">Começar a Jornada</button>
                </div>

            </div>
        </div>
    </section>

    <!--Questionário-->
    <section class="container my-5 py-5 d-none" id="sessaoPesquisa">
        <div class="question-container">
            <img src="" alt="decoração" class="floral-decoration floral-1">
            <img src="" alt="decoração" class="floral-decoration floral-2">

            <div class="progress-container">
                <div class="progress-text">
                    <span>Progresso</span>
                    <span id="progressText">1/20</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" id="progressFill" style="width: 5%;"></div>
                </div>
            </div>

            <div class="question-number">Pergunta <span id="currentQuestionNum">1</span></div>
            <div class="question-text" id="questionText">Como você geralmente reage a situações estressantes?</div>

            <div class="options-container" id="optionsContainer">

            </div>

            <div class="navigation-btns">
                <button id="prevBtn" class="btn btn-outline-primary" disabled>
                    <i class="fas fa-arrow-left"></i> Anterior
                </button>
                <button id="nextBtn" class="btn btn-primary">
                    Próxima <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </section>

    <!--Resultado-->
    <section class="container my-5 py-5 d-none" id="sessaoResultado">
        <div class="question-container text-center">
            <!-- Cabeçalho do Resultado -->
            <h2 class="search-title mb-4">Seu Perfil Terapêutico</h2>

            <div class="mb-4">
                <img src="../img/cadastrar.webp" alt="Resultado" class="rounded-5 shadow"
                    style="width: 120px; height: 120px;">
            </div>

            <h3 id="profileTitle" class="mb-3"></h3>
            <p class="profilDescription text-muted mx-auto" style="max-width: 700px;"></p>

            <div class="row mt-5">
                <!-- Terapias Recomendadas -->
                <div class="col-md-8 mb-4">
                    <h4 class="mb-4">Terapias Recomendadas Para Você</h4>

                    <div class="row">
                        <!--Card 1-->
                        <div class="col-md-6 mb-4" id="card-container-1">
                            <div class="card shadow h-100 position-relative">
                                <span class="therapy-badge">Recomendado</span>
                                <img src="" alt="terapia1" id="img1" class="card-img-top"
                                    style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title" id="cardTitle1"></h5>
                                    <p class="card-text" id="cardText1"></p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="text-muted small"><i class="fas fa-clock me-1"></i> 60 min</span>
                                        <span class="text-primary fw-bold" style="cursor: pointer; font-size: 0.9rem;">
                                            Saber Mais <i class="fas fa-arrow-right ms-1"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Card 2-->
                        <div class="col-md-6 mb-4" id="card-container-2">
                            <div class="card shadow h-100 position-relative">
                                <span class="therapy-badge">Recomendado</span>
                                <img src="" alt="terapia2" id="img2" class="card-img-top"
                                    style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title" id="cardTitle2"></h5>
                                    <p class="card-text" id="cardText2"></p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="text-muted small"><i class="fas fa-clock me-1"></i> 60 min</span>
                                        <span class="text-primary fw-bold" style="cursor: pointer; font-size: 0.9rem;">
                                            Saber Mais <i class="fas fa-arrow-right ms-1"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Benefícios Esperados -->
                        <div class="alert alert-light border-0 shadow-sm mt-3"
                            style="border-left: 4px solid #ffc107 !important;">
                            <h6 class="fw-bold text-dark mb-2">
                                <i class="fas fa-lightbulb text-warning me-2"></i>
                                Benefícios Esperados
                            </h6>
                            <p class="mb-0 text-muted small">
                                Com base no seu perfil, essas terapias podem ajudar a reduzir o estresse, melhorar o
                                equilíbrio emocional e promover uma sensação geral de bem-estar.
                            </p>
                        </div>
                    </div>

                    <!-- Pontos Fortes -->
                    <div class="col-md-4 mb-4">
                        <div class="strengths-container">
                            <h4 class="mb-4 text-start text-primary fw-bold">Pontos Fortes</h4>
                            <ul class="text-start list-unstyled fs-5">
                                <li class="mb-2">
                                    <i class="fas fa-star text-warning me-2"></i>Empatia
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-star text-warning me-2"></i>Intuição
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-star text-warning me-2"></i>Capacidade de cura
                                </li>
                            </ul>

                            <!-- Dica Personalizada -->
                            <div class="mt-4 pt-3" style="border-top: 1px solid rgba(0,0,0,0.1);">
                                <p class="small text-muted mb-0">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <strong>Dica:</strong> Aproveite essas qualidades para potencializar os resultados
                                    das
                                    terapias.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botões de Ação -->
                <div class="mt-4">
                    <button class="btn-outline-primary mt-3" id="refazerTeste">
                        <i class="fas fa-redo me-2"></i>Refazer Teste
                    </button>
                    <button class="btn-outline-primary mt-3" id="agendarTerapia">
                        <i class="fas fa-calendar-check me-2"></i>Agendar Terapia
                    </button>
                </div>
            </div>
    </section>


    <!-- Footer -->
    <footer class="bg-dark text-light pt-5 pb-3" id="Footer">
        <div class="container">
            <div class="row text-center text-md-start">
                <!-- Logo / Nome -->
                <div class="col-md-4 mb-4">
                    <img src="../img/logoEmpresa.png" class="mb-4" style="width: 50px; height: 50px; " alt="logo">
                    <h5 class="text-uppercase">Leka Sarandy</h5>
                    <p class="text-white small">
                        Cuidando da sua saúde emocional com empatia e profissionalismo.
                    </p>
                </div>

                <!-- Links úteis -->
                <div class="col-md-4 mb-4">
                    <h6 class="text-uppercase">Navegação</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#servicos" class="text-light text-decoration-none">Inicial</a></li>
                        <li class="mb-2"><a href="../../index.php" class="text-light text-decoration-none">Propósito</a>
                        </li>
                        <li class="mb-2"><a href="../../index.php" class="text-light text-decoration-none">Sobre Mim</a>
                        </li>
                        <li><a href="./contato.php" class="text-light text-decoration-none">Contato</a></li>
                    </ul>
                </div>

                <!-- Contato / Redes Sociais -->
                <div class="col-md-4 mb-4">
                    <h6 class="text-uppercase">Fale Conosco</h6>
                    <p class="mb-1"><i class="bi bi-envelope"></i> infolekaeducativa@gmail.com
                    </p>

                    <div class="d-flex justify-content-center justify-content-md-start gap-3">
                        <a href="https://www.instagram.com/lekasarandy/" target="_blank" class="text-light"><i
                                class="bi bi-instagram fs-5"></i></a>
                        <a href="#" class="text-light"><i class="bi bi-facebook fs-5"></i></a>
                        <a href="https://chat.whatsapp.com/ILgzaTnw2gn579HP5Vin2q" target="_blank" class="text-light"><i
                                class="bi bi-whatsapp fs-5"></i></a>
                    </div>
                </div>
            </div>

            <hr class="border-secondary" />
            <p class="text-center small mb-0">&copy; 2025 Leka Sarandy. Todos os direitos reservados.</p>
        </div>
    </footer>
    <script src="../js/pesquisaa.js"></script>
    <script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>

</html>