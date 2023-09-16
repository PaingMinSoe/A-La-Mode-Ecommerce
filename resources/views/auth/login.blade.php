@extends('layouts.master')

@section('title', 'Login')
@section('content')
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    <div class="text-center mt-4">
                        <h2 class="fw-bold">À La Mode</h2>
                        <p class="fs-6">
                            Sign in to your account.
                        </p>
                    </div>
                    <div class="card border-0" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <div class="text-center">
                                    <img src="{{ asset('img/alamode_nav_logo.png') }}" alt="Charles Hall"
                                         class="img-fluid" width="132" height="132" />
                                </div>
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control rounded-0 @error('email') is-invalid @enderror"
                                               type="email" name="email" value="{{ old('email') }}" required
                                               autocomplete="email" autofocus placeholder="Enter your email" />
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control rounded-0 @error('password') is-invalid @enderror"
                                               type="password" name="password" required autocomplete="current-password"
                                               placeholder="Enter your password" />
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                    <div class="text-center mb-3">
                                        <button type="submit" class="btn btn-outline-dark rounded-0">Sign in <i class="fa-solid fa-right-to-bracket"></i></button>
                                    </div>
                                    <div class="text-center mb-3">
                                        <a href="{{ route('register') }}" class="link-dark text-decoration-underline">Doesn't have an account? Sign up here.</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
