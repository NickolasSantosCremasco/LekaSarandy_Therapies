<?php
// 🟢 1. ADICIONAR ESTE BLOCO PHP NO TOPO
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../database/config.php';
require_once '../database/auth.php';

// --- LÓGICA PARA EXIBIR MENSAGENS ---
$message = '';
$message_class = '';
if (isset($_GET['status']) && isset($_GET['msg'])) {
    $message = htmlspecialchars($_GET['msg']);
    $message_class = ($_GET['status'] == 'sucesso') ? 'alert-success' : 'alert-danger';
}
// --- FIM DA LÓGICA ---
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leka Sarandy | Contato</title>

    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/contato.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="../img/logoEmpresa.png" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm" id="Navbar">
        <div class="container">
            <a class="navbar-brand text-dark logo" style="display: flex; align-items: center; gap: 10px;"
                href="../../index.php">
                <img loading="lazy" src="../img/logoEmpresa.png" style="width: 60px;" alt="logo">
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link position-relative px-3 py-2"
                            href="../../index.php">Início</a></li>
                    <li class="nav-item"><a class="nav-link position-relative px-3 py-2"
                            href="../../index.php">Propósito</a>
                    </li>
                    <li class="nav-item"><a class="nav-link position-relative px-3 py-2" href="../../index.php">Sobre
                            Mim</a></li>
                    <li class="nav-item"><a class="nav-link position-relative px-3 py-2"
                            href="../../index.php">Terapias</a>
                    </li>
                    <li class="nav-item"><a class="nav-link position-relative px-3 py-2 active"
                            href="contato.php">Contato</a></li>
                </ul>
                <div class="d-flex">
                    <?php if(estaLogado()) : ?>
                    <div class="d-flex align-items-center flex-column gap-2">
                        <img src="../img/usuarioGenerico.jpg" class="border" alt="Usuário"
                            style="width: 60px; height: 60px; border-radius: 50%;">
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

    <section class="py-5" style="background-color: var(--bege);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="text-center mb-5" data-aos="fade-up">
                        <h2 class="display-5 fw-bold mb-3" style="color: var(--vinho);">Entre em Contato</h2>
                        <div class="divider mx-auto mb-4"
                            style="width: 80px; height: 3px; background-color: var(--vinho-suave);"></div>
                        <p class="lead" style="max-width: 700px; margin: 0 auto;">
                            Estou aqui para ajudar você a dar o primeiro passo em sua jornada de autoconhecimento.
                            Envie sua mensagem ou agende uma conversa inicial sem compromisso.
                        </p>
                    </div>

                    <div class="card border-0 shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                        <div class="row g-0">
                            <div class="col-lg-7 p-4 p-md-5" style="background-color: white;">
                                <h3 class="mb-4" style="color: var(--vinho);">Envie sua mensagem</h3>

                                <?php if (!empty($message)): ?>
                                <div class="alert <?php echo $message_class; ?> alert-dismissible fade show"
                                    role="alert">
                                    <?php echo $message; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php endif; ?>
                                <form action="../database/enviarEmail.php" method="POST">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nome</label>
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Seu nome completo"
                                            style="background-color: var(--cinza-claro); border: none; padding: 12px;"
                                            required name="name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input type="email" class="form-control" id="email" placeholder="seu@email.com"
                                            style="background-color: var(--cinza-claro); border: none; padding: 12px;"
                                            required name="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Telefone (opcional)</label>
                                        <input type="tel" class="form-control phone-mask" id="phone"
                                            placeholder="(XX) XXXXX-XXXX"
                                            style="background-color: var(--cinza-claro); border: none; padding: 12px;"
                                            name="phone">
                                    </div>
                                    <div class="mb-4">
                                        <label for="message" class="form-label">Como posso te ajudar?</label>
                                        <textarea class="form-control" id="message" rows="4"
                                            placeholder="Conte-me sobre suas expectativas ou dúvidas..."
                                            style="background-color: var(--cinza-claro); border: none; padding: 12px;"
                                            required name="message"></textarea>
                                    </div>
                                    <button type="submit" class="btn w-100 py-3"
                                        style="background-color: var(--vinho); color: white; font-weight: 500;">Enviar
                                        Mensagem</button>
                                </form>
                            </div>

                            <div class="col-lg-5 d-flex flex-column"
                                style="background-color: var(--vinho); color: white;">
                                <div class="p-4 p-md-5 my-auto">
                                    <h3 class="mb-4">Outras formas de contato</h3>

                                    <div class="d-flex mb-4 ">
                                        <div class="me-4">
                                            <div class="rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 50px; height: 50px; background-color: rgba(255,255,255,0.2);">
                                                <i class="bi bi-whatsapp fs-4"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="mb-1">WhatsApp</h5>
                                            <p class="mb-1">Participe Do Grupo Dedicado</p>
                                            <a href="https://chat.whatsapp.com/ILgzaTnw2gn579HP5Vin2q" target="_blank"
                                                class="text-white text-decoration-underline small">Link para o
                                                Grupo</a>
                                        </div>
                                    </div>

                                    <div class="d-flex">
                                        <div class="me-4">
                                            <div class="rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 50px; height: 50px; background-color: rgba(255,255,255,0.2);">
                                                <i class="bi bi-geo-alt fs-4"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="mb-1">Atendimento</h5>
                                            <p class="mb-1">Online (via Zoom ou Google Meet)</p>

                                        </div>
                                    </div>
                                </div>

                                <div class="mt-auto p-3 text-center" style="background-color: rgba(0,0,0,0.1);">
                                    <p class="mb-0 small">"O primeiro passo para a cura é a coragem de pedir ajuda."</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm mt-4"
                        style="background-color: var(--vinho-claro); color: white;" data-aos="fade-up"
                        data-aos-delay="150">
                        <div class="card-body p-4 p-md-5 text-center">
                            <div class="row align-items-center">
                                <div class="col-md-8 mb-3 mb-md-0 text-md-start">
                                    <h4 class="mb-2">Pronto para começar sua jornada?</h4>
                                    <p class="mb-0">Agende uma sessão inicial gratuita de 30 minutos para conversarmos.
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <a href="https://chat.whatsapp.com/ILgzaTnw2gn579HP5Vin2q" target="_blank">
                                        <button class="btn btn-light w-100 py-2"
                                            style="color: var(--vinho); font-weight: 500;">Agendar Sessão</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-light pt-5 pb-3" id="Footer">
        <div class="container">
            <div class="row text-center text-md-start">
                <div class="col-md-4 mb-4">
                    <img src="../img/logoEmpresa.png" class="mb-4" style="width: 50px; height: 50px; " alt="logo">
                    <h5 class="text-uppercase">Leka Sarandy</h5>
                    <p class="text-white small">
                        Cuidando da sua saúde emocional com empatia e profissionalismo.
                    </p>
                </div>

                <div class="col-md-4 mb-4">
                    <h6 class="text-uppercase">Navegação</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#servicos" class="text-light text-decoration-none">Inicial</a></li>
                        <li class="mb-2"><a href="../../index.php" class="text-light text-decoration-none">Propósito</a>
                        </li>
                        <li class="mb-2"><a href="../../index.php" class="text-light text-decoration-none">Sobre Mim</a>
                        </li>
                        <li><a href="contato.php" class="text-light text-decoration-none">Contato</a></li>
                    </ul>
                </div>

                <div class="col-md-4 mb-4">
                    <h6 class="text-uppercase">Fale Conosco</h6>
                    <p class="mb-1"><i class="bi bi-envelope"></i> infolekaeducativa@gmail.com
                    </p>

                    <div class="d-flex justify-content-center justify-content-md-start gap-3">
                        <a href="https://www.instagram.com/lekasarandy/" target="_blank" class="text-light"><i
                                class="bi bi-instagram fs-5"></i></a>

                        <a href="https://chat.whatsapp.com/ILgzaTnw2gn579HP5Vin2q" target="_blank" class="text-light"><i
                                class="bi bi-whatsapp fs-5"></i></a>
                    </div>
                </div>
            </div>

            <hr class="border-secondary" />
            <p class="text-center small mb-0">&copy; 2025 Leka Sarandy. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script src="../js/masks.js"></script>
    <script>
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true
    });
    </script>
</body>

</html>