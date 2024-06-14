var xhrHttp=new XMLHttpRequest();
   xhrHttp.onreadystatechange = function(){
   if(this.readyState==4){
      if(this.status==200){
         var data=JSON.parse(this.responseText);
         		OnLoaded(data);
         		/* search(data); */
         		 }
     		   }	
         }
    xhrHttp.open('GET','assets/products.json',true);
		xhrHttp.send();

/*---------------onload func--------------*/
var OnLoaded = function(data) {
    sample = CustomList('grid',  data.ProductCollection);
    // console.log(data.students);
};
/*=========== search func============*/

/* var search =function(event){
  sample._filter(event);
}; */
				