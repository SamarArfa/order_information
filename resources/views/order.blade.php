



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>{{ config('app.name', 'Laravel') }}</title>



    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}
</head>
<body style="direction: rtl">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            </div>
        </div>
    </nav>
    <main class="py-4">

{{--@section('content')--}}
    <div id="message"></div>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">








                        <div class="card-body">
                            <div class="table-responsive">
                                <form  action="{{route('order.store')}}" method="post">

                                    {{ csrf_field() }}
                                    <table  style="width:100%" >
                                        <div class="col-sm-6" >
                                            <td>
                                                السائق
                                                <select name="user">
                                                    @foreach($users as $user)
                                                        {{--                                            {{$users}}--}}
                                                        {{--@if($order->user_id==$order->user->id)--}}
                                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                                        {{--                                            @endif--}}
                                                    @endforeach
                                                </select>
                                                {{--                                    </div>--}}
                                            </td>
                                        </div>


                                        <div class="col-sm-6" >
<td>
                                        <td>
                                الكميه
                                         <div class="form-group">

                                <input type="radio" name="qty1" value="لترات"> لترات<br>
                                <input type="radio" name="qty1" value="شيكل"> مبلغ<br>
                                    </div>  </td><td>
                                        <input type="number"   name="qty2" required>
{{--                                    </div>--}}
                                            </td>  </td> </div>
                                        <div class="col-sm-6" >

                                            <td>
                                                الصنف
                                                <select name="item">
                                                    @foreach($items as $item)

                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </div>

                                        <div class="col-sm-6" >

                                            <td colspan="2">
                                                <button type="submit" class="btn btn-primary" id="button" >اعتماد</button>
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
                                        @foreach($orders as $key=>$order)
                                            <tr>
                                                <td>{{$key+1}}</td>
{{--                                                <td>{{$order->id}}</td>--}}
                                                <td>{{\Carbon\Carbon::parse($order->created_at)->format('d - m - Y')}}</td>
                                                <td>{{$order->item->name}}</td>
                                                <td>{{$order->qty}}</td>
                                                <td>{{$order->user->name}}</td>
                                                <th>
                                                    @if($order->status == false)

                                                    <span class="label label-info">تسليم</span>
                                                    @else
                                                        <span class="label label-danger ">ايقاف</span>
                                                    @endif

                                                </th>
                                                <td>

                                                    @if($order->status == false)


                                                            {{ csrf_field() }}
                                                            <button type="button" class="btn btn-default stauts_update" name="stauts">
                                                                ايقاف
                                                            </button>
                                                            </form>
                                                            <input type="hidden" class="utd" value="{{$order->id}}"/>



                                                        @endif
                                                    </td>

                                            </tr>


                                        @endforeach

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
{{--<script>--}}

    <script>
    $(document).ready(function(){
        $(".stauts_update").click(function() {
            var val = $(this).parent().find('.utd').val();
            $.ajax ({
                url: "order/" + val,
                method:"PUT",
                data:{body:'', _token:'{{csrf_token()}}'},
                success: function( result ) {
                    alert("  تم الايقاف ");
                    window.location.reload()

                }
            });
        });
    });

    $("#button").click(function(){
        alert("done add");
        // $(".alert").hide().show('medium');
    });
</script>
{{--    $(document).ready(function(){--}}
{{--        $(".stauts_update").click(function() {--}}
{{--        // console.log('ddd');--}}
{{--        // alert('sss');--}}
{{--        var val = $(this).parent().find('.utd').val();--}}
{{--            $.ajax ({--}}
{{--                url: "/order/" + val,--}}
{{--                method:"PUT",--}}
{{--                data:{body:'', _token:'{{csrf_token()}}'},--}}
{{--                success: function( result ) {--}}
{{--                    alert("  Are you change this request ?");--}}
{{--                    window.location.reload()--}}

{{--                }--}}
{{--            });--}}
{{--        });--}}

{{--    });--}}


{{--</script>--}}


</html>
