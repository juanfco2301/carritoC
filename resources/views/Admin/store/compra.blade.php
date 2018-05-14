@extends('Admin.template.main')
@section('content')
    <div class="container text-center">
      <div class="page-header">
          <h1>Detalles de la compra</h1>
      </div>
    <h2>  Datos del usuario</h2><br>
    <table class="table table-striped">
      <thead>
        <th>Usuario</th>
        <th>Email</th>
      </thead>
              <tbody>
                <tr>
                  <td>{{ Auth::user()->name }}</td>
                  <td>{{ Auth::user()->email }}</td>
                </tr>
              </tbody>
    </table>
    <h2>Datos de la compra</h2><br>
      <?php $total=0; ?>
      <table class="table table-striped">
        <thead>
          <th>Nombre</th>
          <th>Precio</th>
        </thead>
      <tbody>
        @foreach($cart as $car)
            <tr>
              <td>{{$car->name}}</td>
              <td>${{number_format($car->precio)}}</td>
            </tr>
        <?php $total=(($car->precio)*($car->cantidad))+$total; ?>

        @endforeach
      </tbody>
      </table>

      <br>
      <br><br>
      <h4>total:</h4>
      ${{number_format($total)}}<br><br>
      <a href="{{route('cart.mostrar')}}" class="badge badge-primary">Atras</a>
      <a href="{{route('payment')}}" class="badge badge-primary">Realizar La Compra</a><br><br>
    </div>
@endsection
