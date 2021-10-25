@extends('layouts.app')

@section('content')
<div class="container" style="min-height: calc(100vh - 200px); display: flex; justify-content: center;">

    <div class="row w-100 justify-content-center">
        <div class="col-12 col-md-6 d-flex align-items-center">
            <div style="max-width: 100%;" class="card">
                <div class="card-header">
                    {{ __('Register') }}
                </div>
                <div class="card-body">
                    <form novalidate action="#" id="register-form">
                        <div class="row">
                            <p class="pw-text hide">Pw requirements: Your password must contain at least 8 characters, one numeric character, one special character, one uppercase letter and one lowercase letter.</p>
                            <div class="col-12 col-lg-6 mt-4">
                                <label for="name" class="">{{ __('Name*') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" >
                                <span class="error-msg hide" id="name-error">Name is not valid</span>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-6 mt-4">
                                    <label for="email" class="#">{{ __('E-Mail Address*') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    <span class="error-msg hide" id="email-error">Email is not valid</span>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="col-12 col-lg-6 mt-4">
                                <label for="password" class="">{{ __('Password*') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <span class="error-msg hide" id="password-error">Password is not valid</span>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-6 mt-4">
                                <label for="password-confirm" class="">{{ __('Confirm Password*') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <span class="error-msg hide" id="confirm-password-error">Password confirmation does not match</span>
                            </div>
                            <div class="col-12 mt-4 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-form">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    <!-- end boot -->

    <!--<div class="row justify-content-center">
        <div class="col-md-12">
             <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form novalidate id="register-form" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">

                            <label for="name" class="">{{ __('Name') }}</label>

                            <div class="col-md-12 ">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <span class="error-msg d-none" id="confirm-email-error">Email is not valid</span>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <span class="error-msg d-none" id="confirm-password-error">Password confirmation does not match</span>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 mt-4 offset-md-4">
                                <button type="submit" class="btn btn-primary" >
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>-->

