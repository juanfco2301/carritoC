<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use App\Producto;
class ProductosController extends Controller
{
    /**
     * muestra una lista de la tabla Producto
     *
     * @return Object de tipo Producto
     */
     public function index()
     {
       $productos=Producto::orderBy('id','ASC')->paginate(5);
       return view('admin.productos.index')->with('productos',$productos);

     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         return view('admin.productos.create');
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(ProductoRequest $request)
     {
         if($request->file('imagen'))
         {
           $file=$request->file('imagen');
           $name=time().'.'.$file->getClientOriginalExtension();
           $path=public_path().'/images/productos/';
           $file->move($path,$name);
         }
         $productos = new Producto($request->all());
         $productos->imagen=$name;
     //  dd($productos);
         $productos->save();

     // Flash::success("se a registrado". $user->name." de forma exitosa");
         return redirect()->route('productos.index');
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
       $productos=Producto::find($id);
       return view('admin.productos.edit')->with('productos',$productos);
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(ProductoRequest $request, $id)
     {
           $productos=Producto::find($id);
           $productos->fill($request->all());
           $productos->save();
           return redirect()->route('productos.index');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
           $productos=Producto::find($id);
           $productos->delete();
           return redirect()->route('productos.index');

     }
}
