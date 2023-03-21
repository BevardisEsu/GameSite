<!doctype html>
<html lang="en">
<head>
    <script src="../js/jquery-3.6.4.js" defer> </script>
    <script src="../js/snake.js" defer> </script>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="../css/snake.css">




    <title>{{__('messages.snakeTitle')}}</title>
</head>
<body>
<div class="container">
    <div class="header">
        <nav>
            <ul>
                <li><a href="/home">{{__('messages.home')}}</a></li>
                <li><a href="../../../public_html/files/CV.pdf" download>{{__('messages.portfolio')}}</a></li>
                <li><a href="/logout">{{__('login.logout')}}</a></li>
            </ul>
        </nav>
    </div>

<div class="content-large" onload="changeGiphy()">
    <img id="giphy-image" src="" alt="Random Giphy">

</div>
<div class="content-large">

    <h2>{{__('Snake')}}</h2><br>
{{__('messages.score')}}:<br>
<div id="Scoreboard">0</div>
<canvas id="board"></canvas>

<form method="POST" action="{{ route('scores.store') }}">
    @csrf
    <input type="hidden" name="score" value="0" id="scoreInput">
    <button type="submit" id="submitScoreButton" style="display: none;">{{__('messages.submitScore')}}</button>
</form>
</div>

<div class="content-large"><p>{{__('rules.snake')}}</p>

</div>
    <div class="footer"><h2>{{__('messages.footer')}}</h2></div>
</div>

</body>
</html>
