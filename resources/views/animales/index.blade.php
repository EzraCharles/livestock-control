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
                            <h3> <strong> Animales </strong></h3>
                            <div class="col-md-12" style="padding-top: 15px; ">
                                <a href="{{ route('animales.create') }}" style="color: inherit;">
                                    <button class="btn grupo-res" id="add" style="text-align: left; float: right; margin-top: -50px;">Añadir Animal/Animales</button>
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
                                            <th><strong>Arete 10</strong></th>
                                            <th><strong>Arete 4</strong></th>
                                            <th><strong>Arete RES</strong></th>
                                            <th><strong>Tipo </strong></th>
                                            <th><strong>Productor</strong></th>
                                            <th><strong>Comentarios</strong></th>
                                            <th><strong>Creación</strong></th>
                                            <th><strong>Acciones</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($animales as $animal)
                                        <tr class="data-row" style="background-color: {{ $animal->defuncion == 1 ? '#ffa5a5' : '' }}">
                                            <td style="text-align: center; vertical-align: middle; " id="id">{{ $animal->id }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="arete_10">{{ $animal->arete != null ? substr($animal->arete, -10) : $animal->arete_10 }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="arete_4">{{ $animal->arete != null ? substr($animal->arete, -4) : substr($animal->arete_10, -4) }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="arete_res">{{ $animal->arete_res }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="tipo">{{ $animal->tipoAnimal->nombre }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="productor">{{ $animal->persona->nombre }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="comentarios">{{ $animal->comentarios }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="created_at">{{ $animal->created_at }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ url('animales/'.$animal->id) }}" style="color: inherit;">
                                                        <button type="button" class="btn btn-success" data-toggle="modal" id="show-item">
                                                            <i class="far fa-eye"></i>
                                                        </button>
                                                    </a>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" id="edit-item">
                                                        <i class="fa fa-bolt"></i>
                                                    </button>
                                                    <a href="{{ url('animales/'.$animal->id.'/edit') }}" style="color: inherit;">
                                                        <button type="button" class="btn btn-info" data-toggle="modal" id="edit-complete">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </a>
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
                    <h4 class="modal-title" align="center"><b>Editar Animal</b></h4>
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
                                <label for="modal-input-precio">Precio</label>
                                    <input type="number" min="0.0" step=".01" class="form-control" id="modal-input-precio" name="precio" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="modal-input-factor">Factor</label>
                                    <input type="number" min="1" step="1" class="form-control" id="modal-input-factor" name="factor" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="modal-input-comentarios">Comentarios</label>
                                <textarea type="text" class="form-control" id="modal-input-comentarios" name="comentarios"></textarea>
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
                            <div class="form-group">
                                <label for="modal-input-concepto-delete">Concepto</label>
                                <input type="text" class="form-control" id="modal-input-concepto-delete" name="concepto" readonly>
                            </div>
                            <div class="form-group">
                                <label for="modal-input-precio-delete">Precio</label>
                                <input type="text" class="form-control" id="modal-input-precio-delete" name="precio" readonly>
                            </div>
                            <div class="form-group">
                                <label for="modal-input-factor-delete">Factor</label>
                                <input type="text" class="form-control" id="modal-input-factor-delete" name="factor" readonly>
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

        $('form').on('submit', function(){
            $('body').addClass('loading');
        });
        /**
        * for showing edit item popup
        */
        $('#myTable').DataTable({
            buttons: [
            {
                extend: 'csv',
                charset: 'UTF-8',
                bom: true,
                filename: 'Precios-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 6, 5 ]
                }
            },
            {
                extend: 'excel',
                charset: 'UTF-8',
                bom: true,
                filename: 'Precios-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 6, 5 ]
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
                    columns: [ 1, 2, 3, 4, 6, 5 ]
                }
            },
            {
                extend: 'print',
                text: 'Imprimir',
                charset: 'UTF-8',
                bom: true,
                filename: 'Precios-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 6, 5 ]
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
            var concepto = row.children("#concepto");
            var precio = row.children("#precio");
            var factor = row.children("#factor");
            var comentarios = row.children("#comentarios");
            var rango = row.children("#rango");

            // fill the data in the input fields
            $("#modal-input-id").val(id[0]['innerHTML']);
            $("#modal-input-concepto").val(concepto[0]['innerHTML']);
            $("#modal-input-precio").val(precio[0]['innerHTML']);
            $("#modal-input-factor").val(factor[0]['innerHTML']);
            $("#modal-input-comentarios").val(comentarios[0]['innerHTML']);
            /*$("#modal-input-workshift option").filter(function() {
                return this.text == workshift[0]['innerHTML'];
            }).attr('selected', true);*/

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
            var precio = row.children("#precio");
            var factor = row.children("#factor");
            var comentarios = row.children("#comentarios");

            // fill the data in the input fields
            $("#modal-input-id-delete").val(id[0]['innerHTML']);
            $("#modal-input-concepto-delete").val(concepto[0]['innerHTML']);
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

    });

</script>

@endsection
