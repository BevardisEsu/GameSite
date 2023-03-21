

let Scoreboard =0   // Setting start scoreboard for 0

let game_id = 1;    // Setting game id hardcoded

let failEatText = 'Tried eating yourself, huh? anyways, your score is:' //setting for message container if snake bumps in to wall
let failtext = 'Congratulations, you failed, your score is:'            //setting for message container if snake eats itself
//board parameters
const blockSize = 25;   //
const rows = 20;
const cols = 20;
let board;
let context;

//snake head parameters

let snakeX = blockSize * 5;
let snakeY = blockSize * 5;

let velocityX = 0;
let velocityY=0 ;

let snakeBody = []

//food variables
let foodX;
let foodY;


let gameOver = false;   // setting game for start

window.onload=function (){      //when page is loaded, it will display onload function, wich will load everything inside it
    board=document.getElementById("board");     //Takes canvas out of html document
    board.height = rows * blockSize;    //setting board height
    board.width = cols * blockSize;     // setting board width
    context = board.getContext("2d");     //enables to draw on a board with snake

    placeFood();
    document.addEventListener('keyup',changeDirection);
    setInterval(update, 1000/10); //Refreshes canvas 10 times per second
    changeGiphy()   //uploads gipfy
}
function update(){  //Function that stops updating canvas if game is over
    if (gameOver){
        return;
    }

    context.fillStyle="black";  //The filling of the board
    context.fillRect(0,0,board.width,board.height);


    context.fillStyle="red";    // Fills food square with red square
    context.fillRect(foodX,foodY,blockSize,blockSize)

    if (snakeX === foodX && snakeY === foodY){  //Check if snake eats food, if snake and food coordinates meets up, then it's eaten
        snakeBody.push([foodX, foodY])  //Adds to snakes body by one square where food was
        placeFood();    //Places food in random location
        addScore();     // Adds to scoreboard +1
    }

    for (let i = snakeBody.length-1;i >0; i--){
        snakeBody[i]= snakeBody[i-1];
    }
    if (snakeBody.length){
        snakeBody[0]=[snakeX,snakeY];
    }


    context.fillStyle="lime"    //Places snakes first square in one spot at the canvas for game start
    snakeX+=velocityX * blockSize;      // Adds velocity in X axis
    snakeY+=velocityY * blockSize;      // Adds velocity in Y axis
    context.fillRect(snakeX,snakeY, blockSize, blockSize);
    for (let i =0; i <snakeBody.length; i++){
        context.fillRect(snakeBody[i][0],snakeBody[i][1],blockSize,blockSize)
    }


    if (snakeX <0 || snakeX >cols*blockSize ||snakeY <0 || snakeY > rows*blockSize) {    // If snake colides with wall, it triggers the end gaming
        gameOver = true;
        alert(failtext + Scoreboard)    //Alert pop ups
        sendScore() //sends score to php

    }

    for(let i =0; i< snakeBody.length; i++) {
        if (snakeX === snakeBody[i][0] && snakeY ===snakeBody[i][1]){       //if snake body colides with itself, it triggers the end game
            gameOver = true;
            alert(failEatText + Scoreboard)
            sendScore()

        }
    }

}




// Movement functionallity
function changeDirection(e){    // Moving function

    if (e.code === "ArrowUp" && velocityY !==1){    // Arrow up goes up
        velocityX = 0;  //it doesn't let to move inside body, so if you go up, you can't go down
        velocityY = -1; //Lets only to move up
    }
    else if (e.code === "ArrowDown" && velocityY !== -1){ // Arrow down goes down
        velocityX = 0;  // It doesn't let to move inside body, so fi you go down, u can't go up
        velocityY = 1;  // let's only to move down
    }
    else if (e.code === "ArrowLeft" && velocityX !==1){     // Arrow left goes left
        velocityX = -1;
        velocityY = 0;//It doesn't let to move inside body, so if you go left, you can't go right
    }
    if (e.code === "ArrowRight" && velocityX !== -1){       //Arrow right goes right
        velocityX = 1;  //Let's only to move right
        velocityY = 0;  //It doesn't let to move inside body, so if you go right, you can't go left
    }
}

function addScore(){    // Adds to score +1 whenever food is eaten
    Scoreboard+=1;
    document.getElementById('Scoreboard').innerText=Scoreboard; //Displays scoreboard changes in html
}

function placeFood() {  //Function that randomly places food in canvas
    foodX = Math.floor(Math.random() * cols) * blockSize; //Random X axis generation
    foodY = Math.floor(Math.random() * cols) * blockSize; //Random Y axis generation
}


// Get the CSRF token from the page's meta tags
var csrfToken = $('meta[name="csrf-token"]').attr('content');

// Send an AJAX request to the scores route in your Laravel application
function sendScore(){
    $.ajax({
        url: '/saveScore',
        type: 'POST',
        data: {
            score: Scoreboard,
            game_id,
            _token: csrfToken, // Include the CSRF token in the request body
        },
        success: function(response) {
            // Handle the response from the server
            console.log(response);
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.log(xhr.responseText);
        }
    });
}

var giphyArray = [  //random gipfys in array
    "https://media3.giphy.com/media/j0XiH9qn8HFd03pP8s/giphy.gif?cid=ecf05e47lx4udio8xkhm9s3ebwawkt94yhitczx34i29zae6&rid=giphy.gif&ct=g",
    "https://media2.giphy.com/media/UtuC8ZVwmWa5fmGW3v/giphy.gif?cid=ecf05e47lwit2hca2mu7cgibm0i9xfbdei9l7ls0ucz7a2f6&rid=giphy.gif&ct=g",
    "https://media3.giphy.com/media/pqn59DMS0KePu/giphy.gif?cid=ecf05e47y9posw63cf99t7viig8xm0l94bdmxv174nona0b6&rid=giphy.gif&ct=g",
    "https://media2.giphy.com/media/dbtDDSvWErdf2/giphy.gif?cid=ecf05e47y9posw63cf99t7viig8xm0l94bdmxv174nona0b6&rid=giphy.gif&ct=g",
    "https://media3.giphy.com/media/pqn59DMS0KePu/giphy.gif?cid=ecf05e47y9posw63cf99t7viig8xm0l94bdmxv174nona0b6&rid=giphy.gif&ct=g",
];
function changeGiphy() {        //Function to get random giphy
    var randomIndex = Math.floor(Math.random() * giphyArray.length);    //creates random index
    var giphyImage = document.getElementById("giphy-image");        //selects div from html
    giphyImage.src = giphyArray[randomIndex];   //sets div img src to random element from array
}

