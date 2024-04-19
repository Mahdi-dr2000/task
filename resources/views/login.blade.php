<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form | CodingLab</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Login Form</span></div>
            <form method="POST" action="{{ url('login') }}">
                @csrf
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Email " name="email" required value="{{old('email')}}">
                    @error('email')
                        <div>{{ $message }}</div>
                    @enderror

                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="password" value="{{old('password')}}">
                    @error('password')
                        <div>{{ $message }}</div>
                    @enderror
                    @if(session('errorlogin'))
                      <div class="alert alert-danger">
                       {{session('errorlogin')}}

                      </div>
                    @endif
                </div>
                <div c ss="row button">
                    <input type="submit" value="Login">
                </div>
            </form>
        </div>
    </div>

</body>

</html>
