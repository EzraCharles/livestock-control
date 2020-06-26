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
                            <h3> <strong> Tratamientos </strong></h3>
                            <div class="col-md-12" style="padding-top: 15px; ">
                                <button class="btn grupo-res" id="add" style="text-align: left; float: right; margin-top: -50px;">Añadir Tratamiento</button>
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

                            <div class="content">
                                <div id="add-item" class="row col-md-12" style="padding-top: 15px;">
                                    <div class="col-3">
                                        <h5>Añadir Tratamiento</h5>
                                    </div>
                                    <div class="col-12">
                                        <form id="create" action="{{ route('tratamientos.store') }}" method="POST" style="padding:5px;">
                                            @method('POST')
                                            @csrf
                                            <div class="row form-group">
                                                <div class="col-4">
                                                    <label for="nombre">Nombre:</label>
                                                    <input class="form-control" type="text" name="nombre" required>
                                                </div>
                                                <div class="form-group col-4">
                                                    <label for="precio_id">Precio</label>
                                                    <select class="form-control select-objects" id="precio_id" name="precio_id" required>
                                                        <option value="" disabled selected>Eligir una opción...</option>
                                                        @foreach ($precios as $precio)
                                                            <option value="{{$precio->id}}"> {{$precio->concepto}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-4">
                                                    <label for="tipo_tratamiento_id">Tipo:</label>
                                                    <select class="form-control select-objects" id="tipo_tratamiento_id" name="tipo_tratamiento_id" required>
                                                        <option value="" disabled selected>Eligir una opción...</option>
                                                        @foreach ($tipos as $tipo)
                                                            <option value="{{$tipo->id}}"> {{$tipo->nombre}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-10">
                                                    <label for="comentarios">Comentarios:</label>
                                                    <input class="form-control" type="text" name="comentarios">
                                                </div>
                                                <div class="col-2" style="float: right;">
                                                    <button class="btn grupo-res" style="float: right; margin-top: 30px;">Crear</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <hr id="hr-divisor">
                            <div class="table-responsive">
                                <table id="myTable" class="display table table-striped table-hover table-condensed" style="text-align: center; vertical-align: middle; margin-bottom: 0px;">
                                    <thead>
                                        <tr>
                                            <th><strong>ID</strong></th>
                                            <th><strong>Nombre</strong></th>
                                            <th><strong>Precio Registro</strong></th>
                                            <th><strong>Concepto de Precio</strong></th>
                                            <th><strong>Tipo</strong></th>
                                            <th><strong>Comentarios</strong></th>
                                            <th><strong>Creación</strong></th>
                                            <th><strong>Acciones</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tratamientos as $tratamiento)
                                        <tr class="data-row">
                                            <td style="text-align: center; vertical-align: middle; " id="id">{{ $tratamiento->id }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="nombre">{{ $tratamiento->nombre }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="precio_registro">{{ $tratamiento->precio_registro }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="precio">{{ $tratamiento->precio->concepto }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="tipo">{{ $tratamiento->tipoTratamiento->nombre }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="comentarios">{{ $tratamiento->comentarios }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="created_at">{{ $tratamiento->created_at }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ url('tratamientos/'.$tratamiento->id) }}" style="color: inherit;">
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
                    <h4 class="modal-title" align="center"><b>Editar Tratamiento</b></h4>
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
                                    <label for="modal-input-precioreg">Concepto de Precio</label>
                                    <input type="text" class="form-control" id="modal-input-precioreg" name="precio_registro" required>
                                </div>
                                <div class="form-group col-4">
                                    <label for="modal-input-precio">Precio</label>
                                    <select class="form-control select-objects" id="modal-input-precio" name="precio_id" required>
                                        <option value="" disabled selected>Eligir una opción...</option>
                                        @foreach ($precios as $precio)
                                            <option value="{{$precio->id}}"> {{$precio->concepto}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="modal-input-tipo">Tipo</label>
                                    <select class="form-control select-objects" id="modal-input-tipo" name="tipo_tratamiento_id" required>
                                        <option value="" disabled selected>Eligir una opción...</option>
                                        @foreach ($tipos as $tipo)
                                            <option value="{{$tipo->id}}"> {{$tipo->nombre}}</option>
                                        @endforeach
                                    </select>
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
                    <h4 class="modal-title" align="center"><b>Borrar Tratamiento</b></h4>
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
                                <div class="form-group col-6">
                                    <label for="modal-input-nombre-delete">Nombre</label>
                                    <input type="text" class="form-control" id="modal-input-nombre-delete" name="nombre" readonly>
                                </div>
                                <div class="form-group col-6">
                                    <label for="modal-input-precioreg-delete">Precio de Registro</label>
                                    <input type="text" class="form-control" id="modal-input-precioreg-delete" name="precio_registro" readonly>
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
    $('#add-item').hide();
    $('#hr-divisor').hide();

    $(document).ready(function() {

        $('#add').on('click', function () {
            $('#add-item').toggle();
            if ($(this).text() == 'Cancelar') {
                $(this).text('Añadir Tratamiento');
                $('#hr-divisor').hide();
            }
            else{
                $(this).text('Cancelar');
                $('#hr-divisor').show();
            }
        });

        /**
        * for showing table, edit and delete item popup
        */
        $('#myTable').DataTable({
            buttons: [
            {
                extend: 'csv',
                charset: 'UTF-8',
                bom: true,
                filename: 'Tratamientos-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6 ]
                }
            },
            {
                extend: 'excel',
                charset: 'UTF-8',
                bom: true,
                filename: 'Tratamientos-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6 ]
                }
            },
            {
                extend: 'pdf',
                customize: function(doc) {
                    doc.content[1].margin = [ 50, 0, 50, 0 ] //left, top, right, bottom
                },
                charset: 'UTF-8',
                bom: true,
                filename: 'Tratamientos-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6 ]
                }
            },
            {
                extend: 'print',
                text: 'Imprimir',
                charset: 'UTF-8',
                bom: true,
                filename: 'Tratamientos-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6 ]
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
            var precio_registro = row.children("#precio_registro");
            var precio = row.children("#precio");
            var tipo = row.children("#tipo");
            var comentarios = row.children("#comentarios");

            // fill the data in the input fields
            $("#modal-input-id").val(id[0]['innerHTML']);
            $("#modal-input-nombre").val(nombre[0]['innerHTML']);
            $("#modal-input-precioreg").val(precio_registro[0]['innerHTML']);
            $("#modal-input-comentarios").val(comentarios[0]['innerHTML']);

            $("option:selected").removeAttr("selected");
            var tiposOp =  $('#modal-input-tipo').html();
            var preciosOp =  $('#modal-input-precio').html();

            $('#modal-input-tipo').empty(); //remove all child nodes
            $('#modal-input-tipo').append(tiposOp);
            $('#modal-input-tipo').trigger("chosen:updated");

            $('#modal-input-precio').empty(); //remove all child nodes
            $('#modal-input-precio').append(preciosOp);
            $('#modal-input-precio').trigger("chosen:updated");

            $("#modal-input-tipo option").filter(function() {
                return this.text == tipo[0]['innerHTML'];
            }).attr('selected', true);
            $('#modal-input-tipo').trigger("chosen:updated");

            $("#modal-input-precio option").filter(function() {
                return this.text == precio[0]['innerHTML'];
            }).attr('selected', true);
            $('#modal-input-precio').trigger("chosen:updated");

            $("#edit-form").attr('action', 'tratamientos/' + id[0]['innerHTML']);
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
            var precio_registro = row.children("#precio_registro");
            var comentarios = row.children("#comentarios");

            // fill the data in the input fields
            $("#modal-input-id-delete").val(id[0]['innerHTML']);
            $("#modal-input-nombre-delete").val(nombre[0]['innerHTML']);
            $("#modal-input-precioreg-delete").val(precio_registro[0]['innerHTML']);
            $("#modal-input-comentarios-delete").val(comentarios[0]['innerHTML']);

            $("#delete-form").attr('action', 'tratamientos/' + id[0]['innerHTML']);

        });

        // on modal hide
        $('#delete-modal').on('hide.bs.modal', function() {
            $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
            $("#delete-form").trigger("reset");
        });

    });

</script>

@endsection
