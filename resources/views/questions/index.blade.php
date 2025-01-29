@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div id="showQuestions" class="row g-4">
                @foreach($questions as $lesson => $lessonQuestions)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm">
                            <!-- Konten Card -->
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Lesson: {{ $lesson }}</h5>

                                <!-- Menampilkan preview dari soal pertama di lesson tersebut -->
                                <p class="card-text">{{ $lessonQuestions->first()->question }}</p>

                                <div class="d-flex justify-content-between">
                                    <p class="card-text text-muted">Time: {{ $lessonQuestions->first()->time }} minutes</p>
                                    <p class="card-text text-muted">Type: {{ $lessonQuestions->first()->type }}</p>
                                </div>
                            </div>

                            <!-- Footer Card -->
                            <div class="card-footer bg-white border-top-0">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex">
                                        <h6 class="card-title fw-bold mt-2">User ID: {{ $lessonQuestions->first()->user }}</h6>
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Preview -->
                            <div class="card-footer bg-white border-top-0">
                                <a href="{{ route('preview', ['lesson' => $lesson]) }}" class="btn btn-primary">Detail</a>
                                <!-- Tombol Print QR Code -->
                                <div class="card-footer bg-white border-top-0">
                                <a href="{{ route('print.qrcode', ['lesson' => $lesson]) }}" class="btn btn-warning">
    Download QR Codes
</a>

                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
