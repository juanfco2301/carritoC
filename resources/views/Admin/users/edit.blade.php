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
{!! Form::open(['route'=>['users.update',$user],'method'=> 'PUT'])   !!}

  <div class="from-group">
    {!!Form::label('name','Nombre')!!}
    {!!Form::text('name',$user->name,['class'=>'form-control','placeholder'=>'Nombres','required'])!!}
  </div>
  <div class="from-group">
    {!!Form::label('email','Correo Electronico')!!}
    {!!Form::email('email',$user->email,['class'=>'form-control','placeholder'=>'Correo','required'])!!}
  </div>
  <div class="from-group">
    {!!Form::label('type','Tipo')!!}
    {!!Form::select('type',[''=>'Seleccione Nivel...','member'=>'Miembro','admin'=>'Administrador'])!!}
  </div>
  <div class="from-group">
    {!!Form::submit('Modificar',['class'=>'btn btn-primary'])!!}
  </div>
    </div>
  {!!Form::close()!!}

   @endsection
