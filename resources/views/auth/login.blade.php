@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row  justify-content-center">
        <div class="col-md-9 mx-auto">
            <div class="box_lo">
                <div class="login_logo" align="center">
                    <h1 class="logo">推しとお金と。</h1>
                </div>
                <br><br>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row d-flex align-items-center justify-content-center">
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-group row d-flex align-items-center justify-content-center">
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div><br>
                    <div class="form-group row d-flex align-items-center justify-content-center">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('messages.Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group  mb-0 d-flex align-items-center justify-content-center">
                        <button type="submit" class="btn btn-outline-dark bg-{color}">
                            {{ __('messages.Login') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
