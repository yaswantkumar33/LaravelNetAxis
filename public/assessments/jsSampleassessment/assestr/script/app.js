// let create the genrate random color first

let generatebtn = document.getElementById("generatebtn");
let bgdisplay = document.getElementById("displaybg");

// add and remove top
let addtp = document.getElementById("addfirst");
let removetp = document.getElementById("removefirst");
let mainlist = document.querySelector("#main-ul");

// add and remove bottom
let addbt = document.querySelector("#addtwo");
let removebt = document.querySelector("#removetwo");

// sorting
let rsort = document.querySelector("#redsort");
let gsort = document.querySelector("#greensort");
let bsort = document.querySelector("#bluesort");

// second list
let secondlist = document.querySelector("#secondlist");
// copy and move

let copybtn = document.querySelector("#cpybtn");
let invalue1 = document.querySelector("#invalue1");
let invalue2 = document.querySelector("#invalue2");
let movebtn = document.querySelector("#movebtn");
let invale3 = document.querySelector("#invalue3");
let invalue4 = document.querySelector("#invalue4");

// let insit the a obj
let emobj;
// an empty array to store all colors
let maincolarr = [];
// function to create random color
function colorgen() {
    let redcol = Math.floor(Math.random() * 256);
    let greencol = Math.floor(Math.random() * 256);
    let bluecol = Math.floor(Math.random() * 256);

    emobj = { r: redcol, g: greencol, b: bluecol };

    maincolarr.push(emobj);

    return "rgb(" + redcol + "," + greencol + "," + bluecol + ")";
}

// event listiner for generate btn
generatebtn.addEventListener("click", () => {
    bgdisplay.style.background = colorgen();
});
// now add  and remove on top//////////////////////////////////////////////////
let localvar;
addtp.addEventListener("click", () => {
    // debugger
    // ffrist to create a new element
    let createli = document.createElement("li");
    // thn we to repaet creating so we use for loop
    for (i = 0; i < maincolarr.length; i++) {
        // seeting the rgb value we created from the random () and we call the obj from the main array
        localvar = `red: ${maincolarr[i].r},green:${maincolarr[i].g},blue:${maincolarr[i].b}`;
    }
    // thn we set this rgb to the new element we created
    createli.innerHTML = localvar;
    // thn we append this child to the main ul
    mainlist.prepend(createli);
});
// add bottom Event
let localvar2;
addbt.addEventListener("click", () => {
    let createli = document.createElement("li");
    for (i = 0; i < maincolarr.length; i++) {
        localvar2 = `RED:${maincolarr[i].r},GREEN:${maincolarr[i].g},BLUE:${maincolarr[0].b}`;
    }
    createli.innerHTML = localvar2;
    mainlist.appendChild(createli);
});

// now top add bottom and remove /////////////////////////////////////////

//remove top and bottom event

removetp.addEventListener("click", () => {
    maincolarr.shift();
    mainlist.removeChild(mainlist.firstElementChild);
});

removebt.addEventListener("click", () => {
    maincolarr.pop();
    mainlist.removeChild(mainlist.lastElementChild);
});

// sorting///////////////////////////////////////////////////////////////
rsort.addEventListener("click", () => {
    // alert("rsort is clicked")
    maincolarr.sort((a, b) => {
        return a.r - b.r;
    });
    arrsfloop();
});
gsort.addEventListener("click", () => {
    // alert("gsort is clicked")
    maincolarr.sort((a, b) => {
        return a.g - b.g;
    });
    arrsfloop();
});
bsort.addEventListener("click", () => {
    // alert("bsort is clicked")
    maincolarr.sort((a, b) => {
        return a.b - b.b;
    });
    arrsfloop();
});

function arrsfloop() {
    mainlist.innerHTML = "";
    // for of loop is used to get the vaulke of the array instead of index /////////////////////////////////
    for (let arr of maincolarr) {
        let createli = document.createElement("li");
        localvar = `RED: ${arr.r},GREEN:${arr.g},BLUE:${arr.b}`;
        createli.innerHTML = localvar;
        mainlist.appendChild(createli);
    }
}

// copy and move

copybtn.addEventListener("click", () => {
    let newli = maincolarr.slice(invalue1.value, invalue2.value);
    for (let data of newli) {
        localvar = `RED: ${data.r},GREEN:${data.g},BLUE:${data.b}`;
        console.log(localvar);
        let createli = document.createElement("li");
        createli.innerHTML = localvar;
        secondlist.append(createli);
    }
    // alert("copyclicked");
});

// move

movebtn.addEventListener("click", () => {
    let newli = maincolarr.splice(invale3.value, invalue4.value);
    mainlist.innerHTML = "";
    for (let data of maincolarr) {
        localvar = `RED: ${data.r},GREEN:${data.g},BLUE:${data.b}`;
        let createli = document.createElement("li");
        createli.innerHTML = localvar;
        mainlist.append(createli);
    }
    for (let data2 of newli) {
        localvar = `RED: ${data2.r},GREEN:${data2.g},BLUE:${data2.b}`;
        let createdli = document.createElement("li");
        createdli.innerHTML = localvar;
        secondlist.append(createdli);
    }
});
