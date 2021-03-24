<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    {!! htmlScriptTagJsApi() !!}
</head>
<body class="body-register">
<div class="shit-form-register">
    <p>Event Register Form</p>
    <form action="{{route('register')}}" method="post">
        @csrf
        <br>
        <br>
        <div class="group-input">
            <span>Name</span>
            <input class="name-input" type="text" name="name" placeholder="First Name" value="{{old('name')}}">
            <input class="name-input" type="text" name="L_name" placeholder="Last Name" value="{{old('L_name')}}">
        </div>
        @error('name')
            <div class="err">{{$message}}</div>
        @enderror
        @error('L_name')
        <div class="err">{{$message}}</div>
        @enderror
        <div class="group-input">
            <span>Company</span>
            <input class="all-input" type="text" name="company" placeholder="Company" value="{{old('company')}}">
        </div>
        @error('company')
        <div class="err">{{$message}}</div>
        @enderror
        <div class="group-input">
            <span>Email </span>
            <input style="margin: -20px 28px;" class="all-input"  type="email" name="email" placeholder="Email" value="{{old('email')}}">
        </div>
        @error('email')
        <div class="err">{{$message}}</div>
        @enderror
        <div class="group-input">
            <span>Password</span>
            <input style="margin: -20px 5px;" class="name-input" type="password" name="password" placeholder="Password">
            <input style="margin: -20px 51px;" class="name-input" type="password" name="password_confirmation" placeholder="Password Confirmation">
        </div>
        @error('password')
        <div class="err">{{$message}}</div>
        @enderror
        @error('password_confirmation')
        <div class="err">{{$message}}</div>
        @enderror
        {!! htmlFormSnippet() !!}
        @error('g-recaptcha-response')
        <div class="err">{{$message}}</div>
        @enderror
        <div class="center-object">
            <button class="btn-register" type="submit">Register</button>
        </div>
    </form>
    <hr>
    <br>
    <div class="center-object">
        <a href="{{route('/google-login')}}">
            <img class="img-google-logo" src="{{url('Data/Image/Index/Google-Logo.png')}}" alt="">
        </a>
    </div>
</div>
<script src="{{url('js/app.js')}}"></script>
</body>
</html>
