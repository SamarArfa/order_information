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
        $orders=Order::with(['item','user'])->orderBy('id','desc')->get();
        $items=Item::all();
        $users=User::all();
        return response()->json(['items'=>$items,'orders'=>$orders->sortBy('id', SORT_REGULAR, true),'users'=>$users],200);

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

        return Response::json([
            'order'    => $order,
            'message' => 'Success'
        ], 200);

        $order1->save();
        return response('successfulyy',200);


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
        $order->status = true;
        $order->save();
return response('successfulyy',200);
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
