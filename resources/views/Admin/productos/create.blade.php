@extends('Admin.template.main')
@section('content')
<div class="container text-center">
@if(count($errors)>0 )

    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
@endif
{!! Form::open(['route'=>'productos.store','method'=>'POST','files'=>true])!!}

  <div class="from-group">
    {!!Form::label('name','Nombre')!!}
    {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre Productos','required'])!!}
  </div>
  <br><br>
  <div class="from-group">
    {!!Form::label('imagen','Imagen')!!}
    {!!Form::file('imagen')!!}
  </div>
  <br><br>
  <div class="from-group">
    {!!Form::label('descripcion','Descripcion')!!}
    {!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'...'])!!}
  </div>
  <br><br>
  <div class="from-group">
    {!!Form::label('precio','Precio')!!}
    {!!Form::text('precio',null,['class'=>'form-control','placeholder'=>'Precio Productos','required'])!!}
  </div>
  <br><br>
  <div class="from-group">
    {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
  </div>
</div>
{!!Form::close()!!}

 @endsection
