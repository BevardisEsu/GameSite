<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="../css/snake.css">
    <script src="../js/jquery-3.6.4.js" defer> </script>
    <script src="../js/snake.js" defer> </script>

    <title>Snake Project</title>
</head>
<body>

<h1> Snake</h1>
<h2>Score:</h2>
<div id="Scoreboard"><h2>0</h2></div>
<br>
<canvas id="board"></canvas>

<form method="POST" action="{{ route('scores.store') }}">
    @csrf
    <input type="hidden" name="score" value="0" id="scoreInput">
    <button type="submit" id="submitScoreButton" style="display: none;">Submit Score</button>
</form>


</body>
</html>
