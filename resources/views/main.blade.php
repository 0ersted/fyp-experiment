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
                    <source src="{{ asset('audios/' .$audio->name. '.wav') }}" type="audio/wav" />
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
                        <source src="{{ asset('audios/' .$audio->name. '.wav') }}" type="audio/wav" />
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
                    <source src="{{ asset('audios/' .$audio->name. '.wav') }}" type="audio/wav" />
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
        <div class='container text-center'>
            <h1 class='text-center'>请选择音频对应的快乐语气的程度</h1>
            <div class='row' id='formBox'>
                <form action="{{ '/exp/' . $exp_id. '/subject/' .$sub_id. '/audio/' .$audio->id. '/happy' }}"
                    method="post">
                    {{ csrf_field() }}
                    <div class='col-md-2'>
                        <input type="radio" name="level" value="0">极弱
                    </div>
                    <div class='col-md-2'>
                        <input type="radio" name="level" value="1">较弱
                    </div>
                    <div class='col-md-2'>
                        <input type="radio" name="level" value="2">一般
                    </div>
                    <div class='col-md-2'>
                        <input type="radio" name="level" value="3">较强
                    </div>
                    <div class='col-md-2'>
                        <input type="radio" name="level" value="4">极强
                    </div>
                    <br>
                    <div class='text-center'>
                        <input type="submit" value="提交" id='submitBox'>
                    </div>
                </form>
            </div>
                <div class="row text-center">
                    <p>Subject: {{$sub_id}} </p>
                    <p>Audio: {{$audio->id}}</p>
                    <audio class="center-block" controls="controls">
                        <source src="{{ asset('audios/' .$audio->name. '.wav') }}" type="audio/wav" />
                    </audio>
                        <a href="/">Back to main page and finish the expirement</a>
                </div> 
            </div>
        @break
        @case(5)
        <div class='container text-center'>
            <h1 class='text-center'>请选择音频对应的悲伤语气的程度</h1>
            <div class='row' id='formBox'>
                <form action="{{ '/exp/' . $exp_id. '/subject/' .$sub_id. '/audio/' .$audio->id. '/sadness' }}"
                    method="post">
                    {{ csrf_field() }}
                    <div class='col-md-2'>
                        <input type="radio" name="level" value="0">极弱
                    </div>
                    <div class='col-md-2'>
                        <input type="radio" name="level" value="1">较弱
                    </div>
                    <div class='col-md-2'>
                        <input type="radio" name="level" value="2">一般
                    </div>
                    <div class='col-md-2'>
                        <input type="radio" name="level" value="3">较强
                    </div>
                    <div class='col-md-2'>
                        <input type="radio" name="level" value="4">极强
                    </div>
                    <br>
                    <div class=''>
                        <input type="submit" value="提交" id='submitBox'>
                    </div>
                </form>
            </div>
                <div class="row text-center">
                    <p>Subject: {{$sub_id}} </p>
                    <p>Audio: {{$audio->id}}</p>
                    <audio class="center-block" controls="controls">
                        <source src="{{ asset('audios/' .$audio->name. '.wav') }}" type="audio/wav" />
                    </audio>
                        <a href="/">Back to main page and finish the expirement</a>
                </div> 
            </div>
        @break
        @case(6)
        <div class='container text-center'>
            <h1 class='text-center'>请选择音频对应的陈述语气的程度</h1>
            <div class='row' id='formBox'>
                <form action="{{ '/exp/' . $exp_id. '/subject/' .$sub_id. '/audio/' .$audio->id. '/declarative' }}"
                    method="post">
                    {{ csrf_field() }}
                    <div class='col-md-2'>
                        <input type="radio" name="level" value="0">极弱
                    </div>
                    <div class='col-md-2'>
                        <input type="radio" name="level" value="1">较弱
                    </div>
                    <div class='col-md-2'>
                        <input type="radio" name="level" value="2">一般
                    </div>
                    <div class='col-md-2'>
                        <input type="radio" name="level" value="3">较强
                    </div>
                    <div class='col-md-2'>
                        <input type="radio" name="level" value="4">极强
                    </div>
                    <br>
                    <div class=''>
                        <input type="submit" value="提交" id='submitBox'>
                    </div>
                </form>
            </div>
                <div class="row text-center">
                    <p>Subject: {{$sub_id}} </p>
                    <p>Audio: {{$audio->id}}</p>
                    <audio class="center-block" controls="controls">
                        <source src="{{ asset('audios/' .$audio->name. '.wav') }}" type="audio/wav" />
                    </audio>
                        <a href="/">Back to main page and finish the expirement</a>
                </div> 
            </div>
        @break
        @case(7)
        <div class='container text-center'>
            <h1 class='text-center'>请选择音频对应的疑问语气的程度</h1>
            <div class='row'id='formBox'>
                <form action="{{ '/exp/' . $exp_id. '/subject/' .$sub_id. '/audio/' .$audio->id. '/questionary' }}"
                    method="post">
                    {{ csrf_field() }}
                    <div class='col-md-2'>
                        <input type="radio" name="level" value="0">极弱
                    </div>
                    <div class='col-md-2'>
                        <input type="radio" name="level" value="1">较弱
                    </div>
                    <div class='col-md-2'>
                        <input type="radio" name="level" value="2">一般
                    </div>
                    <div class='col-md-2'>
                        <input type="radio" name="level" value="3">较强
                    </div>
                    <div class='col-md-2'>
                        <input type="radio" name="level" value="4">极强
                    </div>
                    <br>
                    <div class=''>
                        <input type="submit" value="提交" id='submitBox'>
                    </div>
                </form>
            </div>
                <div class="row text-center">
                    <p>Subject: {{$sub_id}} </p>
                    <p>Audio: {{$audio->id}}</p>
                    <audio class="center-block" controls="controls">
                        <source src="{{ asset('audios/' .$audio->name. '.wav') }}" type="audio/wav" />
                    </audio>
                        <a href="/">Back to main page and finish the expirement</a>
                </div> 
            </div>
        @break
        @default
    @endswitch

        <style>
        #formBox{
            width: 1100px;
            border: 25px ;
            padding: 25px;
            margin: 25px;
        }
        #submitBox{
            width: 300px;
            padding: 25px;
            margin: 25px;
            position: relative;
        }
        </style>
    
</body>
</html>
