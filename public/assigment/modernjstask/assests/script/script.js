let maindata = [
    {
        id: 0,
        name: "stark",
        city: "chennai",
        dob: "12-12-2001",
        about:
            "Lorem ipsum, dolor sit amet consectetur adipisicing elit..",
    },
    {
        id: 1,
        name: "hanaki",
        city: "japan",
        dob: "12-12-2002",
        about:
            "Lorem ipsum, dolor sit amet consectetur adipisicing elit..",
    },
    {
        id: 2,
        name: "mugiwara",
        city: "korea",
        dob: "12-10-2002",
        about:
            "Lorem ipsum, dolor sit amet consectetur adipisicing elit..",
    },
    {
        id: 3,
        name: "michel",
        city: "usa",
        dob: "10-12-2001",
        about:
            "Lorem ipsum, dolor sit amet consectetur adipisicing elit..",
    },
    {
        id: 4,
        name: "hector",
        city: "texas",
        dob: "12-06-2001",
        about:
            "Lorem ipsum, dolor sit amet consectetur adipisicing elit..",
    },
    {
        id: 5,
        name: "danzi",
        city: "california",
        dob: "06-12-2001",
        about:
            "Lorem ipsum, dolor sit amet consectetur adipisicing elit..",
    },
    {
        id: 6,
        name: "madara",
        city: "california",
        dob: "06-12-2001",
        about:
            "Lorem ipsum, dolor sit amet consectetur adipisicing elit..",
    },
    {
        id: 7 ,
        name: "agirus",
        city: "california",
        dob: "06-12-2001",
        about:
            "Lorem ipsum, dolor sit amet consectetur adipisicing elit..",
    },
];


// search part 
let users = []
let indara = $("#data-input")
// console.log(indara)
$(indara).on('input', e => {
    const value = e.target.value
    users.forEach(user => {
        // console.log(user)
        const isVisible = user.name.includes(value) /*|| user.place.includes(value)*/
        user.element.toggleClass("hide", !isVisible)

    })
})




fun();


function fun(){
    $("#row1").html("")
users = maindata.map(data => {
    let name = data.name
    let id = data.id
    let city = data.city
    let dob = data.dob

    // main card div 
    let carddiv = $(`<div class= "card col-lg-2 text-center border m-5 " id ="maincarddiv">`)
    // card body 
    cardbody = $(`<div class="card body border-0">`)
    // card body title 
    let cardhead = $(`<h6 class =" card-title">Details</h6>`)
    // card body p one /
    let cardpone = $(`<p class="card-text border p-2">ID: <span class =" btn btn-primary px-3 py-1" >${id}</span></p>`)
    // card body p two /
    let cardptwo = $(`<p class="card-text border p-2"> Name: ${name}</p>`)
    // card body p three  /
    let cardpthree = $(`<p class="card-text border p-2">Date of birth: ${dob}</p>`)
    // card body p four /
    let cardpfour = $(`<p class="card-text border p-2">Location: ${city}</p>`)
    //vard btn 

    let btn = $(`<button class="btn btn-primary p-2 my-2"id = ${id}>view </button>`)


    // append part 
    $(carddiv).append(cardbody);
    $(cardbody).append(cardhead);
    $(cardbody).append(cardpone);
    $(cardbody).append(cardptwo);
    $(cardbody).append(cardpthree);
    $(cardbody).append(cardpfour);
    $(cardbody).append(btn);



    $("#row1").append(carddiv)

    return { name: data.name, place: data.city, element: carddiv }

})


}


$(".btn").click(function (e) {
    e.preventDefault();
    id = $(e.target).attr("id");
    // card to edity and save 
    // main card div 
    let carddiv = $(`<div class= "card col text-center border m-5 ">`)
    // card body 
    cardbody = $(`<div class="card body border-0 p-2">`)
    // card body title 
    let cardhead = $(`<h6 class =" card-title">Details</h6>`)
    // card body p one /
    let cardpone = $(`<input type="text" class="my-2"value="${id}" id= "inidval">`)
    // card body p two /
    let cardptwo = $(`<input type="text"  class="my-2"value="${maindata[id].name}" id= "innameval">`)
    // card body p three  /
    let cardpthree = $(`<input type="text" class ="my-2" value="${maindata[id].dob}" id= "indobval">`)
    // card body p four /
    let cardpfour = $(`<input class = " my-2"type="text" value="${maindata[id].city}" id= "incityval">`)
    //vard btn 
// btndiv 
btndiv = $("<div>")
    let btn = $(`<button class="btn  p-2 mx-5"id ="savechanges">save changes </button>`)
    // let btn2 = $(`<button class = "btn  p-2 mx-5" id = "newuser">add new user</button>`)
btndiv.append(btn)


$(carddiv).append(cardbody);
$(cardbody).append(cardhead);
$(cardbody).append(cardpone);
$(cardbody).append(cardptwo);
$(cardbody).append(cardpthree);
$(cardbody).append(cardpfour);
$(cardbody).append(btndiv);
    // $(cardbody).append(btn2);



    $("#row2").html(carddiv)

    $("#savechanges").on("click", () => {
        let idval = $("#inidval").val();
        let nameval = $("#innameval").val();
        let dobval = $("#indobval").val();
        let cityval = $("#incityval").val();


        maindata[id].name=nameval;
        maindata[id].dob=dobval;
        maindata[id].city=cityval
        console.log(idval,nameval,dobval,cityval)

        fun()

        // mianfun();
        $("#row2").html("")
    });

    
    


});

// nmew user function 

$("#newuser").on("click",()=>{
    


    $("#row2").html("")


    let carddiv = $(`<div class= "card col text-center border m-5 ">`)
    // card body 
    cardbody = $(`<div class="card body border-0 p-2">`)
    // card body title 
    let cardhead = $(`<h6 class =" card-title">Details</h6>`)
    // card body p one /
    let cardpone = $(`<label class="my-2">ID:</label><input  type="text" class="my-2 p-2" id= "inidval">`)
    // card body p two /
    let cardptwo = $(`<label class="my-2">name:</label><input  type="text"  class="my-2 p-2"value="" id= "innameval">`)
    // card body p three  /
    let cardpthree = $(`<label class="my-2">date of birth: </label><input  type="text" class ="my-2 p-2" id= "indobval">`)
    // card body p four 
    let cardpfour = $(`<label class="my-2">location:</label><input  class = " my-2 p-2"type="text" id="incityval">`)
    let btndiv = $(`<button class = "  btn btn-primary " id="confirmuser">Confirm User</button>`)




    $(carddiv).append(cardbody);
    $(cardbody).append(cardhead);
    $(cardbody).append(cardpone);
    $(cardbody).append(cardptwo);
    $(cardbody).append(cardpthree);
    $(cardbody).append(cardpfour);
    $(cardbody).append(btndiv);


     $("#row2").html(carddiv)

    $("#confirmuser").on("click",()=>{

        let idval = $("#inidval").val();
        let nameval = $("#innameval").val();
        let dobval = $("#indobval").val();
        let cityval = $("#incityval").val();
        let newarr = {id:idval,name:nameval,dob:dobval,city:cityval}
        console.log(newarr)
        maindata.push(newarr)


        fun();
        $("#row2").html("")

    })
    


    // fun();

})




let title = document.title;
window.addEventListener("blur",()=>{
    document.title = " come back to me ) :";
})

window.addEventListener("focus",()=>{
    document.title = title
});












































// animation 
const bgAnimation = document.getElementById('bganimation');

const numberofboxers = 400;

for(let i = 0 ; i < numberofboxers; i++){
    const colorbox = document.createElement('div');
    colorbox.classList.add('colorBox');
    bgAnimation.append(colorbox)
}


















































// function mianfun(){
    



// users = maindata.map(data => {
//     let name = data.name
//     let id = data.id
//     let city = data.city
//     let dob = data.dob

//     // main card div 
//     let carddiv = $(`<div class= "card col-lg-2 text-center border m-5 ">`)
//     // card body 
//     cardbody = $(`<div class="card body border-0">`)
//     // card body title 
//     let cardhead = $(`<h6 class =" card-title">Details</h6>`)
//     // card body p one /
//     let cardpone = $(`<p class="card-text border p-2">ID: <span class =" btn btn-primary px-3 py-1" >${id}</span></p>`)
//     // card body p two /
//     let cardptwo = $(`<p class="card-text border p-2"> Name: ${name}</p>`)
//     // card body p three  /
//     let cardpthree = $(`<p class="card-text border p-2">Date of birth: ${dob}</p>`)
//     // card body p four /
//     let cardpfour = $(`<p class="card-text border p-2">Location: ${city}</p>`)
//     //vard btn 

//     let btn = $(`<button class="btn btn-primary p-2"id = ${id}>view </button>`)


//     // append part 
//     $(carddiv).append(cardbody);
//     $(cardbody).append(cardhead);
//     $(cardbody).append(cardpone);
//     $(cardbody).append(cardptwo);
//     $(cardbody).append(cardpthree);
//     $(cardbody).append(cardpfour);
//     $(cardbody).append(btn);



//     $("#row1").html(carddiv)

//     return { name: data.name, place: data.city, element: carddiv }

// })
// }