@extends('adminlte::page')

@section('title', 'CRUD')

@section('content_header')
    <h1>Maquina</h1>
@stop

@section('content')
    @include('machine.modals.delete')
    <a href="{{ route('machineCreate') }}" class="btn btn-primary mb-3">AGREGAR</a>
    <table id="machines" class="table table-striped shadow-1g mt-4" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">name</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($machines as $machine)
                <tr>
                    <td>{{ $machine->id }}</td>
                    <td class="name">{{ $machine->name }}</td>
                    <td>
                        <img src="/image/{{ $machine->image }}" width="60%">
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger deletebtn">DELETE</button>
                        <a href="{{ route('machineEdit', $machine->id) }}" class="btn btn-info">EDITAR</a>
                        <!--<form action="{/{ route('machineDestroy', $machine->id) }} " method="POST" >
                            @/csrf
                            @/method('DELETE')
                            <button type="submit" class="btn btn-danger">B</button>-->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
        //new DataTable('#roles);
        $(document).ready(function(){
            $('#machines').DataTable({
                "lengthMenu":[[5,10,50,-1],[5,10,50,"All"]]
            });
        }); 
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#machines').DataTable();
            table.on('click','.deletebtn',function(){
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }
            var data = table.row($tr).data();
            console.log(data);
            var roleName = $tr.find('.name').text();//fila name Tabla
            $('#nameInModal').text(roleName);//Asignamos
            $('#deleteForm').attr('action','/machine/delete/'+data[0]);
            $('#deleteMachine').modal('show');
            });
        });
    </script>
@stop
