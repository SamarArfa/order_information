var myApp = angular.module('submitFormApp',["ngRoute"]);
myApp.config(function($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl : "views/order.blade.php",
            controller : "submitFormController"

        }).otherwise({
        template : "<h1>None</h1><p>Nothing has been selected</p>"
    });
});
myApp.controller('submitFormController',function($scope,$http){


        $scope.orders = [],
        $scope.items = [],
        $scope.users = [],
            $scope.today = new Date();
        // List tasks
        $scope.loadTasks = function () {
            $http.get('http://localhost/order/public/order')
                .then(function success(e) {
                    console.log(e.data);
                    $scope.orders = e.data.orders;
                    $scope.items = e.data.items;
                    $scope.users = e.data.users;

                });
        };
        $scope.loadTasks();
    $scope.errors=[],
    $scope.order={user_id:"",item_id:"",qty:""},
    $scope.initAdd=function(){
        $scope.resetForm(),
            $("#add_new_task").modal("show")
    },
        $scope.changeStatus=function (id) {

        // alert('sdvfedrh');

        $http({
            method: 'PUT',
                url: 'http://localhost/order/public/order/'+id,
            data: {
                id: id,


            },
            dataType : 'json',
        }).then(function successCallback(response) {
            console.log(response);
            alert(' تم الايقاف ');
            // $scope.displayData();
            $scope.loadTasks();

        }, function errorCallback(response) {
            console.log(response);
            alert('Submit Error');
        });
    },
    $scope.submitForm = function() {
        $http({
            method: 'POST',
            url: 'http://localhost/order/public/order',
            data: {
                user_id : $scope.user_id,
                status : false,
                item_id : $scope.item_id,
                qty1: $scope.qty1 ,
                qty2: $scope.qty2,
            },
            dataType : 'json',
        }).then(function successCallback(response) {
            console.log(response);
            alert('Submit Success');
            // $scope.displayData();
            // $window.location.href = 'http://localhost/order/public/order';
            $scope.loadTasks();
        }, function errorCallback(response) {
            console.log(response);
            alert('Submit Error');
        });
    }
    // ,
    // $scope.displayData=function () {
    //     $http({
    //         method: 'get',
    //         url: 'http://localhost/order/public/order'
    //     }).then(function (order) {
    //
    //         $scope.order = order['data'];
    //     }, function (error) {
    //         console.log(error);
    //     });
    //
    // }

});