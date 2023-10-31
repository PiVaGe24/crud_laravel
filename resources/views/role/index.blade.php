@extends('adminlte::page')

@section('title', 'CRUD')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
    @include('role.modals.delete')
    @include('role.modals.role-form')
    <h4>Lorem, ipsum dolor sit amet consectetur adipisicing elitribus.</h1>
        <button type="button" class="btn btn-primary createbtn" data-bs-toggle="modal" data-bs-target="#roleModal"
            data-action="add">Crear Rol</button>
        <table id="roles" class="table table-striped shadow-1g mt-4" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Role_name</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td class="role-name">{{ $role->role_name }}</td>
                        <td>
                            <button type="button" class="btn btn-info editbtn" data-action="edit">EDIT</button>
                            <button type="button" class="btn btn-danger deletebtn">DELETE</button>
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
            $(document).ready(function() {
                $('#roles').DataTable({
                    "lengthMenu": [
                        [5, 10, 50, -1],
                        [5, 10, 50, "All"]
                    ]
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#roles').DataTable();
                var modal = $('#roleModal');
                var form = $('#roleForm');
                var modalTitle = modal.find('.modal-title');

                // Lógica para abrir el modal y configurar el formulario para agregar un nuevo rol
                $('.createbtn').click(function() {
                    modalTitle.text('Agregar Role');
                    form.attr('action', '/role'); // Establece la acción para crear un nuevo rol
                    form.attr('method', 'POST'); // Usa el método POST para crear
                    form[0].reset(); // Limpia el formulario
                    $('#roleNameEdit').text('');
                    modal.modal('show');
                });

                table.on('click', '.editbtn', function() {
                    var $tr = $(this).closest('tr');
                    if ($($tr).hasClass('child')) {
                        $tr = $tr.prev('.parent');
                    }
                    var data = table.row($tr).data();
                    modalTitle.text('Editar Role');
                    form.attr('action', '/role/' + data[0]);
                    form.attr('method', 'POST'); // Cambiar el método del formulario a POST
                    form[0].reset();
                    form.append(
                    '<input type="hidden" name="_method" value="PUT">'); // Agregar el campo _method para simular PUT
                    $('#role_id').val(data[0]);
                    $('#role_name').val(data[1]);
                    $('#roleNameEdit').text(data[1]);
                    modal.modal('show');
                });

                // Manejar el formulario submit para ambas acciones (agregar y editar)
                form.submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: form.attr('method'),
                        url: form.attr('action'),
                        data: form.serialize(),
                        success: function(data) {
                            modal.modal('hide');
                            location.reload();
                        },
                        error: function(data) {
                            // Manejar los errores
                        }
                    });
                });

                // $(document).ready(function(){
                //     var table = $('#roles').DataTable();
                //     table.on('click','.editbtn',function(){
                //         $tr = $(this).closest('tr');
                //         if ($($tr).hasClass('child')) {
                //             $tr = $tr.prev('.parent');
                //         }
                //         var data = table.row($tr).data();
                //         console.log(data);
                //         $('#role_name').val(data[1]);
                //         var roleName = $tr.find('.role-name').text();//Tabla
                //         $('#roleNameEdit').text(roleName);//Asignamos
                //         $('#editForm').attr('action','/role/'+data[0]);
                //         $('#roleModal').modal('show');
                //     });

                table.on('click', '.deletebtn', function() {
                    $tr = $(this).closest('tr');
                    if ($($tr).hasClass('child')) {
                        $tr = $tr.prev('.parent');
                    }
                    var data = table.row($tr).data();
                    console.log(data);
                    var roleName = $tr.find('.role-name').text(); //Tabla
                    $('#roleNameInModal').text(roleName); //Asignamos
                    $('#deleteForm').attr('action', '/role/' + data[0]);
                    $('#deleteModal').modal('show');
                });
            });
        </script>
    @stop
