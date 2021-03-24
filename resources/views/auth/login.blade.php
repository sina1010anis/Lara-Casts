<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LogIn</title>
    {!! htmlScriptTagJsApi() !!}
</head>
<body class="body-register">
<div class="shit-form-register">
    <p>Event Login Form</p>
    <form action="{{route('login')}}" method="post">
        @csrf
        <br>
        <br>
        <div class="group-input">
            <span>Email </span>
            <input style="margin: -20px 28px;" class="all-input"  type="email" name="email" placeholder="Email" value="{{old('email')}}">
        </div>
        @error('email')
        <div class="err">{{$message}}</div>
        @enderror
        <div class="group-input">
            <span>Password</span>
            <input style="margin: -20px 5px;" class="all-input" type="password" name="password" placeholder="Password">
        </div>
        @error('password')
        <div class="err">{{$message}}</div>
        @enderror

        <div class="center-object">
            <button class="btn-register" type="submit">Login</button>
        </div>
    </form>
</div>
<script src="{{url('js/app.js')}}"></script>
</body>
</html>
