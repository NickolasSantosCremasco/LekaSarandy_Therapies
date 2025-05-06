/* Começar Pesquisa */
/* O botão deve sumir e aparecer o questinário */
/* o Questionário deve ter umas 5 perguntas */
/* Após responder a última o usuário deve passar */
/* Ao passar a barra de loading deve subir */
/* As perguntas devem mudar */
/* Quando terminar deve aparecer o resultado de acordo com a somatória das respostas do usuário */

//Começar pesquisa
const questions = [
    {
      question: "Você se sente confortável ao falar sobre seus sentimentos?",
      options: ["Sim, com frequência", "Depende da situação", "Não muito", "Evito ao máximo"]
    },
    {
      question: "Você prefere entender sua mente ou mudar seus hábitos?",
      options: ["Entender a mente", "Mudar hábitos", "Ambos", "Nenhum"]
    },
    {
      question: "Como você lida com o estresse?",
      options: ["Conversando com alguém", "Praticando atividades físicas", "Refletindo sozinho", "Ignorando"]
    }
  ];

  const profiles = [
    {
      title: "Terapia Cognitivo-Comportamental (TCC)",
      description: "Você se beneficia de abordagens práticas focadas em resolver problemas e mudar padrões de pensamento."
    },
    {
      title: "Psicanálise",
      description: "Você tende a refletir profundamente e pode se beneficiar de uma abordagem voltada à compreensão do inconsciente."
    },
    {
      title: "Terapia Humanista",
      description: "Você valoriza empatia e autenticidade, buscando o autoconhecimento e o crescimento pessoal."
    },
    {
      title: "Terapia Corporal",
      description: "Você responde bem a abordagens que conectam mente e corpo, como meditação, respiração e movimento."
    }
  ];

  let currentQuestion = 0;
  let answers = [];

  
  function comecarPesquisa() {
    document.querySelector(".intro-screen").classList.remove("active");
    document.querySelector(".quiz-container").classList.add("active");
    showQuestion();
  }

  function showQuestion() {
    document.getElementById("questionText").textContent = questions[currentQuestion].question;
    const optionsDiv = document.getElementById("options");
    optionsDiv.innerHTML = "";
    questions[currentQuestion].options.forEach((opt, index) => {
      const btn = document.createElement("div");
      btn.className = "option-btn";
      btn.textContent = opt;
      btn.onclick = () => selectAnswer(index);
      optionsDiv.appendChild(btn);
    });

    document.getElementById("prevBtn").style.display = currentQuestion > 0 ? "inline-block" : "none";
    document.getElementById("quizProgress").style.width = ((currentQuestion + 1) / questions.length) * 100 + "%";
}


function selectAnswer(index) {
    answers[currentQuestion] = index;
    nextQuestion();
  }

  
  function nextQuestion() {
    if (answers[currentQuestion] === undefined) return;
    currentQuestion++;
    if (currentQuestion >= questions.length) {
      mostrarResultado();
    } else {
      mostrarPergunta();
    }
  }

  
  function prevQuestion() {
    if (currentQuestion > 0) {
      currentQuestion--;
      mostrarPergunta();
    }
  }

  function mostrarResultado() {
    document.querySelector(".quiz-container").classList.remove("active");
    document.querySelector(".result-container").classList.add("active");

    // Lógica simplificada: soma dos índices e mod para definir perfil
    const resultIndex = answers.reduce((a, b) => a + b, 0) % profiles.length;
    const result = profiles[resultIndex];

    document.getElementById("resultTitle").textContent = result.title;
    document.getElementById("resultDescription").textContent = result.description;
  }

  function refazerPesquisa() {
    currentQuestion = 0;
    answers = [];
    document.querySelector(".result-container").classList.remove("active");
    document.querySelector(".quiz-container").classList.add("active");
    showQuestion();
  }