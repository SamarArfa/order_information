<?php

namespace App\Http\Controllers;

use App\Detail;
use App\Item;
use App\Order;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class orderController extends Controller
{
//    public function index()
//    {
//        $order=Order::all();
////      $users=  $order->user->name->distinct();
//        $item=Item::all();
//        $user=User::all();
////dd($orders->order->id);
//        return view('order',['items'=>$item,'orders'=>$order,'users'=>$user]);
//    }
    public function getOrder()
    {

        $order=Order::all();
        $item=Item::all();
//dd($orders->order->id); $user=User::all();
//dd($orders->order->id);
        $user=User::all();

        return view('order',['items'=>$item,'orders'=>$order->sortBy('id', SORT_REGULAR, true),'users'=>$user]);
    }

    public function postOrder(Request $request)
    {
//        dd($request);
        $order1 = new Order();

        $order1->user_id = $request->user;
        $order1->status = false;

        $order1->item_id = $request->item;
        $order1->qty = $request->qty1 . $request->qty2;
//        $order->total  = $request->total;
        $order1->save();
//        $order=Order::all();
//        $item=Item::all();
//dd($orders->order->id);
//        $user=User::all();
        return redirect()->back();
//        return view('order',['items'=>$item,'orders'=>$order->sortBy('id', SORT_REGULAR, true),'users'=>$user]);//        return view('order');
    }

//    public function getstatus(){
//        $order=Order::all();
//        $item=Item::all();
////dd($orders->order->id);
//        $user=User::all();
//
//        return view('order',['items'=>$item,'orders'=>$order,'users'=>$user]);
////        return redirect()->back();
//    }
    public function poststatus($id){
        $order = Order::find($id);
        if( $order->status == true){
            $order->status = false;

        }else{
            $order->status = true;

        }
        $order->save();

//        Toastr::success('Reservation successfully confirmed.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
//
//    public function getstatusfalse(){
//        $order=Order::all();
//        $item=Item::all();
////dd($orders->order->id);
//        $user=User::all();
//
//        return view('order',['items'=>$item,'orders'=>$order,'users'=>$user]);
////        return redirect()->back();
//    }
//    public function poststatusfalse($id){
//        $order = Order::find($id);
//        $order->status = false;
//        $order->save();
//
////        Toastr::success('Reservation successfully confirmed.','Success',["positionClass" => "toast-top-right"]);
//        return redirect()->back();
//    }
}
