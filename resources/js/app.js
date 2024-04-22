import './bootstrap';

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

//JavaScript untuk menangani tombol "Profil", "Logout", dan pesan sukses

    document.getElementById("profile-btn").addEventListener("click", function() {
    window.location.href = "{{ route('profile') }}";
});

document.getElementById("logout-btn").addEventListener("click", function() {
    window.location.href = "{{ route('logout') }}";
});

    // Simulasikan penampilan pesan sukses setelah 3 detik
    setTimeout(function() {
        document.getElementById("success-message").style.display = "block";
    }, 3000);

