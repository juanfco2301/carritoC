@extends('Admin.template.main')
@section('content')
<div class="container text-center">
    <div class="product">
        <h3>{{$productos['name']}}</h3>
        <img src="\images\productos\{{$productos['imagen']}}" width="100"> <br>
        <div class="product">
            {{$productos['descripcion']}}<br><br>
            <p>Precio: ${{number_format($productos['precio'])}}  USD<br></p>
              <a href="{{route('admin.store.add',$productos['id'])}}" class="btn btn-warning">agregar a carrito de compra</a>
              <a href="{{route('store.index')}}" class="btn btn-warning">volver</a>
        </div>
  </div>
</div>
@endsection
