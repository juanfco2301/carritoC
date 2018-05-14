@extends('Admin.template.main')
@section('content')


<div class="container text-center">

  <div class="product">
    <div class="jumbotron">
    @foreach($productos as $producto)
        <h3>{{$producto->name}}</h3>
        <img src="\images\productos\{{$producto->imagen}}" width="100"> <br>
        <div class="product">
            <a href="{{route('admin.store.detail',$producto->id)}}" class="btn btn-danger">Detalles</a>
              <a href="{{route('admin.store.add',$producto->id,$producto->cantidad)}}" class="btn btn-warning">Agregar a Carrito</a>
        </div>
    @endforeach


  </div>

</div>
</div>
@endsection
