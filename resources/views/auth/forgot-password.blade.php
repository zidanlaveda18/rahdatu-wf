<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/login-form-05/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/login-form-05/css/style.css') }}">
    <title>Forgot Password</title>
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
                            <h3 class="text-uppercase">Forgot Your Password?</h3>
                            <p>{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>
                        </div>

                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            
                            <!-- Email Address Field -->
                            <div class="form-group first">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="your-email@gmail.com" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <input type="submit" value="Send Password Reset Link" class="btn btn-block py-2 btn-primary">
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
