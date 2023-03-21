const tileDisplay = document.querySelector('.tile-container')
const keyboard = document.querySelector('.key-container')
const messageDisplay = document.querySelector('.message-container')

// Galimų žodžių mąsyvas
const words = ['SUPER', 'VYRAS', 'KALBA','PIEVA','GERTI','PASAS', 'KILTI','NULIS',  //words array that is hardcoded
    'TAVAS','AKLAS','KARTU','MIELI','VAKAR','SAUSA','MATOM','RUDUO','MEDIS','KARAS','TAMSA','GAUJA','KAINA',]
const wordle = getRandomWord(words); //Kviečiama funkcija kuri parenka atsitiktinį žodį

let game_id = 2;    //hardcoded game id
let Scoreboard=0;   //scoreboard is zero


window.onload=function (){  //loads function changegiphy
    changeGiphy()
}
const keys = [  //keyboard buttons that are available in game
    'Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P', 'A', 'S', 'D',
    'F', 'G', 'H', 'J', 'K', 'L', 'Z', 'X', 'C', 'V', 'B', 'N', 'M', 'ENTER', '<<',
];

//Game board, structure to be 5x6
const guessRows = [
    ['', '', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', '', ''],
]
let currentRow = 0  //just a variable
let currentTile = 0 //just a variable
let isGameOver = false
guessRows.forEach((guessRow, guessRowIndex) => {    //function for selecting boards first element, after inputing letter it selects second until it reaches end
    const rowElement = document.createElement('div')    //creates div element for individual guess element
    rowElement.setAttribute('id', 'guessRow-' + guessRowIndex)  //sets attributes same as divs classes
    guessRow.forEach((guess, guessIndex) => {
        const tileElement = document.createElement('div')     // Creates tile element as dif
        tileElement.setAttribute('id', 'guessRow-' + guessRowIndex + '-tile-' + guessIndex) // Gives attributes as above
        tileElement.classList.add('tile')
        rowElement.append(tileElement)  // end result creates five divs within five divs, so it creates game board
    })
    tileDisplay.append(rowElement) //displays created elements
})

function getRandomWord(words) {
    return words[Math.floor(Math.random() * words.length)];  //Function for taking random word from array
}

// Keyboard logic
keys.forEach(key => {
    const buttonElement = document.createElement('button') // Creates for each letter different element
    buttonElement.textContent = key;    //applies key as it's element
    buttonElement.setAttribute('id', key); // Applies for every button the id of key
    buttonElement.addEventListener('click', () => handleClick(key)); // When button gets clicked, it registers that with click
    keyboard.append(buttonElement); // Displays all the keyboard elements
})



const handleClick = (key) => {  //defines << button with delete function
    console.log('clicked', key);
    if (key === '<<') {
        deleteLetter()
        return
    }

    if (key === 'ENTER') {  //defines ENTER button with function checkRow
        checkRow()
        return
    }
    addLetter(key) //if letter isn't << or ENTER then it adds selected letter
}


const addLetter = (letter) => {     //Function for putting clicked element inside the games main guess board
    if (currentTile < 5 && currentRow < 6) { //If it's below five and six, only then we can add letter
        const tile = document.getElementById('guessRow-' + currentRow + '-tile-' + currentTile) //Finds the tile that we need to put letter in
        tile.textContent = letter
        guessRows[currentRow][currentTile] = letter     //It selects the first tile in guessrow array
        tile.setAttribute('data', letter)   //Each dives gets a letter, it is used for coloring
        currentTile++ //after one letter, it moves up to second tile so we can put letter there
    }
}

const deleteLetter = () => {    //function for << to delete letter
    if (currentTile > 0) {
        currentTile--
        const tile = document.getElementById('guessRow-' + currentRow + '-tile-' + currentTile)
        tile.textContent = ''
        guessRows[currentRow][currentTile] = ''
        tile.setAttribute('data', '')
    }
}
// End game logic
const checkRow = () => {
    const guess = guessRows[currentRow].join('')

    // Patikrinama ar spaudžiant enter yra suvestas teisingas raidžių kiekis
    if (currentTile > 4) {
        console.log('guess is' + guess, 'worlde is ' + wordle) //Jeigu įvestos 5 raidės, consolėje spausdina teksta
        flipTile() // Kiekvienai pasirinktai raidei priskiria flip tile funkciją
        if (wordle === guess) {
            showMessage('Congratulations, your guess was correct!') //Jei žodis teisingas, rodo šį tekstą message konteineryje

            Scoreboard += 10;

            sendScore()
            isGameOver = true // Žaidimas pasibaigia

        } else {
            if (currentRow >= 5) { // tikrina ar jau paskautinis spėjimas
                isGameOver = false // Jei neatspėjamas žodis, žaidimą sustabdo, kad nustotų veikti JS
                showMessage('Better luck next time!') // Išspausdinama pralaimėjimo žinutė

                Scoreboard = 0

                sendScore();
                return
            }
            if (currentRow < 5) {
                currentRow++
                currentTile = 0
            }
        }
    }
}
// Žinutės konteinerio valdymas
const showMessage = (message) => {
    const messageElement = document.createElement('p') // Sukuriama žinutė su <p> tagu
    messageElement.textContent = message // Nustatoma kokia žinutė bus atvaizduojama
    messageDisplay.append(messageElement) // Atvaizduojama nustatyta žinutė
    setTimeout(() => messageDisplay.removeChild(messageElement), 2500) // Nustatomas kokį laiko tarpą žinutė bus rodoma
}

// Aprašomas spalvos pasikeitimo funkcionalumas
const addColorToKey = (keyLetter,color) => {
    const key = document.getElementById(keyLetter) //pagrindinė logika, kaip turėtų pasikeisti spalva
    key.classList.add(color) // Ištraukiama spalva iš css
}

//
const flipTile = () =>{
    const rowTiles = document.querySelector('#guessRow-'+ currentRow).childNodes // Pasirenkami spėjimo laukeliai
    rowTiles.forEach((tile,index) => { // Kiekvienam spėjimo laukeliui
        const dataLetter = tile.getAttribute('data')

        setTimeout(()=> {
            tile.classList.add('flip')  //all the animations, checks letters and it paints with specific color
            if (dataLetter === wordle[index]) {
                tile.classList.add('green-overlay')
                addColorToKey(dataLetter, 'green-overlay')
            } else if (wordle.includes(dataLetter)) {
                tile.classList.add('yellow-overlay')
                addColorToKey(dataLetter, 'yellow-overlay')
            } else {
                tile.classList.add('grey-overlay')
                addColorToKey(dataLetter, 'grey-overlay')
            }
        },500 * index)  //timeout for animations
    })
}

// Get the CSRF token from the page's meta tags
var csrfToken = $('meta[name="csrf-token"]').attr('content');
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
var giphyArray = [
    "https://media3.giphy.com/media/j0XiH9qn8HFd03pP8s/giphy.gif?cid=ecf05e47lx4udio8xkhm9s3ebwawkt94yhitczx34i29zae6&rid=giphy.gif&ct=g",
    "https://media2.giphy.com/media/UtuC8ZVwmWa5fmGW3v/giphy.gif?cid=ecf05e47lwit2hca2mu7cgibm0i9xfbdei9l7ls0ucz7a2f6&rid=giphy.gif&ct=g",
    "https://media3.giphy.com/media/pqn59DMS0KePu/giphy.gif?cid=ecf05e47y9posw63cf99t7viig8xm0l94bdmxv174nona0b6&rid=giphy.gif&ct=g",
    "https://media2.giphy.com/media/dbtDDSvWErdf2/giphy.gif?cid=ecf05e47y9posw63cf99t7viig8xm0l94bdmxv174nona0b6&rid=giphy.gif&ct=g",
];
function changeGiphy() {    //check snake for functionality
    var randomIndex = Math.floor(Math.random() * giphyArray.length);
    var giphyImage = document.getElementById("giphy-image");
    giphyImage.src = giphyArray[randomIndex];
}

