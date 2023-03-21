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
        <h2>{{__('messages.wordleTitle')}}</h2>
        <!-- Žaidimo lentos struktūra -->
        <div class="message-container"></div>      <!-- Konteineris kuris laiko Message-->
    <div class="tile-container"></div>         <!-- Konteineris kuris laiko Tile/įvedamų raidžių kvadratas -->
    <div class="key-container"></div>          <!-- Konteineris kuris laiko klaviatūros raides -->

    </div>
        <div class="content-large"><p>{{__('rules.wordle')}}</p>

    </div>
    <div class="footer"><h2>{{__('messages.footer')}}</h2></div>


</body>

</html>
