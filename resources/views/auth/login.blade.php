@extends('layouts.app')

@section('content')

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title></title>
</head>

<body>
    
    <div class="d-none d-md-block ball login bg-danger bg-gradient position-absolute rounded-circle"></div>
    <div class="container login__form active">
        <div class="row vh-100 w-100 align-self-center">
            <div class="col-12 col-lg-6 col-xl-6 px-5">
                <div class="row vh-100">
                    <div class="row vh-100">
                        <div class="col align-self-center p-5 w-100">
                            <h3 class="fw-bolder">{{ __('Login') }}</h3>
                            <form method="POST" class="mt-5" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label text-md-end">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror text-indent shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label text-md-end">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror text-indent auth__password shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3" name="password" required autocomplete="current-password">


                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>

                                </div>

                                <div class="col text-center">
                                    <button type="submit" class="btn btn-outline-danger btn-lg rounded-pill mt-4 w-100">
                                        {{ __('Login') }}
                                    </button>

                                    <p class="fw-lighter fs-6">Don't have an account,
                                        <span class="btn btn-link" href="{{ route('register') }}">{{ __('Register') }}</span>
                                    </p>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-none d-lg-block col-lg-6 col-xl-6 p-5">
                <div class="row vh-100 p-5">
                    <div class="col align-self-center p-5 text-center">
                        <img src="{{ asset('images/login.png') }}" class="bounce" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @endsection