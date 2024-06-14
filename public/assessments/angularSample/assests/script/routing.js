// routing page 

myapp.config(function ($routeProvider) {
            $routeProvider
                .when('/', {
                    templateUrl: "assests/pages/loginpage.html",
                    controller: "firstcontroller"
                })
                .when('/signup',{
                    templateUrl:"assests/pages/signuppage.html",
                    controller:"secondcontroller"
                })
                .when('/dashboard',{
                    templateUrl:"assests/pages/dashboard.html",
                    controller:"thirdcontroller"
                })
                .when('/sucesspage',{
                    templateUrl: "assests/pages/sucesspage.html",
                    controller:"fouthcontroller"
                    
                })
        })