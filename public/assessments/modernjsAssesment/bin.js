// let mainArray;

// (function (pWindow) {
// 	// if (typeof pWindow.CustomList == "function") {
// 	// 	throw new Error("CustomList function already defined");
// 	// }
// 	/*===================== creating default values =============*/

// 	let CustomList = function (pId, options) {
// 		if (!(this instanceof CustomList)) {
// 			return new CustomList(pId, options);
// 		}
// 		this.domEl = document.getElementById(pId);
// 		if (!this.domEl) {
// 			throw new Error("dom not found");
// 		}
// 		this.options = options || {};
// 		if (typeof this.options.data == "undefined") {
// 			this.options.data = [];
// 		}
// 		mainArray = options;
// 		this.displayList();
// 	};

// 	/*==================== creating new list ================*/

// 	CustomList.prototype.displayList = function () {
// 		mainfuniterate();
// 	};
// 	pWindow.CustomList = CustomList;
// })(window);






// // msian fun is here 
// function mainfuniterate() {
// 	$("#row1").html("");

// 	for (i = 0; i < mainArray.length; i++) {
// 		 stuname = mainArray[i].name;
// 		let imsrc = mainArray[i].img;

// 		 maincarddiv = `<div class="card col-sm-3 m-2 p-3" >
// <button class= "btn imgbtn" id =${i}><img src="${imsrc} " class=" card-img " alt="..." id = ${i}></button>
// <div class="card-body">
//   <p class="card-text">NAME : ${stuname}</p>
// </div>
// </div>`;

// 		$("#row1").append(maincarddiv);
// 	}

// 	btnclicked();
// 	editbtnfun();
// 	savebtnclick();	
	 
	


// }

// function btnclicked() {

// 	$(".imgbtn").click(function (e) {
// 		e.preventDefault();
// 		let id = $(this).attr("id");
// 		console.log(id);


// 		let cname = mainArray[id].name;
// 		let cid = mainArray[id].id;
// 		let cm1 = mainArray[id].m1;
// 		let cm2 = mainArray[id].m2;
// 		let cm3 = mainArray[id].m3;
// 		let cm4 = mainArray[id].m4;
// 		let cm5 = mainArray[id].m5;

// 		console.log(cname, cid, cm1, cm2, cm3, cm4, cm5);
// 		let inname = $("#strudentname")
// 		let inid = $("#studentid")
// 		let inm1 = $("#mark1")
// 		let inm2 = $("#mark2")
// 		let inm3 = $("#mark3")
// 		let inm4 = $("#mark4")
// 		let inm5 = $("#mark5")





// 		$(inname).val(cname);
// 		$(inid).val(cid);
// 		$(inm1).val(cm1);
// 		$(inm2).val(cm2);
// 		$(inm3).val(cm3);
// 		$(inm4).val(cm4);
// 		$(inm5).val(cm5);



// 	});


// 	// editbtn  function




// }


// function editbtnfun() {
// 	$("#editbtn").on("click", () => {
// 		$('#strudentname').attr("readonly", false);
// 		$("#studentid").attr("readonly", false);
// 		$("#mark1").attr("readonly", false);
// 		$("#mark2").attr("readonly", false);
// 		$("#mark3").attr("readonly", false);
// 		$("#mark4").attr("readonly", false);
// 		$("#mark5").attr("readonly", false);
// 	})

// }


// // save btn function

// function savebtnclick(){
// 	$("#savebtn").on("click",()=>{
// 		let invalone = $("#strudentname").val()
// 		let invaltwo = $("#studentid").val()
// 		let invalthree = $("#mark1").val()
// 		let invalfour = $("#mark2").val()
// 		let invalfive = $("#mark3").val()
// 		let invalsix = $("#mark4").val()
// 		let invalseven = $("#mark5").val()
// 		mainArray[parseInt(invaltwo)-1].name= invalone
// 		mainArray[parseInt(invaltwo)-1].id=invaltwo
// 		mainArray[parseInt(invaltwo)-1].m1= invalthree
// 		mainArray[parseInt(invaltwo)-1].m2= invalfour
// 		mainArray[parseInt(invaltwo)-1].m3= invalfive
// 		mainArray[parseInt(invaltwo)-1].m4= invalsix
// 		mainArray[parseInt(invaltwo)-1].m5= invalseven



// 		mainfuniterate();
		
		
		
// 	})
	
// }



// // search function 


// // search part 
// // let users = []
// // let indara = $("#data-input")
// // // console.log(indara)
// // $(indara).on('input', e => {
// //     const value = e.target.value
// //     users.forEach(user => {
// //         // console.log(user)
// //         const isVisible = user.name.includes(value) /*|| user.place.includes(value)*/
// //         user.element.toggleClass("hide", !isVisible)

// //     })
// // })













// let title = document.title;
// window.addEventListener("blur",()=>{
//     document.title = " come back to me ) :";
// })

// window.addEventListener("focus",()=>{
//     document.title = title
// });









// backup of sample assesment?/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
// let users = [];
// // search function 
// search();
// // main fun for the entiere card  
// function mainfuniterate() {
// 	// deafultly we make the row empty 
// 	$("#row1").html("");
// 	// thn we use the empty array and storing the values there to ne used in the search function 
// 	// we can use tyhe for each or the for loop to check the for loop versiopn of the iteration check the js file name bin  
// 	users = mainArray.map((data) => {
// 		// lets get the id from the mian array 
// 		let idd = parseInt(data.id) - 1
// 		// thn name 
// 		let stuname = mainArray[idd].name;
// 		// thn image source 
// 		let imsrc = mainArray[idd].img;
// 		// main div to the bootstrap card 
// 		let maincarddiv = $(`<div class="card col-sm-3 m-2 p-3 shadow">`)
// 		// btn ...where we append the img 
// 		// btn was used to have the id attr if we use the img only it's not showing the crt id of the clicked 
// 		let cardbtn = $(`<button class = "btn imgbtn " id =${idd}>`)
// 		// thn we use img in order to store th image oin the poper position by booststrap class to img " card-img"  and settingthe id fron the array of obj
// 		let imgcard = $(`<img src ="${imsrc}" class ="card-img" id = ${idd}>`)
// 		// thn card body 
// 		let cardbody = $(`<div class ="card-body"></div>`)
// 		// thn card p where we store the name 
// 		let cardp = $(`<p class = "card-text">Name: ${stuname}</p>`)
// 		// appending the dats in crt order 
// 		$(cardbtn).append(imgcard);
// 		$(cardbody).append(cardp);
// 		$(maincarddiv).append(cardbtn);
// 		$(maincarddiv).append(cardbody)
// 		$("#row1").append(maincarddiv);
// 		// thn we retun these values to be used in the search process 
// 		return { name: stuname, element: maincarddiv }
// 	})
// 	// the three btn functions 
// 	btnclicked();
// 	editbtnfun();
// 	savebtnclick();
// }
// //  btn clicked or the image cliciked function 
// function btnclicked() {
// 	// we call the class of tha all the btns or the images 
// 	$(".imgbtn").click(function (e) {
// 		e.preventDefault();
// 		let id = $(this).attr("id");
// 		console.log(id);

// 		// here we set the input values to empty by declaringthe value to a empty ""
// 		$(".form-control").value = "";
// 		// using th earray here we get the values from the main array 
// 		let cname = mainArray[id].name;
// 		let cid = mainArray[id].id;
// 		let cm1 = mainArray[id].m1;
// 		let cm2 = mainArray[id].m2;
// 		let cm3 = mainArray[id].m3;
// 		let cm4 = mainArray[id].m4;
// 		let cm5 = mainArray[id].m5;
// 		// console.log(cname, cid, cm1, cm2, cm3, cm4, cm5);

// 		// thn we get the input in the second column 
// 		let inname = $("#strudentname")
// 		let inid = $("#studentid")
// 		let inm1 = $("#mark1")
// 		let inm2 = $("#mark2")
// 		let inm3 = $("#mark3")
// 		let inm4 = $("#mark4")
// 		let inm5 = $("#mark5")
// 		// now we set the input value 
// 		$(inname).val(cname);
// 		$(inid).val(cid);
// 		$(inm1).val(cm1);
// 		$(inm2).val(cm2);
// 		$(inm3).val(cm3);
// 		$(inm4).val(cm4);
// 		$(inm5).val(cm5);
// 		// here we use the valclassfun function to check the input val and if the val is less than the 50 thn the bprder will be red else it will be grey  
// 		valclassfun(inm1)
// 		valclassfun(inm2)
// 		valclassfun(inm3)
// 		valclassfun(inm4)
// 		valclassfun(inm5)


// 		function valclassfun(idval) {
// 			if (idval.val() < 60) {
// 				$(idval).addClass("inputborder")

// 			} else {
// 				$(idval).addClass("outborder")
// 			}
// 		};
// 	});
// }
// // edit btn to enable editing in the input field 
// function editbtnfun() {
// 	// get the edit btn id to add event 
// 	$("#editbtn").on("click", () => {
// 		// calling the class of all input to remove the Readonly attribute 
// 		$('.form-control').attr("readonly", false);
// 	})
// }
// // save btn function
// // fucntion to create the save the input valkkues from the input field 
// function savebtnclick() {
// 	// getting  the save btn   
// 	// click event 

// 	$("#savebtn").on("click", () => {
// 		// to get the values fro mthe inputs we use val() and place that value in the seperate variables

// 		let invalone = $("#strudentname").val()
// 		let invaltwo = $("#studentid").val()
// 		let invalthree = $("#mark1").val()
// 		let invalfour = $("#mark2").val()
// 		let invalfive = $("#mark3").val()
// 		let invalsix = $("#mark4").val()
// 		let invalseven = $("#mark5").val()


// 		// now we get id form the first input
// 		// since the id is in the 001 format we use parseInt() to convet it to the noprmal id format but still we get the initial id at 1 we need it from 0 so we do -1 to the current id  
// 		//  thn we set the input values to the respective key in out mian array 
// 		mainArray[parseInt(invaltwo) - 1].name = invalone
// 		mainArray[parseInt(invaltwo) - 1].id = invaltwo
// 		mainArray[parseInt(invaltwo) - 1].m1 = invalthree
// 		mainArray[parseInt(invaltwo) - 1].m2 = invalfour
// 		mainArray[parseInt(invaltwo) - 1].m3 = invalfive
// 		mainArray[parseInt(invaltwo) - 1].m4 = invalsix
// 		mainArray[parseInt(invaltwo) - 1].m5 = invalseven
// 		// thn we call the main fun again to loop throught the cards 
// 		mainfuniterate();
// 		$(".form-control").val("")
// 	})
// }
// // search function 
// function search() {
// 	// let us get the value in the search box by calling the id of the box  
// 	let indara = $("#data-input")
// 	// console.log(indara)
// 	// thn we add a event to the indara variable 
// 	$(indara).on('input', e => {
// 		const value = e.target.value
// 		// console.log(value)
// 		// we use for each to loop throught the the users array we get from the main fun 
// 		users.forEach(user => {
// 			// console.log(user)
// 			// th nwe declare a variable and that variabale will retun the bollean value of whether the user.name includes (conatins) the value in the input arr 
// 			const isVisible = user.name.includes(value)
// 			// console.log(isVisible)

// 			// then we toggle class to the element which is main card div and we make the boolen oppoisite we get from the  
// 			user.element.toggleClass("hide", !isVisible)
// 		})
// 	})
// }
// // a small trick to chamge the titile of the page while we move to the another tab 
// let title = document.title;
// window.addEventListener("blur", () => {
// 	document.title = " come back to me ) :";
// })
// window.addEventListener("focus", () => {
// 	document.title = title
// });