@extends('layout')

@section('content')
<div class="row justify-content-center">
<div class="col-md-9">
        <div class="container-fluid">
            <h2 class="text-center mb-4">Detail of Lesson: {{ $lesson }}</h2>

            <div class="card" style="background-color: rgba(108, 87, 236, 0); color: black; border: none;">
                <div style="max-height: 500px; overflow-y: auto; padding: 10px;">
                    <div class="row g-2">
                        @foreach($questions as $question)
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card h-100 shadow-sm bg-light" style="border-radius: 15px; border: 10px solid {{ $questions->first()->type == 2 ? '#fd7f7f' : '#6e9aee' }};">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">Question:</h5>
                                        <p class="card-text">{{ $question->question }}</p>

                                        <h6 class="card-title fw-bold mt-2">Answer:</h6>
                                        <p class="card-text">{{ $question->answer }}</p>

                                        @if(!empty($question->chalenge))
                                            <h6 class="card-title fw-bold mt-2">Challenge:</h6>
                                            <p class="card-text">{{ $question->chalenge }}</p>
                                        @endif

                                        <div class="d-flex justify-content-between">
                                            <p class="card-text text-muted">Time: {{ $question->time }} seconds</p>
                                        </div>
                                    </div>

                                    <div class="card-footer bg-white border-top-0 d-flex justify-content-between align-items-center">
                                        <a href="{{ route('simulation', ['question' => $question->question, 'time' => $question->time, 'answer' => $question->answer, 'chalenge' => $question->chalenge]) }}" 
                                        class="btn btn-warning">
                                        Simulation
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
