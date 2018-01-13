<!DOCTYPE html>
<html> 
 <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>instruction</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>Experiment Instruction</h1> 
    <button type="submit">
    <a href="{{ action('AnswerController@show', ['exp_id' => $exp_id, 'sub_id' => $sub_id])}}">Start!
    </a></button>
</body>
</html>



<style>
button {
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}
a{
    text-decoration:none;
}
</style>