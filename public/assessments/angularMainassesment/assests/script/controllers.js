myapp.controller("firstcontroller", function ($scope, mainservice, $window) {
    // ng-hide and show 
    var firs = $scope
    firs.login;
    firs.signin;
    firs.loginclick = function () {
        // if the login is clkicked we show the log in tab and hide the sign up 
        firs.login = true;
        firs.signin = false;
    }
    firs.signinclick = function () {
        // if the login is clkicked we show the sign up tab and hide the log in 
        firs.login = false;
        firs.signin = true;
    }
    // login works here
    firs.errorme = false;
    // we get user name and pass to check for log-in 
    firs.logusername;
    firs.loguserpass;
    // thn we call the user data from the mainservice  
    firs.checkdata = mainservice.userdata
    // here is the log in click function 
    firs.loginpageclick = function () {
        // console.log(firs.logusername,firs.loguserpass)
        // we loop through the check data array and match with the login datas 
        firs.checkdata.forEach((value) => {
            mainservice.username = firs.logusername
            // console.log(mainservice.username)
            if (firs.logusername == value.name && firs.loguserpass) {
                // if match found we route to the dashboard 
                $window.location.href = '#!/dashboard'
            } else {
                // else we show the error message 
                if (firs.logusername !== value.name && firs.loguserpass !== value.pass) {
                    firs.errorme = true;
                }
            }
        })
    }
    // sign -up works here
    
    // we get the sign up deatils from the user by ng-model 
    firs.signusername;
    firs.signuseremail;
    firs.signuserpass;
// here is the sign-up-click function 
    firs.signuppageclick = function () {
        mainservice.username = firs.signusername
        // console.log(mainservice.username)
        mainservice.userdata.push({ name: firs.signusername, email: firs.signuseremail, pass: firs.signuserpass })
        console.log(mainservice.userdata)
        $window.location.href = '#!/dashboard'
    }
})
// second controller for dashboard page 
myapp.controller("secondcontroller", function ($scope, mainservice, secondservice,$window,$timeout) {
    // movie table part 
    var seco = $scope  
    // logout function here 
seco.logout=function(){
    $window.location.href = '#!/'
}
// here we have click funtion to dhow the movie tab 
    seco.moveshow=function(){
    seco.movidata=true
    seco.brev=false
}
// here we have breverage click funbtion  
seco.bevshow = function(){
    seco.movidata=false
    seco.brev=true
}
// thn we set the user name to the servie to use in another page 
    seco.name = mainservice.username
    seco.movdata = secondservice.moviedata
    console.log(seco.movdata)
    // beverage table part 
    seco.bevdata = secondservice.itemdata;
    console.log(seco.bevdata)
    // breverage calculation  section 
    seco.stprice = function () {
        var data1 = 0
        seco.bevdata.forEach((value) => {
           var  ttice = (value.quantity * value.price)
            data1 = data1 + ttice
        })
        // console.log(data1)
        secondservice.totalprice = data1
        // console.log(secondservice.totalprice)
        seco.overallprice = secondservice.totalprice
    }
    seco.movename;
    seco.bookeddata= secondservice.bookedmov
    // here we have the name of the movie  click  funtion 
    seco.movnameclick = function(movid){
        seco.costpart=true;
        console.log(movid)
        seco.movename=seco.movdata[movid].movname
        console.log(seco.movename)
        secondservice.bookedmov.push(seco.movdata[movid])
        console.log(secondservice.bookedmov)
    }
    // here the cp price is the funtion ofr the movies ticket booking section 
    seco.cprice=function(vl,idd){

        // we check whether the input value of the input tag and  the specfic movie"s numvber of ticket is equal or not if it more than it it shows error  
       if(vl >= 0){
        if( vl <= secondservice.moviedata[idd].ticketavl){
            seco.limiterror=false;
            var data2 = 0
            // ticket multiply section 
            seco.bookeddata.forEach((value)=>{
                temp = value.ticketprice * value.numoftic
                data2 = data2 + temp
            })
            console.log(data2)
            secondservice.cprice=data2
            seco.cmprice=secondservice.cprice
        }
        else{
            seco.limiterror=true;   
        }

       }
       else{
        alert("the input value must be greater thanb zero")
       }
    }
    // here is the final pay click function 
    seco.payclick=function(){
        $window.location.href = '#!/sucesspage'
        $timeout(function () {
            $window.location.href = "#!/"
        }, 3000)

    }
})