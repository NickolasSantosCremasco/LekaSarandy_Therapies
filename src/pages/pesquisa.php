<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/pesquisa.css">
    <link rel="stylesheet" href="../css/global.css">

    <!-- Fontes do Site -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="shortcut icon" href="../img/logoEmpresa.png" type="image/x-icon">
    <title>Alessandra Sarandi | Descubra Seu Perfil</title>
</head>

<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar fixed-top shadow-lg navbar-expand-lg navbar-dark bg-white" id="Navbar">
        <div class="container">
            <a class="navbar-brand text-dark logo" style="display: flex; align-items: center; gap: 10px;" href="#">
                <img src="../img/logoEmpresa.png" style="width: 60px;" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link text-black" href="../../index.php">Início</a></li>
                    <li class="nav-item"><a class="nav-link text-black" href="#">Minha Empresa</a></li>
                    <li class="nav-item"><a class="nav-link text-black" href="#">Sobre Mim</a></li>
                    <li class="nav-item"><a class="nav-link text-black" href="../pages/contato.php">Contato</a></li>
                </ul>
                <div class="d-flex">
                    <button class="btn btn-warning ms-auto p-2 px-3">
                        Login
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Questionário -->
    <section class="container py-5 mt-5">
        <!-- Tela de Introdução -->
        <div id="introScream" class="text-center">
            <h1 class="display-4">Descubra Seu Perfil Terapêutico</h1>
            <p class="lead mb-4">Responda honestamente para descobrir qual abordagem terapêutica pode ser mais eficaz
                para suas necessidades atuais</p>
            <button id="Start" class="btn">Começar Teste</button>
        </div>

        <!-- Questionário -->
        <div id="quizContainer" class="d-none">
            <!-- Barra de Progresso -->
            <div class="progress mb-4" style="height: 10px;">
                <div id="quizProgress" class="progress-bar" role="progressbar" style="width: 0%;"></div>
            </div>

            <!-- Pergunta Atual -->
            <div class="card mb-4">
                <div class="card-body">
                    <h4 id="questionText" class="card-title mb-4"></h4>
                    <div id="options" class="options-container">
                        <!-- Opções inseridas aqui pelo Javascript -->
                    </div>
                </div>
            </div>

            <!-- Controle de Navegação -->
            <div class="d-flex justify-content-between">
                <button id="prevBtn" class="btn btn-warning d-none">Anterior</button>
                <button id="nextBtn" class="btn btn-warning">Próxima</button>
            </div>
        </div>

        <!-- Resultado -->
        <div id="resultContainer" class="d-none">
            <div class="result-card">
                <div class="result-header">
                    <h2>Seu Perfil Terapêutico</h2>
                </div>
                <div class="result-body">
                    <div class="therapy-type" id="resultTitle"></div>
                    <div class="therapy-description" id="resultDescription"></div>

                    <div class="therapy-recommendation">
                        <h5>Recomendação Personalizada</h5>
                        <p id="resultRecommendation"></p>
                    </div>

                    <div class="therapy-benefits">
                        <h5>Benefícios desta Abordagem para Você</h5>
                        <ul id="resultBenefits"></ul>
                    </div>

                    <div class="therapy-actions text-center">
                        <button id="scheduleBtn" class="btn btn-action">Agendar Consulta</button>
                        <button id="retakeBtn" class="btn btn-action">Refazer Teste</button>
                        <button id="learnMoreBtn" class="btn btn-action">Saber Mais</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>


<script src="./src/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</html>