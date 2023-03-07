let numSelected = null;

const messageDisplay = document.querySelector('.message-container')

let errors = 0;

let board = [
    "--5-1489-",
    "84-97-5-1",
    "--12-5374",
    "2-6349---",
    "-1-8-792-",
    "5-912-4-8",
    "-5-4-26-3",
    "6-4-3-21-",
    "-2-56-7-9"]
        //
let solution =
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


window.onload = function (){
    setGame();
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
            if(board[x][z] != '-'){ // Tikrinimas, jeigu kvadrate yra '-' jis pakeičiamas tuščia reikšme
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

function selectNumber(){
    if (numSelected != null){
        numSelected.classList.remove('number-selected');
    }
    numSelected = this;
    numSelected.classList.add('number-selected')
}

function selectTile(){
    if (numSelected){
        if (this.innerText != ''){
            return;
        }
        let coords = this.id.split('-');
        let x = parseInt(coords[0]);
        let z = parseInt(coords[1]);

        if (solution[x][z]=== numSelected.id){
            this.innerText = numSelected.id;
        }
        else{
            errors +=1;
            document.getElementById('errors').innerText=errors;
        }
    }
}


const showMessage = (message) => {
    const messageElement = document.createElement('p') // Sukuriama žinutė su <p> tagu
    messageElement.textContent = message // Nustatoma kokia žinutė bus atvaizduojama
    messageDisplay.append(messageElement) // Atvaizduojama nustatyta žinutė
    setTimeout(() => messageDisplay.removeChild(messageElement), 2500) // Nustatomas kokį laiko tarpą žinutė bus rodoma
}
