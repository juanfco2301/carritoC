@extends('Admin.template.main')
@section('content')
<div class="container text-center">
  <div class="jumbotron">
    <a href="{{route('users.create')}}" class="btn btn-info">Registrar Usuario</a>
    <table class="table table-striped">
      <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Correo</th>
        <th>Acción</th>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->type}}</td>
          <td><a href="{{route('admin.users.destroy',$user->id)}}" onclick="return confirm('esta seguro que desea eliminarlo?')" class="btn btn-danger"></a>
            <a href="{{route('users.edit',$user->id)}}" class="btn btn-warning"></a></td>
        </td>
        @endforeach
      </tbody>
    </table>
{!!$users -> render() !!}
  </div>
</div>
 @endsection
