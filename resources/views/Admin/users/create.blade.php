
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
{!! Form::open(['route'=>'users.store','method'=> 'POST'])   !!}

  <div class="from-group">
    {!!Form::label('name','Nombre')!!}
    {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombres','required'])!!}
  </div>
  <div class="from-group">
    {!!Form::label('email','Correo Electronico')!!}
    {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Correo','required'])!!}
  </div>

  <div class="from-group">
    {!!Form::label('password','Contraseña')!!}
    {!!Form::password('password',['class'=>'form-control','placeholder'=>'*************','required'])!!}
  </div>
  <div class="from-group">
    {!!Form::label('type','Tipo')!!}
    {!!Form::select('type',[''=>'Seleccione Nivel...','member'=>'Miembro','admin'=>'Administrador'])!!}
  </div>
  <div class="from-group">
    {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
  </div>
    </div>
{!!Form::close()!!}

 @endsection
