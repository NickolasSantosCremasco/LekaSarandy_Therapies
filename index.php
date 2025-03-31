<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/css/home.css">
    <link rel="stylesheet" href="./src/css/global.css">

    <!-- Fontes do Site -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="./src/img/logoEmpresa.png" type="image/x-icon">
    <title>Leka Sarandi</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar fixed-top shadow-lg navbar-expand-lg navbar-dark bg-white" id="Navbar">
        <div class="container">
            <a class="navbar-brand text-dark logo" style="display: flex; align-items: center; gap: 10px;" href="#">

                <img src="./src/img/logoEmpresa.png" style="width: 60px;" alt="logo">

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto ">
                    <li class="nav-item"><a class="nav-link text-black" href="#">Início</a></li>
                    <li class="nav-item"><a class="nav-link text-black" href="#">Minha Empresa</a></li>
                    <li class="nav-item"><a class="nav-link text-black" href="#">Sobre Mim</a></li>
                    <li class="nav-item"><a class="nav-link text-black" href="#">Contato</a></li>
                </ul>
                <div class="d-flex">
                    <button class="btn btn-warning ms-auto p-2 px-3">
                        Login
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero d-flex align-items-center text-center">
        <div class="container">
            <h1 class="text-light fw-normal">Bem-vindo ao seu refúgio de Terapia</h1>
            <p class="text-light">Realize a pesquisa abaixo e descubra mais sobre o seu tipo de personalidade!
            </p>
            <button class="btn bg-warning bg-gradient btn-lg mt-3" id="btnHeroSection">
                <a href="#" class="text-black">Faça a Pesquisa</a>
            </button>
        </div>
    </header>

    <!-- Sessão de Depoimentos   -->
    <section class="py-5 bg-light" id="depoimentos">
        <!-- Título -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center mb-5">
                    <h2 class="display-4 mb-4">Experiências na Terapia</h2>
                    <p class="lead">Históricos reais de transformação e cura</p>
                </div>
            </div>
            <div class="row g-4">
                <!-- Depoimento 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-warning rounded-circle p-2 me-3">
                                    <span class="text-white fs-4">L</span>
                                </div>
                                <h5 class="mb-0">Lucas</h5>
                            </div>
                            <p class="card-text">"Acredito que os desafios emocionais e a experiência terapêutica são
                                componentes essenciais para o desenvolvimento de uma mente saudável."</p>
                            <p>"Minha estratégia de vida agora é guiada pela necessidade de um ambiente mental mais
                                equilibrado."</p>
                        </div>
                    </div>
                </div>

                <!-- Depoimento 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-warning rounded-circle p-2 me-3">
                                    <span class="text-white fs-4">M</span>
                                </div>
                                <h5 class="mb-0">Joana</h5>
                            </div>
                            <p class="card-text">"Os desafios terapêuticos podem promover mudanças significativas em
                                nossas vidas. Na terapia, encontrei as ferramentas para trabalhar meus problemas no
                                nível mais profundo."</p>
                            <p>"Minha jornada agora é guiada pela busca de um diálogo interno mais saudável."</p>
                        </div>
                    </div>
                </div>

                <!-- Depoimento 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-warning rounded-circle p-2 me-3">
                                    <span class="text-white fs-4">A</span>
                                </div>
                                <h5 class="mb-0">Ariana</h5>
                            </div>
                            <p class="card-text">"Acredito que enfrentar nossos desafios emocionais é fundamental para
                                construir uma vida mais autêntica e sustentável."</p>
                            <p>"Minha estratégia de vida agora prioriza o equilíbrio mental e emocional."</p>
                        </div>
                    </div>
                </div>

                <!-- Depoimento (destaque) -->
                <div class="col-12 mt-4">
                    <div class="card border-0  text-white"
                        style="background: linear-gradient(135deg, #5e2129 0%, #7a2a3a 50%, #9b1b30 100%);">
                        <div class="card-body p-5">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h3>"Luana"</h3>
                                    <p class="fs-5">"A jornada terapêutica proporcionou um engajamento acessível e
                                        transformador com minhas emoções. Encontrei soluções dedicadas que nenhum outro
                                        método havia me oferecido."</p>
                                    <p class="mb-0">- Luana, paciente desde 2023</p>
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="assets/wellness-icon.png" alt="Ícone wellness" class="img-fluid"
                                        style="max-height: 150px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Serviços -->
    <section class="container-fluid bg-black py-5 text-white">
        <div class="container">
            <!-- Título principal -->
            <div class="text-center mb-5">
                <h1 class="display-4 mb-3" id="tituloServicos">Propósito da terapia</h1>
                <div class="divider mx-auto" style="width: 100px; height: 3px; background: #7a2a3a;"></div>
            </div>

            <!-- Grid de serviços -->
            <div class="row g-4">
                <!-- Serviço 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 bg-dark border-0">
                        <div class="card-body text-center p-4">
                            <h3 class="h4 mb-3 text-warning" style="color: #7a2a3a;">Regroup Toy</h3>
                            <p class="mb-0" style="color: white;">Likewise you are comfortable also apart from being
                                served remotely every
                                second together next.</p>
                        </div>
                    </div>
                </div>

                <!-- Serviço 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 bg-dark border-0">
                        <div class="card-body text-center p-4">
                            <h3 class="h4 mb-3 text-warning" style="color: #7a2a3a;">Widerdike & Pions</h3>
                            <p class="mb-0" style="color: white;">Likewise you are comfortable for short time being
                                owners serving every
                                second together each.</p>
                        </div>
                    </div>
                </div>

                <!-- Serviço 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 bg-dark border-0">
                        <div class="card-body text-center p-4">
                            <h3 class="h4 mb-3 text-warning" style="color: #7a2a3a;">Leverhour</h3>
                            <p class="mb-0" style="color: white;">Likewise hearts a smaller size, but doesn't need to
                                come in money every
                                second again or even.</p>
                        </div>
                    </div>
                </div>

                <!-- Serviço 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 bg-dark border-0">
                        <div class="card-body text-center p-4">
                            <h3 class="h4 mb-3 text-warning" style="color: #7a2a3a;">Of Harp</h3>
                            <p class="mb-0" style="color:white ;">Likewise you are comfortable on a hard workhole that
                                can bring
                                your brand in
                                a good way.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sobre Mim -->

    <section class="container-fluid py-5" style="background: #f8f9fa;">
        <div class="container">
            <div class="row align-items-center">
                <!-- Coluna de texto -->
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <h1 class="display-4 mb-4" style="color: #7a2a3a;">Um Pouco Sobre Mim</h1>
                    <h2 class="h3 mb-4 text-muted">Quem sou eu?</h2>

                    <p class="lead mb-4">
                        Transformando vidas através de terapias integrativas, celebrando cada conquista com vibração
                        positiva.
                        Cada jornada é única como uma impressão digital emocional.
                    </p>

                    <div class="mb-5">
                        <h3 class="h4 mb-3" style="color: #7a2a3a;">Por Que Virei Terapeuta?</h3>
                        <p>
                            Minha abordagem terapêutica é como um filtro que destila as complexidades da mente,
                            transformando desafios em componentes de crescimento pessoal. Acredito no poder do
                            individualismo consciente para curar traumas profundos.
                        </p>
                    </div>

                    <div class="mb-5">
                        <h3 class="h4 mb-3" style="color: #7a2a3a;">Counter Cultures</h3>
                        <p>
                            Encorajo meus pacientes a enfrentarem medos sem julgamento. Quando a mente parece
                            insensível às mudanças, ofereço um espaço seguro para explorar toda a gama de
                            emoções no conforto do nosso santuário terapêutico.
                        </p>
                    </div>

                    <div class="bg-light p-4 rounded">
                        <p class="mb-0 font-italic">"Fiona"</p>
                    </div>
                </div>

                <!-- Coluna de imagem -->
                <div class="col-lg-5">
                    <div class="position-relative d-block">
                        <img src="https://tse1.mm.bing.net/th?id=OIP.X8aBnaZbAhu8Yt8YCY6psQHaD3&pid=Api"
                            style="height: 450px; width: 500px;" alt="Terapeuta" class="img-fluid rounded shadow-lg"
                            style="border: 8px solid white;">
                        <div class="position-absolute bottom-0 start-0 bg-white p-3 shadow-sm"
                            style="transform: translate(-20%, 20%);">
                            <h5 class="mb-0" style="color: #7a2a3a;">10+ Anos</h5>
                            <small>de experiência</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Rodapé -->
    <footer class="bg-dark text-light text-center p-3" id="Footer">
        <p>&copy; 2025 Terapia Zen. Todos os direitos reservados.</p>
    </footer>
</body>
<script src="./src/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

</html>