// TODO Reikia score sistemos, kad kai paemi valgį, tau priskaičiuoja tašką vieną

let Scoreboard =0

let failEatText = 'Tried eating yourself, huh? anyways, your score is:'
let failtext = 'Congratulations, you failed, your score is:'
//board
const blockSize = 25;
const rows = 20;
const cols = 20;
let board;
let context;

//snake head

let snakeX = blockSize * 5;
let snakeY = blockSize * 5;

let velocityX = 0;
let velocityY=0 ;

let snakeBody = []

//food
let foodX;
let foodY;


let gameOver = false;

window.onload=function (){
    board=document.getElementById("board");
    board.height = rows * blockSize;
    board.width = cols * blockSize;
    context = board.getContext("2d");

    placeFood();
    document.addEventListener('keyup',changeDirection);
    setInterval(update, 1000/10); //Atnaujina Canvas 10 kart per sekundę
}
function update(){
    if (gameOver){  //Jei baigiasi žaidimas, nebereikia, kad toliau updeitintų canvas
        return;
    }

    context.fillStyle="black";
    context.fillRect(0,0,board.width,board.height);

    //food placement
    context.fillStyle="red";
    context.fillRect(foodX,foodY,blockSize,blockSize)

    if (snakeX === foodX && snakeY === foodY){  //Patikrinu ar suvalgo maistą gyvatė (Jei jie viename kvadrate tai suvalgo)
        snakeBody.push([foodX, foodY])
        placeFood();
        addScore();
    }

    for (let i = snakeBody.length-1;i >0; i--){
        snakeBody[i]= snakeBody[i-1];
    }
    if (snakeBody.length){
        snakeBody[0]=[snakeX,snakeY];
    }

    //Snake head startinė pozicija ir spalva
    context.fillStyle="lime"
    snakeX+=velocityX * blockSize;
    snakeY+=velocityY * blockSize;
    context.fillRect(snakeX,snakeY, blockSize, blockSize);
    for (let i =0; i <snakeBody.length; i++){
        context.fillRect(snakeBody[i][0],snakeBody[i][1],blockSize,blockSize)
    }
    // Jei pasibaigia žaidimas:

    if (snakeX <0 || snakeX >cols*blockSize ||snakeY <0 || snakeY > rows*blockSize) {
        gameOver = true;
        alert(failtext + Scoreboard)
    }

    for(let i =0; i< snakeBody.length; i++) {
        if (snakeX === snakeBody[i][0] && snakeY ===snakeBody[i][1]){
            gameOver = true;
            alert(failEatText + Scoreboard)
        }
    }

}




    // Judėjimo funkcija
function changeDirection(e){

    if (e.code === "ArrowUp" && velocityY !==1){
        velocityX = 0;
        velocityY = -1;
    }
    else if (e.code === "ArrowDown" && velocityY !== -1){
        velocityX = 0;
        velocityY = 1;
    }
    else if (e.code === "ArrowLeft" && velocityX !==1){
        velocityX = -1;
        velocityY = 0;
    }
    if (e.code === "ArrowRight" && velocityX !== -1){
        velocityX = 1;
        velocityY = 0;
    }
}

function addScore(){
    Scoreboard+=1;
    document.getElementById('Scoreboard').innerText=Scoreboard;
}


 // Funkcija kuri padės gyvatės maistą random vietoje
function placeFood() {
    foodX = Math.floor(Math.random() * cols) * blockSize; //Random X vietos generacija
    foodY = Math.floor(Math.random() * cols) * blockSize; //Random Y vietoj generacija
}
