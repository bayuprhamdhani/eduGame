@extends('layout')

@section('content')
@guest
<div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="text-center">
        <img id="logoImage" src="images/logoDashboard.png" alt="" style="margin-bottom: 35px;">
    </div>
    <div class="text-center">
        <a href="{{ route('registerUser') }}" id="buttonStart" class="btn btn-sm mb-1 text-white" style="background-color: #6c57ec; border-color: #6c57ec; color: white; border-radius: 30px; padding: 2px; font-size: 20px;">
            Get Started
        </a>
    </div>
</div>
@endguest

@auth

@endauth
<script>
    function updateImageSize() {
        const image = document.getElementById("logoImage");
        const start = document.getElementById("buttonStart");
        if (window.innerWidth >= 980) {
            image.style.width = "700px";
            start.style.width = "500px";
            start.style.padding = "15px";
        } else {
            image.style.width = "300px";
            start.style.width = "200px";
            start.style.padding = "2px";
        }
    }
    // Panggil saat halaman dimuat dan saat ukuran layar berubah
    window.addEventListener("load", () => {
        updateImageSize();
    });
    window.addEventListener("resize", () => {
        updateImageSize();
    });
</script>
@endsection
