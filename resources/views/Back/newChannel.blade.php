<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Channel</title>
</head>
<body class="body-register">
@if(session('msg'))
    <div class="successful-msg">
        {{session('msg')}}
    </div>
@endif

<div class="shit-form-register">
    <p>Event New Channel Form</p>
    <form action="{{route('admin.new_channel_create')}}" method="post">
        @csrf
        <br>
        <br>
        <div class="group-input">
            <span>Name Channel</span>
            <input class="all-input" type="text" name="name" placeholder="Type Name..." value="{{old('name')}}">
        </div>
        <div class="group-input">
            <span>Body</span>
            <input class="all-input" type="text" name="body" placeholder="Type Text..." value="{{old('body')}}">
        </div>
        <div class="group-input">
            <span>Select Model Channel</span>
            <select id="select_channel_model" name="model" class=" view-channel-index-page view-select-index-page tw-text-grey-darker tw-text-sm tw-bg-grey-panel tw-rounded-full tw-px-5 tw-cursor-pointer" style="width: 92px;">
                <option value="code-review">Assistance</option>
                <option value="eloquent">Eloquent</option>
                <option value="envoyer">Envoyer</option>
                <option value="site-improvements">Feedback</option>
                <option value="forge">Forge</option>
                <option value="general-discussion">General</option>
                <option value="guides">Guides</option>
                <option value="javascript">JavaScript</option>
                <option value="laravel">Laravel</option>
                <option value="livewire">Livewire</option>
                <option value="lumen">Lumen</option>
                <option value="elixir">Mix</option>
                <option value="nova">Nova</option>
                <option value="requests">Requests</option>
                <option value="servers">Servers</option>
                <option value="spark">Spark</option>
                <option value="testing">Testing</option>
                <option value="tips">Tips</option>
                <option value="vapor">Vapor</option>
                <option value="vue">Vue</option>
            </select>
        </div>
        @error('name')
        <div class="err">{{$message}}</div>
        @enderror
        <div class="center-object">
            <button class="btn-register" type="submit">New Channel</button>
        </div>
    </form>
</div>
<script src="{{url('js/app.js')}}"></script>
</body>
</html>
