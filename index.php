<?php
    require_once 'src/database/config.php';
    require_once 'src/database/auth.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--SEO-->
    <meta name="description"
        content="Terapia personalizada e transformadora com base em conexão autêntica, equilíbrio emocional e autoconhecimento.">
    <meta name="keywords"
        content="terapia, autoconhecimento, saúde mental, psicológico, transformação emocional, terapia online, leka sarandi, Alexandra Sarandy">

    <!--CSS-->
    <link rel="stylesheet" href="./src/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/css/home.css">
    <link rel="stylesheet" href="./src/css/global.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <!-- Fontes do Site -->
    <!--Parisienne-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!--Montserrat-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--Swiper-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="shortcut icon" href="./src/img/logoEmpresa.png" type="image/x-icon">
    <title>Leka Sarandy</title>

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm" id="Navbar">
        <div class="container">
            <a class="navbar-brand text-dark logo" style="display: flex; align-items: center; gap: 10px;"
                href="./index.php">

                <img loading="lazy" src="./src/img/logoEmpresa.png" style="width: 60px;" alt="logo">

            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link position-relative px-3 py-2 active"
                            href="./index.php">Início</a>
                    </li>
                    <li class="nav-item"><a class="nav-link position-relative px-3 py-2"
                            href="#minhaEmpresa">Propósito</a></li>
                    <li class="nav-item"><a class="nav-link position-relative px-3 py-2" href="#sobreMim">Sobre Mim</a>
                    </li>
                    <li class="nav-item"><a class="nav-link position-relative px-3 py-2"
                            href="./src/pages/contato.php">Contato</a></li>
                </ul>
                <div class="d-flex">
                    <?php if(estaLogado()) : ?>
                    <!-- Mostra a imagem do usuário logado -->
                    <div class="d-flex align-items-center flex-column gap-2">
                        <a href="src/pages/perfil.php" class="perfil">
                            <img src="src/img/usuarioGenerico.jpg" class="border" alt="Usuário"
                                style="width: 60px; height: 60px; border-radius: 50%;">
                        </a>
                        <span
                            class="fw-bold"><?php echo ucfirst(explode(' ', $_SESSION['usuario']['nome'])[0]) ?></span>
                    </div>
                    <?php else : ?>
                    <button class="btn btn-warning ms-auto p-2 px-3" onclick="location.href='./src/pages/login.php'">
                        Login
                    </button>
                    <?php endif ?>
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
                <?php if(estaLogado()) : ?>
                <a href="src/pages/pesquisa.php" class="text-black position-relative" style="bottom: 3px;">Faça a
                    Pesquisa</a>
                <i class="bi bi-arrow-right-circle-fill"></i>
                <?php else :?>
                <a href="src/pages/login.php" class="text-black position-relative" style="bottom: 3px;">Faça a
                    Pesquisa</a>
                <i class="bi bi-arrow-right-circle-fill"></i>
                <?php endif;?>
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
                                        <span class="text-white fs-4">M</span>
                                    </div>
                                    <h5 class="mb-0">Mariana</h5>
                                </div>
                                <p class="card-text">"Leka querida!!! Quero mais uma vez agradecer a super sessão que
                                    tivemos!!!
                                    Foi realmente LIBERTADORA!!! Já me sinto totalmente diferente com relação a mim e
                                    as minhas antigas dificuldades"</p>
                                <p>"Realmente foi mágico! A sua condução de sessão e capacidade de interpretação foram
                                    fundamentais e
                                    sei que fizeram a diferença!!!"
                                </p>
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
                                <p class="card-text">"Geeenteee!!! Vim logo aqui contar para vocês minha experiência com
                                    a Leka, que pessoa iluminada, tenho certeza que Deus a colocou no meu caminho para
                                    ajudar."</p>
                                <p>"Conduziu toda a sessão e detectou uma crença que eu jamais iria detectar sozinha com
                                    tanta
                                    paciência, naturalidade e muito rápido rs, sou pura gratidão!!! Além de tudo foi uma
                                    aula!!! Muito obrigada mesmo.
                                    "
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
                                        <span class="text-white fs-4">V</span>
                                    </div>
                                    <h5 class="mb-0">Vera</h5>
                                </div>
                                <p class="card-text">"Quero deixar registrado aqui a minha gratidão a Leka por todo o
                                    aprendizado e novos conhecimentos no curso Destrave Crenças Tecnológicas que me fez
                                    sair do ponto zero para já conseguir criar meus primeiros projetos"</p>
                                <p>"O curso me trouxe o empoderamento para me reinventar e continuar vendendo online
                                    aprendendo as ferramentas necessárias para meu negócio!! Minha gratidão a minha
                                    mestra tecnológica

                                    e terapeuta"
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
                                        <span class="text-white fs-4">R</span>
                                    </div>
                                    <h5 class="mb-0">Raquel</h5>
                                </div>
                                <p class="card-text">"Oi, vim agradecer a Leka por ter se disponibilizado com amor
                                    alegria, desprendimento e competência em ensinar e destravar a Tecnologia. Foi
                                    incrível pois não sabia utilizar alguns programas que me ajudariam a desenvolver
                                    melhor meu trabalho"</p>
                                <p>"Hoje já utilizei vários programas dos quais ela me ensinou e já tenho alavancado
                                    meus
                                    projetos. Só tenho a agradecer a ti Leka. Muito Grata"
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
    <section class="container-fluid bg-black py-5 text-white" id="minhaEmpresa">
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
                            <p class="mb-0" style="color: white;">Assim como você se sente confortável sendo você
                                mesmo,
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
                            <p class="mb-0" style="color: white;">Assim como você merece ser protagonista da sua
                                vida, a
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

    <section class="container-fluid py-5" style="background: #f8f9fa;" id="sobreMim">
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
                        <img src="src/img/LekaSarandy.jpeg" alt="Terapeuta" class="img-fluid rounded shadow-lg"
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
                            <h3 class="card-title mb-3" style="color: #7a2a3a;">Sessão de Sabotadores</h3>
                            <p class="card-text mb-4">Identifique e transforme os padrões inconscientes que limitam
                                seu
                                potencial e bem-estar emocional.</p>
                            <ul class="list-unstyled text-start mb-4">
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>6 sessões
                                    individuais</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>Diagnóstico
                                    completo</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>Exercícios
                                    práticos</li>
                            </ul>



                            <?php if(estaLogado()):?>
                            <a href=" https://chat.whatsapp.com/ILgzaTnw2gn579HP5Vin2q"
                                class="btn btn-warning   w-100 py-2">Saiba mais</a>
                            <?php else : ?>
                            <a href="src/pages/login.php" class="btn btn-warning   w-100 py-2">Saiba mais</a>
                            <?php endif;?>
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
                            <h3 class="card-title mb-3" style="color: #7a2a3a;">Sessão de Valores Pessoais</h3>
                            <p class="card-text mb-4">Acompanhamento personalizado para seu desenvolvimento
                                emocional e
                                autoconhecimento profundo.</p>
                            <ul class="list-unstyled text-start mb-4">
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>1 hora por
                                    sessão</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>Plano
                                    personalizado</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>Flexibilidade
                                    de horários</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>Suporte
                                    entre
                                    sessões</li>
                            </ul>
                            <?php if(estaLogado()) : ?>
                            <a href="https://chat.whatsapp.com/ILgzaTnw2gn579HP5Vin2q"
                                class="btn btn-warning w-100 py-2">Agendar agora</a>
                            <?php else :?>
                            <a href="src/pages/login.php" class="btn btn-warning w-100 py-2">Agendar agora</a>
                            <?php endif?>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Grupal -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden">
                        <img src="src/img/sessaoGrupal.png" class="card-img-top" alt="Grupo em sessão de terapia"
                            style="height: 200px; object-fit: cover; object-position: top;">
                        <div class="card-body text-center">
                            <h3 class="card-title mb-3" style="color: #7a2a3a;">Sessão Grupal</h3>
                            <p class="card-text mb-4">Experiência transformadora compartilhada em grupo para
                                crescimento
                                coletivo e apoio mútuo.</p>
                            <ul class="list-unstyled text-start mb-4">
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>8
                                    encontros
                                    mensais</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>Temas
                                    específicos</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>Dinâmicas
                                    interativas</li>
                            </ul>

                            <?php if(estaLogado()) : ?>
                            <a href="https://chat.whatsapp.com/ILgzaTnw2gn579HP5Vin2q"
                                class="btn btn-outline-warning w-100 py-2">Conhecer grupos</a>
                            <?php else :?>
                            <a href="src/pages/login.php" class="btn btn-outline-warning w-100 py-2">Conhecer grupos</a>
                            <?php endif?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="secondary-services-section container py-5">
        <!-- Título da Seção -->
        <div class="text-center mb-5">
            <span class="badge mb-3 rounded-pill px-3 py-2"
                style="color:#6d2c46; background-color: rgba(109,44,70,0.1);">Serviços
                Adicionais</span>
            <h2 class="section-title text-center mb-3 display-5 fw-bold " style="color: #6d2c46;">Cuidados
                Complementares para
                a Sua Jornada
            </h2>
            <p class="section-subtitle text-muted mx-auto" style="max-width: 700px;">Explore nossas opções
                adicionais
                criadas para apoiar seu crescimento em diferentes formatos e intensidades
            </p>
        </div>


        <div class=" row align-items-stretch g-4">
            <!-- Bloco de Explicação (Esquerda) -->
            <div class="col-lg-5">
                <div class="h-100 p-4 p-lg-5 rounded-3"
                    style="background-color: #f8f1e9; border-left: 4px solid #6d2c46;">
                    <div class="explanation-block bg-light p-4 rounded shadow-sm">
                        <h3 class="h4 mb-4" style="color: #6d2c46;">Conheça Nossas Opções Adicionais</h3>
                        <p class="mb-4">
                            Além das terapias em destaque, oferecemos serviços complementares para necessidades
                            específicas.
                            Essas modalidades são ideais para quem busca apoio pontual ou temas especializados, com
                            menor
                            comprometimento de tempo.
                        </p>
                        <div class="p-3 rounded"
                            style="background-color: rgba(109, 44, 70, 0.1); border-left: 3px solid #6d2c46;">
                            <i class="bi bi-lightbulb me-2" style="color: #6d2c46;"></i>
                            <strong>Dica Profissional:</strong> Combine esses Serviços com sua terapia regular para
                            resultados mais profundos. Além de que irá receber um desconto de 20% no valor final
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <button class="btn px-4" style="border:1px solid #6d2c46; color: #6d2c46;"
                            onclick="location.href = './src/pages/pesquisa.php'">
                            <i class="bi bi-question-circle me-2"></i>Como escolher?
                        </button>

                    </div>
                </div>
            </div>

            <!-- Cards Secundários (Direita) -->
            <div class="col-lg-7">
                <div class="row g-4">
                    <!-- Card 1 -->
                    <div class="col-md-6 cards">
                        <div class="h-100 p-4 rounded-3 shadow-sm border-0 position-relative overflow-hidden"
                            style="background-color: white;">
                            <div class="position-absolute top-0 end-0 p-3 opacity-10">
                                <i class="bi bi-instagram fs-1 text-wine" style="color: #6d2c46;"></i>
                            </div>
                            <div class="card-icon mb-3 text-wine">
                                <i class="bi bi-camera-reels-fill fs-1" style="color: #6d2c46;"></i>
                            </div>
                            <h4 class=" h5 text-wine mb-3">Lives Terapêuticas</h4>
                            <p class="mb-4">Transmissões ao vivo semanais abordando temas essenciais para seu
                                desenvolvimento emocional e autoconhecimento.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-wine-light text-wine rounded-pill px-3">Toda Quinta</span>
                                <a href="#" class="text-wine text-decoration-none small">Saiba mais <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-md-6 cards">
                        <div class="h-100 p-4 rounded-3 shadow-sm border-0 position-relative overflow-hidden"
                            style="background-color: white;">
                            <div class="position-absolute top-0 end-0 p-3 opacity-10">
                                <i class="bi bi-magic fs-1" style="color: #6d2c46;"></i>
                            </div>
                            <div class="card-icon mb-3" style="color: #6d2c46;">
                                <i class="bi bi-moon-stars-fill fs-1"></i>
                            </div>
                            <h4 class="h5 text-wine mb-3">Hipnose Online</h4>
                            <p class="mb-4">Técnica especializada para acessar e transformar crenças limitantes
                                armazenadas no subconsciente.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-wine-light text-wine rounded-pill px-3">Sessões</span>
                                <a href="#" class="text-wine text-decoration-none small">Saiba mais <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-12 cards">
                        <div class="p-4 rounded-3 shadow-sm border-0 position-relative overflow-hidden"
                            style="background-color: #6d2c46; color: white;">
                            <div class="position-absolute top-0 end-0 p-3 opacity-25">
                                <i class="bi bi-journal-bookmark-fill fs-1"></i>
                            </div>
                            <div class="card-icon mb-3">
                                <i class="bibi-journal-text fs-1 "></i>
                            </div>
                            <h4 class="h5 mb-3">Recursos Digitais Exclusivos</h4>
                            <p class="mb-4">Acesso a e-books, cursos online e materiais de apoio para continuar seu
                                desenvolvimento fora das sessões</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-white rounded-pill px-3" style="color: #6d2c46;">Acesso
                                    Imediato</span>
                                <a href="" class="text-white text-decoration-none small">Explorar <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </section>

    <!--FAQ-->
    <section class="container my-5" id="faq">
        <h3 class="text-center mb-4 display-6">Perguntas Frequentes</h3>

        <div class="accordion" id="faqAccordion">
            <!-- Pergunta 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Como funciona o agendamento das sessões?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        O agendamento pode ser feito diretamente pela nossa plataforma ou por contato via WhatsApp.
                        Você
                        escolhe o melhor horário disponível.
                    </div>
                </div>
            </div>

            <!-- Pergunta 2 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Quais formas de pagamento são aceitas?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Aceitamos Pix, cartão de crédito, boleto e também planos de pagamento recorrente para
                        pacotes de
                        sessões.
                    </div>
                </div>
            </div>

            <!-- Pergunta 3 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Preciso ter alguma experiência anterior para participar?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Não. Todos os nossos serviços são pensados para iniciantes e adaptados conforme o seu nível
                        de
                        conhecimento e necessidade.
                    </div>
                </div>
            </div>

            <!-- Pergunta 4 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                        Quais tipos de questões vocês atendem nas terapias?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Nossas terapias são focadas no desenvolvimento pessoal e emocional, trabalhando principalmente
                        com:
                        <ul>
                            <li>Identificação e transformação de crenças limitantes</li>
                            <li>Padrões de autossabotagem</li>
                            <li>Gerenciamento de emoções</li>
                            <li>Fortalecimento da autoestima e autoconfiança</li>
                            <li>Desenvolvimento de inteligência emocional</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Rodapé -->
    <footer class="bg-dark text-light pt-5 pb-3" id="Footer">
        <div class="container">
            <div class="row text-center text-md-start">
                <!-- Logo / Nome -->
                <div class="col-md-4 mb-4">
                    <img src="src/img/logoEmpresa.png" class="mb-4" style="width: 50px; height: 50px; " alt="logo">
                    <h5 class="text-uppercase">Leka Sarandy</h5>
                    <p class=" small text-white">
                        Cuidando da sua saúde emocional com empatia e profissionalismo.
                    </p>
                </div>

                <!-- Links úteis -->
                <div class="col-md-4 mb-4">
                    <h6 class="text-uppercase">Navegação</h6>
                    <ul class="list-unstyled">
                        <li><a href="./index.php" class="text-light text-decoration-none">Inicial</a></li>
                        <li><a href="#minhaEmpresa" class="text-light text-decoration-none">Propósito</a></li>
                        <li><a href="#sobreMim" class="text-light text-decoration-none">Sobre Mim</a></li>
                        <li><a href="src/pages/contato.php" class="text-light text-decoration-none">Contato</a></li>
                    </ul>
                </div>

                <!-- Contato / Redes Sociais -->
                <div class="col-md-4 mb-4">
                    <h6 class="text-uppercase">Fale Conosco</h6>
                    <p class="mb-1"><i class="bi bi-envelope"></i> infolekaeducativa@gmail.com</p>

                    <div class="d-flex justify-content-center justify-content-md-start gap-2">
                        <a href="https://www.instagram.com/lekasarandy/" target="_blank" class="text-light"><i
                                class="bi bi-instagram fs-5"></i></a>
                        <a href="#" target="_blank" class="text-light"><i class="bi bi-facebook fs-5"></i></a>
                        <a href="https://chat.whatsapp.com/ILgzaTnw2gn579HP5Vin2q" target="_blank" class="text-light"><i
                                class="bi bi-whatsapp fs-5"></i></a>
                    </div>
                </div>
            </div>

            <hr class="border-secondary" />
            <p class="text-center small mb-0">&copy; 2025 Leka Sarandy. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>
<script src="./src/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script src="./src/js/home.js"></script>

<script src="./src/js/global.js"></script>

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