@extends('partials.master')

@section('content')

<main class="main">
    <!-- Breadcrumb-->
    <div class="container-fluid" style="padding-top: 100px;">
        <div class="animated fadeIn">
            <div class="row justify-content-center" style="margin-top: 24px;">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3> <strong> Fórmulas </strong></h3>
                            <div class="col-md-12" style="padding-top: 15px; ">
                                <a href="{{ route('formulas.create') }}" style="color: inherit;">
                                    <button class="btn grupo-res" id="add" style="text-align: left; float: right; margin-top: -50px;">Añadir Fórmula</button>
                                </a>
                            </div>
                        </div>

                        @if($errors->any())
                            <br/>
                            <div class="alert alert-danger alert-block" style="margin-left: 30px; margin-right: 30px;">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
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
                                            <th><strong>Proteína</strong></th>
                                            <th><strong>Grasa</strong></th>
                                            <th><strong>Importe</strong></th>
                                            <th><strong>Kilogramos</strong></th>
                                            <th><strong>Comentarios</strong></th>
                                            <th><strong>Creación</strong></th>
                                            <th><strong>Items</strong></th>
                                            <th><strong>Acciones</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($formulas as $formula)
                                        <tr class="data-row">
                                            <td style="text-align: center; vertical-align: middle; " id="id">{{ $formula->id }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="nombre">{{ $formula->nombre }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="proteina">{{ $formula->proteina }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="grasa">{{ $formula->grasa }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="importe">{{ $formula->importe }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="kilogramos">{{ $formula->kilogramos }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="comentarios">{{ $formula->comentarios }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="created_at">{{ $formula->created_at }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info" data-toggle="modal" id="componentes-item">
                                                        <i class="fa fa-list-ul"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ url('formulas/'.$formula->id) }}" style="color: inherit;">
                                                        <button type="button" class="btn btn-success" data-toggle="modal" id="show-item">
                                                            <i class="far fa-eye"></i>
                                                        </button>
                                                    </a>
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

    <div class="modal fade" id="edit-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" align="center"><b>Editar Fórmula</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-form" role="form" action="#" method="post">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        @method('PUT')

                        <div class="box-body">
                            <div class="form-group" hidden>
                                <label for="modal-input-id">ID</label>
                                <input type="text" class="form-control" id="modal-input-id" name="id" readonly>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="modal-input-nombre">Nombre</label>
                                    <input type="text" class="form-control" id="modal-input-nombre" name="nombre" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="modal-input-proteina">Proteína</label>
                                    <input type="number" min="0" step="0.01" class="form-control" id="modal-input-proteina" name="proteina">
                                </div>
                                <div class="form-group col-4">
                                    <label for="modal-input-grasa">Grasa</label>
                                    <input type="number" min="0" step="0.01" class="form-control" id="modal-input-grasa" name="grasa">
                                </div>
                                <div class="form-group col-4">
                                    <label for="modal-input-kilogramos">Kilogramos</label>
                                    <input type="number" min="1" step="1" class="form-control" id="modal-input-kilogramos" name="kilogramos">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="modal-input-comentarios">Comentarios</label>
                                <textarea type="text" class="form-control" id="modal-input-comentarios" name="comentarios"></textarea>
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
                    <h4 class="modal-title" align="center"><b>Borrar Animal</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="delete-form" role="form" method="post">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        @method('DELETE')

                        <div class="box-body">
                            <div class="form-group" hidden>
                                <label for="modal-input-id-delete">ID</label>
                                <input type="text" class="form-control" id="modal-input-id-delete" name="id" readonly>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="modal-input-nombre-delete">Nombre</label>
                                    <input type="text" class="form-control" id="modal-input-nombre-delete" name="nombre" readonly>
                                </div>
                                <div class="form-group col-4">
                                    <label for="modal-input-proteina-delete">Proteína</label>
                                    <input type="text" class="form-control" id="modal-input-proteina-delete" name="proteina" readonly>
                                </div>
                                <div class="form-group col-4">
                                    <label for="modal-input-grasa-delete">Grasa</label>
                                    <input type="text" class="form-control" id="modal-input-grasa-delete" name="grasa" readonly>
                                </div>
                                <div class="form-group col-4">
                                    <label for="modal-input-kilogramos-delete">Kilogramos</label>
                                    <input type="text" class="form-control" id="modal-input-kilogramos-delete" name="kilogramos" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="modal-input-comentarios-delete">Comentarios</label>
                                <textarea type="text" class="form-control" id="modal-input-comentarios-delete" name="comentarios" readonly></textarea>
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



</main>

<div class="modal loadingmodal"></div>

<script>

    $(document).ready(function() {
        /**
        * for showing table, edit and delete item popup
        */
        $('#myTable').DataTable({
            buttons: [
            {
                extend: 'csv',
                charset: 'UTF-8',
                bom: true,
                filename: 'Fórmulas-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6, 7 ]
                }
            },
            {
                extend: 'excel',
                charset: 'UTF-8',
                bom: true,
                filename: 'Fórmulas-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6, 7 ]
                }
            },
            {
                extend: 'pdf',
                customize: function(doc) {
                    doc.content[1].margin = [ 50, 0, 50, 0 ] //left, top, right, bottom
                },
                charset: 'UTF-8',
                bom: true,
                filename: 'Fórmulas-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6, 7 ]
                }
            },
            {
                extend: 'print',
                text: 'Imprimir',
                charset: 'UTF-8',
                bom: true,
                filename: 'Fórmulas-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6, 7 ]
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

            // get the data
            var id = row.children('#id');
            var nombre = row.children("#nombre");
            var proteina = row.children("#proteina");
            var grasa = row.children("#grasa");
            var importe = row.children("#importe");
            var kilogramos = row.children("#kilogramos");
            var comentarios = row.children("#comentarios");

            $("#modal-input-id").val(id[0]['innerHTML']);
            $("#modal-input-nombre").val(nombre[0]['innerHTML']);
            $("#modal-input-proteina").val(proteina[0]['innerHTML']);
            $("#modal-input-grasa").val(grasa[0]['innerHTML']);
            $("#modal-input-importe").val(importe[0]['innerHTML']);
            $("#modal-input-kilogramos").val(kilogramos[0]['innerHTML']);
            $("#modal-input-comentarios").val(comentarios[0]['innerHTML']);

            $("#edit-form").attr('action', 'formulas/' + id[0]['innerHTML']);
        });

        // on modal hide
        $('#edit-modal').on('hide.bs.modal', function() {
            $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
            $("#edit-form").trigger("reset");
        });

        $('#delete-modal').on('show.bs.modal', function() {
            var el = $(".delete-item-trigger-clicked"); // See how its usefull right here?
            var row = el.closest(".data-row");

            // get the data
            var id = row.children('#id');
            var nombre = row.children("#nombre");
            var proteina = row.children("#proteina");
            var grasa = row.children("#grasa");
            var importe = row.children("#importe");
            var kilogramos = row.children("#kilogramos");
            var comentarios = row.children("#comentarios");

            // fill the data in the input fields
            $("#modal-input-id-delete").val(id[0]['innerHTML']);
            $("#modal-input-nombre-delete").val(nombre[0]['innerHTML']);
            $("#modal-input-proteina-delete").val(proteina[0]['innerHTML']);
            $("#modal-input-grasa-delete").val(grasa[0]['innerHTML']);
            $("#modal-input-importe-delete").val(importe[0]['innerHTML']);
            $("#modal-input-kilogramos-delete").val(kilogramos[0]['innerHTML']);
            $("#modal-input-comentarios-delete").val(comentarios[0]['innerHTML']);

            $("#delete-form").attr('action', 'formulas/' + id[0]['innerHTML']);

        });

        // on modal hide
        $('#delete-modal').on('hide.bs.modal', function() {
            $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
            $("#delete-form").trigger("reset");
        });

    });

</script>

@endsection
