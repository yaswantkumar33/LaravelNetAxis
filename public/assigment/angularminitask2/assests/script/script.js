// initialising the angular app 
var myapp = angular.module("myapp", ['ngRoute'])
    // declaring the root scope 
    .run(function ($rootScope,) {
        $rootScope.data = [{ userid: 0, name: "madara", pass: "123", color: [] }, { userid: 1, name: "luffy", pass: "456", color: [] }, { name: "guest", color: [] }];
        $rootScope.valname;
        $rootScope.valpass;
        $rootScope.guest = [];
        // we declare the root scope as the gencolor to use the random rgb generator globle 
        $rootScope.gencolor = function () {
            var o = Math.round, r = Math.random, s = 255;
            return 'rgba(' + o(r() * s) + ',' + o(r() * s) + ',' + o(r() * s) + ',' + r().toFixed(1) + ')';
        }
    })
    // making the routing  part 
    .config(function ($routeProvider) {
        $routeProvider
            // first routing to the deafult page of login 
            .when('/', {
                templateUrl: "pages/loginpage.html",
                controller: "maincontroller"
            })
            // second page for the sign up 
            .when('/signup/', {
                templateUrl: "pages/signuppage.html",
                controller: "secondcontroller"
            })
            // third page for the dash boarde 
            .when('/dashboard/', {
                templateUrl: "pages/dashboard.html",
                controller: "thirdcontroller"
            })
            .when('/adminpage/', {
                templateUrl: "pages/admin.html",
                controller: "admincontroller"
            })
    })
    // maincontroller for the login page 
    .controller("maincontroller", function ($scope, $rootScope, $window) {

        $scope.errorme = false

        // click event for the log in page 
        $scope.logclick = function () {
            var checkdata = $rootScope.data
            // alert("clciked")
            for (var i = 0; i < checkdata.length; i++) {
                // console.log(i)
                if ($scope.username == checkdata[i].name && $scope.userpass == checkdata[i].pass) {
                    $window.location.href = '#!/dashboard'
                    // alert("okokokokok")
                    // $rootScope.valname=$scope.username;
                    $rootScope.valname = $scope.username;
                    $rootScope.valpass = $scope.userpass;
                } else {
                    if ($scope.username == "admin" && $scope.userpass == 1512) {
                        $window.location.href = "#!/adminpage"
                    }
                    else{
                        $scope.errorme=true;
                    }
                }
            }
        }
        // clic kevent for the guest user 
        $scope.guestuser = function () {

            $window.location.href = '#!/dashboard'
            $rootScope.valname = "guest"
        }
    })
    // second controller for the signuppage 
    .controller("secondcontroller", function ($scope, $rootScope, $window) {
        $scope.signupclick = function () {
            $rootScope.data.push({ userid: $rootScope.data.length, name: $scope.username, pass: $scope.userpass, color: [] })
            // console.log({name:$scope.username,pass:$scope.userpass,dob:$scope.userdob})
            // console.log($rootScope.data)
            $window.location.href = '#!/';
        }
    })
    // third controller for the dashboard page 
    .controller("thirdcontroller", function ($scope, $rootScope) {
        // we declare the $scope as a variable 
        var dashboard = $scope;
        dashboard.name = $rootScope.valname
        dashboard.pass = $rootScope.valpass
        // click function 
        var count = 0
        // click event for the add the  random rgb to the array 
        dashboard.rcolor = function () {

            // here we use the contition to have the max click of the 8 so we declare the count = 7 because its starts from 0 
            if (count <= 7) {
                // we declare the dashboard random color is random rgb generatir function we created in the roiot scope 
                dashboard.randomcolor = $rootScope.gencolor()
                console.log(dashboard.randomcolor)

                // we sect the random colo0r generated to the input bg 
                $("#inval").css("background-color", dashboard.randomcolor)
                // th nwe loop throught tghre main jsdon array which is declare in the root scope 
                $rootScope.data.forEach((value) => {

                    // here we check the lohin data but using the name onlt for now 
                    if ($rootScope.valname == value.name) {
                        // here we declare count to be increamented to each click 
                        count = count + 1

                        value.color.push(dashboard.randomcolor)
                        console.log($rootScope.data)
                    }

                })
            }
            else {
                dashboard.maxclickalert = true
            }
        }
        // click event to the preview 

        // here we write the click eent to the preview of the user colors 
        dashboard.pclcik = function () {

            // we .loop thopught the data arrray adn we check that if the nmae ofn the user and nmae in the data array is equal menas we get color array oif the user 
            $rootScope.data.forEach((value) => {
                if (dashboard.name == value.name) {
                    $scope.usercolor = value.color
                }
            })
        }

        // her we code for the friends preview 
        dashboard.pclickfrd = function (mada) {
            // mada is the index we pass in the ng-0click event and we use the index to get the color array of the specfic user and show it in the page 
            dashboard.frndpreview = $rootScope.data[mada].color
            console.log(dashboard.frndpreview)
        }

    })

    // controller for tghe admin page 
    .controller("admincontroller", function ($scope, $rootScope) {
        var adminpage = $scope;

        adminpage.usersdata = $rootScope.data;
        console.log(adminpage.usersdata)
    })




