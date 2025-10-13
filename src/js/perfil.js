// ===================================================================
// FUNÇÕES DE AÇÃO (Chamadas pelos botões dentro da lista de consultas)
// ===================================================================

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

function remarcarConsulta(id) {
    alert(`Funcionalidade de Remarcar Consulta ${id} não implementada.`);
}

function atualizarStatus(id, status) {
    fetch('../database/atualizarStatus.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `id=${id}&status=${status}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.sucesso) {
                alert('Status atualizado com sucesso!');
                location.reload(); 
            } else {
                alert('Erro: ' + (data.erro || 'Desconhecido'));
            }
        })
        .catch(error => {
            console.error('Erro na requisição:', error);
            alert("Erro na requisição: " + error);
        });
}

function cancelarConsulta(id) {
    if (!confirm("Tem certeza que deseja cancelar esta consulta?")) return;
    fetch('../database/cancelarConsulta.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
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

// ===================================================================
// LÓGICA DE EXIBIÇÃO DE CONSULTAS DO USUÁRIO SELECIONADO
// ===================================================================

function buscarConsultas(userId) {
    const btnAgendarConsulta = document.getElementById('btnAgendarConsulta');
    const usuarios = document.querySelector('.usuarios');
    const container = document.getElementById('consultasUsuario');
    
    // Esconde a lista de usuários e mostra o botão Agendar
    btnAgendarConsulta.classList.remove('d-none');
    usuarios.classList.add('d-none');
    document.getElementById('usuarioSelecionadoId').value = userId;

    fetch(`../database/getConsultas.php?id=${userId}`)
        .then(response => {
            if (!response.ok) throw new Error('Erro de rede ou na API: ' + response.statusText);
            return response.json();
        })
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

            container.innerHTML = html;
            container.classList.remove('d-none');

            const voltar = document.querySelector("#voltar");
            if (voltar) {
                voltar.addEventListener('click', () => {
                    container.classList.add('d-none');
                    usuarios.classList.remove('d-none');
                    container.innerHTML = '';
                    btnAgendarConsulta.classList.add('d-none');
                });
            }
        })
        .catch(error => {
            console.error('Erro ao buscar consultas:', error);
            alert("Erro ao buscar consultas: " + error);
        });
}

// ===================================================================
// LÓGICA DE LISTENERS E PESQUISA DE USUÁRIOS
// ===================================================================

function aplicarListenersUsuario() {
    document.querySelectorAll('.btn-usuario').forEach(btn => {
        btn.onclick = function() {
             buscarConsultas(this.getAttribute('data-id'));
        };
    });
}

document.addEventListener('DOMContentLoaded', () => {
    aplicarListenersUsuario(); 

    const inputBusca = document.getElementById('pesquisarUsuario');
    const listaUsuarios = document.getElementById('listaUsuarios');

    if (inputBusca) {
        inputBusca.addEventListener('input', async () => {
            const termo = inputBusca.value.trim();
            try {
                const response = await fetch(`../database/buscarUsuarios.php?q=${encodeURIComponent(termo)}`);
                const data = await response.json();

                if (data.sucesso) {
                    listaUsuarios.innerHTML = (data.usuarios.length === 0) ? '<p class="text-center text-muted">Nenhum usuário encontrado.</p>' : '';
                    
                    data.usuarios.forEach(usuario => {
                        const colDiv = document.createElement('div');
                        colDiv.className = 'col-md-6 col-lg-4';
                        colDiv.innerHTML = `
                          <div class="card h-100 shadow-sm border-0 hover-shadow transition rounded-3 bg-light text-dark btn-usuario" style="cursor: pointer;" data-id="${usuario.id}">
                              <div class="card-body d-flex align-items-center">
                                  <div class="flex-shrink-0 me-3"><i class="fas fa-user-circle fa-2x text-vinho"></i></div>
                                  <div class="flex-grow-1"><h6 class="mb-1 fw-bold">${usuario.nome}</h6></div>
                              </div>
                          </div>`;
                        listaUsuarios.appendChild(colDiv);
                    });

                    // Re-aplica os listeners de clique aos novos cards criados
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