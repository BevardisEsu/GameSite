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

    <h1>Sudoku</h1>
    <hr>
    <br>
    <p>{{__('messages.errorCount')}}</p>
    <div id="errors"><h2>0</h2></div>
    <div id="board"></div>
    <br>
    <div id="digits"></div>
    <br>
<button id="my-button">{{__('messages.submitScore')}}</button>


    <br>
    <div class="message-container"></div>

</html>
