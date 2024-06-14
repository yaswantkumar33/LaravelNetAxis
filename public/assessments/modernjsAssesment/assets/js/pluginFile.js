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
		// mainfuniterate();
		// console.log(mainArray);

		// console.log(mainArray[122]);


		productmainfun()
	};
	pWindow.CustomList = CustomList;
})(window);

let products = [];
function productmainfun() {


	$("#basic-addon2").on("click", () => {

		if ($("#invalueone").val() != "") {

			listfunmain();
			search();

		} else {
			alert("enter the value in the")
		}



	})
}
// main function to the loop 
function listfunmain() {
	invalueone = $("#invalueone").val().trim()
	let maindiv = $(`<div class = "col-lg-3 p-5 shadow m-3" id = "mainrow"></div>`)
	let header = $(`<h3 class = "text-center">welcome ${invalueone}</h3>`)
	let searchbar = $(`<div class="input-group mb-3">
	<input type="text" class="form-control"
	  placeholder="Recipient's username" aria-label="Recipient's username"
	  aria-describedby="basic-addon2" id = ${invalueone} onclick="search(this)">
	<div class="input-group-append">
	  <span class="input-group-text" id="basic-addon2">show list</span>
	</div>
  </div>`)
	let listdiv = $(`<div class = "row showlist" ></div>`)
	$(maindiv).append(header)
	$(maindiv).append(searchbar)
	$(maindiv).append(listdiv)
	$("#productlists").append(maindiv)
	products = mainArray.map((items) => {
		let productname = items.Name
		let productid = items.ProductId;
		// console.log(productid)
		let productimg = items.ProductPicUrl;
		// console.log(productimg)
		let listsrow = $(`<div class = "listrow"></div>`)
		let formcheck = $(`<input class = "form-check-input" type = "checkbox" onclick = "checkclicked(this)"></input>`)
		let formcheckimg = $(`<img src = ${productimg} height: 30px width: 30px alt="" class = "mx-3 px-5">`)
		let formchecklabel = $(`<label class= "form-check-label mx-5">${productname}</label>`)
		$(listsrow).append(formcheck)
		$(listsrow).append(formcheckimg)
		$(listsrow).append(formchecklabel)
		$(listdiv).append(listsrow)
		return { name: productname, element: listsrow }
		// console.log(name)
	})
	let btndiv = $(`<div></div>`)
	let cartdiv = $(`<div class = " m-2" id ="cartdiv" ></div>`)
	let okbtn = $(`<button class = "btn btn-primary px-5 mx-5 px-5  mt-2 okaybtn" onclick = "okbutton(this)">Okay</button>`)
	let cancelbtn = $(`<button class = "btn  btn-secondary px-5 mx-5 mt-2" onclick = "cancelbtnn(this)">Cancel</button>`)
	$(maindiv).append(btndiv)
	$(btndiv).append(okbtn)
	$(btndiv).append(cancelbtn)
	$(btndiv).append(cartdiv)
	$("#invalueone").val(" ")
}
function okbutton(madara) {
	let a = $(madara).next().next().show()
}
function cancelbtnn(madara) {
	// let a = $(madara).parents(`${invalueone}cart`);
	let a = $(madara).next().hide();
	console.log(a)
}
function checkclicked(madara) {
	$(madara).parents("#mainrow").find("#cartdiv").hide();
	let a = $(madara).parent().html()
	let parentel = $(madara).parents("#mainrow").find("#cartdiv").append(a)
	console.log(parentel)
	console.log(a)
}
// seacrh function  
function search(madara) {
	$(madara).on("input", (e) => {
		const value = e.target.value
		products.forEach(data => {
			// console.log(data)
			const isVisible = data.name.includes(value)
			data.element.toggleClass("hide", !isVisible);
		})
	})
}

