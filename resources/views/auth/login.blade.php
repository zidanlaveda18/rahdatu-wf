<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/login-form-05/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/login-form-05/css/style.css') }}">
        <title>Login to Rahdatu</title>
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
                            <h3 class="text-uppercase">Login to <strong>Rahdatu Furniture</strong></h3>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group first">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" placeholder="your-email@gmail.com" id="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" placeholder="Your Password" id="password" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="d-sm-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-3 mb-sm-0">
                                    <span class="caption">Remember me</span>
                                    <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                    <div class="control__indicator"></div>
                                </label>
                                @if (Route::has('password.request'))
                                    <span class="ml-auto"><a href="{{ route('password.request') }}" class="forgot-pass">Forgot Password?</a></span>
                                @endif
                            </div>

                            <div class="d-sm-flex mb-5 align-items-center">
                                <a href="{{ route('register') }}" class="forgot-pass">click to registered</a>
                            </div>

                            <input type="submit" value="Log In" class="btn btn-block py-2 btn-primary">
                            
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