@extends('Admin.template.main')
@section('content')
<div class="container text-center">
  <div class="jumbotron">
    <!--Buscador
    {!! Form::open(['route' => 'productos.index','method'=>'GET','class'=>'navbar-form pull-right'])  !!}
        <div class="from-group">
            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'buscar producto...'])!!}
            <span class="input-group-addon" id="search"><span class="glyphicon gluphicon-search" aria-hidden="true"></span></span>
        </div>
    {!! Form::close() !!}
    Fin Buscador-->
    <br><br>
    <br><br>
    <table class="table table-striped">
      <h2>Detalles de las compras realizadas con exito</h2><br><br>
      <thead>
        <th>Comprador</th>
        <th>Productos</th>
        <th>Precio</th>
        <th>cantidades</th>
        <th>Fecha que se realizo la compra</th>
      </thead>
      <tbody>
        @foreach ($orders_items as $item)
        <tr>
          <td>{{$item->order->user->name}}</td>
          <td>{{$item->producto->name}}</td>
          <td>{{$item->precio}}</td>
          <td>{{$item->cantidad}}</td>
          <td>{{$item->order->created_at}}</td>
        </td>
        @endforeach
      </tbody>
    </table>
{!!$orders_items -> render() !!}
</div>
</div>
 @endsection
