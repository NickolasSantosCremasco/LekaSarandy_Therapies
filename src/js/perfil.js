 document.querySelectorAll('.btn-usuario').forEach(btn => {
        btn.addEventListener('click', function() {
            const btnAgendarConsulta = document.getElementById('btnAgendarConsulta');
            btnAgendarConsulta.classList.remove('d-none')
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
                            <div class="mt-2">
                               
                                    <button class="btn btn-sm btn-outline-secondary"  onclick="remarcarConsulta(${consulta.id})">
                                        <i class="fas fa-edit me-1"></i> Remarcar
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="cancelarConsulta(${consulta.id})">
                                        <i class="fas fa-times me-1e"></i> Cancelar
                                    </button>
                                </div>
                            </li>   
                        `;
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
                        const btnAgendarConsulta = document.getElementById(
                            'btnAgendarConsulta');
                        if (voltar) {
                            voltar.addEventListener('click', () => {
                                container.classList.add('d-none');
                                usuarios.classList.remove('d-none')
                                container.innerHTML = ''
                                btnAgendarConsulta.classList.add('d-none')
                            })
                        }
                    }, 0);
                });
        });
    });


    function agendarConsulta() {
    // 🟢 CORRIGIDO: A função agora apenas lê o valor que já está no campo hidden.
    const usuarioId = document.getElementById('usuarioSelecionadoId').value;

    // Adiciona uma verificação para garantir que um usuário foi selecionado.
    if (!usuarioId) {
        alert("Erro: Nenhum usuário foi selecionado. Por favor, clique no card de um usuário antes de agendar.");
        return;
    }

    // Com o ID correto, abre o modal.
    const modal = new bootstrap.Modal(document.getElementById('modalAgendarConsulta'));
    modal.show();
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

    function cancelarConsulta(id) {
        if (!confirm("Tem certeza que deseja cancelar esta consulta?")) return;
        fetch('../database/cancelarConsulta.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `id=${id}`
            })
            .then(res => res.json())
            .then(data => {
                if (data.sucesso) {
                    alert('Consulta cancelada com sucesso.');
                    location.reload();
                } else {
                    alert('Erro:' + (data.erro || 'Desconhecido'));
                }
            })
            .catch(err => alert('Erro na requisição: ' + err));
    }

    function remarcarConsulta(id) {
    alert(`Funcionalidade de Remarcar Consulta ${id} não implementada.`);
}