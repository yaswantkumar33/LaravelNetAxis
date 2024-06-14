let mainArray;

(function (pWindow) {
	// if (typeof pWindow.CustomList == "function") {
	// 	throw new Error("CustomList function already defined");
	// }
	/*===================== creating default values =============*/

	let CustomList = function (pId, options) {
		if (!(this instanceof CustomList)) {
			return new CustomList(pId, options);
		}
		this.domEl = document.getElementById(pId);
		if (!this.domEl) {
			throw new Error("dom not found");
		}
		this.options = options || {};
		if (typeof this.options.data == "undefined") {
			this.options.data = [];
		}
		mainArray = options;
		this.displayList();
	};

	/*==================== creating new list ================*/

	CustomList.prototype.displayList = function () {
		mainfuniterate();
	};
	pWindow.CustomList = CustomList;
})(window);






// msian fun is here 
function mainfuniterate() {
	$("#row1").html("");

	for (i = 0; i < mainArray.length; i++) {
		 stuname = mainArray[i].name;
		let imsrc = mainArray[i].img;

		 maincarddiv = `<div class="card col-sm-3 m-2 p-3" >
<button class= "btn imgbtn" id =${i}><img src="${imsrc} " class=" card-img " alt="..." id = ${i}></button>
<div class="card-body">
  <p class="card-text">NAME : ${stuname}</p>
</div>
</div>`;

		$("#row1").append(maincarddiv);
	}

	btnclicked();
	editbtnfun();
	savebtnclick();	
	 
	


}

function btnclicked() {

	$(".imgbtn").click(function (e) {
		e.preventDefault();
		let id = $(this).attr("id");
		console.log(id);


		let cname = mainArray[id].name;
		let cid = mainArray[id].id;
		let cm1 = mainArray[id].m1;
		let cm2 = mainArray[id].m2;
		let cm3 = mainArray[id].m3;
		let cm4 = mainArray[id].m4;
		let cm5 = mainArray[id].m5;

		console.log(cname, cid, cm1, cm2, cm3, cm4, cm5);
		let inname = $("#strudentname")
		let inid = $("#studentid")
		let inm1 = $("#mark1")
		let inm2 = $("#mark2")
		let inm3 = $("#mark3")
		let inm4 = $("#mark4")
		let inm5 = $("#mark5")





		$(inname).val(cname);
		$(inid).val(cid);
		$(inm1).val(cm1);
		$(inm2).val(cm2);
		$(inm3).val(cm3);
		$(inm4).val(cm4);
		$(inm5).val(cm5);



	});


	// editbtn  function




}


function editbtnfun() {
	$("#editbtn").on("click", () => {
		$('#strudentname').attr("readonly", false);
		$("#studentid").attr("readonly", false);
		$("#mark1").attr("readonly", false);
		$("#mark2").attr("readonly", false);
		$("#mark3").attr("readonly", false);
		$("#mark4").attr("readonly", false);
		$("#mark5").attr("readonly", false);
	})

}


// save btn function

function savebtnclick(){
	$("#savebtn").on("click",()=>{
		let invalone = $("#strudentname").val()
		let invaltwo = $("#studentid").val()
		let invalthree = $("#mark1").val()
		let invalfour = $("#mark2").val()
		let invalfive = $("#mark3").val()
		let invalsix = $("#mark4").val()
		let invalseven = $("#mark5").val()
		mainArray[parseInt(invaltwo)-1].name= invalone
		mainArray[parseInt(invaltwo)-1].id=invaltwo
		mainArray[parseInt(invaltwo)-1].m1= invalthree
		mainArray[parseInt(invaltwo)-1].m2= invalfour
		mainArray[parseInt(invaltwo)-1].m3= invalfive
		mainArray[parseInt(invaltwo)-1].m4= invalsix
		mainArray[parseInt(invaltwo)-1].m5= invalseven



		mainfuniterate();
		
		
		
	})
	
}



// search function 


// search part 
// let users = []
// let indara = $("#data-input")
// // console.log(indara)
// $(indara).on('input', e => {
//     const value = e.target.value
//     users.forEach(user => {
//         // console.log(user)
//         const isVisible = user.name.includes(value) /*|| user.place.includes(value)*/
//         user.element.toggleClass("hide", !isVisible)

//     })
// })













let title = document.title;
window.addEventListener("blur",()=>{
    document.title = " come back to me ) :";
})

window.addEventListener("focus",()=>{
    document.title = title
});
