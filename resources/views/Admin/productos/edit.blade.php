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
{!! Form::open(['route'=>['productos.update',$productos],'method'=>'PUT','files'=>true])!!}

  <div class="from-group">
    {!!Form::label('name','Nombre')!!}
    {!!Form::text('name',$productos->name,['class'=>'form-control','placeholder'=>'Nombre Productos','required'])!!}
  </div>
  <br><br>
  <div class="from-group">
    {!!Form::label('imagen','Imagen')!!}
    {!!Form::file('imagen')!!}
  </div>
  <br><br>
  <div class="from-group">
    {!!Form::label('descripcion','Descripcion')!!}
    {!!Form::textarea('descripcion',$productos->descripcion,['class'=>'form-control','placeholder'=>'...'])!!}
  </div>
  <br><br>
  <div class="from-group">
    {!!Form::label('precio','Precio')!!}
    {!!Form::text('precio',$productos->precio,['class'=>'form-control','placeholder'=>'Precio Productos','required'])!!}
  </div>
  <br><br>
  <div class="from-group">
    {!!Form::submit('modificar',['class'=>'btn btn-primary'])!!}
  </div>

{!!Form::close()!!}
</div>
 @endsection
