var myapp = angular.module("myapp", ['ngRoute'])
    // rootscope part ////////////////////////////////////
    .run(function ($rootScope,) {
        $rootScope.data = [{ name: "madara", pass: "123", age: 23, city: "toyko" }];
        $rootScope.valname;
        // $rootScope.name = "madara"
        $rootScope.cartdata = []
    })
    // route angular /////////////////////////////////////
    .config(function ($routeProvider) {
        $routeProvider
            .when('/', {
                templateUrl: "pages/main.html",
                controller: "maincontroller"
            })
            .when('/second/', {
                templateUrl: "pages/second.html",
                controller: "secondcontroller"
            })
            .when('/third/', {
                templateUrl: "pages/third.html",
                controller: "thirdcontroller"
            })
    })
    .controller("maincontroller", function ($scope, $rootScope, $window) {
        $scope.errorme = false
        $scope.logclick = function () {
            var checkdata = $rootScope.data
            // alert("clciked")
            for (var i = 0; i < checkdata.length; i++) {
                // console.log(i)
                if ($scope.username == checkdata[i].name && $scope.userpass == checkdata[i].pass) {
                    $window.location.href = '#!/third'
                    // alert("okokokokok")
                    // $rootScope.valname=$scope.username;
                    $rootScope.valname = $scope.username;
                } else {
                    $scope.errorme = true;
                }
            }
        }
    })
    .controller("secondcontroller", function ($scope, $rootScope, $window) {


        $scope.signupclick = function () {
            $rootScope.data.push({ name: $scope.username, pass: $scope.userpass, dob: $scope.userdob })
            // console.log({name:$scope.username,pass:$scope.userpass,dob:$scope.userdob})
            // console.log($rootScope.data)

            $window.location.href = '#!/';
        }

    })
    .controller("thirdcontroller", function ($scope, $rootScope, $http) {
        $scope.name = $rootScope.valname;
        $scope.tprice = 0
        $scope.signup = function () {
            $rootScope.data.forEach((value) => {
                if (value.name == $scope.name) {
                    console.log(value);
                    $scope.uname = $scope.name
                    $scope.uage = value.age
                    $scope.ucity = value.city
                    $scope.udob = value.dob
                    console.log($scope.uname, $scope.uage, $scope.ucity)

                }

            })
        }
        // calling the signup function
        $scope.signup();
        $http.get("record.json").then(function (response) {
            $scope.jsondata = response.data.productlist;
            // console.log($scope.jsondata)

        })
// addd to cart part 
        $scope.addtocart = function (event) {
            $scope.indexval = event;
            // console.log(event)
            $rootScope.cartdata.push($scope.jsondata[$scope.indexval])
            console.log($scope.cartdata)
        }



        $scope.countval = function (event, eve) {
            // console.log(event)
            // console.log(eve.target.)
            $scope.calculatedval = $(eve.target).parents("#maincardb").find("#cardinval").val() * $(eve.target).parents('#maincardb').find("#productprice").text()
            $scope.tprice = $scope.tprice+$scope.calculatedval
        }
        $scope.deleteitem = function (id, eve) {
            $(eve.target).parents("#maincardb").remove()
        }


    })