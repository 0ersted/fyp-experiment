<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>main experiment</title>
</head>
<body>
    @switch($exp_id)
        @case(1)
            <h1 class="text-center">Please Listen to the audio and choose </h1>
            <div class="container">
                <div class="row">
                @php  ($emotions = array("happy", "sad", "angry", "fear"))
                @foreach ($emotions as $emotion)
                <div class="col-md-6">
                    <form action="{{ '/exp/' . $exp_id. '/subject/' .$sub_id. '/audio/' .$audio->id. '/' .$emotion }}" 
                    method="POST" >
                        {{ csrf_field() }}
                        <button type="submit" name=$emotion."Btn" value=$emotion class="btn-link center-block">
                        <img src="{{ asset('images/' .$emotion. '.jpeg') }}"  alt=$emotion height="250" width="250">
                        </button>
                    </form>
                </div>
                @endforeach
                </div>
                <div class="row text-center">
                    <p>Subject: {{$sub_id}} </p>
                    <p>Audio: {{$audio->id}}</p>
                <audio class="center-block" controls="controls">
                    <source src="{{ asset('audios/' .$audio->name. '.mp3') }}" type="audio/mp3" />
                </audio>
                    <a href="/">Back to main page and finish the expirement</a>
                </div>
            </div>
        @break
        @case(2)
            <h1 class="text-center">Please Listen to the audio and choose </h1>
            <div class="container">
                <div class="row">
                @php ($tones = array('declarative' ,'questionary'))
                @foreach ($tones as $tone)
                    <div class="col-md-6">
                        <form action="{{ '/exp/' . $exp_id. '/subject/' .$sub_id. '/audio/' .$audio->id. '/' .$tone}}" 
                        method="POST" >
                            {{ csrf_field() }}
                            <button type="submit" name=$tone."Btn" value=$tone class="btn-link center-block">
                            <img src="{{ asset('images/' .$tone. '.jpeg') }}"  alt=$tone height="250" width="250">
                            </button>
                        </form>
                    </div>
                @endforeach
                </div>
                <div class="row text-center">
                    <p>Subject: {{$sub_id}} </p>
                    <p>Audio: {{$audio->id}}</p>
                    <audio class="center-block" controls="controls">
                        <source src="{{ asset('audios/' .$audio->name. '.mp3') }}" type="audio/mp3" />
                    </audio>
                    <a href="/">Back to main page and finish the expirement</a>
                </div>
            </div>
        @break
        @case(3)
            <h1 class="text-center">Please Listen to the audio and choose </h1>
            <div class="container">
                <div class="row">
                @php ($emotions = array('calm', 'happy', 'sad'))
                @foreach ($emotions as $emotion)
                    <div id = "box3" class="col-md-4" >
                        <form action="{{ '/exp/' . $exp_id. '/subject/' .$sub_id. '/audio/' .$audio->id. '/' .$emotion}}"
                        method="post">
                            {{ csrf_field() }}
                            <button type="submit" name=$emotion."Btn" value=$emotion class="btn-link center-block">
                            {{$emotion}} </button>
                        </form>
                    </div>
                @endforeach
                </div>
                <br>
                <div class="row text-center">
                    <p>Subject: {{$sub_id}} </p>
                    <p>Audio: {{$audio->id}}</p>
                <audio class="center-block" controls="controls">
                    <source src="{{ asset('audios/' .$audio->name. '.mp3') }}" type="audio/mp3" />
                </audio>
                    <a href="/">Back to main page and finish the expirement</a>
                </div>
            </div>
            <style>
            #box3{
                width: 300px;
                border-style: dashed;
                padding: 25px;
                margin: 25px;
            }
            </style>
        @break
        @case(4)
        @break
        @case(5)
        @break
        @default
    @endswitch

    
</body>
</html>
