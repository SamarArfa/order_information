var myApp = angular.module('submitFormApp',["ngRoute"]);
myApp.config(function($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl : "../views/oreder.blade.php",
            controller : "infoController"

        });
});
myApp.controller('submitFormController',function($scope,$http,$window){


    $scope.orders = [],
        $scope.items = [],
        $scope.users = [],

        // List tasks
        $scope.loadTasks = function () {
            $http.get('/order')
                .then(function success(e) {
                    $scope.orders = e.orders;
                    $scope.items = e.items;
                    $scope.users = e.users;

                });
        },
        $scope.loadTasks();
    // $scope.errors=[],
    // $scope.order={user_id:"",item_id:"",qty:""},
    // $scope.initAdd=function(){
    //     $scope.resetForm(),
    //         $("#add_new_task").modal("show")
    // },
    // $scope.submitForm = function() {
    //     $http({
    //         method: 'POST',
    //         url: '/order',
    //         data: {
    //             user_id : $scope.user_id,
    //             status : false,
    //             item_id : $scope.item_id,
    //             qty: $scope.qty1 . $scope.qty2,
    //         },
    //         dataType : 'json',
    //     }).then(function successCallback(response) {
    //         console.log(response);
    //         alert('Submit Success');
    //         $scope.displayData();
    //         $window.location.href = 'submitForm';
    //     }, function errorCallback(response) {
    //         console.log(response);
    //         alert('Submit Error');
    //     });
    // }
    // $scope.displayData=function () {
    //     $http({
    //         method: 'get',
    //         url: '/order'
    //     }).then(function (order) {
    //
    //         $scope.order = order['data'];
    //     }, function (error) {
    //         console.log(error);
    //     });
    //
    // }
    // $scope.changeStatus=function (id) {
    //
    //
    //
    //     $http({
    //         method: 'PUT',
    //         url: '/order'+id,
    //         data: {
    //             id: $scope.id,
    //             // user_id : $scope.user,
    //             // status : false,
    //             // item_id : $scope.item,
    //             // qty: $scope.qty1 . $scope.qty2,
    //         },
    //         dataType : 'json',
    //     }).then(function successCallback(response) {
    //         console.log(response);
    //         alert(' تم الايقاف ');
    //         $scope.displayData();
    //     }, function errorCallback(response) {
    //         console.log(response);
    //         alert('Submit Error');
    //     });
    // }
});