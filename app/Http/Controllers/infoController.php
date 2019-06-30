<?php

namespace App\Http\Controllers;

use App\item;
use App\order;
use App\User;
use Illuminate\Http\Request;

class infoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order=Order::all();
        $item=Item::all();
//dd($orders->order->id); $user=User::all();
//dd($orders->order->id);
        $user=User::all();

        return view('order',['items'=>$item,'orders'=>$order->sortBy('id', SORT_REGULAR, true),'users'=>$user]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order1 = new Order();

        $order1->user_id = $request->user;
        $order1->status = false;

        $order1->item_id = $request->item;
        $order1->qty = $request->qty1 . $request->qty2;
        $order1->save();
        return redirect()->back();

    }
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $order = Order::find($id);
//        if( $order->status == true){
//            $order->status = false;
//
//        }else{
            $order->status = true;

//        }
        $order->save();
return response('successfulyy',200);
//        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
