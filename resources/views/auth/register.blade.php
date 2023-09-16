@extends('layouts.master')

@section('title', 'Sign Up')
@section('content')
<div class="container d-flex flex-column mt-5">
    <div class="row">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
            <div class="d-table-cell align-middle">
                <div class="text-center mt-4">
                    <h2 class="fw-bold">À La Mode</h2>
                    <p class="fs-6">
                        Sign up an account and purchase whichever you like.
                    </p>
                </div>
                <div class="card border-0" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                    <div class="card-body">
                        <div class="m-sm-4">
                            <div class="text-center">
                                <img src="{{ asset('img/alamode_nav_logo.png') }}" alt="Charles Hall"
                                     class="img-fluid" width="132" height="132" />
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control rounded-0 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('Email') }}</label>
                                    <input id="email" type="email" class="form-control rounded-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">{{ __('Address') }}</label>
                                    <textarea class="form-control rounded-0 @error('address') is-invalid @enderror" name="address" id="address" cols="30" rows="3" required>{{ old('address') }}</textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">{{ __('Phone Number') }}</label>
                                    <input id="phone_number" type="text" class="form-control rounded-0 @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control rounded-0 @error('password') is-invalid @enderror" name="password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control rounded-0" name="password_confirmation" required>
                                </div>

                                <div class="text-center mb-3">
                                    <button type="submit" class="btn btn-outline-dark rounded-0">
                                        {{ __('Register') }} <i class="fa-solid fa-right-to-bracket"></i>
                                    </button>
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
