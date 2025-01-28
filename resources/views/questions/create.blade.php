@extends('layout')
  
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="d-flex justify-content-between align-items-end">
                <img src="images/input.png" alt="" style="width: 150px; height: 60px; margin-bottom: -20px;">
                <img src="images/truth.png" alt="" style="width: 200px;">
                <img src="images/logoDashboard.png" alt="" style="width: 100px; height: 60px;">
            </div>
            <div class="card" style="background-color:  rgba(108, 87, 236, 0); color: black; border: none;">
                    <form action="{{ route('question.post') }}" method="POST">
                    @csrf
                        <div style="max-height: 300px; overflow-y: auto;">
                            <div class="container-fluid">
                            <div class="container-fluid">
    @for ($i = 1; $i <= 10; $i++)
        <div class="form-group row p-3 mb-3" style="border-radius: 20px; border: 5px solid #6e9aee; background-color: lightgrey;">
            <label for="question{{ $i }}" class="col-md-2 col-form-label text-right">Question {{ $i }}</label>
            <div class="col-md-10 mb-1">
                <input type="text" id="question{{ $i }}" class="form-control" name="questions[]" required autofocus>
            </div>
            <label for="time{{ $i }}" class="col-md-2 col-form-label text-right">Time</label>
            <div class="col-md-10 mb-1">
                <input type="number" id="time{{ $i }}" class="form-control" name="times[]" required autofocus>
            </div>
            <label for="answer{{ $i }}" class="col-md-2 col-form-label text-right">Answer</label>
            <div class="col-md-10 mb-1">
                <input type="text" id="answer{{ $i }}" class="form-control" name="answers[]" required autofocus>
            </div>
        </div>
    @endfor
</div>

<!-- Input tersembunyi untuk menyimpan user_id dan type -->
<input class="d-none" name="type" value="1">
<input class="d-none" name="user" value="{{ auth()->user()->id }}">

                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 mt-1 p-3 d-grid">
                            <button type="submit" class="btn btn-primary" style="background-color: #6c57ec; border-color: #6c57ec;">Submit</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection