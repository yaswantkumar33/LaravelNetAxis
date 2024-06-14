// let addtolistbtn = document.getElementById("addtolistbtn");
// addtolistbtn.addEventListener("click", () => {
//     invalue1 = document.getElementById("inputone").value;
//     invalue2 = document.getElementById("inputtwo").value;
//     mainobj = { taskname: invalue1, date: invalue2 }
//     mainarr.push(mainobj)
//     let textone;
//     let texttwo;
//     for (let i = 0; i < mainarr.length; i++) {

//         textone = `TASKNMAE: ${mainarr[i].taskname} `;
//         texttwo = `DATE: ${mainarr[i].date}`
//         // console.log(textone);
//         // let text2 = mainarr[i].date;
//         // let newli1 = document.createElement("li");

//     }
//     // let newli1 = document.createElement("li");
//     // newli1.innerHTML = textone;
//     // console.log(newli1)
//     // mainlist.appendChild(newli1);

//     console.log('')
//     let newli2 = document.createElement("li");
//     newli2.className = 'list';
//     newli2.innerHTML = `<span class = " px-5">${textone}</span><span class = "px-5 "></span>${texttwo}<span class = "ps-5 spanli edit" onclick="myfunction()"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-down-left-circle " viewBox="0 0 16 16">
//     <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-5.904-2.854a.5.5 0 1 1 .707.708L6.707 9.95h2.768a.5.5 0 1 1 0 1H5.5a.5.5 0 0 1-.5-.5V6.475a.5.5 0 1 1 1 0v2.768l4.096-4.097z"/>
//   </svg></span><span class = " pe-5 delete"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
//   <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
//   <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
// </svg></span>`;
//     console.log(newli2);
//     mainlist.appendChild(newli2);









// let spanli = document.querySelectorAll(".spanli")

// for (let i = 0; i < spanli.length; i++) {
//     spanli[i].addEventListener("click", (ev) => {
//         if (ev.target.className == 'delete') {
//             alert("edit clicked");

//         } else if (ev.target.parentNode.classList.contains('edit')) {
//             alert("edit clicked");
//             return 0;
//         }
//         // debugger

//     })
// }