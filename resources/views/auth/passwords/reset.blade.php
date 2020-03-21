@extends('layouts.auth')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            {{ __('auth.reset_password') }}
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="input-group mb-3">
                        <input id="email"
                               type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               name="email"
                               value="{{ $email ?? old('email') }}"
                               autocomplete="email"
                               autofocus
                               required
                               placeholder="{{ __('auth.email') }}"
                        >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input id="password"
                               type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password"
                               autocomplete="new-password"
                               placeholder="{{ __('auth.new_password') }}"
                        >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="password-confirm"
                               type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password_confirmation"
                               autocomplete="new-password"
                               placeholder="{{ __('auth.confirm_new_password') }}"
                        >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('auth.reset_password') }}
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>


                </form>
                <p class="mb-1 mt-2">
                    @if (Route::has('register'))
                        <a  href="{{ route('register') }}">
                            {{ __('auth.new_membership') }}
                        </a>
                    @endif
                </p>
                <p class="mb-0">
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="text-center">{{ __('auth.membership') }}</a>
                    @endif
                </p>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection
