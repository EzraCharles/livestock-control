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
                            <h3> <strong> Precios </strong></h3>
                            <div class="col-md-12" style="padding-top: 15px; ">
                                <button class="btn grupo-res" id="add" style="text-align: left; float: right; margin-top: -50px;">Añadir Precio</button>
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
                                        <h5>Añadir Precio</h5>
                                    </div>
                                    <div class="col-12">
                                        <form id="create" action="{{ route('precios.store') }}" method="POST" style="padding:5px;">
                                            @method('POST')
                                            @csrf
                                            <div class="row form-group">
                                                <div class="col-5">
                                                    <label for="concepto">Concepto:</label>
                                                    <input class="form-control" type="text" name="concepto" required>
                                                </div>
                                                <div class="col-4">
                                                    <label for="tipo">Tipo:</label>
                                                    <select class="form-control select-objects" id="tipo" name="tipo">
                                                        <option id="default-option" value="" disabled selected="selected">Eligir una opción...</option>
                                                        <option value="Animales"> Animales</option>
                                                        <option value="Tratamiento"> Tratamiento</option>
                                                        <option value="Formulación"> Formulación</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="precio">Precio:</label>
                                                    <input class="form-control" type="number" min="0.0" step=".01" name="precio" required>
                                                </div>
                                                <div class="col-3">
                                                    <label for="factor">Factor:</label>
                                                    <input class="form-control" type="number" min="0.0" step=".01" name="factor" required>
                                                </div>
                                                <div class="col-7">
                                                    <label for="comentarios">Comentarios:</label>
                                                    <input class="form-control" type="text" name="comentarios">
                                                </div>
                                                <div class="col-2" style="padding-top: 30px; ">
                                                    <label for="rango"><input id="rango" type="checkbox" name="rango"> Rango</label>
                                                </div>
                                                <div class="col-10" >
                                                    <div class="row" id="range">
                                                        <div class="col-2"></div>
                                                        <div class="col-4">
                                                            <label for="rango-bajo">Rango bajo:</label>
                                                            <input class="form-control" type="number" min="0.0" step=".01" id="rango_bajo" name="rango_bajo">
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="rango-alto">Rango alto:</label>
                                                            <input class="form-control" type="number" min="0.0" step=".01" id="rango_alto" name="rango_alto">
                                                        </div>
                                                        <div class="col-2"></div>
                                                    </div>
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
                                            <th><strong>Concepto</strong></th>
                                            <th><strong>Tipo</strong></th>
                                            <th><strong>Precio</strong></th>
                                            <th><strong>Factor</strong></th>
                                            <th><strong>Comentarios</strong></th>
                                            <th><strong>Creación</strong></th>
                                            <th hidden><strong>Rango</strong></th>
                                            <th hidden><strong>Rango bajo</strong></th>
                                            <th hidden><strong>Rango alto</strong></th>
                                            <th><strong>Rango</strong></th>
                                            <th><strong>Acciones</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($precios as $precio)
                                        <tr class="data-row">
                                            <td style="text-align: center; vertical-align: middle; " id="id">{{ $precio->id }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="concepto">{{ $precio->concepto }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="tipo">{{ $precio->tipo }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="precio">${{ number_format($precio->precio, 2) }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="factor">{{ $precio->factor }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="comentarios">{{ $precio->comentarios }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="created_at">{{ $precio->created_at }}</td>
                                            <td hidden style="text-align: center; vertical-align: middle; " id="rango">{{ $precio->rango }}</td>
                                            <td hidden style="text-align: center; vertical-align: middle; " id="rango_bajo">{{ $precio->rango_bajo }}</td>
                                            <td hidden style="text-align: center; vertical-align: middle; " id="rango_alto">{{ $precio->rango_alto }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn {{ $precio->rango == 1 ? 'btn-success' : 'btn-danger' }}" data-toggle="modal" id="rangos">
                                                        <i class="extraInfo fas {{ $precio->rango == 1 ? 'fa-check' : 'fa-times' }}" data-content="{{ $precio->rango == 1 ? $precio->rango_bajo . ' - ' . $precio->rango_alto : '' }}" rel="popover" data-placement="bottom" data-original-title="{{ $precio->rango == 0 ? 'Sin Rangos' : 'Rangos de peso' }}" data-trigger="hover"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ url('precios/'.$precio->id) }}" style="color: inherit;">
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
                    <h4 class="modal-title" align="center"><b>Editar Precio</b></h4>
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
                            <div class="form-group">
                                <label for="modal-input-concepto">Concepto</label>
                                <input type="text" class="form-control" id="modal-input-concepto" name="concepto" required>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="modal-input-tipo">Tipo:</label>
                                    <select class="form-control select-objects" id="modal-input-tipo" name="tipo" required>
                                        <option value="Animales"> Animales</option>
                                        <option value="Tratamiento"> Tratamiento</option>
                                        <option value="Formulación"> Formulación</option>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label for="modal-input-precio">Precio</label>
                                    <input type="number" min="0.0" step=".01" class="form-control" id="modal-input-precio" name="precio" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="modal-input-factor">Factor</label>
                                    <input type="number" min="1" step="1" class="form-control" id="modal-input-factor" name="factor" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="modal-input-comentarios">Comentarios</label>
                                    <textarea type="text" class="form-control" id="modal-input-comentarios" name="comentarios"></textarea>
                                </div>
                            </div>
                            <div id="modal-input-rangos" class="row">
                                <div class="form-group col-6">
                                    <label for="modal-input-bajo">Rango bajo</label>
                                    <input type="number" min="0.0" step=".01" class="form-control" id="modal-input-bajo" name="rango_bajo">
                                </div>
                                <div class="form-group col-6">
                                    <label for="modal-input-alto">Rango alto</label>
                                    <input type="number" min="0.0" step=".01" class="form-control" id="modal-input-alto" name="rango_alto">
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

    <div class="modal fade" id="delete-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" align="center"><b>Borrar Precio</b></h4>
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
                            <div class="form-group">
                                <label for="modal-input-concepto-delete">Concepto</label>
                                <input type="text" class="form-control" id="modal-input-concepto-delete" name="concepto" readonly>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="modal-input-tipo-delete">Tipo:</label>
                                    <select class="form-control" id="modal-input-tipo-delete" name="tipo" disabled readonly>
                                        <option value="Animales"> Animales</option>
                                        <option value="Tratamiento"> Tratamiento</option>
                                        <option value="Formulación"> Formulación</option>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label for="modal-input-precio-delete">Precio</label>
                                    <input type="text" class="form-control" id="modal-input-precio-delete" name="precio" readonly>
                                </div>
                                <div class="form-group col-6">
                                    <label for="modal-input-factor-delete">Factor</label>
                                    <input type="text" class="form-control" id="modal-input-factor-delete" name="factor" readonly>
                                </div>
                                <div class="form-group col-6">
                                    <label for="modal-input-comentarios-delete">Comentarios</label>
                                    <textarea type="text" class="form-control" id="modal-input-comentarios-delete" name="comentarios" readonly></textarea>
                                </div>
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
    $('#range').hide();
    $('#modal-input-rangos').hide();
    $('#hr-divisor').hide();

    $('.extraInfo').popover();
    $('#popoverOption').popover({ trigger: "hover" });

    $("#rango").change(function() {
        if(this.checked) {
            $(this).attr('value', '1');
            $('#range').show();
        }
        else{
            $('#range').hide();
            $(this).attr('value', '0');
        }
    });

    $(document).ready(function() {

        $('#add').on('click', function () {
            $('#add-item').toggle();
            if ($(this).text() == 'Cancelar') {
                $(this).text('Añadir Precio');
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
                filename: 'Precios-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 7, 6 ]
                }
            },
            {
                extend: 'excel',
                charset: 'UTF-8',
                bom: true,
                filename: 'Precios-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 7, 6 ]
                }
            },
            {
                extend: 'pdf',
                customize: function(doc) {
                    doc.content[1].margin = [ 50, 0, 50, 0 ] //left, top, right, bottom
                },
                charset: 'UTF-8',
                bom: true,
                filename: 'Precios-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 7, 6 ]
                }
            },
            {
                extend: 'print',
                text: 'Imprimir',
                charset: 'UTF-8',
                bom: true,
                filename: 'Precios-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 7, 6 ]
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

        // on modal show
        $('#edit-modal').on('show.bs.modal', function() {
            var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?
            var row = el.closest(".data-row");

            // get the data
            var id = row.children('#id');
            var concepto = row.children("#concepto");
            var tipo = row.children("#tipo");
            var precio = row.children("#precio");
            var factor = row.children("#factor");
            var comentarios = row.children("#comentarios");
            var rango = row.children("#rango");

            // fill the data in the input fields
            $("#modal-input-id").val(id[0]['innerHTML']);
            $("#modal-input-concepto").val(concepto[0]['innerHTML']);
            $("#modal-input-tipo").val(tipo[0]['innerHTML']);
            $("#modal-input-precio").val(precio[0]['innerHTML'].replace(/[$,]/g, ''));
            $("#modal-input-factor").val(factor[0]['innerHTML']);
            $("#modal-input-comentarios").val(comentarios[0]['innerHTML']);
            /*$("#modal-input-workshift option").filter(function() {
                return this.text == workshift[0]['innerHTML'];
            }).attr('selected', true);*/
            $('#modal-input-tipo').trigger("chosen:updated");

            if (rango[0]['innerHTML'] == 1) {
                var rango_bajo = row.children("#rango_bajo");
                var rango_alto = row.children("#rango_alto");

                $('#modal-input-rangos').show();
                $("#modal-input-bajo").val(rango_bajo[0]['innerHTML']);
                $("#modal-input-alto").val(rango_alto[0]['innerHTML']);
            }
            else{
                $('#modal-input-rangos').hide();
                $("#modal-input-bajo").val('');
                $("#modal-input-alto").val('');
            }


            $("#edit-form").attr('action', 'precios/' + id[0]['innerHTML']);
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
            var concepto = row.children("#concepto");
            var tipo = row.children("#tipo");
            var precio = row.children("#precio");
            var factor = row.children("#factor");
            var comentarios = row.children("#comentarios");

            // fill the data in the input fields
            $("#modal-input-id-delete").val(id[0]['innerHTML']);
            $("#modal-input-concepto-delete").val(concepto[0]['innerHTML']);
            $("#modal-input-tipo-delete").val(tipo[0]['innerHTML']);
            $("#modal-input-precio-delete").val(precio[0]['innerHTML']);
            $("#modal-input-factor-delete").val(factor[0]['innerHTML']);
            $("#modal-input-comentarios-delete").val(comentarios[0]['innerHTML']);

            $("#delete-form").attr('action', 'precios/' + id[0]['innerHTML']);

        });

        // on modal hide
        $('#delete-modal').on('hide.bs.modal', function() {
            $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
            $("#delete-form").trigger("reset");
        });


        $('#create').submit(function(e) {

            e.preventDefault(); //this will prevent the default submit

            if ($('#tipo').val() == null) {
                $('body').removeClass('loading');

                swal({
                    title: "",
                    text: "No ha elegido ningún valor para 'Tipo'!",
                    icon: "error",
                    buttons: 'Ok',
                });
                return false;
            }
            else if(parseInt($('#rango_bajo').val()) < parseInt($('#rango_alto').val())){
                $(this).unbind('submit').submit(); // continue the submit unbind preventDefault
            }
            else{
                $('body').removeClass('loading');
                swal({
                    title: "",
                    text: "El Rango Bajo no puede ser mayor que Rango Alto!",
                    icon: "error",
                    buttons: 'Ok',
                });
                return false;
            }

        });

    });

</script>

@endsection
