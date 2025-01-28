@extends('layout')

@section('content')
@guest
<div class="container d-flex flex-column justify-content-center align-items-center" style="">
    <div class="text-center mb-3">
        <img src="images/logoDashboard.png" alt="">
    </div>
    <div class="text-center">
        <a href="{{ route('registerUser') }}" class="btn btn-sm mb-1 text-white" style="background-color: #6c57ec; border-color: #6c57ec; color: white; border-radius: 30px; width: 200px; margin-left: -30px;">Get Started</a>
    </div>
</div>
@endguest
@auth
<div class="container d-flex flex-column justify-content-center align-items-center" style="">
    <div class="text-center mb-3">
        <img src="images/question.png" alt="" style="width: 350px;">
    </div>
    <div class="text-center">
        <a href="{{ route('question') }}">
            <img src="images/truth.png" alt="">
        </a>
        <img src="images/or.png" alt="">
        <a href="{{ route('question') }}">
            <img src="images/dare.png" alt="">
        </a>
    </div>

</div>
@endauth
@endsection