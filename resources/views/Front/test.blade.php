<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div id="app">
    <form action="" method="post" @submit.prevent="handleAxios">
        <input type="file" name="file" @change="handelImage">
        <br>
        <button type="submit">test</button>
    </form>
    <div class="test2"></div>
</div>
<script src="{{url('js/app.js')}}"></script>
</body>
</html>
