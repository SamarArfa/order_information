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
    public function index()
    {
        $order=Order::all();
//      $users=  $order->user->name->distinct();
        $item=Item::all();
        $user=User::all();
//dd($orders->order->id);
        return view('order',['items'=>$item,'orders'=>$order,'users'=>$user]);
    }
    public function getOrder()
    {

        $order=Order::all();
        $item=Item::all();
//dd($orders->order->id); $user=User::all();
//dd($orders->order->id);
        $user=User::all();

        return view('order',['items'=>$item,'orders'=>$order,'users'=>$user]);
    }

    public function postOrder(Request $request)
    {
//        dd($request);
        $order = new Order();

        $order->user_id = $request->user;
        $order->status = false;

        $order->item_id = $request->item;
        $order->qty = $request->qty1 . $request->qty2;
//        $order->total  = $request->total;
        $order->save();
        $order=Order::all();
        $item=Item::all();
//dd($orders->order->id);
        $user=User::all();

        return view('order',['items'=>$item,'orders'=>$order,'users'=>$user]);//        return view('order');
    }

    public function getstatus(){
        $order=Order::all();
        $item=Item::all();
//dd($orders->order->id);
        $user=User::all();

        return view('order',['items'=>$item,'orders'=>$order,'users'=>$user]);
//        return redirect()->back();
    }
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

    public function getstatusfalse(){
        $order=Order::all();
        $item=Item::all();
//dd($orders->order->id);
        $user=User::all();

        return view('order',['items'=>$item,'orders'=>$order,'users'=>$user]);
//        return redirect()->back();
    }
    public function poststatusfalse($id){
        $order = Order::find($id);
        $order->status = false;
        $order->save();

//        Toastr::success('Reservation successfully confirmed.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
