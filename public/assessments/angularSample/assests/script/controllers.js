
// log-in controller 
myapp.controller("firstcontroller", function ($scope, mainservice, $window) {
    // we declare the  firs to $scope
    var firs = $scope
    // we deafulty give false to the error message 
    firs.errorme = false;
    // we get the user name and user upi 
    firs.uname;
    firs.u_upi;
    // login in click function 
    firs.logclick = function () {
        firs.errorme = false;
        // we get the main data fro mthe main servie 
        var chekdata = mainservice.userdata
        // we loop through the chekdata arr and we find whether the username and pass is in the arr or not 
        chekdata.forEach((value) => {
            if (firs.uname == value.uname && firs.u_upi == value.user_upi) {

                // if right we give this user name nad its balance to the servie to use in another page 
                mainservice.username = firs.uname;
                mainservice.userbalance = value.ubalance
                mainservice.user_upi = value.user_upi
                // mainservice.userbalance=value.ubalance
                // thn we redirect to the dashboard page 
                $window.location.href = '#!/dashboard'
                if (firs.uname !== value.uname && firs.u_upi !== value.user_upi) {
                    firs.errorme = true
                }
            }
            else {
                if (firs.uname !== value.uname && firs.u_upi !== value.user_upi) {
                    firs.errorme = true
                }
            }
        })
    }
})
// sign-up page controller 
myapp.controller("secondcontroller", function ($scope, mainservice, $window) {
    // we declare $scope as seds in this controller 
    var seds = $scope
    // thn we get the username and upi and acc num using the ng-model 
    seds.username;
    seds.upi_num;
    seds.useraccnum;
    // random upi genrator for the  user 
    seds.genupi = function () {
        // we use the math .floor to rounf it and math.random to the random num thn multiply by 9000000 to get seven digit num 
        seds.upi_num = Math.floor(100000 + Math.random() * 9000000)
        console.log(seds.upi_num)
    }
    // the sign up funtion 
    seds.sigupclick = function () {
        // here we push the data we got from the user in an object ty-pe in the userdata array when is in  the main service 
        mainservice.userdata.push(({ userid: mainservice.userdata.length, uname: seds.username, user_upi: seds.upi_num, useracc: seds.useraccnum, ubalance: 50000 }))
        console.log(mainservice.userdata)
        // thn we redirect teh page to the login page 
        $window.location.href = '#!/'
    }
})
// third controller for the dashboard page 
myapp.controller("thirdcontroller", function ($scope, mainservice, secondservice, $window, $timeout) {
    // here we declare $scope as thico 
    var thico = $scope
    // then we set the username as a global name using the custom service 
    thico.username = mainservice.username
    // same as balance also
    thico.userbalance = mainservice.userbalance
    // th nwe declkare the main uiser data in the service as the chekdata 
    thico.chekdata = mainservice.userdata
    // same as the upi also 
    thico.user_upi = mainservice.user_upi

    // her is the log-out  click function 
    thico.logout = function () {
        $window.location.href = "#!/"
    }
    // here we create a frnd funtion to add the others to a service arr 
    thico.frndfun = function () {

        // here we use for each to the cheik data 
        thico.chekdata.forEach((value) => {
            // console.log(value)
            // we check that if the username is  not equal means push 
            if (thico.username !== value.uname) {
                secondservice.o_user.push(value)
                console.log(secondservice.o_user)
            }
        })
    }
    // then we call that funtion 
    thico.frndfun();
    // then we set datas = othersuers we crested in the frnd fun  
    thico.datas = secondservice.o_user
    // then when we click add new we give true to the ng show of the other users section 
    thico.addnewclick = function () {
        thico.otherusers = true
    }
    // then we write the funtion to the add to frnd 
    thico.addtofrnd = function (idd) {
        // we get id of the clicked by passing the id as parameter 
        console.log(idd)
        // now using the id we got we push respected value of the id to the frnd arr in the service  
        secondservice.frndarr.push(mainservice.userdata[idd])
        // console.log(secondservice.frndarr)
    }
    // then we declare the frnd arr in the service as the frnarr  for ng repeat
    thico.frnarr = secondservice.frndarr;
    // here these are the ig-model of the inputs in the payment transaction section 
    thico.tuser;
    thico.taccno;
    thico.amo;
    // function opfr the send
    thico.sendmny = function (idd) {
        // thn as we get id of as attribute  using that id we call the respected value and set it to the input value 
        thico.tuser = mainservice.userdata[idd].uname
        thico.taccno = mainservice.userdata[idd].useracc
    }
    // complete tansaction funtion 
    thico.ctclick = function () {
        // we do the math thing in this part 
        mainservice.userbalance = mainservice.userbalance - thico.amo
        // console.log(thico.userbalance) 

        // and here we set the time out for the page redirection after 3 seconds 
        $window.location.href = "#!/sucesspage"
        $timeout(function () {
            $window.location.href = "#!/dashboard"
        }, 3000)
    }
})
// fouth controller for the sucess function 
myapp.controller("fouthcontroller", function ($scope, mainservice) {
    // in this foutrh arr we declare the $scope as the focs 
    var focs = $scope
    // we call the bal amount from the service 
    focs.totalbalance = mainservice.userbalance;
    console.log(focs.totalbalance)
})