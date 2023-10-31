@extends('adminlte::page')

@section('title', 'CRUD')

@section('content_header')
    @if (isset($machine))
        <h1>Actualiza Datos de la Máquina</h1>
    @else
        <h1>Nueva Maquina</h1>
    @endif
@stop

@section('content')
    <form method="POST" action="{{ isset($machine) ? route('machineUpdate', $machine->id) : route('machineCreate') }}"
        enctype="multipart/form-data">
        @csrf
        @if (isset($machine))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                value="{{ isset($machine) ? $machine->name : old('name') }}" tabindex="1">
                @error('name')
                    <span class="invalid-feedback"><strong>{{$message}}</strong></span>
                @enderror
        </div>
        <div>
            <img src="{{isset($machine) ? '/image/'.$machine->image : '' }}" id="imageSelected" style="max-height: 300px;" >
        </div>
        <input type="file" name="image" id="image" class="@error('image') is-invalid @enderror">
            @error('image')
                <span class="invalid-feedback"><strong>{{$message}}</strong></span>
            @enderror
        <div class="text-end">
            <a href="{{route('machineIndex')}}" class="btn btn-secondary" tabindex="7">CANCELAR</a>
            <button type="submit" class="btn btn-primary" tabindex="8">GUARDAR</button>
        </div>
    </form>
@stop

@section('css')
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script>
        $(document).ready(function(e) {
            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#imageSelected').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@stop
