@extends('layouts.auth')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            {{ __('auth.reset_password') }}
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="email"
                               type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               name="email"
                               value="{{ old('email') }}"
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
                        <button type="submit" class="btn btn-block btn-primary">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </form>
                    <p class="mb-1 mt-1">
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
