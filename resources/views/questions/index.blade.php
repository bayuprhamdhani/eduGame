@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="container-fluid">
                <h2 class="text-center mb-4">Question Data</h2>
                <div class="card" style="background-color: rgba(108, 87, 236, 0); color: black; border: none;">
                    <div style="max-height: 500px; overflow-y: auto; padding: 10px;">
                        <div id="showQuestions" class="row g-2">
                            @if($questions->isEmpty())
                                <div class="col-12 text-center" style="margin-top: 50px">
                                    <h1 id="a" style="font-size: 60px; color: #ff5733; font-family: 'Montserrat', sans-serif; text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);">
                                        No data available for questions.
                                    </h1>
                                    <h1 id="b" style="font-size: 40px; color: #ff5733; font-family: 'Montserrat', sans-serif; text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);">
                                        Back to Home Page and choose Truth or Dare
                                    </h1>
                                </div>
                            @else
                                @foreach($questions as $lesson => $lessonQuestions)
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="card h-100 shadow-sm" style="border-radius: 15px; 
                                        border: 10px solid {{ $lessonQuestions->first()->type == 2 ? '#fd7f7f' : '#6e9aee' }};">
                                            <!-- Konten Card -->
                                            <div class="card-body">
                                                <h1 class="card-title fw-bold text-center">Lesson: {{ $lesson }}</h1>
                                                <h5 class="card-text text-muted">
                                                    Type: 
                                                        @if($lessonQuestions->first()->type == 1)
                                                            Truth
                                                        @elseif($lessonQuestions->first()->type == 2)
                                                            Dare
                                                        @else
                                                            Unknown
                                                        @endif
                                                </h5>
                                                <!-- Menjumlahkan waktu dari semua soal pada lesson ini -->
                                                <h5 class="card-text text-muted">Time: {{ $lessonQuestions->sum('time') }} seconds</h5>
                                                <!-- Menampilkan preview dari soal pertama di lesson tersebut -->
                                                <p class="card-text">Created at : {{ $lessonQuestions->first()->created_at }}</p>
                                            </div>
                                            <!-- Tombol Preview -->
                                            <div class="card-footer bg-white border-top-0">
                                                <a href="{{ route('preview', ['lesson' => $lesson]) }}" class="btn" style="background-color: {{ $lessonQuestions->first()->type == 2 ? '#fd7f7f' : '#6e9aee' }}; color: {{ $lessonQuestions->first()->type == 2 ? 'white' : 'black' }};">Detail</a>
                                                <!-- Tombol untuk mengunduh ZIP yang berisi dua PDF -->
                                                <a href="{{ route('print.qrcode', ['lesson' => $lesson]) }}" class="btn btn-warning">Download Card</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function updateImageSize2() {
        const a = document.getElementById("a");
        const b = document.getElementById("b");
        if (window.innerWidth >= 980) {
            a.style.fontSize = "60px";
            b.style.fontSize = "40px";
        } else {
            a.style.fontSize = "35px";
            b.style.fontSize = "25px";
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
