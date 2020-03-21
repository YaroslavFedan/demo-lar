@extends('layouts.auth')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            {{ __('auth.register') }}
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">{{ __('auth.new_membership') }}</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input id="name"
                               type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               name="name"
                               value="{{ old('name') }}"
                               autocomplete="name"
                               autofocus

                               placeholder="{{ __('auth.name') }}"
                        >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="input-group mb-3">
                        <input id="email"
                               type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               name="email"
                               value="{{ old('email') }}"
                               autocomplete="email"
                               autofocus

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
                               autocomplete="current-password"

                               placeholder="{{ __('auth.password') }}"
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
                               placeholder="{{ __('auth.confirm_password') }}"
                        >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="icheck-primary">
                                <input type="checkbox"
                                       id="agreeTerms"
                                       class="is-invalid"
                                       name="terms" {{ old('terms') ? 'checked' : '' }}>
                                <label for="agreeTerms" >
                                    {{ __('auth.agree') }} <a href="#">{{ __('auth.terms') }}</a>
                                </label>
                                @error('terms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4 mt-2 my-md-0">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('auth.register') }}
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="my-2">
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
