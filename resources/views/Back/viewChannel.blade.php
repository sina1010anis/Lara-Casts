<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Channel</title>
</head>
<body class="body-register">
@if(session('msg'))
    <div class="successful-msg">
        {{session('msg')}}
    </div>
@endif

<div class="shit-form-register">
    <p>List Channel All</p>
    <br>
    <br>
    <div class="ListItem">
        @foreach($ListChannels as $ListChannel)
            <div class="itemListItem">
                    <span class="name-itemListItem">
                        <?php
                            $class = new \App\Repository\methodChannel();
                            $class->editNameChannel($ListChannel->name);
                        ?>
                    </span>
                    <a href="{{route('admin.editChannel' , ['id' => $ListChannel->slug])}}" class="click-itemListItem">
                        Edit Channel
                    </a>
            </div>
        @endforeach
    </div>
</div>
<script src="{{url('js/app.js')}}"></script>
</body>
</html>
