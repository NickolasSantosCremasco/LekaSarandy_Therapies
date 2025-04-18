/* Começar Pesquisa */
/* O botão deve sumir e aparecer o questinário */
/* o Questionário deve ter umas 5 perguntas */
/* Após responder a última o usuário deve passar */
/* Ao passar a barra de loading deve subir */
/* As perguntas devem mudar */
/* Quando terminar deve aparecer o resultado de acordo com a somatória das respostas do usuário */

//Começar pesquisa
function Start() {
    const button = document.querySelector('#Start');
    button.addEventListener('click', function() {
        button.style.display = 'none';
    })
};

