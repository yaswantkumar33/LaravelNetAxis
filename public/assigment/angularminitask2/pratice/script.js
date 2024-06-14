var myapp = angular.module("myapp", [])

.service("myser",function($http){
    this.arr=[];
    
    this.fun = function(){
        return new Promise((resolve)=>{
            $http.get("record.json").then(function(response){
                this.datas = response.data.recorddata;
                resolve(this.datas)
            }).catch(function(){
                alert("ohhhhhhhhhhhhh shitttttttttt")
            })
        })

    }
    this.datafun =  async function(){
        var grtdata = await this.fun()
        this.arr=grtdata;
    }
    this.datafun();
})
.controller("maincontroller",function( $scope,myser){
$scope.name = "madara"
    $scope.click=function(){


        myser.arr.push({name: $scope.name})
        console.log(myser.arr)
    }

})

    // .service("cusservice", function ($http) {
    //     var cusser = this;
    //     cusser.krish=[{}];
    //     cusser.fun = function () {
    //         $http.get("record.json")
    //             .then(function (response) {
    //                 var data = response.data.recorddata;
    //                 console.log(data)
    //                 return cusser.krish = data
    //             })
    //     }
        
    // })



    // .controller("maincontroller", function ($scope, cusservice) {
    //     $scope.name = "jsondata";
    //     $scope.asynfun = async function () {
    //         var ads = await cusservice.fun()
    //         console.log(ads, 2)
    //         cusservice.data = ads
    //     }
    //     $scope.asynfun();

    // })
