@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
<body>
    <main>
    <section id="button-container">
        <div class="feature-buttons-container top-buttons">
        <button class="feature-button" onclick="goToCommunityForum()">
            <div class="button-icon">
                <span class="material-icons">forum</span>
            </div>
            <div class="button-text">Community Forum</div>
        </button>

            
        <button class="feature-button" onclick="sendEmergencyMessage()">
                <div class="button-icon">
                    <span class="material-icons">warning</span>
                </div>
                <div class="button-text">Emergency Notification</div>
            </button>
        </div>

        <div class="feature-buttons-container bottom-buttons">
            <button class="feature-button " onclick="scrollToQuiz()">
                <div class="button-icon">
                    <span class="material-icons">school</span>
                </div>
                <div class="button-text">Education</div>
            </button>

            <button class="feature-button" onclick="viewAnnouncements()">
                <div class="button-icon">
                    <span class="material-icons">campaign</span>
                </div>
                <div class="button-text">Report</div>
            </button>
        </div>
    </section>
        </section>
        <div class="forum-news-container">
            <!-- Container untuk forum komunitas -->
            <section id="community-forum" class="forum-container">
                <h2>Community Forum</h2>
                <div class="thread">
                    <h3>
                        <span class="material-icons user-icon">account_circle</span> Upi <!-- Ganti "Upi" dengan nama pengguna -->
                    </h3>
                    <p>Halo teman-teman, saya ingin memberikan peringatan penting terkait keselamatan di sekitar area jalan Anggrek. Beberapa waktu belakangan ini, saya mendengar banyak laporan tentang peningkatan kasus pelecehan seksual, terutama di sekitar area jalan Anggrek pada malam hari. Mari kita semua bersama-sama lebih waspada dan saling menjaga satu sama lain. Jika ada yang memiliki pengalaman atau tips untuk menghindari situasi tersebut, silakan bagi di sini. Semoga kita semua tetap aman dan terlindungi.</p>
                    <a href="#">Read more</a>
                </div>
                <div class="thread">
                    <h3>
                        <span class="material-icons user-icon">account_circle</span> Itak <!-- Ganti "Itak" dengan nama pengguna -->
                    </h3>
                    <p>Halo teman-teman, saya setuju dengan peringatan yang disampaikan oleh Upi. Situasi ini memang memprihatinkan, dan kita semua harus saling mendukung untuk menjaga keamanan di lingkungan kita. Saya ingin menambahkan bahwa penting untuk tidak ragu-ragu melaporkan kejadian yang mencurigakan atau kasus pelecehan seksual yang kita saksikan. Mari jadikan lingkungan kita menjadi tempat yang lebih aman bagi semua orang.</p>
                    <a href="#">Read more</a>
                </div>
                <div class="thread">
                    <h3>
                        <span class="material-icons user-icon">account_circle</span> Fakhran <!-- Ganti "Fakhran" dengan nama pengguna -->
                    </h3>
                    <p>Halo teman-teman, saya ingin berbagi beberapa tips untuk menghindari situasi pelecehan seksual di area jalan. Pertama, selalu berjalan di jalur yang ramai dan terang jika memungkinkan. Kedua, perhatikan lingkungan sekitar dan waspada terhadap perilaku yang mencurigakan. Ketiga, jika merasa tidak aman, segera cari tempat yang lebih aman atau minta bantuan dari orang lain atau pihak berwenang. Semoga tips ini dapat membantu kita semua menjaga keselamatan di area jalan.</p>
                    <a href="#">Read more</a>
                </div>
                </section>

                <section id="educational-content" class="container-box">
                    <h2 style="color: #F4538A;">Educational Content</h2>
                    <div id="sexual-harassment-content">
                        @foreach ($questions as $index => $question)
                            <form id="sexual-harassment-form-{{ $index }}">
                                <h3 id="question-text" style="margin-bottom: 20px;">{{ $question['question'] }}</h3>
                                <div id="options-container" style="margin-bottom: 20px;">
                                    @foreach ($question['options'] as $key => $option)
                                        <div>
                                            <input type="radio" name="answer" value="{{ $key }}"> {{ $option }}
                                        </div>
                                    @endforeach
                                </div>
                                <button type="submit" id="submit-button" style="background-color: #F4538A; color: white; border: none; border-radius: 5px; padding: 8px 15px; cursor: pointer;">Submit</button>
                            </form>
                            <div id="sexual-harassment-result-{{ $index }}" style="margin-top: 20px;"></div>
                        @endforeach
                    </div>
                </section>
    </main>
</body
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('form').forEach((form, index) => {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                const selectedValue = this.querySelector('input[name="answer"]:checked').value;
                const resultDiv = document.getElementById(`sexual-harassment-result-${index}`);
                const correctAnswers = @json($correctAnswers);
                resultDiv.textContent = selectedValue === correctAnswers[index] ? 'Correct Answer!' : 'Wrong Answer!';
            });
        });
    });
</script>


@endsection