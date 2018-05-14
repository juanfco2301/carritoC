@extends('Admin.template.main')
@section('content')
<div class="container text-center">
  <div class="page-header">
      <h1>carrito de compras</h1>
  </div>
  <table class="table table-striped">



    <a href="{{route('cart.eliminartodos')}}" class="badge badge-primary">Limpiar Carrito De Compras</a><br><br>
    <thead>
      <th>Imagen</th>
      <th>Producto</th>
      <th>Precio</th>
      <th>Cantidad</th>
      <th>Subtotal</th>
      <th>Quitar</th>
    </thead>
    @if(isset($cart))
        @if(count($cart))
            <tbody>


              @foreach ($cart as $car)

                    <tr>
                      <td><img src="\images\productos\{{$car->imagen}}" width="100" class="rounded-circle"></td>
                      <td>{{$car->name}}</td>
                      <td>${{number_format($car->precio)}}</td>
                      <td>{{$car->cantidad}}</td>

                      <td>${{number_format(($car->cantidad)*($car->precio))}}
                      </td>
                      <td>


                        <a href="{{route('cart.eliminar',$car->id)}}" class="badge badge-danger">X</a>
                      </td>
                    </tr>
              @endforeach
            </tbody>
          </table>
          <h4><span class="label.label-warning">Total:
            <?php
            $total=0;
            ?>
            @foreach ($cart as $c)
              <?php
              $total=(($c->precio)*($c->cantidad))+$total;
              ?>
            @endforeach
            ${{number_format($total)}}
          </h4>

          <a href="{{route('store.index')}}" class="badge badge-danger">Volver</a>
          <a href="{{route('cart.compra')}}" class="badge badge-primary">Siguiente</a><br><br>
        @else
        <h4><span class="label.label-warning">No hay Productos</h4>
        @endif
    @else
    <h4><span class="label.label-warning">No hay Productos</h4>
    @endif
</div>

@endsection
