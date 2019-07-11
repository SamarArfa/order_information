@extends('layouts.main');
{{--<!doctype html>--}}
<html  ng-app="submitFormApp">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
    <script src="js/app.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
{{--    <script src="{{ asset('css/app.css') }}"></script>--}}

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

</head>
<body  style="direction: rtl">

<div ng-view></div>

</body>
</html>
