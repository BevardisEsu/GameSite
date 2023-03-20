<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/Wordle.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="../js/jquery-3.6.4.js" defer> </script>
    <script src="../js/Wordle.js" defer> </script>
    <title>{{__('messages.wordleTitle')}}</title>
</head>
<body>

<h1> Wordle!</h1>

<!-- Žaidimo lentos struktūra -->
<div id="game-container">
    <div class="message-container"></div>      <!-- Konteineris kuris laiko Message-->
    <div class="tile-container"></div>         <!-- Konteineris kuris laiko Tile/įvedamų raidžių kvadratas -->
    <div class="key-container"></div>          <!-- Konteineris kuris laiko klaviatūros raides -->
</div>
</body>

</html>
