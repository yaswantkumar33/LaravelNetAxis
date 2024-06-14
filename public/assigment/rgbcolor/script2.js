let numsquares = 6;
let colors = [];
let pickedcolor;
let squares = document.querySelectorAll(".square");
let colordisplay = document.getElementById("colordisplay");
let message = document.getElementById("message");
let h1 = document.querySelector("h1");
let resetbutton = document.querySelector("#reset");
let modebuttons = document.querySelectorAll(".mode");

init();
function init() {
    setupmodebuttons();
    setupsquares();
    reset();
}

function setupmodebuttons() {
    for (i = 0; i < modebuttons.length; i++) {
        modebuttons[i].addEventListener("click", function () {
            modebuttons[0].classList.remove("selected");
            modebuttons[1].classList.remove("selected");
            this.classList.add("selected");
            this.textContent === "Easy" ? (numsquares = 3) : (numsquares = 6);
            reset();
        });
    }
}

function setupsquares() {
    for (i = 0; i < squares.length; i++) {
        squares[i].style.background = colors[i];
        squares[i].addEventListener("click", function () {
            let clickedcolor = this.style.background;
            if (clickedcolor == pickedcolor) {
                message.innerHTML = "you clicked the right color";
                changedcolors(clickedcolor);
                resetbutton.textContent = "Play again";

                h1.style.backgroundColor = clickedcolor;
            } else {
                this.style.background = "#232323";
                message.innerHTML = "try again";
            }
        });
    }

}

function reset() {
    colors = generaterandomcolor(numsquares);
    pickedcolor = pickcolor();
    colordisplay.textContent = pickedcolor;
    resetbutton.textContent = "new colors";
    message.textContent = "";
    for (var i = 0; i < squares.length; i++) {
        if (colors[i]) {
            squares[i].style.display = "block";
            squares[i].style.background = colors[i];
        } else {
            squares[i].style.display = "none";
        }
    }
    h1.style.background = "steelblue";
}
resetbutton.addEventListener("click", function () {
    reset();
});
function changedcolors(color) {
    for (i = 0; i < squares.length; i++) {
        squares[i].style.background = color;
    }
}

function pickcolor() {
    let randomnum = Math.floor(Math.random() * colors.length);
    return colors[randomnum];
}
function generaterandomcolor(num) {
    var arr = [];
    for (i = 0; i < num; i++) {
        arr.push(randomcolor());
    }
    return arr;
}
function randomcolor() {
    // pick a "red" from 0 - 255
    var r = Math.floor(Math.random() * 256);
    // pick a 'green' from 0 - 255
    var g = Math.floor(Math.random() * 256);
    // pick a "blue" from 0 - 255
    var b = Math.floor(Math.random() * 256);
    return "rgb(" + r + ", " + g + ", " + b + ")";
}
