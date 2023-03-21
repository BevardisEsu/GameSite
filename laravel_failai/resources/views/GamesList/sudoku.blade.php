<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/sudoku.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="../js/jquery-3.6.4.js" defer> </script>

    <script src="../js/sudoku.js" defer></script>
    <title>{{__('messages.SudokuTitle')}}</title>
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
    <div class="title"> <h3>Sudoku</h3></div>

    <p>{{__('messages.errorCount')}}</p>
    <div id="errors"><h3>0</h3></div>
    <div id="board"></div>
    <br>
    <div id="digits"></div>
<button id="my-button">{{__('messages.submitScore')}}</button>
    <div class="message-container"></div>
        </div>


    <div class="content-large"><p>{{__('rules.sudoku')}}</p>  </div>
        <div class="footer"><h2>{{__('messages.footer')}}</h2></div>

</div>


</body>
</html>
