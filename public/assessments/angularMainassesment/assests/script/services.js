// custom services part 

// main service 
myapp.service("mainservice", function () {

    // in main service we declare this as mser
    var msar = this;
    // we get this usernmae in service to use it in the necxt page 
    msar.username;
    // main user datat array 
    msar.userdata = [{ name: "obito", email: "obito@gmail.com", pass: 1234567 }]
})


// seconds service 
myapp.service("secondservice", function () {
// in second service we call this as seser 
    var seser = this
    // thisbis main movie datas array 
    seser.moviedata = [{ movid: 0, movname: "avengers", movtime: "12.30.pm", ticketavl: "5", ticketprice: 200,numoftic:0 },
     { movid: 1, movname: "snowden", movtime: "6.30.pm", ticketavl: "6", ticketprice: 250 ,numoftic:0 },
      { movid: 2, movname: "the great hack", movtime: "3.30.pm", ticketavl: "4", ticketprice: 180 ,numoftic:0}]
// main breverage array 
    seser.itemdata = [{ itemid: 0, name: "coke", price: 70, quantity: 0 }, { itemid: 1, name: "popcorn", price: 60, quantity: 0 }, { itemid: 2, name: "cookies", price: 40, quantity: 0 },]
    seser.totalprice;
    seser.bookedmov = [];
    seser.cprice;
})