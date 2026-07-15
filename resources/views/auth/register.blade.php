@extends('layouts.auth')

@section('content')

      <!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <div class="bg-image" style="background-image: url('{{ asset('media/photos/photo22@2x.jpg') }}');">
          <div class="row g-0 bg-primary-op">
            <!-- Main Section -->
            <div class="hero-static col-md-6 d-flex align-items-center bg-body-extra-light">
              <div class="p-3 w-100">
                <!-- Header -->
                <div class="mb-3 text-center">
                  <a class="link-fx fw-bold fs-1" href="{{ route('login') }}">
                    <span class="text-dark">Dash</span><span class="text-primary">mix</span>
                  </a>
                  <p class="text-uppercase fw-bold fs-sm text-muted">Sign Up</p>
                </div>
                <!-- END Header -->

                <!-- Sign In Form -->
                <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                <div class="row g-0 justify-content-center">
                  <div class="col-sm-8 col-xl-6">

                    <form class="js-validation-signup" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="py-3">
                            <div class="mb-4">
                                <input type="text" class="form-control form-control-lg form-control-alt @error('name') is-invalid @enderror" id="name" name="name" placeholder="Username" value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                            
                            </div>
                            <div class="mb-4">
                                <input type="email" class="form-control form-control-lg form-control-alt @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <input type="password" class="form-control form-control-lg form-control-alt @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <input type="password" class="form-control form-control-lg form-control-alt" id="password-confirm" name="password_confirmation" placeholder="Password Confirm">
                            </div>
                            <div class="mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="signup-terms" name="signup-terms">
                                    <label class="form-check-label" for="signup-terms">Concordo com os Termos e Condições.</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn w-100 btn-lg btn-hero btn-primary">
                                <i class="fa fa-fw fa-plus opacity-50 me-1"></i> Cadastrar
                            </button>
                            <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1" href="{{ route('login') }}">
                                    <i class="fa fa-sign-in-alt opacity-50 me-1"></i> Login
                                </a>
                                <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1" href="#" data-bs-toggle="modal" data-bs-target="#modal-terms">
                                    <i class="fa fa-book opacity-50 me-1"></i> Leia os Termos
                                </a>
                            </p>
                        </div>
                    </form>

                  </div>
                </div>
                <!-- END Sign In Form -->
              </div>
            </div>
            <!-- END Main Section -->

            <!-- Meta Info Section -->
            <div class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center">
              <div class="p-3">
                <p class="display-4 fw-bold text-white mb-3">
                  Welcome to the future
                </p>
                <p class="fs-lg fw-semibold text-white-75 mb-0">
                  Copyright &copy; <span data-toggle="year-copy"></span>
                </p>
              </div>
            </div>
            <!-- END Meta Info Section -->
          </div>
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->   


@endsection
