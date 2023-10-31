@extends('adminlte::page')

@section('title', 'CRUD')

@section('content_header')
    <h1>Nuevo Empleado</h1>
@stop

@section('content')
<!--<h4>Lorem ipsum dolor sit amet consectetur adipisicing eli quod recusandae nam, accusantium excepturi inventore ratione fugiat. Rem?</h2>
-->
<!--{{$errors}}-->
<form action="{{ route('employeeCreate') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="full_name" class="form-label">Apellidos y Nombres</label>
                <input id="full_name" name="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" value="{{ old('full_name') }}" tabindex="1">
                    @error('full_name')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Usuario</label>
                <input id="username" name="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" tabindex="2">
                    @error('username')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>    
                    @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Dirección</label>
                <input id="address" name="address" type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address')}}" tabindex="3">
                    @error('address')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="telephone" class="form-label">Teléfono</label>
                <input id="telephone" name="telephone" type="tel" class="form-control @error('telephone') is-invalid @enderror" value="{{ old('telephone') }}" tabindex="4">
                    @error('telephone')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" type="text" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" tabindex="5">
                    @error('email')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" tabindex="6">
                    @error('password')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="role_id" class="form-label">Role</label>
                
                <select id="role_id" name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                    <option value=""> Select Role</option>
                    @foreach ($roles as $role)
                    @if (old('role_id') == $role->id)
                        <option value="{{ $role->id }}" selected>{{ $role->role_name }}</option>
                    @else
                        <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="text-end">
        <a href="/employee" class="btn btn-secondary" tabindex="7">CANCELAR</a>
        <button type="submit" class="btn btn-primary" tabindex="8">GUARDAR</button>
    </div>
</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
@stop