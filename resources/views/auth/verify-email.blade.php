<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/login-form-05/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/login-form-05/css/style.css') }}">
    <title>Email Verification</title>
</head>
<body>

<div class="d-md-flex half">
    <div class="bg" style="background-image: url('{{ asset('/login-form-05/images/bg_1.jpg') }}');"></div>
    <div class="contents">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="form-block mx-auto">
                        <div class="text-center mb-5">
                            <h3 class="text-uppercase">Email Verification</h3>
                            <p>
                                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                            </p>
                        </div>

                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success" role="alert">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif

                        <!-- Form to Resend Verification Link -->
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="btn btn-block py-2 btn-primary">
                                {{ __('Resend Verification Email') }}
                            </button>
                        </form>

                        <!-- Logout Button -->
                        <form method="POST" action="{{ route('logout') }}" class="mt-3">
                            @csrf
                            <button type="submit" class="btn btn-block py-2 btn-secondary">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('/login-form-05/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('/login-form-05/js/popper.min.js') }}"></script>
<script src="{{ asset('/login-form-05/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/login-form-05/js/main.js') }}"></script>
</body>
</html>
