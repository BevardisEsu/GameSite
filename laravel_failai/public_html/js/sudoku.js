let numSelected = null; //sets that no number is selected

const messageDisplay = document.querySelector('.message-container')

const game_id = 3;  //hardcoded game id
var csrfToken = $('meta[name="csrf-token"]').attr('content');  //takes csrf for jquerry

let Scoreboard = 0;     //scoreboard set to zeor

let board = [       //premade scalped sudoku board
    "--5-1489-",
    "84-97-5-1",
    "--12-5374",
    "2-6349---",
    "-1-8-792-",
    "5-912-4-8",
    "-5-4-26-3",
    "6-4-3-21-",
    "-2-56-7-9"]

let solution =      //solution board that is the solution
    [
        "735614892",
        "842973561",
        "961285374",
        "286349157",
        "413857926",
        "579126438",
        "157492683",
        "694738215",
        "328561749"]


window.onload = function (){    //when page is loaded it loads those functions
    setGame();
    changeGiphy();
}


// Sukuriami laukeliai kuriuose bus 1-9 skaiciai, juos bus galima naudoti žaidimui, kaip pasirinkimui
function setGame() {
    // Digits 1-9
    for (let i = 1; i <= 9; i++) {
        //<div id="1" class="number">1</div>
        let number = document.createElement('div');
        number.id = i
        number.innerText = i;
        number.addEventListener('click',selectNumber);
        number.classList.add('number');
        document.getElementById('digits').appendChild(number);
    }

    // Lentos sukūrimas

    for (let x=0;x<9;x++){
        for (let z=0;z<9;z++){
            let tile = document.createElement('div');
            tile.id=x.toString() + '-'+z.toString();
            if(board[x][z] !== '-'){ // If tile has '-' in it, it converts to empty tile
                tile.innerText = board[x][z];
                tile.classList.add('tile-start')
            }
            if (x===2 || x===5){
                tile.classList.add('horizontal-line');
            }
            if (z===2 || z===5){
                tile.classList.add('vetical-line');
            }
            tile.addEventListener('click',selectTile);
            tile.classList.add('tile');
            document.getElementById('board').append(tile);
        }
    }
}

function selectNumber(){    //function to select number
    if (numSelected != null){
        numSelected.classList.remove('number-selected');
    }
    numSelected = this;
    numSelected.classList.add('number-selected')
}

function selectTile(){      //function to select tile
    if (numSelected){
        if (this.innerText !== ''){
            return;
        }
        let coords = this.id.split('-');
        let x = parseInt(coords[0]);
        let z = parseInt(coords[1]);

        if (solution[x][z]=== numSelected.id){
            this.innerText = numSelected.id;
        }
        else{
            Scoreboard +=1;
            document.getElementById('errors').innerText=Scoreboard; //triggers error and displays ajajajai
            showMessage('ajjajai')
        }
    }
}


const showMessage = (message) => {  //show message, same function as in wordle
    const messageElement = document.createElement('p') // Sukuriama žinutė su <p> tagu
    messageElement.textContent = message // Nustatoma kokia žinutė bus atvaizduojama
    messageDisplay.append(messageElement) // Atvaizduojama nustatyta žinutė
    setTimeout(() => messageDisplay.removeChild(messageElement), 2500) // Nustatomas kokį laiko tarpą žinutė bus rodoma
}


function sendScore(){   //ajax function for sending score to php
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
    })}

// Get a reference to the button element
const button = document.getElementById('my-button');

// Add an event listener for the 'click' event
button.addEventListener('click', () => {
    alert('You clicked the button!');
    sendScore()
});


            // Neveikia tikrinimas




function checkSolution(board, solution) {
    // Check if the board and solution have the same dimensions
    if (board.length !== solution.length || board[0].length !== solution[0].length) {
        return false;
    }

    // Check each row
    for (let i = 0; i < board.length; i++) {
        if (board[i].indexOf('-') !== -1) {
            continue; // Skip rows that are not complete
        }
        if (board[i] !== solution[i]) {
            return false; // Board row doesn't match solution row
        }
    }

    // Check each column
    for (let j = 0; j < board[0].length; j++) {
        let column = '';
        for (let i = 0; i < board.length; i++) {
            column += board[i][j];
        }
        if (column.indexOf('-') !== -1) {
            continue; // Skip columns that are not complete
        }
        if (column !== solution[j]) {
            return false; // Board column doesn't match solution column
        }
    }

    // Check each 3x3 square
    for (let i = 0; i < 9; i += 3) {
        for (let j = 0; j < 9; j += 3) {
            let square = '';
            for (let k = 0; k < 3; k++) {
                for (let l = 0; l < 3; l++) {
                    square += board[i+k][j+l];
                }
            }
            if (square.indexOf('-') !== -1) {
                continue; // Skip squares that are not complete
            }
            let solutionSquare = '';
            for (let k = 0; k < 3; k++) {
                for (let l = 0; l < 3; l++) {
                    solutionSquare += solution[(i/3)*3+k][(j/3)*3+l];
                }
            }
            if (square !== solutionSquare) {
                return false; // Board square doesn't match solution square
            }
        }
    }

    // If we made it here, the board is a valid solution
    return true;
}
var giphyArray = [
    "https://media3.giphy.com/media/j0XiH9qn8HFd03pP8s/giphy.gif?cid=ecf05e47lx4udio8xkhm9s3ebwawkt94yhitczx34i29zae6&rid=giphy.gif&ct=g",
    "https://media2.giphy.com/media/UtuC8ZVwmWa5fmGW3v/giphy.gif?cid=ecf05e47lwit2hca2mu7cgibm0i9xfbdei9l7ls0ucz7a2f6&rid=giphy.gif&ct=g",
    "https://media3.giphy.com/media/pqn59DMS0KePu/giphy.gif?cid=ecf05e47y9posw63cf99t7viig8xm0l94bdmxv174nona0b6&rid=giphy.gif&ct=g",
    "https://media2.giphy.com/media/dbtDDSvWErdf2/giphy.gif?cid=ecf05e47y9posw63cf99t7viig8xm0l94bdmxv174nona0b6&rid=giphy.gif&ct=g",
    "https://media3.giphy.com/media/pqn59DMS0KePu/giphy.gif?cid=ecf05e47y9posw63cf99t7viig8xm0l94bdmxv174nona0b6&rid=giphy.gif&ct=g",
];
function changeGiphy() {    //same as snake or worlde with giphys
    var randomIndex = Math.floor(Math.random() * giphyArray.length);
    var giphyImage = document.getElementById("giphy-image");
    giphyImage.src = giphyArray[randomIndex];
}


