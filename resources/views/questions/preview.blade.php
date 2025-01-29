@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Lesson: {{ $lesson }}</h2>

    <div class="row g-4">
        @foreach($questions as $question)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm bg-light">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Question:</h5>
                        <p class="card-text">{{ $question->question }}</p>

                        <div class="d-flex justify-content-between">
                            <p class="card-text text-muted">Time: {{ $question->time }} seconds</p>
                            <p class="card-text text-muted">Type: {{ $question->type }}</p>
                        </div>

                        @if(!empty($question->challenge))
                            <h6 class="card-title fw-bold mt-2">Challenge:</h6>
                            <p class="card-text">{{ $question->challenge }}</p>
                        @endif

                        <h6 class="card-title fw-bold mt-2">Answer:</h6>
                        <p class="card-text">{{ $question->answer }}</p>
                    </div>

                    <div class="card-footer bg-white border-top-0 d-flex justify-content-between align-items-center">
    <a href="{{ route('simulation', ['question' => $question->question, 'time' => $question->time, 'answer' => $question->answer]) }}" 
       class="btn btn-primary">
       Simulation
    </a>

    {{-- Tombol Download QR Code --}}
    <a href="{{ route('download.qrcode', ['question' => $question->question, 'time' => $question->time, 'answer' => $question->answer]) }}" 
       class="btn btn-secondary ms-2">
       Download QR Code
    </a>
</div>


                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
