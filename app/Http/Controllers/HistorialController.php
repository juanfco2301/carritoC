<?php

namespace App\Http\Controllers;
use App\User;
use App\OrderItem;
use App\Order;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    /**
     * muestra una lista de la tabla OrderItem
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $orders_items=OrderItem::orderBy('id','ASC')->paginate(10);
      $orders_items->each(function($orders_items){
        $orders_items->order;
        $orders_items->producto;
        $orders_items->order->user;
      });

      return view('Admin.historial.index')->with('orders_items',$orders_items);
      /* fin */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
