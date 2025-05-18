document.addEventListener('DOMContentLoaded', function() {
    // Elementos da Interface
    const startQuizBtn = document.querySelector('#comecarTeste');
    const introSection = document.querySelector('.intro-section');
    const quizSection = document.querySelector('#sessaoPesquisa');
    const resultSection = document.querySelector('#sessaoResultado');
    const questionText = document.querySelector('#questionText');
    const optionsContainer = document.querySelector('#optionsContainer');
    const nextBtn = document.querySelector('#nextBtn');
    const prevBtn = document.querySelector('#prevBtn');
    const currentQuestionNum = document.querySelector('#currentQuestionNum');
    const progressText = document.querySelector('#progressText');
    const progressFill = document.querySelector('#progressFill');
    const retakeTestBtn = document.querySelector('#refazerTeste');
    const profileTitle = document.querySelector('#profileTitle');
    const profileDescription = document.querySelector('.profilDescription');
    const terapiasRecomendadas = document.querySelector('#terapiasRecomendadas');
    const pontosFortes = document.querySelector('#pontosFortes');

    // Perguntas da pesquisa
    const questions = [
        {
            text: "Como você geralmente reage a situações estressantes?",
            options: [
                "Nunca",
                "Raramente",
                "Ás vezes",
                "Frequentemente",
                "Sempre"
            ],
            scores: [1, 2, 3, 4, 5] // Pontuação para cada opção
        },
        {
            text: "Em um grupo de pessoas, você geralmente:",
              options: [
                "Nunca",
                "Raramente",
                "Ás vezes",
                "Frequentemente",
                "Sempre"
            ],
            scores: [1, 2, 3, 4, 5]
        },
        
    ];

    // Variáveis de Estado
    let currentQuestion = 0;
    let answers = [];
    let selectedOption = null;
    let totalScore = 0;

    // Iniciar a pesquisa
    startQuizBtn.addEventListener('click', function() {
        introSection.style.display = 'none';
        quizSection.classList.remove('d-none');
        loadQuestion(currentQuestion);
    });

    // Carregar pergunta
    function loadQuestion(index) {
        if (index >= questions.length) {
            showResults();
            return;
        }
        
        const question = questions[index];
        questionText.textContent = question.text;
        currentQuestionNum.textContent = index + 1;
        progressText.textContent = `${index + 1}/${questions.length}`;
        progressFill.style.width = `${((index + 1) / questions.length) * 100}%`;

        // Atualizar botões de navegação
        prevBtn.disabled = index === 0;
        nextBtn.textContent = index === questions.length - 1 ? 'Ver Resultado' : 'Próxima';

        // Carregar opções
        optionsContainer.innerHTML = '';
        question.options.forEach((option, i) => {
            const optionBtn = document.createElement('button');
            optionBtn.className = 'option-btn';
            if (answers[index] === i) {
                optionBtn.classList.add('selected');
            }
            optionBtn.innerHTML = `
                <div class="option-number">${i+1}</div>
                <div class="option-text">${option}</div>
            `;
            optionBtn.addEventListener('click', function() {
                selectOption(optionBtn, i);
            });
            optionsContainer.appendChild(optionBtn);
        });
    }

    // Selecionar Opção
    function selectOption(optionBtn, optionIndex) {
        // Remover Seleção Anterior
        const previouslySelected = optionsContainer.querySelector('.selected');
        if (previouslySelected) {
            previouslySelected.classList.remove('selected');
        }

        // Selecionar Nova Opção
        optionBtn.classList.add('selected');
        selectedOption = optionIndex;
        answers[currentQuestion] = optionIndex;
        
        // Atualizar pontuação
        totalScore += questions[currentQuestion].scores[optionIndex];
    }

    // Próxima Pergunta
    nextBtn.addEventListener('click', function() {
        if (selectedOption === null && answers[currentQuestion] === undefined) {
            alert('Por favor, selecione uma opção antes de continuar.');
            return;
        }
        
        if (currentQuestion < questions.length - 1) {
            currentQuestion++;
            selectedOption = answers[currentQuestion] !== undefined ? answers[currentQuestion] : null;
            loadQuestion(currentQuestion);
        } else {
            showResults();
        }
    });

    // Pergunta Anterior
    prevBtn.addEventListener('click', function() {
        if (currentQuestion > 0) {
            // Subtrair a pontuação da pergunta atual
            if (answers[currentQuestion] !== undefined) {
                totalScore -= questions[currentQuestion].scores[answers[currentQuestion]];
            }
            
            currentQuestion--;
            selectedOption = answers[currentQuestion] !== undefined ? answers[currentQuestion] : null;
            loadQuestion(currentQuestion);
        }
    });

    // Mostrar Resultados
    function showResults() {
        quizSection.classList.add('d-none');
        resultSection.classList.remove('d-none');

        // Determinar o resultado com base na pontuação total
        const result = calculateResult(totalScore);
        
        // Exibir o resultado
        profileTitle.textContent = result.title;
        profileDescription.textContent = result.description;
        
        // Atualizar terapias recomendadas e pontos fortes
        terapiasRecomendadas.innerHTML = result.therapies.map(t => `
            <li class="mb-2"><i class="fas fa-spa me-2"></i>${t}</li>
        `).join('');
        
        pontosFortes.innerHTML = result.strengths.map(s => `
            <li class="mb-2"><i class="fas fa-heart me-2"></i>${s}</li>
        `).join('');
    }

    // Calcular resultado final
    function calculateResult(score) {
        // Defina seus critérios de pontuação aqui
        const maxScore = questions.length * 5; // Pontuação máxima possível
        
        // Exemplo de lógica de resultados (ajuste conforme necessário)
        if (score <= maxScore * 0.25) {
            return {
                title: "O Reflexivo",
                description: "Você tem uma natureza introspectiva e analítica, preferindo processar suas emoções internamente.",
                therapies: ["Aromaterapia", "Meditação Guiada", "Terapia com Cristais"],
                strengths: ["Introspecção", "Autoconhecimento", "Profundidade"]
            };
        } else if (score <= maxScore * 0.5) {
            return {
                title: "O Cuidador",
                description: "Você valoriza a harmonia e o bem-estar emocional, tanto próprio quanto dos outros.",
                therapies: ["Massagem Terapêutica", "Reiki", "Terapia Floral"],
                strengths: ["Empatia", "Intuição", "Capacidade de cura"]
            };
        } else if (score <= maxScore * 0.75) {
            return {
                title: "O Líder",
                description: "Você tem uma abordagem prática e direta, com talento para orientar e organizar.",
                therapies: ["Coaching", "Terapia Cognitivo-Comportamental", "Bioenergética"],
                strengths: ["Liderança", "Determinação", "Praticidade"]
            };
        } else {
            return {
                title: "O Expressivo",
                description: "Você é criativo e se expressa livremente, trazendo energia e vitalidade para seu entorno.",
                therapies: ["Arteterapia", "Dançaterapia", "Musicoterapia"],
                strengths: ["Criatividade", "Comunicação", "Espontaneidade"]
            };
        }
    }

    // Refazer Teste
    retakeTestBtn.addEventListener('click', function() {
        // Resetar todas as variáveis
        currentQuestion = 0;
        answers = [];
        selectedOption = null;
        totalScore = 0;
        
        // Mostrar quiz e esconder resultado
        resultSection.classList.add('d-none');
        quizSection.classList.remove('d-none');
        loadQuestion(currentQuestion);
    });
});