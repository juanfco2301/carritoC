<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function contructor(Request $request)
     {
          if(!$request->session()->has('cart'))
          $request->session()->put('cart',array());
     }

     public function mostrar(Request $request)
     {

       //return \Session::get('cart');
         $cart=$request->session()->get('cart');

         return view('admin.store.cart',compact('cart'));
     }

     public function actualizar(Producto $productos,$cantidad)
         {
         	$cart = \Session::get('cart');
         	$cart[$productos->id]->cantidad = $cantidad;
         	\Session::put('cart', $cart);
          dd($cart);
         	return redirect()->route('cart.mostrar');
         }


     public function add(Producto $productos,Request $request)
     {

       $cart=$request->session()->get('cart');
       $cart[$productos->id]=$productos;
     //  dd($cart[$productos->id]);
       $request->session()->put('cart',$cart);
     //  dd($cart);

       return view('admin.store.cart')
       ->with('cart',$cart);

     }

     public function eliminar(Producto $productos,Request $request )
     {
       $cart=$request->session()->get('cart');
       unset($cart[$productos->id]);
     //  dd($cart[$productos->id]);
       $request->session()->put('cart',$cart);
     //  dd($cart);
       return view('admin.store.cart')
       ->with('cart',$cart);
     }

     public function eliminartodo(Request $request )
     {
       $request->session()->forget('cart');
       $request->session()->get('cart');
       $cart=$request->session()->put('cart',array());
       return view('admin.store.cart')
       ->with('cart',$cart);
     }
     public function compra(Request $request)
     {
       $cart=$request->session()->get('cart');
       return view('admin.store.compra')
       ->with('cart',$cart);
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         //add item
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         //add item
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
