@extends('layout')
  
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="d-flex justify-content-evenly align-items-end">
                <img src="images/logoDashboard.png" alt="" style="width: 200px; height: 120px;">
            </div>
            <div id="showQuestions" class="row g-4">
    @foreach($questions as $question)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <!-- Konten Card -->
                <div class="card-body">
                    <h5 class="card-title fw-bold">Question:</h5>
                    <p class="card-text">{{ $question->question }}</p>

                    <div class="d-flex justify-content-between">
                        <p class="card-text text-muted">Time: {{ $question->time }} minutes</p>
                        <p class="card-text text-muted">Type: {{ $question->type }}</p>
                    </div>

                    <h6 class="card-title fw-bold mt-2">Challenge:</h6>
                    <p class="card-text">{{ $question->challenge }}</p>

                    <h6 class="card-title fw-bold mt-2">Answer:</h6>
                    <p class="card-text">{{ $question->answer }}</p>
                </div>

                <!-- Footer Card -->
                <div class="card-footer bg-white border-top-0">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <h6 class="card-title fw-bold mt-2">User ID: {{ $question->user }}</h6>
                        </div>
                        @can('admin')
                            <div>
                                <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-sm btn-warning">
                                    Edit
                                </a>
                                <form action="{{ route('questions.destroy', $question->id) }}" method="POST" style="display: inline" onsubmit="return confirm('Do you really want to delete this question?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

        </div>
    </div>
@endsection