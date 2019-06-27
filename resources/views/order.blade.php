



@extends('layouts.main')

@push('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush


@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">








                        <div class="card-body">
                            <div class="table-responsive">
                                <form  action="{{route('order.add_order')}}" method="post">
@csrf
                                    <table  style="width:100%" >
                                        <div class="col-sm-6" >

                                    <td colspan="2">
                                        <button type="submit" class="btn btn-primary">اعتماد</button>
                                    </td>
                                        </div>
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
<td>
                                        <td>
                                الكميه
                                         <div class="form-group">

                                <input type="radio" name="qty1" value="لترات"> لترات<br>
                                <input type="radio" name="qty1" value="شيكل"> مبلغ<br>
                                    </div>  </td><td>
                                        <input type="text"   name="qty2" required>
{{--                                    </div>--}}
                                            </td>  </td> </div>
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
                                    </table>

                                </form>
                            </div>
                        </div>


                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">الطلبات السابقة</h4>
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
                                        <th>
                                            الحالة
                                        </th>


                                        </thead>
                                        <tbody>
                                        @foreach($orders as $key=>$order)
                                            <tr>
                                                <td>{{$order->id}}</td>
                                                <td>{{$order->created_at}}</td>
                                                <td>{{$order->item->name}}</td>
                                                <td>{{$order->qty}}</td>
                                                <td>{{$order->user->name}}</td>
                                                <th>
                                                    @if($order->status == true)

                                                    <span class="label label-info">تسليم</span>
                                                    @else
                                                        <span class="label label-danger ">ايقاف</span>
                                                    @endif

                                                </th>
                                                <td>

                                                    @if($order->status == false)
                                                        <form id="status-form-{{ $order->id }}" action="{{ route('orderController.status',$order->id) }}" style="display: none;" method="POST">
                                                            @csrf
                                                        </form>

                                                        <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('Are you change this request ?')){
                                                                event.preventDefault();
                                                                document.getElementById('status-form-{{ $order->id }}').submit();
                                                                }else {
                                                                event.preventDefault();
                                                                }"><i class="material-icons">تسليم</i></button>
                                                        @else
                                                        <form id="status-form-{{ $order->id }}" action="{{ route('orderController.status',$order->id) }}" style="display: none;" method="POST">
                                                            @csrf
                                                        </form>

                                                        <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('Are you change this request ?')){
                                                                event.preventDefault();
                                                                document.getElementById('status-form-{{ $order->id }}').submit();
                                                                }else {
                                                                event.preventDefault();
                                                                }"><i class="material-icons">ايقاف</i></button>

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
        </div>
{{--        <div class="row">--}}
{{--            <div class="col-sm-6  col-md-6 col-md-offset-3 col-sm-offset-3">--}}
{{--                <strong>Tolal:{{$totalPrice}}</strong>--}}
{{--            </div>--}}
{{--        </div>--}}



@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
@endpush

















{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <!-- <link rel="shortcut icon" href="images/star.png" type="favicon/ico" /> -->--}}

{{--    <title>Order Information</title>--}}

{{--    <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">--}}



{{--</head>--}}

{{--<body>--}}
{{--<h2>HTML Table</h2>--}}

{{--<table>--}}
{{--    <tr>--}}
{{--        <th>Company</th>--}}
{{--        <th>Contact</th>--}}
{{--        <th>Country</th>--}}
{{--    </tr>--}}
{{--    <tr>--}}
{{--        <td>Alfreds Futterkiste</td>--}}
{{--        <td>Maria Anders</td>--}}
{{--        <td>Germany</td>--}}
{{--    </tr>--}}
{{--    <tr>--}}
{{--        <td>Centro comercial Moctezuma</td>--}}
{{--        <td>Francisco Chang</td>--}}
{{--        <td>Mexico</td>--}}
{{--    </tr>--}}
{{--    <tr>--}}
{{--        <td>Ernst Handel</td>--}}
{{--        <td>Roland Mendel</td>--}}
{{--        <td>Austria</td>--}}
{{--    </tr>--}}
{{--    <tr>--}}
{{--        <td>Island Trading</td>--}}
{{--        <td>Helen Bennett</td>--}}
{{--        <td>UK</td>--}}
{{--    </tr>--}}
{{--    <tr>--}}
{{--        <td>Laughing Bacchus Winecellars</td>--}}
{{--        <td>Yoshi Tannamuri</td>--}}
{{--        <td>Canada</td>--}}
{{--    </tr>--}}
{{--    <tr>--}}
{{--        <td>Magazzini Alimentari Riuniti</td>--}}
{{--        <td>Giovanni Rovelli</td>--}}
{{--        <td>Italy</td>--}}
{{--    </tr>--}}
{{--</table>--}}

{{--</body>--}}
{{--</html>--}}











