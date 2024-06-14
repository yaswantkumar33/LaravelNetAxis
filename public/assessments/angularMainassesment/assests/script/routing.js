// routing part 
myapp.config(function ($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl: "assests/pages/logsignpage.html",
            controller: "firstcontroller"
        })
        .when('/dashboard',{
            templateUrl:"assests/pages/dashboard.html",
            controller:"secondcontroller"
        })
        .when('/sucesspage',{
            templateUrl: "assests/pages/sucesspage.html",
        })
})