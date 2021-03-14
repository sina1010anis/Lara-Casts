<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Channel</title>
</head>
<body class="body-register">
@if(session('msg'))
    <div class="successful-msg">
        {{session('msg')}}
    </div>
@endif

<div class="shit-form-register">
    <p>Event New Channel Form</p>
    <form action="{{route('admin.updateChannel' , $id->id)}}" method="post">
        @csrf
        @method('put')
        <br>
        <br>
        <div class="group-input">
            <span>Name Channel</span>
            <input class="all-input" type="text" name="name" placeholder="Type Name..." value="{{$id->name}}">
        </div>
        @error('name')
        <div class="err">{{$message}}</div>
        @enderror
        <div class="center-object">
            <button class="btn-register" type="submit">Edit Channel</button>
        </div>
    </form>
</div>
<script src="{{url('js/app.js')}}"></script>
</body>
</html>
