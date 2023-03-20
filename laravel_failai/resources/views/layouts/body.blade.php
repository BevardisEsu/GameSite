<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/body.css">
    <title>{{__('messages.home')}}</title>
</head>
<body>

<div
    class="container">
    <div class="header">

        <nav>
            <ul>
                <li><a href="/">{{__('messages.home')}}</a></li>
                <li><a href="">{{__('messages.rules')}}</a></li>
                <li><a href="#">{{__('messages.portfolio')}}'</a></li>
                <li><a href="/logout">{{__('login.logout')}}</a></li>
            </ul>
        </nav>
    </div>
        <div class="content-large"><p>Snake</p>
            <img src="https://png.pngtree.com/png-vector/20210112/ourlarge/pngtree-green-snake-game-logo-png-image_2715848.jpg" alt="foto" class="photo">
            <p>Times played:{{$userCountSnake}}<br></p>
            <p>Highest score:{{$highScoreSnake}}</p>
            <form action="/snake" method="get">
                <button type="submit">{{__('messages.playSnake')}}</button>
            </form>
        </div>
        <div class="content-large"><p>Wordle</p>
    <img src="https://cdn.theatlantic.com/thumbor/ywSwAEsEZdSatDtU2riiM7smYLc=/0x0:1952x1098/960x540/media/img/mt/2022/01/wordle-1/original.jpg" alt="foto" class="photo">
    <p>Times played:{{$userCountWordle}}<br></p>
    <p>Highest score:{{$highScoreWordle}}</p>
    <form action="/wordle" method="get">
        <button type="submit">{{__('messages.playWordle')}}</button>
    </form>
        </div>
        <div class="content-large"><p>Sudoku</p>
            <img src="https://c8.alamy.com/comp/P2A3RF/sudoku-vector-icon-isolated-on-transparent-background-sudoku-logo-concept-P2A3RF.jpg" alt="foto" class="photo">
            <p>Times played:{{$userCountSudoku}}<br></p>
            <p>Highest score:{{$highScoreSudoku}}</p>
            <form action="/sudoku" method="get">
                <button type="submit">{{__('messages.playSudoku')}}</button>
            </form>
        </div>
    <div class="footer"><h2>{{__('messages.footer')}}</h2></div>
</div>
</body>
</html>
