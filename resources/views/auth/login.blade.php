@extends('layout')

@section('content')
<main class="d-flex align-items-center justify-content-center" style="height: 70vh;">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-sm-6">
              <div class="card" style="background-color: rgba(108, 87, 236, 0.5); color: white;">
                  <div class="card-header text-center">Login</div>
                  <div class="card-body">

                      <form action="{{ route('login.post') }}" method="POST">
                          @csrf
                          <div class="form-group row mt-3">
                              <label for="email_address" class="col-md-3 col-form-label text-right">E-Mail Address</label>
                              <div class="col-md-9">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row mt-3 mb-3">
                              <label for="password" class="col-md-3 col-form-label text-right">Password</label>
                              <div class="col-md-9">
                                  <input type="password" id="password" class="form-control" name="password" required>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="col-md-12 p-2 d-grid">
                              <button type="submit" class="btn btn-light">
                                  Login
                              </button>
                          </div>
                      </form>

                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection
