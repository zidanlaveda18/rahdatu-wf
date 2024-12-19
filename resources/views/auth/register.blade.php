<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/login-form-05/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/login-form-05/css/style.css') }}">
    <title>Register to Rahdatu</title>
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
                            <h3 class="text-uppercase">Register to <strong>Rahdatu Furniture</strong></h3>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            
                            <!-- Name Field -->
                            <div class="form-group first">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="{{ old('name') }}" required autofocus autocomplete="name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <!-- Email Field -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="your-email@gmail.com" value="{{ old('email') }}" required autocomplete="username">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Phone Number Field -->
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Your Phone Number" value="{{ old('phone') }}" required autofocus autocomplete="phone">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Your Password" required autocomplete="new-password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> 

                            <!-- Login Redirect and Submit Button -->
                            <div class="d-sm-flex mb-5 align-items-center">
                                <a href="{{ route('login') }}" class="forgot-pass">Already registered?</a>
                            </div>
                            <input type="submit" value="Register" class="btn btn-block py-2 btn-primary">
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
