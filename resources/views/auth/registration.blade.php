@extends('layout')

@section('content')
<main class="d-flex align-items-center justify-content-center" style="height: 80vh;">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-6">
              <div class="card" style="background-color: rgba(108, 87, 236, 0.5); color: white;">
                  <div class="card-header text-center">Register</div>
                  <div class="card-body">

                      <form action="{{ route('registerUser.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="name" class="col-md-3 col-form-label text-right">Name</label>
                              <div class="col-md-9">
                                  <input type="text" id="name" class="form-control" name="name" required autofocus>
                                  @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row mt-3">
                              <label for="email_address" class="col-md-3 col-form-label text-right">E-Mail Address</label>
                              <div class="col-md-9">
                                  <input type="text" id="email_address" class="form-control" name="email" required>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row mt-3">
                              <label for="password" class="col-md-3 col-form-label text-right">Password</label>
                              <div class="col-md-9">
                                  <input type="password" id="password" class="form-control" name="password" required>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="col-md-12  mt-4 p-2 d-grid">
                              <button type="submit" class="btn btn-light">
                                  Register
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
