



<!DOCTYPE html>
<html ng-app="submitFormApp">
<head>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
    <script src="{{ asset('js/submitForm.js') }}"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
</head>
<body style="direction: rtl">
s
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            </div>
        </div>
    </nav>
    <main class="py-4">



        <div class="content" ng-controller="submitFormController" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">








                        <div class="card-body" >
                            <div class="table-responsive">
                                <form  >

                                    {{ csrf_field() }}
                                    <table  style="width:100%" >
                                        <div class="col-sm-6" >
                                            <td>
                                                السائق
                                                <select name="user_id" ng-model="user_id">


                                                    <option ng-repeat="x in users" value="@{{x.id}}">@{{x.name}}</option>


                                                </select>
                                            </td>
                                        </div>

                                        <div class="col-sm-6" >
                                            <td>
                                            <td>
                                                الكميه
                                                <div class="form-group">

                                                    <input type="radio" ng-model="qty1" value="لترات"> لترات<br>
                                                    <input type="radio" ng-model="qty1" value="شيكل"> مبلغ<br>
                                                </div>  </td>
                                            <td>
                                                <label for="qty2"> الكميه</label>
                                                <input type="number" ng-model="qty2" class="form-control">
                                            </td>  </td>
                                        </div>
                                        <div class="col-sm-6" >

                                            <td>
                                                الصنف
                                                <select name="item_id" ng-model="item_id">

                                                    <option ng-repeat="x in items" value="@{{x.id}}">@{{x->name}}</option>
                                                </select>
                                            </td>
                                        </div>

                                        <div class="col-sm-6" >

                                            <td colspan="2">
                                                <button type="submit" class="btn btn-primary"  id="button" ng-click="submitForm()" >اعتماد</button>
                                            </td>
                                        </div>
                                    </table>

                                </form>
                            </div>
                        </div>


                        <div class="card-header card-header-primary">
                            <h4 class="card-title " style="margin-left:500px ;">الطلبات السابقة</h4>
                            <hr>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table1" class="table table-striped table-bordered" style="width:100%">
                                    <thead class=" text-primary">
                                    <th>
                                        رقم الطلب                                        </th>
                                    <th>
                                        التاريخ
                                    </th>
                                    <th>
                                        الصنف
                                    </th>
                                    <th>
                                        الكميه
                                    </th>
                                    <th>
                                        السائق
                                    </th>
                                    <th colspan="2">
                                        الحالة
                                    </th>


                                    </thead>
                                    <tbody>
                                    <tr ng-repeat="(index,order) in orders">
                                        <td> @{{ index + 1 }}</td>
                                        <td>@{{\Carbon\Carbon::parse(order.created_at)->format('d - m - Y')}}</td>
                                        <td>@{{order.item.name}}</td>
                                        <td>@{{order.qty}}</td>
                                        <td>@{{order.user.name}}</td>
                                        <th>

                                            <span ng-if="order.status== false" class="label label-info">تسليم</span>
                                            <span ng-if="order.status== true" class="label label-danger ">ايقاف</span>

                                        </th>
                                        <td>



                                            {{ csrf_field() }}
                                            <button ng-if="order.status == false" type="button" class="btn btn-default" ng-click="changeStatus()" name="stauts">
                                                ايقاف
                                            </button>
                                            <input type="hidden" class="utd" value="@{{order.id}}"/>



                                        </td>

                                    </tr>



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
</div>


</body>
</html>