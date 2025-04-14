<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/contato.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="../img/logoEmpresa.png" type="image/x-icon">

    <!-- Fontes do Site -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <title>Leka Sarandi | Contato</title>
</head>

<body>
    <!-- Navbar -->
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
                    <li class="nav-item"><a class="nav-link position-relative px-3 py-2" href="./index.php"
                            style="font-weight: 400;">Minha Empresa</a></li>
                    <li class="nav-item"><a class="nav-link position-relative px-3 py-2" href="./index.php"
                            style="font-weight: 400;">Sobre Mim</a></li>
                    <li class="nav-item"><a class="nav-link position-relative px-3 py-2" href="./src/pages/contato.php"
                            style="font-weight: 400;">Contato</a></li>
                </ul>
                <div class="d-flex">
                    <button class="btn btn-warning ms-auto p-2 px-3" onclick="location.href='./src/pages/login.php'">
                        Login
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Seção Contato -->
    <section class="contact-section">
        <div class="contact-container">
            <!-- Título e Descrição -->
            <div class="contact-header">
                <h2>Entre em Contato</h2>
                <p>
                    Estou aqui para ajudar você a dar o primeiro passo em sua jornada de autoconhecimento.
                    Envie sua mensagem ou agende uma conversa inicial sem compromisso.
                </p>
            </div>

            <!-- Conteúdo Dividido (Formulário + Informações) -->
            <div class="contact-content">
                <!-- Formulário -->
                <div class="contact-form">
                    <form>
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" id="name" placeholder="Seu nome completo" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" placeholder="seu@email.com" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Mensagem</label>
                            <textarea id="message" rows="5"
                                placeholder="Conte-me sobre suas expectativas ou dúvidas..."></textarea>
                        </div>
                        <button type="submit" class="submit-button">Enviar Mensagem</button>
                    </form>
                </div>

                <!-- Informações de Contato -->
                <div class="contact-info">
                    <div class="info-card">
                        <div class="info-icon">📱</div>
                        <h4>WhatsApp</h4>
                        <p>(XX) XXXX-XXXX</p>
                        <a href="#" class="contact-link">Enviar mensagem</a>
                    </div>
                    <div class="info-card">
                        <div class="info-icon">📧</div>
                        <h4>E-mail</h4>
                        <p>contato@terapeuta.com</p>
                        <a href="#" class="contact-link">Enviar e-mail</a>
                    </div>
                    <div class="info-card">
                        <div class="info-icon">📍</div>
                        <h4>Atendimento</h4>
                        <p>Online ou Presencial (São Paulo/SP)</p>
                        <a href="#" class="contact-link">Ver mapa</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>