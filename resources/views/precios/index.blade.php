@extends('partials.master')

@section('content')
<main class="main">
    <!-- Breadcrumb-->
    <div class="container-fluid" style="padding-top: 100px;">
        <div class="animated fadeIn">
            <div class="row justify-content-center" style="margin-top: 24px;">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Usuarios</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table id="myTable" class="display table table-striped table-hover table-condensed" style="text-align: center; vertical-align: middle; margin-bottom: 0px;">
                                    <thead>
                                        <tr>
                                            <th><strong>ID</strong></th>
                                            <th><strong>Nombre</strong></th>
                                            <th><strong>Privilegio</strong></th>
                                            <th><strong>Correo</strong></th>
                                            <th><strong>Creación</strong></th>
                                            <th><strong>Acciones</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usuarios as $usuario)
                                        <tr class="data-row">
                                            <td style="text-align: center; vertical-align: middle; " id="id">{{ $usuario->id }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="name">{{ $usuario->name }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="rol">{{ $usuario->rol }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="email">{{ $usuario->email }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="created_at">{{ $usuario->created_at }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info" data-toggle="modal" id="edit-item">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" id="delete-item">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="edit-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" align="center"><b>Editar Usuario</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="#" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="modal-input-id">ID</label>
                            <input type="text" class="form-control" id="modal-input-id" name="id" readonly>
                        </div>
                        <div class="form-group">
                            <label for="modal-input-name">Nombre</label>
                            <input type="text" class="form-control" id="modal-input-name" name="usr" required>
                        </div>
                        <div class="form-group">
                            <label for="modal-input-email">Correo</label>
                            <input type="text" class="form-control" id="modal-input-email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="modal-input-role">Privilegio</label>
                            <select class="form-control" id="modal-input-role" name="role" required>
                                <option value="Usuario">Usuario</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" align="center"><b>Borrar Usuario</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="deleteuser" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                    <div class="box-body">
                        <div class="form-group">
                            <label for="modal-input-id-delete">ID</label>
                            <input type="text" class="form-control" id="modal-input-id-delete" name="id" readonly>
                        </div>
                        <div class="form-group">
                            <label for="modal-input-name-delete">Nombre</label>
                            <input type="text" class="form-control" id="modal-input-name-delete" name="usr" readonly>
                        </div>
                        <div class="form-group">
                            <label for="modal-input-email-delete">Correo</label>
                            <input type="text" class="form-control" id="modal-input-email-delete" name="email" readonly>
                        </div>
                        <div class="form-group">
                            <label for="modal-input-role-delete">Privilegio</label>
                            <select class="form-control" id="modal-input-role-delete" name="role" readonly>
                                <option value="Usuario">Usuario</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>
                    </div>
                    <label><strong>Estás seguro de que quieres borrar este elemento?</strong></label>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function() {
        /**
        * for showing edit item popup
        */
        $('#myTable').DataTable({
            buttons: [
            {
                extend: 'csv',
                charset: 'UTF-8',
                bom: true,
                filename: 'Continental_APDs_Users',
                exportOptions: {
                    columns: [ 1, 2, 3, 4 ]
                }
            },
            {
                extend: 'excel',
                charset: 'UTF-8',
                bom: true,
                filename: 'Continental_APDs_Users',
                exportOptions: {
                    columns: [ 1, 2, 3, 4 ]
                }
            },
            {
                extend: 'pdf',
                charset: 'UTF-8',
                bom: true,
                filename: 'Continental_APDs_Users',
                exportOptions: {
                    columns: [ 1, 2, 3, 4 ]
                }
            },
            {
                extend: 'print',
                charset: 'UTF-8',
                bom: true,
                filename: 'Continental_APDs_Users',
                exportOptions: {
                    columns: [ 1, 2, 3, 4 ]
                }
            },
            ],
            "language": {
                "sProcessing":    "Procesando...",
                "sLengthMenu":    "Mostrar _MENU_ registros",
                "sZeroRecords":   "No se encontraron resultados",
                "sEmptyTable":    "Ningún dato disponible en esta tabla",
                "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":   "",
                "sSearch":        "Buscar:",
                "sUrl":           "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":    "Último",
                    "sNext":    "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },
            dom: 'Blfrtip',
            initComplete: function () {
                var btns = $('.dt-button');
                btns.addClass('btn grupo-res');
                btns.removeClass('dt-button');
            }
        });

        $(document).on('click', "#edit-item", function() {
            $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
            $('#edit-modal').modal()
        });

        $(document).on('click', "#delete-item", function() {
            $(this).addClass('delete-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
            $('#delete-modal').modal();
        });

        // on modal show
        $('#edit-modal').on('show.bs.modal', function() {
            var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?
            var row = el.closest(".data-row");
            // console.log(row.children());

            // get the data
            var id = row.children('#id');
            var name = row.children("#name");
            var email = row.children("#email");
            var rol = row.children("#rol");

            // fill the data in the input fields
            $("#modal-input-id").val(id[0]['innerHTML']);
            $("#modal-input-name").val(name[0]['innerHTML']);
            $("#modal-input-email").val(email[0]['innerHTML']);
            $("#modal-input-role").val(rol[0]['innerHTML']);
            /*$("#modal-input-workshift option").filter(function() {
                return this.text == workshift[0]['innerHTML'];
            }).attr('selected', true);*/
        });

        // on modal hide
        $('#edit-modal').on('hide.bs.modal', function() {
            $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
            $("#edit-form").trigger("reset");
        });

        $('#delete-modal').on('show.bs.modal', function() {
            var el = $(".delete-item-trigger-clicked"); // See how its usefull right here?
            var row = el.closest(".data-row");
            // console.log(row.children('#uid')[0]['innerHTML']);

            // get the data
            var id = row.children('#id');
            var name = row.children("#name");
            var email = row.children("#email");
            var rol = row.children("#rol");

            console.log(email);
            console.log(email[0]);
            console.log(email[0]['innerHTML']);
            console.log(rol);
            console.log(rol[0]);
            console.log(rol[0]['innerHTML']);
            // fill the data in the input fields
            $("#modal-input-id-delete").val(id[0]['innerHTML']);
            $("#modal-input-name-delete").val(name[0]['innerHTML']);
            $("#modal-input-email-delete").val(email[0]['innerHTML']);
            $("#modal-input-role-delete").val(rol[0]['innerHTML']);

        });

        // on modal hide
        $('#delete-modal').on('hide.bs.modal', function() {
            $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
            $("#delete-form").trigger("reset");
        })
    });

</script>

@endsection
