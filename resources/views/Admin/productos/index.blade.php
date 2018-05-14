@extends('Admin.template.main')
@section('content')
<div class="container text-center">
  <div class="jumbotron">
    <a href="{{route('productos.create')}}" class="btn btn-info">Registrar productos</a>
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
      <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Imagen</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Acción</th>
      </thead>
      <tbody>
        @foreach ($productos as $producto)

        <tr>
          <td>{{$producto->id}}</td>
          <td>{{$producto->name}}</td>
          <td>{{$producto->imagen}}</td>
          <td>{{$producto->descripcion}}</td>
          <td>{{$producto->precio}}</td>
          <td><a href="{{route('admin.productos.destroy',$producto->id)}}" onclick="return confirm('esta seguro que desea eliminarlo?')" class="btn btn-danger"></a>
            <a href="{{route('productos.edit',$producto->id)}}" class="btn btn-warning"></a></td>
        </td>
        @endforeach
      </tbody>
    </table>
{!!$productos -> render() !!}
</div>
</div>
 @endsection
