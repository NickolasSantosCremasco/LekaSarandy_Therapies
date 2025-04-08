<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--SEO-->
    <meta name="description"
        content="Terapia personalizada e transformadora com base em conexão autêntica, equilíbrio emocional e autoconhecimento.">
    <meta name="keywords"
        content="terapia, autoconhecimento, saúde mental, psicológico, transformação emocional, terapia online">

    <!--CSS-->
    <link rel="stylesheet" href="./src/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/css/home.css">
    <link rel="stylesheet" href="./src/css/global.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <!-- Fontes do Site -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


    <link rel="shortcut icon" href="./src/img/logoEmpresa.png" type="image/x-icon">
    <title>Leka Sarandi</title>

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar fixed-top shadow-lg navbar-expand-lg navbar-dark bg-white" id="Navbar">
        <div class="container">
            <a class="navbar-brand text-dark logo" style="display: flex; align-items: center; gap: 10px;" href="#">

                <img loading="lazy" src="./src/img/logoEmpresa.png" style="width: 60px;" alt="logo">

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto ">
                    <li class="nav-item"><a class="nav-link text-black" href="./index.php">Início</a></li>
                    <li class="nav-item"><a class="nav-link text-black" href="#">Minha Empresa</a></li>
                    <li class="nav-item"><a class="nav-link text-black" href="#">Sobre Mim</a></li>
                    <li class="nav-item"><a class="nav-link text-black" href="#">Contato</a></li>
                </ul>
                <div class="d-flex">
                    <button class="btn btn-warning ms-auto p-2 px-3" onclick="location.href='./src/pages/login.php'">
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
            <p class="text-light">Descubra quem você realmente é. Sua transformação começa com um clique.
            </p>
            <button class="btn bg-warning bg-gradient btn-lg mt-3" id="btnHeroSection">
                <a href="src/pages/pesquisa.php" class="text-black position-relative" style="bottom: 3px;">Faça a
                    Pesquisa</a>
                <i class="bi bi-arrow-right-circle-fill"></i>

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

            <!--Swiper  -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <!-- Depoimento 1 -->
                    <div class="swiper-slide">
                        <div class="card h-100 border-0 shadow-sm mx-3">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-warning rounded-circle p-2 me-3">
                                        <span class="text-white fs-4">L</span>
                                    </div>
                                    <h5 class="mb-0">Lucas</h5>
                                </div>
                                <p class="card-text">"Acredito que os desafios emocionais e a experiência
                                    terapêutica
                                    são
                                    componentes essenciais para o desenvolvimento de uma mente saudável."</p>
                                <p>"Minha estratégia de vida agora é guiada pela necessidade de um ambiente
                                    mental
                                    mais
                                    equilibrado."</p>
                            </div>
                        </div>
                    </div>

                    <!-- Depoimento 2 -->
                    <div class="swiper-slide">
                        <div class="card h-100 border-0 shadow-sm mx-3">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-warning rounded-circle p-2 me-3">
                                        <span class="text-white fs-4">M</span>
                                    </div>
                                    <h5 class="mb-0">Joana</h5>
                                </div>
                                <p class="card-text">"Os desafios terapêuticos podem promover mudanças
                                    significativas em
                                    nossas vidas. Na terapia, encontrei as ferramentas para trabalhar meus
                                    problemas
                                    no
                                    nível mais profundo."</p>
                                <p>"Minha jornada agora é guiada pela busca de um diálogo interno mais
                                    saudável."
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Depoimento 3 -->
                    <div class="swiper-slide">
                        <div class="card h-100 border-0 shadow-sm mx-3">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-warning rounded-circle p-2 me-3">
                                        <span class="text-white fs-4">A</span>
                                    </div>
                                    <h5 class="mb-0">Ariana</h5>
                                </div>
                                <p class="card-text">"Acredito que enfrentar nossos desafios emocionais é
                                    fundamental
                                    para
                                    construir uma vida mais autêntica e sustentável."</p>
                                <p>"Minha estratégia de vida agora prioriza o equilíbrio mental e emocional."
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Depoimento 3 -->
                    <div class="swiper-slide">
                        <div class="card h-100 border-0 shadow-sm mx-3">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-warning rounded-circle p-2 me-3">
                                        <span class="text-white fs-4">A</span>
                                    </div>
                                    <h5 class="mb-0">Ariana</h5>
                                </div>
                                <p class="card-text">"Acredito que enfrentar nossos desafios emocionais é
                                    fundamental
                                    para
                                    construir uma vida mais autêntica e sustentável."</p>
                                <p>"Minha estratégia de vida agora prioriza o equilíbrio mental e emocional."
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Controles do Swiper -->
                <div class="swiper-pagination mt-5"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

            </div>
        </div>
        <!-- Depoimento (destaque) -->
        <div class="container-lg mt-4">
            <div class="card border-0  text-white"
                style="background: linear-gradient(135deg, #5e2129 0%, #7a2a3a 50%, #9b1b30 100%);">
                <div class="card-body p-5">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h3>Luana</h3>
                            <p class="fs-5">"A jornada terapêutica proporcionou um engajamento acessível
                                e
                                transformador com minhas emoções. Encontrei soluções dedicadas que
                                nenhum
                                outro
                                método havia me oferecido."</p>
                            <p class="mb-0">- Luana, paciente desde 2023</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="./src/img/fundoRoxo.png" alt="Ícone wellness" class="img-fluid rounded-4 shadow"
                                style="max-height: 150px;">
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
                <h1 class="display-4 mb-1" id="tituloServicos">Propósito da terapia</h1>
                <p class="lead ">Nosso compromisso com sua jornada de autodescoberta</p>
                <div class="divider mx-auto" style="width: 100px; height: 3px; background: #7a2a3a;"></div>
            </div>

            <!-- Grid de serviços -->
            <div class="row g-4">
                <!-- Serviço 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 bg-dark border-0">
                        <div class="card-body text-center p-4">
                            <h3 class="h4 mb-3 text-warning" style="color: #7a2a3a;">Conexão Autêntica</h3>
                            <p class="mb-0" style="color: white;">Assim como você se sente confortável sendo você mesmo,
                                a terapia oferece um espaço seguro para explorar sua essência sem julgamentos, mesmo
                                quando realizado remotamente</p>
                        </div>
                    </div>
                </div>

                <!-- Serviço 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 bg-dark border-0">
                        <div class="card-body text-center p-4">
                            <h3 class="h4 mb-3 text-warning" style="color: #7a2a3a;">Empoderamento</h3>
                            <p class="mb-0" style="color: white;">Assim como você merece ser protagonista da sua vida, a
                                terapia fortalece sua capacidade de fazer escolhas alinhadas com seu verdadeiro eu,
                                momento a momento.</p>
                        </div>
                    </div>
                </div>

                <!-- Serviço 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 bg-dark border-0">
                        <div class="card-body text-center p-4">
                            <h3 class="h4 mb-3 text-warning" style="color: #7a2a3a;">Essencialidade</h3>
                            <p class="mb-0" style="color: white;">Assim como o coração sabe seu tamanho essencial, a
                                terapia ajuda a reconhecer que cura não depende de recursos externos, mas da conexão
                                interna.</p>
                        </div>
                    </div>
                </div>

                <!-- Serviço 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 bg-dark border-0">
                        <div class="card-body text-center p-4">
                            <h3 class="h4 mb-3 text-warning" style="color: #7a2a3a;">Transformação</h3>
                            <p class="mb-0" style="color:white ;">Assim como você pode transformar desafios em
                                crescimento, a terapia oferece ferramentas para reconstruir sua narrativa de forma
                                positiva e fortalecida.</p>
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
                        <h3 class="h4 mb-3" style="color: #7a2a3a;">Meu Objetivo</h3>
                        <p>
                            Encorajo meus pacientes a enfrentarem medos sem julgamento. Quando a mente parece
                            insensível às mudanças, ofereço um espaço seguro para explorar toda a gama de
                            emoções no conforto do nosso santuário terapêutico.
                        </p>
                    </div>

                </div>

                <!-- Coluna de imagem -->
                <div class="col-lg-5">
                    <div class="position-relative d-block">
                        <img src="https://tse1.mm.bing.net/th?id=OIP.X8aBnaZbAhu8Yt8YCY6psQHaD3&pid=Api"
                            style="height: 450px; width: 500px;" alt="Terapeuta" class="img-fluid rounded shadow-lg"
                            style="border: 8px solid white;">
                        <div class="position-absolute bottom-0 start-0 bg-white p-3 shadow"
                            style="transform: translate(-20%, 20%);">
                            <h5 class="mb-0" style="color: #7a2a3a;">10+ Anos</h5>
                            <small>de experiência</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Planos de Terapia-->
    <!-- Planos de Terapia -->
    <section class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <!-- Título -->
            <div class="text-center mb-5">
                <div class="divider mx-auto mb-3" style="width: 100px; height: 3px; background: #7a2a3a;"></div>
                <h1 class="display-4 mb-3">Nossas Terapias</h1>
                <p class="lead">Escolha o plano que melhor se adapta à sua jornada de autoconhecimento</p>
            </div>

            <!-- Cards -->
            <div class="row g-4 justify-content-center">
                <!-- Card 1: Sabotadores -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden">
                        <img src="https://image.freepik.com/foto-gratis/mirada-mujer-sentada-preocupada-escalera_53876-46177.jpg"
                            class="card-img-top" alt="Mulher em sessão de terapia"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h3 class="card-title text-warning mb-3">Terapia de Sabotadores</h3>
                            <p class="card-text mb-4">Identifique e transforme os padrões inconscientes que limitam seu
                                potencial e bem-estar emocional.</p>
                            <ul class="list-unstyled text-start mb-4">
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>6 sessões
                                    individuais</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>Diagnóstico
                                    completo</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>Exercícios
                                    práticos</li>
                            </ul>
                            <a href="#" class="btn btn-warning w-100 py-2">Saiba mais</a>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Individual (Destaque) -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-lg border-warning border-3">
                        <div class="position-absolute top-0 start-50 translate-middle mt-3">
                            <span class="badge bg-danger py-2 px-3">Mais procurado</span>
                        </div>
                        <img src="https://image.freepik.com/foto-gratis/terapeuta-hablando-paciente_23-2149060079.jpg"
                            class="card-img-top" alt="Sessão individual de terapia"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h3 class="card-title text-warning mb-3">Sessão Individual</h3>
                            <p class="card-text mb-4">Acompanhamento personalizado para seu desenvolvimento emocional e
                                autoconhecimento profundo.</p>
                            <ul class="list-unstyled text-start mb-4">
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>1 hora por
                                    sessão</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>Plano
                                    personalizado</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>Flexibilidade
                                    de horários</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>Suporte entre
                                    sessões</li>
                            </ul>
                            <a href="#" class="btn btn-warning w-100 py-2">Agendar agora</a>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Grupal -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden">
                        <img src="https://image.freepik.com/foto-gratis/grupo-personas-tomando-notas_23-2149097985.jpg"
                            class="card-img-top" alt="Grupo em sessão de terapia"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h3 class="card-title text-warning mb-3">Sessão Grupal</h3>
                            <p class="card-text mb-4">Experiência transformadora compartilhada em grupo para crescimento
                                coletivo e apoio mútuo.</p>
                            <ul class="list-unstyled text-start mb-4">
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>8 encontros
                                    mensais</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>Temas
                                    específicos</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>Dinâmicas
                                    interativas</li>
                            </ul>
                            <a href="#" class="btn btn-outline-warning w-100 py-2">Conhecer grupos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--FAQ-->
    <section>
        <p>FAQ</p>
    </section>
    <!-- Rodapé -->
    <footer class="bg-dark text-light text-center p-3" id="Footer">
        <p>&copy; 2025 Leka Sarandi. Todos os direitos reservados.</p>
    </footer>
</body>
<script src="./src/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script src="./src/js/home.js"></script>


<script>
if (typeof Swiper !== 'undefined') {
    const swiper = new Swiper('.mySwiper', {
        loop: true,
        spaceBetween: 30,
        grabCursor: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        slidesPerView: 1,
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            }
        },
        autoplay: {
            delay: 3000, // Tempo em milissegundos (3 segundos)
            disableOnInteraction: false, // Continua após interação do usuário
            pauseOnMouseEnter: true // Pausa quando o mouse está sobre o slider
        }
    });
} else {
    console.error('Erro: Swiper não foi carregado corretamente')
}
</script>

</html>