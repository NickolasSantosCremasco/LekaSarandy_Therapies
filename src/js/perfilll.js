    // ===================================================================
    // FUNÇÕES DE AÇÃO (atualizarStatus, cancelarConsulta, etc.)
    // Estas funções permanecem como estão.
    // ===================================================================

    function agendarConsulta() {
        // 🛑 ERRO: Este loop percorre TODOS os botões de usuário na página.
        document.querySelectorAll('.btn-usuario').forEach(btn => {
            // A cada iteração, ele pega o ID de um usuário...
            const usuarioId = btn.dataset.id;
            // ...e SOBRESCREVE o valor do campo hidden.
            document.getElementById('usuarioSelecionadoId').value = usuarioId;
        });

        // Ao final do loop, o valor que fica é sempre o do ÚLTIMO usuário da lista.
        const modal = new bootstrap.Modal(document.getElementById('modalAgendarConsulta'));
        modal.show();
    }

    function remarcarConsulta(id) {
        alert(`Funcionalidade de Remarcar Consulta ${id} não implementada.`);
    }

    // ... (Suas funções cancelarConsulta e atualizarStatus aqui) ...
    function cancelarConsulta(id) {
        if (!confirm("Tem certeza que deseja cancelar esta consulta?")) return;
        fetch('../database/cancelarConsulta.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `id=${id}`
        }).then(res => res.json()).then(data => {
            if (data.sucesso) {
                alert('Consulta cancelada com sucesso.');
                location.reload();
            } else {
                alert('Erro:' + (data.erro || 'Desconhecido'));
            }
        }).catch(err => alert('Erro na requisição: ' + err));
    }

    function atualizarStatus(id, status) {
        fetch('../database/atualizarStatus.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `id=${id}&status=${status}`
        }).then(response => response.json()).then(data => {
            if (data.sucesso) {
                alert('Status atualizado com sucesso!');
                location.reload();
            } else {
                alert('Erro: ' + (data.erro || 'Desconhecido'));
            }
        }).catch(error => {
            console.error('Erro na requisição:', error);
            alert("Erro na requisição: " + error);
        });
    }


    // ===================================================================
    // LÓGICA PRINCIPAL DO PAINEL ADMIN
    // ===================================================================

    /**
     * Função que busca e exibe as consultas de um usuário específico.
     * @param {string} userId - O ID do usuário.
     */
    function buscarConsultas(userId) {
        const btnAgendarConsulta = document.getElementById('btnAgendarConsulta');
        const usuariosContainer = document.querySelector('.usuarios');
        const consultasContainer = document.getElementById('consultasUsuario');
        
        // Esconde a lista de usuários e prepara para mostrar as consultas
        btnAgendarConsulta.classList.remove('d-none');
        usuariosContainer.classList.add('d-none');
        document.getElementById('usuarioSelecionadoId').value = userId;

        fetch(`../database/getConsultas.php?id=${userId}`)
            .then(response => response.json())
            .then(data => {
                let html = '';
                
                if (data.length > 0) {
                    html += `<div class="alert alert-info">Veja as Consultas a seguir!<i class="fas fa-arrow-left float-end" style="font-size:8pt; margin-top:8px;cursor:pointer;" id="voltar">Voltar</i></div>`;
                    html += `<ul class="list-group">`;
                    data.forEach(consulta => {
                        html += `<li class="list-group-item">
                            <strong>Data:</strong> ${consulta.data_hora}<br>
                            <strong>Tipo de Terapia:</strong> ${consulta.tipo_terapia}<br>
                            <strong>Local:</strong> ${consulta.local}<br>
                            <strong>Status:</strong> ${consulta.status}
                            <div class="mt-2">
                                <button class="btn btn-sm btn-outline-secondary" onclick="remarcarConsulta(${consulta.id})"><i class="fas fa-edit me-1"></i> Remarcar</button>
                                <button class="btn btn-sm btn-outline-danger" onclick="cancelarConsulta(${consulta.id})"><i class="fas fa-times me-1"></i> Cancelar</button>
                            </div>
                        </li>`;
                    });
                    html += `</ul>`;
                } else {
                    html = `<div class="alert alert-warning" id="avisoConsulta">Nenhuma Consulta Encontrada!<i class="fas fa-arrow-left float-end" style="font-size:8pt; margin-top:8px;cursor:pointer;" id="voltar">Voltar</i></div>`;
                }

                consultasContainer.innerHTML = html;
                consultasContainer.classList.remove('d-none');

                // Adiciona o listener para o botão "Voltar"
                const voltarBtn = document.getElementById("voltar");
                if (voltarBtn) {
                    voltarBtn.addEventListener('click', () => {
                        consultasContainer.classList.add('d-none');
                        usuariosContainer.classList.remove('d-none');
                        consultasContainer.innerHTML = '';
                        btnAgendarConsulta.classList.add('d-none');
                    });
                }
            });
    }

    /**
     * Aplica os event listeners de clique a todos os cards de usuário.
     */
    function aplicarListenersUsuario() {
        document.querySelectorAll('.btn-usuario').forEach(btn => {
            // Remove listener antigo para evitar duplicação, se houver
            btn.onclick = null; 
            // Adiciona o novo listener
            btn.onclick = function() {
                buscarConsultas(this.getAttribute('data-id'));
            };
        });
    }

    // ===================================================================
    // EVENTO PRINCIPAL - QUANDO A PÁGINA CARREGA
    // ===================================================================

    document.addEventListener('DOMContentLoaded', () => {
        // 1. Aplica os listeners aos cards de usuário que foram carregados inicialmente pelo PHP
        aplicarListenersUsuario(); 

        const inputBusca = document.getElementById('pesquisarUsuario');
        const listaUsuarios = document.getElementById('listaUsuarios');

        if (inputBusca && listaUsuarios) {
            inputBusca.addEventListener('input', async () => {
                const termo = inputBusca.value.trim();

                try {
                    // Faz a requisição para o backend com o termo de busca
                    const response = await fetch(`../database/buscarUsuario.php?q=${encodeURIComponent(termo)}`);
                    const data = await response.json();

                    if (data.sucesso) {
                        // Limpa a lista atual de usuários
                        listaUsuarios.innerHTML = ''; 
                        
                        if (data.usuarios.length === 0) {
                            listaUsuarios.innerHTML = '<p class="text-center text-muted">Nenhum usuário encontrado.</p>';
                            return;
                        }
                        
                        // Cria e adiciona os novos cards de usuário à lista
                        data.usuarios.forEach(usuario => {
                            const colDiv = document.createElement('div');
                            colDiv.className = 'col-md-6 col-lg-4';
                            colDiv.innerHTML = `
                            <div class="card h-100 shadow-sm border-0 hover-shadow transition rounded-3 bg-light text-dark btn-usuario"
                                style="cursor: pointer;" data-id="${usuario.id}">
                                <div class="card-body d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="fas fa-user-circle fa-2x text-vinho"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold">${usuario.nome}</h6>
                                    </div>
                                </div>
                            </div>
                            `;
                            listaUsuarios.appendChild(colDiv);
                        });
                        
                        // 2. 🟢 PONTO CRÍTICO: Re-aplica os listeners de clique aos novos cards criados
                        aplicarListenersUsuario(); 
                        
                    } else {
                        listaUsuarios.innerHTML = `<p class="alert alert-danger">${data.mensagem || 'Erro desconhecido na busca.'}</p>`;
                    }
                } catch (error) {
                    console.error('Erro na requisição AJAX de busca:', error);
                    listaUsuarios.innerHTML = '<p class="alert alert-danger">Erro ao comunicar com o servidor.</p>';
                }
            });
        }
    });