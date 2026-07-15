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
                  <p class="text-uppercase fw-bold fs-sm text-muted">Sign In</p>
                </div>
                <!-- END Header -->

                <!-- Sign In Form -->
                <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                <div class="row g-0 justify-content-center">
                  <div class="col-sm-8 col-xl-6">

                  @session('status')
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ $value }}
                  </div>
                  @endsession

                    <form class="js-validation-reminder" action="{{ route('password.email') }}" method="POST">
                      @csrf
                      <div class="py-3 mb-4">
                        <input type="email" class="form-control form-control-lg form-control-alt @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email">
                        @error('email')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      <div class="text-center mb-4">
                        <button type="submit" class="btn w-100 btn-lg btn-hero btn-primary">
                          <i class="fa fa-fw fa-reply opacity-50 me-1"></i> Resetar senha
                        </button>
                        <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                          <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1" href="{{ route('login') }}">
                            <i class="fa fa-sign-in-alt opacity-50 me-1"></i> Login
                          </a>
                          <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1" href="{{ route('register') }}">
                            <i class="fa fa-plus opacity-50 me-1"></i> Criar conta
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