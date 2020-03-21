@extends('layouts.auth')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            {{ __('auth.email_verify') }}
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">

                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('auth.send_verification_link') }}
                    </div>
                @endif

                {{ __('auth.message_verification') }}
                {{ __('auth.message_receive_email') }}
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}" >
                    @csrf
                    <button type="submit" class="btn btn-block btn-primary  mt-2">{{ __('auth.btn_request_email') }}</button>.
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection
