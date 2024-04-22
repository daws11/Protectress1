import './bootstrap';
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

function scrollToQuiz() {
    const quizSection = document.getElementById('educational-content');
    if (quizSection) {
        quizSection.scrollIntoView({ behavior: 'smooth' });
    }
}


