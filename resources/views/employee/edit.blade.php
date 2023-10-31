@extends('adminlte::page')

@section('title', 'CRUD')

@section('content_header')
    <h1>Actualizar Datos del Empleado</h1>
@stop

@section('content')
<h4>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque consequuntur tempore.</h2>
<form action="{{ route('employeeUpdate', $employee->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Apellido y Nombres</label>
        <input id="full_name" name="full_name" type="text" class="form-control " value="{{$employee->full_name}}" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Usuario</label>
        <input id="username" name="username" type="text" class="form-control" value="{{$employee->username}}" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Dirección</label>
        <input id="address" name="address" type="text" class="form-control" value="{{$employee->address}}" tabindex="3">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Teléfono</label>
        <input id="telephone" name="telephone" type="text" class="form-control" value="{{$employee->telephone}}" tabindex="4">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input id="email" name="email" type="text" class="form-control" value="{{$employee->email}}" tabindex="5">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Role</label>
        <select id="role_id" name="role_id" class="form-control">
            @foreach ($roles as $role)
                <option value="{{$role->id}}" 
                    {{$role->id == $employee->role_id ? 'selected' : ''}}>
                    
                    {{$role->role_name}}
                </option>
            @endforeach
        </select>
    </div>
    <a href="/employee" class="btn btn-secondary" tabindex="7">CANCELAR</a>
    <button type="submit" class="btn btn-primary" tabindex="8">GUARDAR</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop

