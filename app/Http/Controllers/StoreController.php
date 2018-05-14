<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Producto;
class StoreController extends Controller
{
    /**
     * Manda datos a una vista para poder listarlos.
     *
     * @return objeto de tipo Producto
     */
     public function index()
     {
         $productos=Producto::all();
         return view('admin.store.index',compact('productos'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
           return view('admin.store.index');
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
     /**
      * muestra detalles mas esepecificos del producto.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function details($id)
     {
       $productos=Producto::where('id','=',$id)->First()->toArray();
       return view('admin.store.detail')->with('productos',$productos);
     }
}
