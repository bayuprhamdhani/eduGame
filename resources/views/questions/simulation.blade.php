@extends('layout')

@section('content')
<div class="container col-8 mt-4">
    <div class="row g-4 text-center">
        <h1 id="countdown" style="font-size: 80px; color: #ff5733; font-family: 'Montserrat', sans-serif; text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);">
            {{ $time }} <!-- Waktu yang diterima -->
        </h1>

        <!-- Menampilkan Challenge jika ada -->
        @if(!empty($chalenge))
        <h1 id="chalenge" style="font-size: 35px; color:rgb(0, 0, 0); font-family: 'Roboto', sans-serif; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);">
            Challenge: {{ $chalenge }} <!-- Challenge yang diterima -->
        </h1>
        @endif

        <h1 id="question" style="font-size: 35px; color:rgb(0, 0, 0); font-family: 'Roboto', sans-serif; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);">
            {{ $question }} <!-- Pertanyaan yang diterima -->
        </h1>
    </div>
</div>

<script>
    let count = {{ $time }}; // Waktu yang diterima
    let countdownElement = document.getElementById("countdown");
    let questionElement = document.getElementById("question");
    let chalengeElement = document.getElementById("chalenge");

    function startCountdown() {
        let interval = setInterval(() => {
            countdownElement.textContent = count; // Ubah teks sesuai hitungan
            count--;

            if (count < 0) {
                clearInterval(interval); // Hentikan saat mencapai 0
                countdownElement.textContent = "Waktu Habis!"; // Ubah teks angka jadi "Waktu Habis!"
                questionElement.textContent = "{{ $answer }}"; // Menampilkan jawaban
                chalengeElement.style.display = 'none'; // Menyembunyikan elemen challenge

            }
        }, 1000); // Hitung mundur setiap 1 detik (1000ms)
    }

    startCountdown(); // Jalankan saat halaman dimuat
</script>

<script>
    function updateImageSize2() {
        const b = document.getElementById("chalenge");
        const c = document.getElementById("question");
        if (window.innerWidth >= 980) {
            c.style.fontSize = "35px";
            b.style.fontSize = "35px";
        } else {
            c.style.fontSize = "20px";
            b.style.fontSize = "20px";
        }
    }
    // Panggil saat halaman dimuat dan saat ukuran layar berubah
    window.addEventListener("load", () => {
        updateImageSize2();
    });
    window.addEventListener("resize", () => {
        updateImageSize2();
    });
</script>
@endsection
