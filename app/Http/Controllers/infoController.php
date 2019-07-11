<?php

namespace App\Http\Controllers;

use App\item;
use App\order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class infoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $tasks = request()->user()->tasks;
//dd(1);
        $orders=Order::with(['item','user'])->get();
        $items=Item::all();
//dd($orders->order->id); $user=User::all();
//dd($orders->order->id);
        $users=User::all();
        return response()->json(['items'=>$items,'orders'=>$orders->sortBy('id', SORT_REGULAR, true),'users'=>$users],200);

//        return view('order',['items'=>$item,'orders'=>$order->sortBy('id', SORT_REGULAR, true),'users'=>$user]);

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
        $this->validate($request, [
            'user_id'        => 'required',
            'item_id' => 'required',
            'qty2'        => 'required|max:255',
            'qty1' => 'required',
        ]);

        $order=Order::create([
          'user_id' => request('user_id'),
        'status' => request('status'),

        'item_id' =>request('item_id'),
        'qty' =>request('qty1').request('qty2') ]);
//        $data = $request->json()->all();
//        $order1 = new Order();
//
//        $order1->user_id = $data['user_id'];
//        $order1->status = false;
//
//        $order1->item_id =$data['item_id'];
//        $order1->qty = $data['qty1'] . $data['qty2'];
        return Response::json([
            'order'    => $order,
            'message' => 'Success'
        ], 200);

        
//
//        $order1->user_id = $request->user;
//        $order1->status = false;
//
//        $order1->item_id = $request->item;
//        $order1->qty = $request->qty1 . $request->qty2;
        $order1->save();
        return response('successfulyy',200);

//        return redirect()->back();

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
//        dd($id);
        $data = $request->json()->all();

        $order = Order::find($data['id']);
//        $order->user_id = $data['user_id'];
//        $order->item_id = $data['item_id'];
//        $order->qty = $data['qty1'].$data['qty2'];
        $order->status = true;
        $order->save();
//        $order = Order::find($id);
//        if( $order->status == true){
//            $order->status = false;
//
//        }else{
//            $order->status = true;

//        }
//        $order->save();
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
