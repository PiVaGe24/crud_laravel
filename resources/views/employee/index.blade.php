@extends('adminlte::page')

@section('title', 'CRUD')

@section('content_header')
    <h1>Empleados</h1>
@stop

@section('content')
@include('employee.modals.delete')
    <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elitribus.</h1>
        <a href="{{route('employeeCreate')}}" class="btn btn-primary mb-3">AGREGAR</a>
        <table id="employees" class="table table-striped shadow-1g mt-4" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Username</th>
                    <th scope="col">Address</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr><!--class="{/{ $employee->roles ? '' : 'bg-danger' }}"-->
                    <td>{{ $employee->id }}</td>
                    <td class="full_name">{{ $employee->full_name }}</td>
                    <td>{{ $employee->username }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->telephone }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>
                        @if ($employee->roles)
                            {{ $employee->roles->role_name }}
                        @else
                            <span class="badge rounded-pill text-bg-danger">No Assigned</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('employeeEdit', $employee->id) }}" class="btn btn-info">E</a>
                        <button type="button" class="btn btn-danger deletebtn">D</button>
                        {{-- <form action="{{ route('employeeDestroy', $employee->id) }} " method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">B</button>
                        </form> --}}
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
        <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @stop

    @section('js')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script>
            //new DataTable('#employees');
            $(document).ready(function() {
                $('#employees').DataTable({
                    "lengthMenu": [
                        [5, 10, 50, -1],
                        [5, 10, 50, "All"]
                    ]
                });
            }); 
        </script>
        <script>
        $(document).ready(function() {
            var table = $('#employees').DataTable();
                table.on('click', '.deletebtn', function() {
                        $tr = $(this).closest('tr');
                        if ($($tr).hasClass('child')) {
                            $tr = $tr.prev('.parent');
                        }
                        var data = table.row($tr).data();
                        console.log(data);
                        var roleName = $tr.find('.full_name').text(); //Tabla
                        $('#roleNameInModal').text(roleName); //Asignamos
                        $('#deleteForm').attr('action', '/employee/delete/' + data[0]);
                        $('#deleteModal').modal('show');
                    });
                });
        </script>
    @stop
