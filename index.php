<!DOCTYPE html>
<html lang="pt-BR">

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

    <title>Leka Sarandi</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar fixed-top shadow-lg navbar-expand-lg navbar-dark bg-white" id="Navbar">
        <div class="container">
            <a class="navbar-brand text-dark" href="#">Terapia Zen</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-black" href="#">Início</a></li>
                    <li class="nav-item"><a class="nav-link text-black" href="#">Serviços</a></li>
                    <li class="nav-item"><a class="nav-link text-black" href="#">Contato</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero d-flex align-items-center text-center" id="heroSection">
        <div class="container">
            <h1 class="text-light">Bem-vindo ao seu refúgio de Terapia</h1>
            <p class="text-light">Realize a pesquisa abaixo e descubra mais sobre o seu tipo de personalidade!</p>
            <button class="btn bg-warning bg-gradient btn-lg mt-3" id="btnHeroSection">
                <a href="#" class="text-black">Faça a Pesquisa</a>
            </button>
        </div>
    </header>

    <!-- Sessão de Serviços -->
    <section class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <h2>Experiência de Terapia</h2>
                <p>Oferecemos sessões personalizadas para seu bem-estar.</p>
                <button class="btn btn-dark">Conheça</button>
            </div>
            <div class="col-md-6">
                <img src="assets/terapia.jpg" class="img-fluid rounded">
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