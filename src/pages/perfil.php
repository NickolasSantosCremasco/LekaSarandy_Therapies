<?php
require_once '../database/auth.php';
require_once '../database/config.php';


if (!estaLogado()) {
    header('Location: login.php');
    exit;
}

$usuario_id = $_SESSION['usuario']['id'];
$stmt = $pdo->prepare('SELECT * FROM consultas WHERE usuario_id = :usuario_id ORDER BY data_hora ASC');
$stmt->execute([':usuario_id' => $usuario_id]);

$consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);


$nivel = $_SESSION['usuario']['nivel'];


if ($nivel == 2) {
    //Admin: pega todos os usuarios
    $stmtUsuarios = $pdo->query('SELECT id, nome, email, nivel FROM usuarios ORDER BY nome ASC');
    $usuarios = $stmtUsuarios->fetchAll(PDO::FETCH_ASSOC);

}


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

</head>

<!-- Modal para Agendar Consulta -->
<div class="modal fade" id="modalAgendarConsulta" tabindex="-1" aria-labelledby="modalAgendarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-4">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgendarLabel"><i class="fas fa-plus me-2"></i>Agendar Consulta</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form id="formAgendamento" method="post" action="../database/criarConsultas.php">
                    <div class="mb-3">
                        <label for="tipoTerapia" class="form-label">Tipo de Terapia</label>
                        <select class="form-select" name="tipoTerapia" id="tipoTerapia" required>
                            <option value="">Selecione uma opção</option>
                            <option value="Terapia Energética">Terapia Grupal</option>
                            <option value="Massagem Terapêutica">Hipnose Terapêutica</option>
                            <option value="Auriculoterapia">Sentimentos Sabotadores</option>
                            <!-- Adicione mais conforme necessário -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="dataHora" class="form-label">Data e Hora</label>
                        <input type="datetime-local" class="form-control" name="dataHora" id="dataHora" required>
                    </div>
                    <div class="mb-3">
                        <label for="local" class="form-label">Local</label>
                        <select class="form-select" name="local" id="local" required>
                            <option value="">Selecione</option>
                            <option value="Online (Google Meet)">Online (Google Meet)</option>
                            <option value="Studio Leka Sarandy">Online (Zoom)</option>
                        </select>
                    </div>
                    <input type="hidden" name="usuario_id" id="usuarioSelecionadoId">
                    <button type="submit" class="btn btn-vinho w-100">
                        <i class="fas fa-check me-1"></i> Confirmar Agendamento
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

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
                            href="../../index.php">Minha
                            Empresa</a></li>
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
            <h2 class="mb-1"><span
                    class="fw-bold"><?php echo ucfirst(explode(' ', $_SESSION['usuario']['nome'])[0]) ?></span></h2>
            <p class="mb-0">Membro desde
                <?php  
                    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
                    date_default_timezone_set('America/Sao_Paulo');
                    $data = new DateTime($_SESSION['usuario']['data_criacao']);
                    echo strftime('%d de %B de %Y', $data->getTimestamp());
                ?>
            </p>
            <a href="../database/logout.php" class="btn btn-danger mt-3">
                <i class="fas fa-sign-out-alt me-2"></i>Sair da Conta
            </a>

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

                        <form method="POST" action="../database/update.php">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" id="nome" name="nome"
                                    value="<?php echo htmlspecialchars($usuario['nome'] ?? '');?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?php echo htmlspecialchars($usuario['email'] ?? '');?>" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-vinho">
                                    <i class="fas fa-save me-2"></i>Salvar Alterações
                                </button>
                            </div>
                        </form>

                        <hr class="my-4">

                        <h6 class="mb-3">Alterar Senha</h6>
                        <form method="post" action="../database/mudarSenha.php">
                            <div class="mb-3">
                                <label for="senha-atual" class="form-label">Senha Atual</label>
                                <input type="password" class="form-control" name="senha_atual" id="senha-atual"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="nova-senha" class="form-label">Nova Senha</label>
                                <input type="password" class="form-control" name="nova_senha" id="nova-senha" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirma-senha" class="form-label">Confirmar Nova Senha</label>
                                <input type="password" class="form-control" name="confirmar_senha" id="confirma-senha"
                                    required>
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
                            <?php if($nivel == 2):?>
                            <i class="far fa-calendar-check me-2"></i>Painel do Admin
                            <?php else:?>
                            <i class="far fa-calendar-check me-2"></i>Minhas Consultas
                            <?php endif;?>

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
                                <?php if($nivel == 2):?>
                                <h5 class="card-title mb-4">
                                    <i class="far fa-calendar-check me-2"></i>Agende a Consulta de um Usuário
                                </h5>
                                <?php else:?>
                                <h5 class="card-title mb-4">
                                    <i class="far fa-calendar-check me-2"></i>Próximas Consultas
                                </h5>
                                <?php endif?>
                                <?php if($nivel == 2):?>
                                <!-- Listagem de Usuários -->
                                <div class="mb-4">
                                    <div class="row g-3 usuarios">
                                        <?php foreach ($usuarios as $usuario): ?>
                                        <?php if($usuario['nivel'] != 2):?>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="card h-100 shadow-sm border-0 hover-shadow transition rounded-3 bg-light text-dark btn-usuario"
                                                style="cursor: pointer;" data-id="<?= $usuario['id'] ?>">
                                                <div class="card-body d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <i class="fas fa-user-circle fa-2x text-vinho"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 fw-bold">
                                                            <?= htmlspecialchars($usuario['nome']) ?>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif;?>
                                        <?php endforeach; ?>
                                    </div>
                                    <div id="consultasUsuario" class="d-none"></div>
                                </div>


                                <?php else:?>
                                <?php foreach($consultas as $consulta): ?>
                                <div class="card appointment-card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h6 class="mb-1">
                                                    <?= htmlspecialchars($consulta['tipo_terapia']) ?>
                                                </h6>
                                                <p class="mb-1 text-muted">
                                                    <i class="far fa-clock me-2"></i>
                                                    <?=date('d \d\e F, H:i', strtotime($consulta['data_hora']))?>
                                                </p>
                                                <p class="mb-0 text-muted">
                                                    <i class="fas fa-map-marker-alt me-2"></i>
                                                    <?= htmlspecialchars($consulta['local']) ?>
                                                </p>
                                            </div>
                                            <div class="text-end">
                                                <span class="badge bg-warning text-dark">
                                                    <?= $consulta['status'] ?? 'Agendando' ?>
                                                </span>
                                                <!--Admin pode Remarcar ou cancelar a consulta-->
                                                <?php if ($nivel == 2):?>
                                                <div class="mt-2">
                                                    <button class="btn btn-sm btn-outline-secondary">
                                                        <i class="fas fa-edit me-1"></i> Remarcar
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-times me-1"></i> Cancelar
                                                    </button>
                                                </div>
                                                <!--Usuário pode Confirmar ou Cancelar a Consulta-->
                                                <?php else:?>
                                                <div class="mt-2">
                                                    <button class="btn btn-sm btn-outline-primary"
                                                        onclick="atualizarStatus(<?= $consulta['id']?>, 'confirmada')">
                                                        <i class="fas fa-edit me-1"></i>
                                                        Confirmar
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger"
                                                        onclick="atualizarStatus(<?= $consulta['id']?>, 'cancelada')">
                                                        <i class="fas fa-times me-1"></i>
                                                        Cancelar
                                                    </button>
                                                </div>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach;?>

                                <?php endif;?>
                                <!--Consultas Marcadas do Usuário-->

                                <?php if ($nivel == 2):?>
                                <div class=" text-center mt-4">
                                    <button class="btn btn-vinho" onclick="agendarConsulta();">
                                        <i class="fas fa-calendar-plus me-2"></i>Agendar
                                        Consulta
                                    </button>
                                </div>
                                <?php else:?>
                                <div class="text-center mt-4">
                                    <a href="https://chat.whatsapp.com/ILgzaTnw2gn579HP5Vin2q" target="_blank">
                                        <button class="btn btn-vinho">
                                            <i class="fas fa-plus me-2"></i>Entrar em Contato e Agendar
                                            Consulta
                                        </button>
                                    </a>
                                </div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>

                    <!-- Aba de Histórico -->
                    <div class="tab-pane fade" id="historico" role="tabpanel">
                        <div class="card profile-card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">
                                    <i class="fas fa-history me-2"></i>Histórico de
                                    Consultas
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
                                                <td><span class="badge bg-success">Concluída</span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-vinho">
                                                        <i class="fas fa-file-alt"></i>
                                                        Detalhes
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>15/09/2023</td>
                                                <td>Aromaterapia</td>
                                                <td><span class="badge bg-success">Concluída</span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-vinho">
                                                        <i class="fas fa-file-alt"></i>
                                                        Detalhes
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
                                            <i class="fas fa-save me-2"></i>Salvar
                                            Preferências
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
                        <li class="mb-2"><a href="../../index.php" class="text-light text-decoration-none">Inicial</a>
                        </li>
                        <li class="mb-2"><a href="../../index.php" class="text-light text-decoration-none">Propósito</a>
                        </li>
                        <li class="mb-2"><a href="../../index.php" class="text-light text-decoration-none">Sobre
                                Mim</a>
                        </li>
                        <li><a href="./contato.php" class="text-light text-decoration-none">Contato</a>
                        </li>
                    </ul>
                </div>

                <!-- Contato / Redes Sociais -->
                <div class="col-md-4 mb-4">
                    <h6 class="text-uppercase">Fale Conosco</h6>
                    <p class="mb-1"><i class="bi bi-envelope"></i>
                        infolekaeducativa@gmail.com
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
            <p class="text-center small mb-0">&copy; 2025 Leka Sarandy. Todos os direitos
                reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
    </script>
    <script>
    document.querySelectorAll('.btn-usuario').forEach(btn => {
        btn.addEventListener('click', function() {
            const usuarios = document.querySelector('.usuarios');
            usuarios.classList.add('d-none');
            const userId = this.getAttribute('data-id');
            document.getElementById('usuarioSelecionadoId').value = userId;
            fetch(`../database/getConsultas.php?id=${userId}`)
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById('consultasUsuario');
                    let html = '';

                    if (data.length > 0) {

                        html +=
                            `<div class="alert alert-info">Veja as Consultas a seguir!<i class="fas fa-arrow-left float-end" style="font-size:8pt; margin-top:8px;cursor:pointer;" id="voltar">Voltar</i></div>`;
                        html += `<ul class="list-group">`;
                        data.forEach(consulta => {
                            html += `<li class="list-group-item">
                            <strong>Data:</strong> ${consulta.data_hora}<br>
                            <strong>Tipo de Terapia:</strong> ${consulta.tipo_terapia}<br>
                            <strong>Local:</strong> ${consulta.local}<br>
                            <strong>Status:</strong> ${consulta.status}
                        </li>`;
                        });
                        html += `</ul>`;
                    } else {
                        html =
                            '<div class="alert alert-warning" id="avisoConsulta">Nenhuma Consulta Encontrada!<i class="fas fa-arrow-left float-end" style="font-size:8pt; margin-top:8px;cursor:pointer;" id="voltar">Voltar</i></div>';

                    }

                    container.innerHTML = html;
                    container.classList.remove('d-none');

                    setTimeout(() => {
                        const voltar = document.querySelector("#voltar");
                        if (voltar) {
                            voltar.addEventListener('click', () => {
                                container.classList.add('d-none');
                                usuarios.classList.remove('d-none')
                                container.innerHTML = ''
                            })
                        }
                    }, 0);
                });
        });
    });


    function agendarConsulta() {
        document.querySelectorAll('.btn-usuario').forEach(btn => {
            const usuarioId = btn.dataset.id;
            document.getElementById('usuarioSelecionadoId').value = usuarioId;
            const modal = new bootstrap.Modal(document.getElementById('modalAgendarConsulta'));
            modal.show();

        });
    }

    function atualizarStatus(id, status) {
        fetch('../database/atualizarStatus.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `id=${id}&status=${status}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.sucesso) {
                    alert('Status atualizado com sucesso!');
                    location.reload(); //Atualiza Página
                } else {
                    alert('Erro: ' + (data.erro || 'Desconhecido'));
                }
            })
            .catch(error => {
                console.error('Erro na requisição:', error);
                alert("Erro na requisição: " + error)
            })
    }
    </script>
</body>

</html>