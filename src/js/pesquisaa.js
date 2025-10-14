 document.addEventListener('DOMContentLoaded', function() {
        // Elementos da Interface
        const startContainer = document.querySelector('.startContainer')
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

        const img1 = document.querySelector('#img1');
        const img2 = document.querySelector('#img2');
        const img3 = document.querySelector('#img3');

        const cardTitle1 = document.querySelector('#cardTitle1');
        const cardTitle2 = document.querySelector('#cardTitle2');

        const cardText1 = document.querySelector('#cardText1');
        const cardText2 = document.querySelector('#cardText2');

        const cardContainer1 = document.querySelector('#card-container-1');
        const cardContainer2 = document.querySelector('#card-container-2');


        const questions1 = [{
                text: "Com que frequência você sente que muitas vezes faz escolhas que vão contra o que você realmente acredita?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3] // Pontuação para cada opção
            },
            {
                text: "Com que frequência você costuma dizer 'sim' para agradar, mesmo quando gostaria de dizer 'não'?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3]
            },
            {
                text: "Com que frequência você se pega vivendo no automático e não buscando o seu propósito?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3]
            },
            {
                text: "Com que frequência você se sente em paz com suas decisões ou muitas vezes se arrepende depois?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3]
            },
            {
                text: "Com que frequência você se pega vivendo on automático",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3]
            },
            {
                text: "Com que frequência você sente que está vivendo a vida que quer ou a vida que os outros esperam de você?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3]
            },
            {
                text: "Com que frequência você se sente culpada quando prioriza seu bem-estar?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3]
            },
            {
                text: "Com que frequência você sentiu que estava se traindo ao manter um relacionamento ou trabalho?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3]
            },
            {
                text: "Com que frequência você se sente perdido(a) em momentos de decisão importantes?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3]
            },


        ];

        const questions2 = [{
                text: "Com que frequência sente que muitas vezes faz escolhas que vão contra o que você realmente acredita?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3] // Pontuação para cada opção
            },
            {
                text: "Com que frequência você costuma dizer 'sim' para agradar, mesmo quando gostaria de dizer 'não'?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3]
            },
            {
                text: "Com que frequência você se pega vivendo no automático e não buscando o seu propósito?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3]
            },
            {
                text: "Quantas vezes você sente que esta vivendo o que os outros querem de você e não o que você quer?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3]
            },
            {
                text: "Com que frequência você se sente culpada quando prioriza seu bem-estar?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3]
            },
            {
                text: "Com que frequência você sente que está se traindo ao manter um relacionamento ou trabalho?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3]
            },
            {
                text: "Você geralmente tem clareza sobre o que é inegociável para você?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3]
            },
            {
                text: "Com que frequência você se sente perdido(a) em momentos de decisão importantes?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3]
            },
            {
                text: "Com que frequência você se compara com os outros e sente que não é bom(a) o suficiente?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3]
            },


        ];

        const questions3 = [{
                text: "Com que frequência você sente que, por mais que se esforce, nunca é suficiente?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3] // Pontuação para cada opção
            },
            {
                text: "Com que frequência você medo de se posicionar ou dizer 'não' por receio de desagradar os outros?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3]
            },
            {
                text: "Com que frequência você se sente culpado(a) ao cuidar de si mesmo ou priorizar suas necessidades?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3]
            },
            {
                text: "Quantas vezes você sente que esta vivendo o que os outros querem de você e não o que você quer?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3]
            },
            {
                text: "Com que frequência você acha que sucesso ou prosperidade é algo que 'não é para você'?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3]
            },
            {
                text: "Com que frequência você costuma se sabotar ou adiar objetivos importantes sem entender o motivo?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3]
            },
            {
                text: "Com que frequência você sente que precisa ser 'perfeito(a)' para ser aceita ou amado(a)?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3]
            },
            {
                text: "Com que frequência você evita oportunidades por acreditar que não merece ou não é capaz?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3]
            },
            {
                text: "Com que frequência você costuma internalizar críticas de forma exagerada, sentindo-se sempre culpado(a)?",
                options: [
                    "Nunca",
                    "Raramente",
                    "Ás vezes",
                    "Sempre"
                ],
                scores: [0, 1, 2, 3]
            },


        ];

        // Variáveis de Estado
        let currentQuestion = 0;
        let answers = [];
        let selectedOption = null;
        let totalScore = 0;
        let activeQuestions = [];


        startQuizBtn.addEventListener('click', function() {

            startQuizBtn.remove()


            const button1 = document.createElement('button');
            button1.id = 'button1';
            button1.className =
                'btn btn-primary btn-lg col-10 col-sm-8 col-md-6 col-lg-3 mx-2 mb-3 start-btn';
            button1.textContent = 'Sessão de Valores';

            const button2 = document.createElement('button');
            button2.id = 'button2';
            button2.className =
                'btn btn-primary btn-lg col-10 col-sm-8 col-md-6 col-lg-3 mx-2 mb-3 start-btn';
            button2.textContent = 'Sessão de Sabotadores';

            const button3 = document.createElement('button');
            button3.id = 'button3';
            button3.className =
                'btn btn-primary btn-lg col-10 col-sm-8 col-md-6 col-lg-3 mx-2 mb-3 start-btn';
            button3.textContent = 'Crenças Limitantes';

            startContainer.appendChild(button1)
            startContainer.appendChild(button2)
            startContainer.appendChild(button3)

            button1.style.marginRight = '10px'
            button2.style.marginRight = '10px'

            button1.addEventListener('click', function() {
                activeQuestions = questions1;
                startSurvey();
                console.log(activeQuestions)
            })

            button2.addEventListener('click', function() {
                activeQuestions = questions2;
                startSurvey();
                console.log(activeQuestions)
            })

            button3.addEventListener('click', function() {
                activeQuestions = questions3;
                startSurvey();
                console.log(activeQuestions)
            })
        })

        function startSurvey() {
            startContainer.innerHTML = '';
            startContainer.classList.add('d-none');
            introSection.style.display = 'none';

            quizSection.classList.remove('d-none');
            currentQuestion = 0
            answers = [];
            totalScore = 0
            selectedOption = null
            loadQuestion(currentQuestion)
        }

        function loadQuestion(index) {
            if (index >= activeQuestions.length) {
                showResults();
                return;
            }

            const question = activeQuestions[index];
            questionText.textContent = question.text;
            currentQuestionNum.textContent = index + 1;
            progressText.textContent = `${index + 1}/${activeQuestions.length}`;
            progressFill.style.width = `${((index + 1) / activeQuestions.length) * 100}%`;

            // Atualizar botões de navegação
            prevBtn.disabled = index === 0;
            nextBtn.textContent = index === activeQuestions.length - 1 ? 'Ver Resultado' : 'Próxima';

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

        function selectOption(optionBtn, optionIndex) {
            const previouslySelected = optionsContainer.querySelector('.selected');
            if (previouslySelected) {
                previouslySelected.classList.remove('selected');
            }

            // Selecionar Nova Opção
            optionBtn.classList.add('selected');
            selectedOption = optionIndex;
            answers[currentQuestion] = optionIndex;

            // Atualizar pontuação
            totalScore += questions1[currentQuestion].scores[optionIndex];
        }

        // Próxima Pergunta
        nextBtn.addEventListener('click', function() {
            if (selectedOption === null && answers[currentQuestion] === undefined) {
                alert('Por favor, selecione uma opção antes de continuar.');
                return;
            }

            if (currentQuestion < questions1.length - 1) {
                currentQuestion++;
                selectedOption = answers[currentQuestion] !== undefined ? answers[currentQuestion] :
                    null;
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
                    totalScore -= activeQuestions[currentQuestion].scores[answers[currentQuestion]];
                }

                currentQuestion--;
                selectedOption = answers[currentQuestion] !== undefined ? answers[currentQuestion] :
                    null;
                loadQuestion(currentQuestion);
            }
        });


        function showResults() {
            quizSection.classList.add('d-none');
            resultSection.classList.remove('d-none');
            resultSection.classList.add('d-flex')

            // Determinar o resultado com base na pontuação total
            const result = calculateResult(totalScore);

            // Exibir o resultado
            profileTitle.textContent = result.title;
            profileDescription.textContent = result.description;

            cardContainer1.style.display = 'none';
            cardContainer2.style.display = 'none';

            // Card 1
            if (result.therapies[0]) {
                img1.src = result.therapies[0].image;
                cardTitle1.textContent = result.therapies[0].title;
                cardText1.textContent = result.therapies[0].text;
                cardContainer1.style.display = 'block'; // Mostra o card
            }

            // Card 2
            if (result.therapies[1]) {
                img2.src = result.therapies[1].image;
                cardTitle2.textContent = result.therapies[1].title;
                cardText2.textContent = result.therapies[1].text;
                cardContainer2.style.display = 'block'; // Mostra o card
            }


        }

        function calculateResult(score) {

            if (score <= 9) {
                return {
                    title: "Sessão de Clareza e Sabotadores",
                    description: "Você tem uma natureza introspectiva e analítica, preferindo processar suas emoções internamente.",
                    therapies: [
                        "../img/terapiasPesquisa/sabotadores1.jpg",
                        "../img/terapiasPesquisa/sabotadores2.jpg"
                    ],
                    strengths: ["Introspecção", "Autoconhecimento", "Profundidade"]
                };
            } else if (score >= 10 && score <= 19) {
                return {
                    title: "Sessão de valores",
                    description: "Você tem uma desconexão com seus valores. Porém, você já nota isso e este é o primeiro passo, uma sessão de valores pode te ajudar a tomar decisões mais conscientes e viver com mais leveza.",
                    therapies: [
                        {
                            image: "../img/terapiasPesquisa/sabotadores1.jpg",
                            title: "Análise de Sabotadores",
                            text: "Identifique os padrões mentais que te impedem de alcançar seu potencial máximo e aprenda a enfraquecê-los."
                        },
                        {
                            image: "../img/terapiasPesquisa/sabotadores2.jpg",
                            title: "Sessão de Valores",
                            text: "Organize seus pensamentos, defina prioridades e ganhe uma visão clara sobre seus próximos passos na vida."
                        }
                    ],
                    strengths: ["Empatia", "Intuição", "Capacidade de cura"]
                };
            } else if (score >= 20 && score <= 30) {
                return {
                    title: "Sessão de valores",
                    description: "Sua vida esta sendo fortemente guiada por pressões externas, crenças limitantes ou medos. No entando, notar essas adversidades é o primeiro passo para supera-las. Uma sessão de valores é essencial para resgatar sua autenticidade e voltar para o seu centro.",
                    therapies: [
                        {
                    image: "../img/terapiasPesquisa/valores1.jpg",
                    title: "Mapeamento de Valores",
                    text: "Descubra quais são os seus valores fundamentais e como eles podem guiar suas decisões para uma vida mais autêntica."
                },
                {
                    image: "../img/terapiasPesquisa/valores2.webp",
                    title: "Alinhamento Pessoal",
                    text: "Aprenda a alinhar suas ações diárias com seus valores mais profundos, gerando mais satisfação e propósito."
                }
                    ],
                    strengths: ["Liderança", "Determinação", "Praticidade"]
                };
            } else {
                return {
                    title: "Sessão Grupal",
                    description: "Você é criativo e se expressa livremente, trazendo energia e vitalidade para seu entorno. Uma terapia em grupo pode te ajudar a se sentir mais a vontade tanto em compartilhar quanto em receber.",
                    therapies: [
                        {
                            image: "../img/terapiasPesquisa/sabotadores1.jpg",
                            title: "Sessão em Grupo",
                            text: "Encare as crenças que te seguram e reprograme sua mente juntamente de um grupo que visa seu melhor."
                        },
                        {
                            image: "../img/terapiasPesquisa/valores1.jpg",
                            title: "Sessão de Valores",
                            text: "Reconecte-se com sua verdadeira essência através do entendimento profundo dos seus valores pessoais."
                        }
                    ],
                    strengths: ["Criatividade", "Comunicação", "Espontaneidade"]
                };
            }
        }

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