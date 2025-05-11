<?php
require_once '../database/auth.php';
require_once '../database/config.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leka Sarandy | Meu Perfil</title>
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="stylesheet" href="../css/global.css">

    <link rel="shortcut icon" href="../img/logoEmpresa.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="../bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!--Montserrat-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">


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
                    <li class="nav-item"><a class="nav-link  position-relative text-black px-3 py-2" href="#">Minha
                            Empresa</a></li>
                    <li class="nav-item"><a class="nav-link  position-relative text-black px-3 py-2" href="#">Sobre
                            Mim</a></li>
                    <li class="nav-item"><a class="nav-link  position-relative text-black px-3 py-2"
                            href="../pages/contato.php">Contato</a></li>
                </ul>
                <div class="d-flex">
                    <?php if(estaLogado()) : ?>
                    <!-- Mostra a imagem do usuário logado -->
                    <div class="d-flex align-items-center flex-column gap-2">
                        <img src="https://icon-library.com/images/generic-user-icon/generic-user-icon-9.jpg"
                            class="border" alt="Usuário" style="width: 60px; height: 60px; border-radius: 50%;">
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

    <!-- Header do Perfil -->
    <div class="profile-header py-5 mt-5 mb-4">
        <div class="container text-center">
            <img src="https://icon-library.com/images/generic-user-icon/generic-user-icon-9.jpg" alt="Foto do perfil"
                class="profile-pic rounded-circle mb-3">
            <h2 class="mb-1">Maria Silva</h2>
            <p class="mb-0">Membro desde Janeiro 2023</p>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <!-- Card de Informações -->
                <div class="card profile-card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">
                            <i class="fas fa-user-circle me-2"></i>Minhas Informações
                        </h5>

                        <form>
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" id="nome" value="Maria Silva">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" value="maria@exemplo.com">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-vinho">
                                    <i class="fas fa-save me-2"></i>Salvar Alterações
                                </button>
                            </div>
                        </form>

                        <hr class="my-4">

                        <h6 class="mb-3">Alterar Senha</h6>
                        <form>
                            <div class="mb-3">
                                <label for="senha-atual" class="form-label">Senha Atual</label>
                                <input type="password" class="form-control" id="senha-atual">
                            </div>
                            <div class="mb-3">
                                <label for="nova-senha" class="form-label">Nova Senha</label>
                                <input type="password" class="form-control" id="nova-senha">
                            </div>
                            <div class="mb-3">
                                <label for="confirma-senha" class="form-label">Confirmar Nova Senha</label>
                                <input type="password" class="form-control" id="confirma-senha">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-outline-vinho">
                                    <i class="fas fa-key me-2"></i>Alterar Senha
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <!-- Abas de Navegação -->
                <ul class="nav nav-pills mb-4" id="profileTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="agendamentos-tab" data-bs-toggle="pill"
                            data-bs-target="#agendamentos" type="button">
                            <i class="far fa-calendar-check me-2"></i>Minhas Consultas
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="historico-tab" data-bs-toggle="pill" data-bs-target="#historico"
                            type="button">
                            <i class="fas fa-history me-2"></i>Histórico
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="preferencias-tab" data-bs-toggle="pill"
                            data-bs-target="#preferencias" type="button">
                            <i class="fas fa-heart me-2"></i>Preferências
                        </button>
                    </li>
                </ul>

                <!-- Conteúdo das Abas -->
                <div class="tab-content" id="profileTabsContent">
                    <!-- Aba de Agendamentos -->
                    <div class="tab-pane fade show active" id="agendamentos" role="tabpanel">
                        <div class="card profile-card mb-3">
                            <div class="card-body">
                                <h5 class="card-title mb-4">
                                    <i class="far fa-calendar-check me-2"></i>Próximas Consultas
                                </h5>

                                <!-- Consulta 1 -->
                                <div class="card appointment-card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h6 class="mb-1">Terapia Energética</h6>
                                                <p class="mb-1 text-muted">
                                                    <i class="far fa-clock me-2"></i>15 de Outubro, 14:00
                                                </p>
                                                <p class="mb-0 text-muted">
                                                    <i class="fas fa-map-marker-alt me-2"></i>Online (Google Meet)
                                                </p>
                                            </div>
                                            <div class="text-end">
                                                <span class="badge bg-success">Confirmada</span>
                                                <div class="mt-2">
                                                    <button class="btn btn-sm btn-outline-vinho">
                                                        <i class="fas fa-video me-1"></i> Acessar
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-secondary">
                                                        <i class="fas fa-edit me-1"></i> Remarcar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Consulta 2 -->
                                <div class="card appointment-card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h6 class="mb-1">Massagem Terapêutica</h6>
                                                <p class="mb-1 text-muted">
                                                    <i class="far fa-clock me-2"></i>22 de Outubro, 10:00
                                                </p>
                                                <p class="mb-0 text-muted">
                                                    <i class="fas fa-map-marker-alt me-2"></i>Studio Leka Sarandy
                                                </p>
                                            </div>
                                            <div class="text-end">
                                                <span class="badge bg-warning text-dark">Agendada</span>
                                                <div class="mt-2">
                                                    <button class="btn btn-sm btn-outline-secondary">
                                                        <i class="fas fa-edit me-1"></i> Remarcar
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-times me-1"></i> Cancelar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center mt-4">
                                    <button class="btn btn-vinho">
                                        <i class="fas fa-plus me-2"></i>Agendar Nova Consulta
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Aba de Histórico -->
                    <div class="tab-pane fade" id="historico" role="tabpanel">
                        <div class="card profile-card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">
                                    <i class="fas fa-history me-2"></i>Histórico de Consultas
                                </h5>

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>Terapia</th>
                                                <th>Status</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01/10/2023</td>
                                                <td>Reiki</td>
                                                <td><span class="badge bg-success">Concluída</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-vinho">
                                                        <i class="fas fa-file-alt"></i> Detalhes
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>15/09/2023</td>
                                                <td>Aromaterapia</td>
                                                <td><span class="badge bg-success">Concluída</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-vinho">
                                                        <i class="fas fa-file-alt"></i> Detalhes
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Aba de Preferências -->
                    <div class="tab-pane fade" id="preferencias" role="tabpanel">
                        <div class="card profile-card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">
                                    <i class="fas fa-heart me-2"></i>Minhas Preferências
                                </h5>

                                <form>
                                    <div class="mb-4">
                                        <h6 class="mb-3">Terapias Favoritas</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" id="reiki" checked>
                                                    <label class="form-check-label" for="reiki">Reiki</label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" id="aromaterapia"
                                                        checked>
                                                    <label class="form-check-label"
                                                        for="aromaterapia">Aromaterapia</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" id="massagem">
                                                    <label class="form-check-label" for="massagem">Massagem
                                                        Terapêutica</label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" id="cristais">
                                                    <label class="form-check-label" for="cristais">Terapia com
                                                        Cristais</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <h6 class="mb-3">Preferências de Contato</h6>
                                        <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" id="notificacoes-email"
                                                checked>
                                            <label class="form-check-label" for="notificacoes-email">Receber
                                                notificações por e-mail</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="notificacoes-whatsapp">
                                            <label class="form-check-label" for="notificacoes-whatsapp">Receber
                                                lembretes por WhatsApp</label>
                                        </div>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-vinho">
                                            <i class="fas fa-save me-2"></i>Salvar Preferências
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Adicione aqui qualquer interação JavaScript necessária
    document.addEventListener('DOMContentLoaded', function() {
        // Exemplo: Atualizar foto de perfil
        const profilePic = document.querySelector('.profile-pic');
        profilePic.addEventListener('click', function() {
            alert('Funcionalidade de alterar foto será implementada em breve!');
        });
    });
    </script>
</body>

</html>