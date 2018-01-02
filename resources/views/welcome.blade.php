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

        <h2>Please enter the subject name.</h2>
        <form action='subject' method="POST">
            {{ csrf_field() }}
            <input type="text" name="name" id='name'>
            <input type="submit"  value='submittttt'>
        </form>

        </div>
    </body>
</html>

<script>
    function goToMain(){

    }

</script>