var numSelected = null;
var tileSelected = null;

var errors = 0;

var board = [
    "--5-1489-",
    "84-97-5-1",
    "--12-5374",
    "2-6349---",
    "-1-8-792-",
    "5-912-4-8",
    "-5-4-26-3",
    "6-4-3-21-",
    "-2-56-7-9"]

var solution =
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
        number.classList.add('number');
        document.getElementById('digits').appendChild(number);
    }
}
