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
                        {{-- @if (\Session::has('formula'))
                            <input type="text" value="{{ \Session::get('formula') }}">
                            <script>
                                    $(document).ready(function() {
                                        $("#edit-form").trigger("reset");
                                    });
                            </script>
                        @endif --}}
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
                                            <th><strong>Ceniza</strong></th>
                                            <th><strong>Importe</strong></th>
                                            <th><strong>Kilogramos</strong></th>
                                            <th><strong>Comentarios</strong></th>
                                            <th><strong>Actualización</strong></th>
                                            <th><strong>Items</strong></th>
                                            <th><strong>Acciones</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($formulas as $formula)
                                            <tr class="data-row" id="{{ $formula->id }}">
                                                <td style="text-align: center; vertical-align: middle; " id="id">{{ $formula->id }}</td>
                                                <td style="text-align: center; vertical-align: middle; " id="nombre">{{ $formula->nombre }}</td>
                                                <td style="text-align: center; vertical-align: middle; " id="proteina">{{ $formula->proteina }} %</td>
                                                <td style="text-align: center; vertical-align: middle; " id="grasa">{{ $formula->grasa }} %</td>
                                                <td style="text-align: center; vertical-align: middle; " id="ceniza">{{ $formula->ceniza }} %</td>
                                                <td style="text-align: center; vertical-align: middle; " id="importe">${{ number_format($formula->importe, 2) }}</td>
                                                <td style="text-align: center; vertical-align: middle; " id="kilogramos">{{ $formula->kilogramos }}</td>
                                                <td style="text-align: center; vertical-align: middle; " id="comentarios">{{ $formula->comentarios }}</td>
                                                <td style="text-align: center; vertical-align: middle; {{ $formula->updated_at->diffInDays(Carbon\Carbon::now() ,false) > 30 ? 'background: #ff9696' : ''}}" id="updated_at">{{ date('d-m-Y H:i', strtotime($formula->updated_at)) }}</td>
                                                <td style="text-align: center; vertical-align: middle; ">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info" data-toggle="modal" id="componentes-item">
                                                            <i class="fa fa-list-ul"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td style="text-align: center; vertical-align: middle; ">
                                                    <div class="btn-group">
                                                        <a href="{{ url('formulas/'.$formula->id) }}" style="color: inherit;">
                                                            <button type="button" class="btn btn-success" data-toggle="modal" id="show-item">
                                                                <i class="far fa-eye"></i>
                                                            </button>
                                                        </a>
                                                        <button type="button" class="btn btn-info" data-toggle="modal" id="edit-item">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-warning" data-toggle="modal" id="update-item">
                                                            <i class="fa fa-wrench"></i>
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
                                    <input type="text" class="form-control" id="modal-input-nombre" name="nombre" required minlength="2" maxlength="255">
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="form-group col-4">
                                    <label for="modal-input-proteina">Proteína</label>
                                    <input type="number" min="0" step="0.01" class="form-control" id="modal-input-proteina" name="proteina">
                                </div>
                                <div class="form-group col-4">
                                    <label for="modal-input-grasa">Grasa</label>
                                    <input type="number" min="0" step="0.01" class="form-control" id="modal-input-grasa" name="grasa">
                                </div>
                                <div class="form-group col-4">
                                    <label for="modal-input-ceniza">Ceniza</label>
                                    <input type="number" min="0" step="0.01" class="form-control" id="modal-input-ceniza" name="ceniza">
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <label for="modal-input-comentarios">Comentarios</label>
                                <textarea type="text" class="form-control" id="modal-input-comentarios" name="comentarios" minlength="2" maxlength="255"></textarea>
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
                    <h4 class="modal-title" align="center"><b>Borrar Fórmula</b></h4>
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
                                {{-- <div class="form-group col-4">
                                    <label for="modal-input-proteina-delete">Proteína</label>
                                    <input type="text" class="form-control" id="modal-input-proteina-delete" name="proteina" readonly>
                                </div>
                                <div class="form-group col-4">
                                    <label for="modal-input-grasa-delete">Grasa</label>
                                    <input type="text" class="form-control" id="modal-input-grasa-delete" name="grasa" readonly>
                                </div>
                                <div class="form-group col-4">
                                    <label for="modal-input-ceniza-delete">Ceniza</label>
                                    <input type="text" class="form-control" id="modal-input-ceniza-delete" name="ceniza" readonly>
                                </div> --}}
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

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="componentes-modal">
        <div class="modal-dialog modal-xl" >
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title" align="center"><b>Componentes de Fórmula </b></h4>  <h5 style="padding-left: 70px" id="porcentaje-total"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                    <div id="create-componente">
                        <form id="add-comp-form" role="form" action="{{ route('formulaciones.store') }}" method="post">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            @method('POST')

                            <div class="box-body">
                                <div class="form-group" hidden>
                                    <label for="comp-formula-id">ID</label>
                                    <input type="text" class="form-control" id="comp-formula-id" name="formula_id" readonly>
                                </div>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="comp-precio">Concepto</label>
                                        <select class="form-control select-objects" id="comp-precio" name="precio_id" required>
                                            <option id="default-option" value="" disabled selected="selected">Eligir una opción...</option>
                                            @foreach ($precios as $precio)
                                                <option value="{{$precio->id}}"> {{$precio->concepto}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="comp-porcentaje">Porcentaje</label>
                                        <input type="number" min="0.01" max="100" step="0.01" class="form-control" id="comp-porcentaje" name="porcentaje">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="comp-kilogramos">Kilogramos</label>
                                        <input type="number" min="0.01" step="0.01" class="form-control" id="comp-kilogramos" name="kilogramos">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" onclick="$('#create-componente').hide(); $('#components-table').show();">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                    <style>
                        div.dataTables_wrapper {
                            width: auto;
                            margin: 0 auto;
                        }
                    </style>
                    <div id="components-table">
                        <table id="myTableComponentes" class="display nowrap" style="text-align: center; vertical-align: middle; margin-bottom: 0px; width:100%">
                            <thead>
                                <tr>
                                <th><strong>ID</strong></th>
                                <th><strong>Concepto</strong></th>
                                <th><strong>Kilogramos</strong></th>
                                <th><strong>Porcentaje</strong></th>
                                <th><strong>Importe</strong></th>
                                <th><strong>Proteína</strong></th>
                                <th><strong>Grasa</strong></th>
                                <th><strong>Fibra</strong></th>
                                <th><strong>Ceniza</strong></th>
                                <th><strong>Acciones</strong></th>
                                </tr>
                            </thead>
                        </table>
                        <br/>
                        <h5 id="proportional-relationship"></h5>
                        <button  style="float: right;" type="button" class="btn grupo-res" id="link-componente">Añadir Componente</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade {{-- center --}}" id="edit-comp-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" align="center"><b>Editar Componente</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-comp-form" role="form" action="#" method="post">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        @method('PUT')

                        <div class="box-body">
                            <div class="form-group" hidden>
                                <label for="modal-input-comp-id">ID</label>
                                <input type="text" class="form-control" id="modal-input-comp-id" name="id" readonly>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="modal-input-comp-precio">Concepto</label>
                                    <select class="form-control select-objects" id="modal-input-comp-precio" name="precio_id" required>
                                        @foreach ($precios as $precio)
                                            <option value="{{$precio->id}}"> {{$precio->concepto}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="modal-input-comp-porcentaje">Porcentaje</label>
                                    <input type="number" min="0.01" max="100" step="0.01" class="form-control" id="modal-input-comp-porcentaje" name="porcentaje">
                                </div>
                                <div class="form-group col-6">
                                    <label for="modal-input-comp-kilogramos">Kilogramos</label>
                                    <input type="number" min="0.01" step="0.01" class="form-control" id="modal-input-comp-kilogramos" name="kilogramos">
                                </div>
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

</main>

<div class="modal loadingmodal"></div>

<script>
    var f_id = null;
    var table = "";

    var porcentajeFinal = 0;
    var kilogramosFinal = 0;

    var tmpKg = 0;
    var tmpPrc = 0;
    var tmpTot = 0;
    var tmpConc = 0;

    var badKg = [];

    var dynamicVariable = '';

    $(document).ready(function() {
        $('#create-componente').hide();
        $('#proportional-relationship').hide();

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
            $('#edit-modal').modal();
        });

        $(document).on('click', "#delete-item", function() {
            $(this).addClass('delete-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
            $('#delete-modal').modal();
        });

        $(document).on('click', "#update-item", function() {
            $('body').addClass('loading');

            $(this).addClass('update-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

            var el = $(".update-item-trigger-clicked"); // See how its usefull right here?
            var row = el.closest(".data-row");
            var id = row.children('#id');

            $.ajax({
                type: 'POST',
                url: 'revisar_formula',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    input: id[0]['innerHTML'],
                },
                success: function(data) {
                    $('body').removeClass('loading');

                    if(data != "error"){
                        swal({
                            title: "",
                            text: "Fórmula revisada y actualizada exitosamente!",
                            icon: "success",
                            type: "success"
                        }).then(() => {
                            $('#' + data.id).find('#importe').text(new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(data.importe));
                            $('#' + data.id).find('#kilogramos').text(data.kilogramos);
                            $('#' + data.id).find('#proteina').text(data.proteina.toFixed(2) + ' %');
                            $('#' + data.id).find('#grasa').text(data.grasa.toFixed(2) + ' %');
                            $('#' + data.id).find('#ceniza').text(data.ceniza.toFixed(2) + ' %');
                            $('#' + data.id).find('#updated_at').text(moment(data.updated_at).format('DD-MM-YYYY H:mm'));
                            //$('#' + data.id).find('#update-item').remove();

                        });
                    }
                    else{
                        swal({
                            tite: "",
                            text: "Fórmula no actualizada correctamente!",
                            icon: "error",
                            type: "error"
                        }).then(() => {
                            //
                        });
                    }

                },
                error: function(data) {
                    $('body').removeClass('loading');

                    swal({
                        tite: "",
                        text: "Oops, ocurrió un error, intente más tarde!",
                        icon: "error",
                        type: "error"
                    }).then(() => {
                        //
                    });

                }
            });

            $('.update-item-trigger-clicked').removeClass('update-item-trigger-clicked');
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
            var ceniza = row.children("#ceniza");
            var comentarios = row.children("#comentarios");

            $("#modal-input-id").val(id[0]['innerHTML']);
            $("#modal-input-nombre").val(nombre[0]['innerHTML']);
            /* $("#modal-input-proteina").val(proteina[0]['innerHTML']);
            $("#modal-input-grasa").val(grasa[0]['innerHTML']);
            $("#modal-input-ceniza").val(ceniza[0]['innerHTML']); */
            $("#modal-input-comentarios").val(comentarios[0]['innerHTML']);

            $("#edit-form").attr('action', 'formulas/' + id[0]['innerHTML']);
        });

        // on modal hide
        $('#edit-modal').on('hide.bs.modal', function() {
            $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked');
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
            var ceniza = row.children("#ceniza");
            var comentarios = row.children("#comentarios");

            // fill the data in the input fields
            $("#modal-input-id-delete").val(id[0]['innerHTML']);
            $("#modal-input-nombre-delete").val(nombre[0]['innerHTML']);
            /* $("#modal-input-proteina-delete").val(proteina[0]['innerHTML']);
            $("#modal-input-grasa-delete").val(grasa[0]['innerHTML']);
            $("#modal-input-ceniza-delete").val(ceniza[0]['innerHTML']); */
            $("#modal-input-comentarios-delete").val(comentarios[0]['innerHTML']);

            $("#delete-form").attr('action', 'formulas/' + id[0]['innerHTML']);

        });

        // on modal hide
        $('#delete-modal').on('hide.bs.modal', function() {
            $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
            $("#delete-form").trigger("reset");
        });


        // COMPONENTES
        $(document).on('click', "#componentes-item", function() {
            $('.componente-item-trigger-clicked').removeClass('componente-item-trigger-clicked');

            $(this).addClass('componente-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
            $('#componentes-modal').modal();
        });

        $('#componentes-modal').on('show.bs.modal', function() {

            var el = $(".componente-item-trigger-clicked"); // See how its usefull right here?
            var row = el.closest(".data-row");

            // get the data
            f_id = row.children('#id')[0]['innerHTML'];
            dynamicVariable = row.children('#nombre')[0]['innerHTML'];

            $("#myTableComponentes").DataTable().destroy();
            //$("#modal-input-search").focus();
            porcentajeFinal = 0;
            kilogramosFinal = 0;
            badKg = [];
            $('#proportional-relationship').hide();

            table = $("#myTableComponentes").DataTable({
                "initComplete": function (settings, json) {
                    $("#myTableComponentes").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
                },
                "ajax": {
                    "url": "componentes",
                    "dataType": "json",
                    "type": "GET",
                    "data":{ input: f_id },
                    "dataSrc" : ""
                },
                "scrollX": true,
                "columns": [
                    {
                        "data": "id",
                        "createdCell":  function (td, cellData, rowData, row, col) {
                            $(td).attr('id', 'id');
                            //$(td).attr('hidden', 'true');
                        }
                    },
                    {
                        "data": "precio.concepto",
                        "createdCell":  function (td, cellData, rowData, row, col) {
                            $(td).attr('id', 'precio');
                            tmpConc = cellData;
                        }
                    },
                    {
                        "data": "kilogramos",
                        "createdCell":  function (td, cellData, rowData, row, col) {
                            $(td).attr('id', 'kilogramos');
                            tmpKg = cellData;
                            kilogramosFinal += cellData;
                        }
                    },
                    {
                        "data": "porcentaje",
                        "createdCell":  function (td, cellData, rowData, row, col) {
                            $(td).attr('id', 'porcentaje');
                            tmpPrc = cellData;
                            porcentajeFinal += cellData;

                        },
                        render: function ( data, type, row ) {
                            return data + ' %';
                        }
                    },
                    {
                        "data": "importe",
                        "createdCell":  function (td, cellData, rowData, row, col) {
                            $(td).attr('id', 'importe');
                        },
                        "render": $.fn.dataTable.render.number( ',', '.', 2, '$' ),
                    },
                    {
                        "data": "precio.porcion_comestible",
                        "createdCell":  function (td, cellData, rowData, row, col) {
                            $(td).attr('id', 'porcion_comestible');
                        }
                    },
                    {
                        "data": "precio.grasa",
                        "createdCell":  function (td, cellData, rowData, row, col) {
                            $(td).attr('id', 'grasa');
                        }
                    },
                    {
                        "data": "precio.fibra",
                        "createdCell":  function (td, cellData, rowData, row, col) {
                            $(td).attr('id', 'fibra');
                        }
                    },
                    {
                        "data": "precio.ceniza",
                        "createdCell":  function (td, cellData, rowData, row, col) {
                            $(td).attr('id', 'ceniza');
                        }
                    },
                    {
                        "data": null,
                        "render": function() {
                            return `
                            <div class="btn-group">
                                <button type="button" class="btn btn-info"  id="edit-item-comp">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-danger"  id="delete-item-comp">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                            `
                        }
                    }
                ],
                'createdRow': function( row, data, dataIndex ) {
                    $(row).addClass('data-row');

                    tmpTot = tmpKg * 100 / tmpPrc;
                    badKg.push({concepto:tmpConc, total:tmpTot });
                },
                "deferRender": true,
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
                buttons: [
                    {
                        extend: 'csv',
                        charset: 'UTF-8',
                        bom: true,
                        filename: 'Formulacion-Grupo-RES--' + dynamicVariable,
                        exportOptions: {
                            columns: [ 1, 2, 3, 4, 5, 6, 7, 8 ]
                        }
                    },
                    {
                        extend: 'excel',
                        charset: 'UTF-8',
                        bom: true,
                        filename: 'Formulacion-Grupo-RES--' + dynamicVariable,
                        exportOptions: {
                            columns: [ 1, 2, 3, 4, 5, 6, 7, 8 ]
                        }
                    },
                    {
                        extend: 'pdf',
                        customize: function(doc) {
                            doc.content[1].margin = [ 50, 0, 50, 0 ] //left, top, right, bottom
                        },
                        charset: 'UTF-8',
                        bom: true,
                        filename: 'Formulacion-Grupo-RES--' + dynamicVariable,
                        exportOptions: {
                            columns: [ 1, 2, 3, 4, 5, 6, 7, 8 ]
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Imprimir',
                        charset: 'UTF-8',
                        bom: true,
                        filename: 'Formulacion-Grupo-RES--' + dynamicVariable,
                        exportOptions: {
                            columns: [ 1, 2, 3, 4, 5, 6, 7, 8 ]
                        }
                    },
                ],
                initComplete: function () {
                    var btns = $('.dt-button');
                    btns.addClass('btn grupo-res');
                    btns.removeClass('dt-button');
                    $('#porcentaje-total').text(" Sumatoria de los porcentajes: " + porcentajeFinal);

                    if (porcentajeFinal != 100) {
                        $('#porcentaje-total').css('color', 'red');
                    }
                    else{
                        $('#porcentaje-total').css('color', '#00f400');

                        var repeated = [];
                        var different = [];
                        var conceptos = [];

                        for (var i in badKg) {
                            if (different.includes(badKg[i]["total"])) {
                                repeated.push(badKg[i]["total"]);
                            }
                            else{
                                different.push(badKg[i]["total"]);
                                conceptos.push(badKg[i]["concepto"]);
                            }
                        }

                        if(conceptos.length != 1){
                            $('#proportional-relationship').text('Error de proporcionalidad: << ' + conceptos.join(" || ") + " >>");
                            $('#proportional-relationship').css('color', 'red');
                            $('#proportional-relationship').show();
                        }
                        else{
                            $('#proportional-relationship').text('');
                        }
                    }

                }

            });

        });

        // on modal hide
        $('#componentes-modal').on('hide.bs.modal', function() {
            $("#add-comp-form").trigger("reset");

            $("#comp-precio option[id='default-option']").attr("selected", "selected");
            $('#comp-precio').trigger("chosen:updated");

            setTimeout(function(){
                $("#create-componente").hide();
                $('#components-table').show();
            }, 700);
            //$('.componente-item-trigger-clicked').removeClass('componente-item-trigger-clicked');
        });

        $(document).on('click',"[id='delete-item-comp']", function () {
            var data = table.row($(this).parents('tr')).data();
            var id = data['id'];
            swal({
                title: "¿Está seguro de eliminar este elemento?",
                text: "Este elemento se eliminará para siempre.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: 'DELETE',
                        url: 'formulaciones/' + id,
                        dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            input: id,
                            fid: f_id
                        },
                        success: function(data) {
                            $("#componentes-modal").modal('hide');

                            if(data != "error"){
                                swal({
                                    title: "",
                                    text: "Componente removido de la Fórmula exitosamente!",
                                    icon: "success",
                                    type: "success"
                                }).then(() => {
                                    $('#' + data.id).find('#importe').text(new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(data.importe));
                                    $('#' + data.id).find('#kilogramos').text(data.kilogramos);
                                    $('#' + data.id).find('#proteina').text(data.proteina.toFixed(2) + ' %');
                                    $('#' + data.id).find('#grasa').text(data.grasa.toFixed(2) + ' %');
                                    $('#' + data.id).find('#ceniza').text(data.ceniza.toFixed(2) + ' %');
                                    $('#' + data.id).find('#updated_at').text(moment(data.updated_at).format('DD-MM-YYYY H:mm'));

                                    $("#componentes-modal").modal('show');
                                });
                            }
                            else{
                                swal({
                                    tite: "",
                                    text: "Componente no removido de la Fórmula porque debe de existir al menos uno!",
                                    icon: "error",
                                    type: "error"
                                }).then(() => {
                                    $("#componentes-modal").modal('show');
                                });
                            }
                        },
                        error: function(data) {
                            $("#componentes-modal").modal('hide');

                            swal({
                                tite: "",
                                text: "Oops, ocurrió un error, intente más tarde!",
                                icon: "error",
                                type: "error"
                            }).then(() => {
                                $("#componentes-modal").modal('show');
                            });
                        }
                    });
                }
            });
        });

        // EDIT COMPONENT OF FORMULA
        $(document).on('click',"[id='edit-item-comp']", function () {
            $(this).addClass('edit-comp-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
            $("#componentes-modal").modal('hide');
            $('#edit-comp-modal').modal();
        });

        // on modal show
        $('#edit-comp-modal').on('show.bs.modal', function() {

            var el = $(".edit-comp-item-trigger-clicked"); // See how its usefull right here?
            var row = el.closest(".data-row");

            // get the data
            var id = row.children('#id');
            var precio = row.children("#precio");
            var porcentaje = row.children("#porcentaje");
            var kilogramos = row.children("#kilogramos");

            $("#modal-input-comp-id").val(id[0]['innerHTML']);
            $("#modal-input-comp-porcentaje").val(parseFloat(porcentaje[0]['innerHTML'].replace(' %', '')));
            $("#modal-input-comp-kilogramos").val(kilogramos[0]['innerHTML']);

            $("option:selected").removeAttr("selected");
            var preciosOp =  $('#modal-input-comp-precio').html();

            $('#modal-input-comp-precio').empty(); //remove all child nodes
            $('#modal-input-comp-precio').append(preciosOp);
            $('#modal-input-comp-precio').trigger("chosen:updated");

            $("#modal-input-comp-precio option").filter(function() {
                return this.text.replace(/\s+/g,' ').trim() == precio[0]['innerHTML'].replace(/\s+/g,' ').trim();
            }).attr('selected', true);
            $('#modal-input-comp-precio').trigger("chosen:updated");

            $("#edit-comp-form").attr('action', 'formulaciones/' + id[0]['innerHTML']);
        });

        // on modal hide
        $('#edit-comp-modal').on('hide.bs.modal', function() {
            $('.edit-comp-item-trigger-clicked').removeClass('edit-comp-item-trigger-clicked')
            $("#edit-comp-form").trigger("reset");

            setTimeout(function(){
                $("#componentes-modal").modal('show');
            }, 700);
        });

        $('#edit-comp-form').submit(function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "PUT",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                dataType: 'json',
                success: function(data){
                    $('body').removeClass('loading');

                    swal({
                        title: "",
                        text: "Componente editado exitosamente!",
                        icon: "success",
                        type: "success"
                    }).then(() => {
                        $("#edit-comp-modal").modal('hide');

                        $('#' + data.id).find('#importe').text(new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(data.importe));
                        $('#' + data.id).find('#kilogramos').text(data.kilogramos);
                        $('#' + data.id).find('#proteina').text(data.proteina.toFixed(2) + ' %');
                        $('#' + data.id).find('#grasa').text(data.grasa.toFixed(2) + ' %');
                        $('#' + data.id).find('#ceniza').text(data.ceniza.toFixed(2) + ' %');
                        $('#' + data.id).find('#updated_at').text(moment(data.updated_at).format('DD-MM-YYYY H:mm'));

                    });
                },
                error: function(data){
                    $('body').removeClass('loading');

                    swal({
                        tite: "",
                        text: "Ocurrió un error, intenta nuevamente más tarde!",
                        icon: "error",
                        type: "error"
                    }).then(() => {
                        $("#edit-comp-modal").modal('hide');
                    });
                }
            });
        });

        $('#link-componente').on('click', function(){
            $('#comp-formula-id').val(f_id);
            $('#create-componente').show();
            $('#components-table').hide();
        });

        $('#add-comp-form').submit(function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                dataType: 'json',
                success: function(data){
                    $('body').removeClass('loading');
                    $("#create-componente").hide();
                    $('#components-table').show();
                    $('#componentes-modal').modal('hide');

                    swal({
                        title: "",
                        text: "Componente de fórmula creado exitosamente!",
                        icon: "success",
                        type: "success"
                    }).then(() => {
                        setTimeout(function(){
                            $('#componentes-modal').modal('show');
                        }, 700);

                        $('#' + data.id).find('#importe').text(new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(data.importe));
                        $('#' + data.id).find('#kilogramos').text(data.kilogramos);
                        $('#' + data.id).find('#proteina').text(data.proteina.toFixed(2) + ' %');
                        $('#' + data.id).find('#grasa').text(data.grasa.toFixed(2) + ' %');
                        $('#' + data.id).find('#ceniza').text(data.ceniza.toFixed(2) + ' %');
                        $('#' + data.id).find('#updated_at').text(moment(data.updated_at).format('DD-MM-YYYY H:mm'));

                    });
                },
                error: function(data){
                    console.log(data.responseJSON.error);
                    $('body').removeClass('loading');
                    $("#create-componente").hide();
                    $('#components-table').show();
                    $('#componentes-modal').modal('hide');

                    swal({
                        tite: "",
                        text: data.responseJSON.error,
                        icon: "error",
                        type: "error"
                    }).then(() => {
                        setTimeout(function(){
                            $('#componentes-modal').modal('show');
                        }, 700);
                    });
                }
            });
        });

    });

</script>

@endsection
