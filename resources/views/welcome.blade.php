<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Experiment</title>

    </head>
    <body>
        <h1>Welcome to this experiment!</h1>

        <form action='subject' method="POST">
            {{ csrf_field() }}
            <h2>Please enter the subject name.</h2>
            <input type="text" name="sub_name" id='name'>
            <br>
            <h2>Please choose the experiment.</h2>
            @php ($array = range(1,5))
            @foreach ($array as $a)
            <input type="radio" name="experiment_id" value={{$a}}>{{'experiment ' . $a}}
            <br>
            @endforeach
            <input type="submit"  value='submittttt'>
        </form>

    </body>
</html>

<script>
    function goToMain(){

    }

</script>