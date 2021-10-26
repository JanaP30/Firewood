@extends('layouts.app')

@section('content')
<div class="container" style="min-height: calc(100vh - 200px); display: flex; justify-content: center;">

    <div class="row w-100 justify-content-center">
        <div class="col-12 col-md-6 d-flex align-items-center">
            <div style="max-width: 100%;" class="card">
                <div class="card-header">
                    {{ __('Log in') }}
                </div>
                <div class="card-body">
                    <form novalidate action="#" id="login-form">
                        <div class="row">
                            <p class="pw-text hide">Pw requirements: Your password must contain at least 8 characters, one numeric character, one special character, one uppercase letter and one lowercase letter.</p>
                            <div class="col-12 col-lg-12 mt-4">
                                    <label for="email" class="#">{{ __('E-Mail Address*') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    <span class="error-msg hide" id="email-error">Email is not valid</span>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="col-12 col-lg-12 mt-4">
                                <label for="password" class="">{{ __('Password*') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <span class="error-msg hide" id="password-error">Password is not valid</span>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                            <div class="col-12 mt-4 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-form">
                                    {{ __('Log In') }}
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
