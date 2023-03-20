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


    <title>{{__('messages.snakeTitle')}}</title>
</head>
<body>
<div class="container">
    <div class="header">
        <nav>
            <ul>
                <li><a href="/">{{__('')}}</a></li>
                <li><a href="">{{__('messages.rules')}}</a></li>
                <li><a href="#">{{__('messages.portfolio')}}'</a></li>
                <li><a href="/logout">{{__('login.logout')}}</a></li>
            </ul>
        </nav>
    </div>
</div>
<div class="content-large"><p>kairėj paragrafs</p>

</div>
<div class="content-large">

<h1> {{__('Snake')}}</h1><br>
<h2>{{__('messages.score')}}:</h2><br>
<div id="Scoreboard"><h2>0</h2></div>
<br>
<canvas id="board"></canvas>

<form method="POST" action="{{ route('scores.store') }}">
    @csrf
    <input type="hidden" name="score" value="0" id="scoreInput">
    <button type="submit" id="submitScoreButton" style="display: none;">{{__('messages.submitScore')}}</button>
</form>


<div class="content-large"><p>dešinėj paragrafs</p>

</div>
    <div class="footer"><h2>{{__('messages.footer')}}</h2></div>
</div>
</body>
</html>
