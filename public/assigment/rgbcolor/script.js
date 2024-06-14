// this script is basic understanding of the the code 
// and the minimized and more efficient code in in script2










let numsquares = 6;

let colors = generaterandomcolor(numsquares);
// ]; we use a array with colors
// thn we get tht divs by dom querry selector

let squares = document.querySelectorAll(".square");

pickedcolor = pickcolor();

// thn we display the color we choose from the array in h tag by its id
let colordisplay = document.getElementById("colordisplay");

let message = document.getElementById("message");

// we change the text content in the  h tag but .textContent
colordisplay.textContent = pickedcolor;

// we get the h1 to change the bg of the h1 whgile the clicked color is correct
let h1 = document.querySelector("h1");
// to select the  reset button

let resetbutton = document.querySelector("#reset");

// to select the mode bittons
let modebuttons = document.querySelectorAll(".mode");

for (i = 0; i < modebuttons.length; i++) {
  modebuttons[i].addEventListener("click", function () {
    modebuttons[0].classList.remove("selected");
    modebuttons[1].classList.remove("selected");
    this.classList.add("selected");
    this.textContent === "Easy" ? numsquares = 3 : numsquares = 6;
    reset();
  });
}

function reset() {
  // to generate new color
  colors = generaterandomcolor(numsquares);

  // to pick a new color from the array
  pickedcolor = pickcolor();

  // to display the new selected color in the h1
  colordisplay.textContent = pickedcolor;
  resetbutton.textContent = "new colors";
  message.textContent = "";

  // to set the new color to the boxes
  for (var i = 0; i < squares.length; i++) {
    if (colors[i]) {
      squares[i].style.display = "block"
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

// thn we use for loop to set the bg of the squares in the page from the color array we made
for (i = 0; i < squares.length; i++) {
  // setting the arrays colors to the divs
  squares[i].style.background = colors[i];

  // th nwe add a event listiner "click" event
  squares[i].addEventListener("click", function () {
    // thn we make a variable and get the bg of the square

    let clickedcolor = this.style.background;

    // then this condition checks whether the clicked square's color and the h tag color is same or not
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

//function to change the all square to the coreect color

function changedcolors(color) {
  for (i = 0; i < squares.length; i++) {
    squares[i].style.background = color;
  }
}

// creating the functionh to pick the random color
function pickcolor() {
  let randomnum = Math.floor(Math.random() * colors.length);
  return colors[randomnum];
}

// random color function

function generaterandomcolor(num) {
  var arr = [];

  for (i = 0; i < num; i++) {
    // get the random color and push it into the array

    arr.push(randomcolor());
  }
  return arr;
}

//random color function

function randomcolor() {
  // pick a "red" from 0 - 255
  var r = Math.floor(Math.random() * 256);
  // pick a 'green' from 0 - 255
  var g = Math.floor(Math.random() * 256);
  // pick a "blue" from 0 - 255
  var b = Math.floor(Math.random() * 256);

  return "rgb(" + r + ", " + g + ", " + b + ")";
}
