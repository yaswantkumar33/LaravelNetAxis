
// focus btn event  /////////////////////////////////////////////////////////
let focusbtn = document.querySelector("#addfocusbtn");

focusbtn.addEventListener("click", () => {
    document.getElementById("inputone").focus();
});


// page reload  ////////////////////////////////////////////////////////////
let reload = document.getElementById("pagereload");
reload.addEventListener("click", () => {
    location.reload();
})


// search btn event ///////////////////////////////////////////////////////

let searchbtn = document.getElementById("searchbtn");

searchbtn.addEventListener("click", () => {
    document.getElementById("inputone").focus();
    document.getElementById("inputtwo").remove();
})


// add to tasklist ////////////////////////////////////////////////////////
// invalue1 = document.getElementById("inputone")
// invalue2 = document.getElementById("inputtwo")
// let mainlist2 = document.getElementById("mainlist2");
let mainlist = document.getElementById("mainlist");
let mainarr = [];
let mainobj;
let mainobj2;
let mainarr2 = [];

let addtolistbtn = document.getElementById("addtolistbtn");
addtolistbtn.addEventListener("click", () => {
    invalue1 = document.getElementById("inputone").value;
    invalue2 = document.getElementById("inputtwo").value;

    mainobj = { taskname: invalue1, date: invalue2 }
    mainarr.push(mainobj)
    // console.log(mainarr)
    let textone;
    let texttwo;
    for (let i = 0; i < mainarr.length; i++) {

        textone = `TASKNMAE: ${mainarr[i].taskname} `;
        texttwo = `DATE: ${mainarr[i].date}`


    }




    newli2 = document.createElement("li");
    newli2.innerHTML = `<span class = " px-5">${textone}</span><span class = "px-5 "></span>${texttwo}<span class = "ps-5" ><button class = " btn"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-down-left-circle " viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-5.904-2.854a.5.5 0 1 1 .707.708L6.707 9.95h2.768a.5.5 0 1 1 0 1H5.5a.5.5 0 0 1-.5-.5V6.475a.5.5 0 1 1 1 0v2.768l4.096-4.097z"/>
  </svg></span></button><span class = " pe-5 removeli"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
</svg></span>`;
    // console.log(newli2);
    let completedlist = document.getElementById("completedlist");
newli2.addEventListener("click",()=>{
    completedlist.appendChild(newli2);
    newli2=""
})
// function myfun(){
// alert("clicked ");
// }
// let btn = document.querySelectorAll(".btn")  
// // btn.addEventListener(()=>{
// //     alert("btn clicked");
// // })
// for (let i = 0 ; i < btn.length;i++){
//     btn[i].addEventListener("click",()=>{
//         alert("btn clicked")

//     })

// } 

    // function myfun(event) {
    //     event.addEventListener("click", () => {
    //         alert("clicked");
    //     })

    // }
    mainlist.appendChild(newli2);


    let spanli = document.querySelectorAll(".spanli");
    for (i = 0; i < spanli.length; i++) {
        spanli[i].addEventListener("click", () => {
            alert("clciked");
        })

    }
    let removeli = document.querySelectorAll(".removeli");
    for (i = 0; i < removeli.length; i++) {
        removeli[i].addEventListener("clicked", (ev) => {
            ev.target.remove()
        })
    }



    ///////////////////////////////////////////////////////////
    // time order li /////////////////////////////////////
    //////////////////////////////////////////////////////////
    mainobj2 = { task: invalue1, date: invalue2 }
    console.log(mainobj2)

    mainarr2.push(mainobj2)

    mainarr2.sort(
        (a, b) => {
            return new Date(a.date).valueOf() - new Date(b.date).valueOf();
        })
    console.log(mainarr2);
    let sorttx1;
    let soprttx2;
    for (let i = 0; i < mainarr.length; i++) {

        sorttx1 = `TASKNMAE: ${mainarr2[i].task} `;
        soprttx2 = `DATE: ${mainarr2[i].date}`

    }

    let orderlist = document.getElementById("orderlist");
    let sortli = document.createElement("li")
    sortli.innerHTML = `<span class = " px-2">${sorttx1}</span><span class = " px-2">${soprttx2}</span>`
    orderlist.appendChild(sortli);
});
/////////////////////////////////////////////////////


// emty the in values //////////////////////////////////////////////////////////////////////
let inholder = document.querySelector(".invalue");
let emptybtn = document.getElementById("emptybtn");
emptybtn.addEventListener("click", () => {
    inholder.value = "";

})




