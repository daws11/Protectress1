<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education - Protectrees</title> 
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <span class="material-icons">eco</span>
            <h1>Protectrees</h1>
        </div>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About Us</a></li>
            </ul>
        </nav>
        <div class="user-actions">
            <button type="button" class="icon-button" id="notification-button">
                <span class="material-icons">notifications</span>
                <span class="icon-button__badge"></span>
            </button>
            <a href="{{ route('profile') }}" class="profile-button">
                <button id="profile-btn">
                    <span class="material-icons">account_circle</span>
                </button>
            </a>
        </div>
    </header>

    <main>
                <section id="educational-content" class="container-box">
                    <h2 style="color: #F4538A;">Educational Content</h2>
                    <div id="sexual-harassment-content">
                        <h3 id="question-text" style="margin-bottom: 20px;">Quiz: Understanding Sexual Harassment</h3>
                        <form id="sexual-harassment-form">
                            <div id="options-container" style="margin-bottom: 20px;">
                                <!-- Options akan ditambahkan secara dinamis -->
                            </div>
                            <button type="button" id="next-button" style="display: none; background-color: #FAA300; color: white; border: none; border-radius: 5px; padding: 8px 15px; cursor: pointer; margin-right: 10px;">Next</button>
                            <button type="submit" id="submit-button" style="background-color: #F4538A; color: white; border: none; border-radius: 5px; padding: 8px 15px; cursor: pointer;">Submit</button>
                        </form>
                        <div id="sexual-harassment-result" style="margin-top: 20px;"></div>
                    </div>
                </section>
                
    <footer>
        <!-- Footer sesuai kebutuhan -->
        <p>Hak Cipta &copy; 2024 Protectrees. All Rights Reserved.</p>
    </footer>

    <script>
        function sendEmergencyNotification() {
            // Implementasikan logika pengiriman pemberitahuan darurat di sini
            alert('Pemberitahuan darurat berhasil dikirim.'); // Contoh: Menampilkan alert
        }

        function showCrimeReportingForm() {
            // Implementasikan logika tampilkan form pelaporan kejahatan di sini
            alert('Form pelaporan kejahatan akan ditampilkan.'); // Contoh: Menampilkan alert
        }
        // Ganti dengan kunci API Anda dari NewsAPI
        const apiKey = '0b03676d95b644599aacf5183cceed7b';

        // URL endpoint untuk mendapatkan berita terkini dari NewsAPI
        const apiUrl = `https://newsapi.org/v2/top-headlines?country=us&apiKey=${apiKey}`;

        // Lakukan permintaan HTTP GET ke API
        fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            const articles = data.articles;
            const newsContainer = document.getElementById('news-container');

            articles.forEach(article => {
                // Buat elemen untuk setiap berita
                const newsItem = document.createElement('div');
                newsItem.classList.add('news-item');
                newsItem.innerHTML = `
                    <h3>${article.title}</h3>
                    <img src="${article.urlToImage}" alt="${article.title}">
                    <p>${article.description}</p>
                    <a href="${article.url}" target="_blank">Read More</a>
                `;
                // Tambahkan elemen berita ke dalam kontainer berita
                newsContainer.appendChild(newsItem);
            });
        })
        .catch(error => {
            console.error('Error fetching news:', error);
        });
        const questions = [
        {
            question: "What is sexual harassment?",
            options: [
                "Unwanted sexual advances or requests for sexual favors",
                "Verbal abuse",
                "Physical assault"
            ],
            correctAnswer: "harassment1"
        },
        {
            question: "Which of the following is considered sexual harassment?",
            options: [
                "Making sexual jokes or comments",
                "Asking for a date",
                "Giving a compliment"
            ],
            correctAnswer: "harassment1"
        },
        {
            question: "What should you do if you experience sexual harassment?",
            options: [
                "Speak up and report it to someone you trust",
                "Keep it to yourself and ignore it",
                "Blame yourself for the harassment"
            ],
            correctAnswer: "harassment1"
        },
        {
            question: "Who can be a victim of sexual harassment?",
            options: [
                "Anyone, regardless of gender or age",
                "Only women",
                "Only men"
            ],
            correctAnswer: "harassment1"
        },
        {
            question: "What are the effects of sexual harassment?",
            options: [
                "Emotional distress and trauma",
                "Increased job satisfaction",
                "Improved self-esteem"
            ],
            correctAnswer: "harassment1"
        }
    ];

    let currentQuestionIndex = 0;

    const sexualHarassmentForm = document.getElementById('sexual-harassment-form');
    const optionsContainer = document.getElementById('options-container');
    const nextButton = document.getElementById('next-button');
    const submitButton = document.getElementById('submit-button');
    const questionText = document.getElementById('question-text');

    sexualHarassmentForm.addEventListener('submit', function(event) {
        event.preventDefault();

        checkAnswer(questions[currentQuestionIndex].correctAnswer, questions[currentQuestionIndex].question);
    });

    nextButton.addEventListener('click', function() {
        currentQuestionIndex++;
        if (currentQuestionIndex < questions.length) {
            displayQuestion(currentQuestionIndex);
        } else {
            // Hitung jawaban yang benar setelah mencapai pertanyaan terakhir
            const correctAnswers = document.querySelectorAll('input[type="radio"]:checked').length;
            displayResult(`Total Correct Answers: ${correctAnswers}/${questions.length}`, 'black');
            nextButton.style.display = 'none';
            submitButton.style.display = 'none';
        }
    });

    function displayQuestion(index) {
        const currentQuestion = questions[index];
        questionText.textContent = currentQuestion.question;
        optionsContainer.innerHTML = '';
        currentQuestion.options.forEach((option, idx) => {
            const input = document.createElement('input');
            input.type = 'radio';
            input.id = `option${idx + 1}`;
            input.name = 'harassment';
            input.value = `harassment${idx + 1}`;

            const label = document.createElement('label');
            label.htmlFor = `option${idx + 1}`;
            label.textContent = option;

            optionsContainer.appendChild(input);
            optionsContainer.appendChild(label);
            optionsContainer.appendChild(document.createElement('br'));
        });
        sexualHarassmentResult.innerHTML = ''; // Bersihkan hasil sebelumnya
    }

    function checkAnswer(correctAnswer, questionText) {
        const selectedAnswer = document.querySelector('input[name="harassment"]:checked');
        if (selectedAnswer) {
            if (selectedAnswer.value === correctAnswer) {
                displayResult(`${questionText} - Correct!`, 'green');
            } else {
                displayResult(`${questionText} - Incorrect! The correct answer is: ${document.querySelector(`label[for="${correctAnswer}"]`).textContent}`, 'red');
            }
            nextButton.style.display = 'block';
            submitButton.style.display = 'none';
        } else {
            displayResult('Please select an answer for the question.', 'black');
        }
    }

    function displayResult(message, color) {
        const sexualHarassmentResult = document.getElementById('sexual-harassment-result');
        const resultMessage = document.createElement('p');
        resultMessage.textContent = message;
        resultMessage.style.color = color;
        sexualHarassmentResult.appendChild(resultMessage);
    }

    // Tampilkan pertanyaan pertama saat halaman dimuat
    displayQuestion(currentQuestionIndex);
    </script>
</body>
</html>