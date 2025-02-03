@extends('layout')

@section('content')
@guest
<
@endguest

@auth
<div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="text-center mb-3">
        <img id="question" src="images/question.png" alt="" style="width: 500px;">
    </div>
    <div class="text-center">
        <a href="{{ route('question') }}">
            <img id="a" src="images/truth.png" alt="">
        </a>
        <img id="b" src="images/or.png" alt="">
        <a href="{{ route('question2') }}">
            <img id="c" src="images/dare.png" alt="">
        </a>
    </div>
</div>
@endauth
<script>
    function updateImageSize2() {
        const question = document.getElementById("question");
        const a = document.getElementById("a");
        const b = document.getElementById("b");
        const c = document.getElementById("c");
        if (window.innerWidth >= 980) {
            question.style.width = "500px";
            a.style.width = "200px";
            b.style.width = "200px";
            c.style.width = "200px";
        } else {
            question.style.width = "250px";
            a.style.width = "80px";
            b.style.width = "60px";
            c.style.width = "80px";
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
