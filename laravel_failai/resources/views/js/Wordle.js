const tileDisplay = document.querySelector('.tile-container')
const keyboard = document.querySelector('.key-container')
const messageDisplay = document.querySelector('.message-container')

// Galimų žodžių mąsyvas
const words = ['SUPER', 'VYRAS', 'LAUKAS', 'KALBA','PIEVA','DUGNAS','GERTI','PASAS', 'KILTI','NULIS',
'TAVAS','AKLAS','KARTU','MIELI','VAKAR','SAUSA','MATOM','RUDUO','MEDIS','KARAS','TAMSA','GAUJA','KAINA',]
const wordle = getRandomWord(words); //Kviečiama funkcija kuri parenka atsitiktinį žodį

let game_id = 2;
let Scoreboard=0;
var csrfToken = $('meta[name="csrf-token"]').attr('content');

// Klaviatūros mygtukai
const keys = [
    'Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P', 'A', 'S', 'D',
    'F', 'G', 'H', 'J', 'K', 'L', 'Z', 'X', 'C', 'V', 'B', 'N', 'M', 'ENTER', '<<',
];

// Wordle žaidimo struktūra 5x6
const guessRows = [
    ['', '', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', '', ''],
    ['', '', '', '', ''],
]
let currentRow = 0
let currentTile = 0
let isGameOver = false
guessRows.forEach((guessRow, guessRowIndex) => {
    const rowElement = document.createElement('div')
    rowElement.setAttribute('id', 'guessRow-' + guessRowIndex)
    guessRow.forEach((guess, guessIndex) => {
        const tileElement = document.createElement('div')
        tileElement.setAttribute('id', 'guessRow-' + guessRowIndex + '-tile-' + guessIndex)
        tileElement.classList.add('tile')
        rowElement.append(tileElement)
    })
    tileDisplay.append(rowElement)
})

function getRandomWord(words) {
    return words[Math.floor(Math.random() * words.length)];
}

// Klaviatūros logika
keys.forEach(key => {
    const buttonElement = document.createElement('button') // Sukuria kiekvienai raidei atskirą mygtuką
    buttonElement.textContent = key;
    buttonElement.setAttribute('id', key); // Priskiria kiekvienam mygtukui ID pagal jo raidę
    buttonElement.addEventListener('click', () => handleClick(key)); // Fiksuoja kada ir koks mygtukas buvo paspaustas
    keyboard.append(buttonElement); // Išspausdina klaviatūros mygtukus
})


// Aprašoma ištrynimo mygtuko funkcija
const handleClick = (key) => {
    console.log('clicked', key);
    if (key === '<<') {
        deleteLetter()
        return
    }
    // Aprašoma Enter mygtuko funkcija
    if (key === 'ENTER') {
        checkRow()
        return
    }
    addLetter(key)
}

 // Logika, kai paspaudžiamas mygtukas, kad jis įsivestų į laukelį
const addLetter = (letter) => {
    if (currentTile < 5 && currentRow < 6) {
        const tile = document.getElementById('guessRow-' + currentRow + '-tile-' + currentTile)
        tile.textContent = letter
        guessRows[currentRow][currentTile] = letter
        tile.setAttribute('data', letter)
        currentTile++
    }
}

const deleteLetter = () => {
    if (currentTile > 0) {
        currentTile--
        const tile = document.getElementById('guessRow-' + currentRow + '-tile-' + currentTile)
        tile.textContent = ''
        guessRows[currentRow][currentTile] = ''
        tile.setAttribute('data', '')
    }
}
// Žaidimo pabaigos logika
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
            tile.classList.add('flip')
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
        },500 * index)
    })
}
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
