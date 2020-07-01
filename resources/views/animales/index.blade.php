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
                                            <th><strong>RES</strong></th>
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
                                            <td style="text-align: center; vertical-align: middle; " id="arete_10">{{ substr($animal->arete, -10) }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="arete_4">{{ substr($animal->arete, -4) }}</td>
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
                                                    <a href="{{ url('animales/'.$animal->id.'/editar') }}" style="color: inherit;">
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
                            <div class="row">
                                <div class="form-group col-9">
                                    <label for="modal-input-arete">Arete</label>
                                    <input type="text" class="form-control" id="modal-input-arete" name="arete" required>
                                </div>
                                <div class="form-group col-3">
                                    <label for="modal-input-tipo">Tipo</label>
                                    <select class="form-control select-objects" id="modal-input-tipo" name="tipo_animal_id" required>
                                      @foreach ($tipos as $tipo)
                                        <option value="{{$tipo->id}}"> {{$tipo->nombre}}</option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                <label for="modal-input-res">Arete RES</label>
                                    <input type="text" class="form-control" id="modal-input-res" name="arete_res">
                                </div>
                                <div class="form-group col-6">
                                    <label for="modal-input-persona">Productor</label>
                                    <select class="form-control select-objects" id="modal-input-persona" name="persona_id" required>
                                      @foreach ($personas as $persona)
                                        <option value="{{$persona->id}}"> {{$persona->nombre}}</option>
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
                                <div class="form-group col-6">
                                    <label for="modal-input-arete-delete">Arete</label>
                                    <input type="text" class="form-control" id="modal-input-arete-delete" name="arete" readonly>
                                </div>
                                <div class="form-group col-6">
                                    <label for="modal-input-res-delete">Arete RES</label>
                                    <input type="text" class="form-control" id="modal-input-res-delete" name="arete_res" readonly>
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
                filename: 'Animales-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6, 7 ]
                }
            },
            {
                extend: 'excel',
                charset: 'UTF-8',
                bom: true,
                filename: 'Animales-Grupo-RES',
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
                filename: 'Animales-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6, 7 ]
                }
            },
            {
                extend: 'print',
                text: 'Imprimir',
                charset: 'UTF-8',
                bom: true,
                filename: 'Animales-Grupo-RES',
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
            var arete = row.children("#arete_10");
            var res = row.children("#arete_res");
            var tipo = row.children("#tipo");
            var productor = row.children("#productor");
            var comentarios = row.children("#comentarios");

            // fill the data in the input fields
            $("#modal-input-id").val(id[0]['innerHTML']);
            $("#modal-input-arete").val(arete[0]['innerHTML']);
            $("#modal-input-res").val(res[0]['innerHTML']);
            $("#modal-input-comentarios").val(comentarios[0]['innerHTML']);

            $("option:selected").removeAttr("selected");
            var tiposOp =  $('#modal-input-tipo').html();
            var personasOp =  $('#modal-input-persona').html();

            $('#modal-input-tipo').empty(); //remove all child nodes
            $('#modal-input-tipo').append(tiposOp);
            $('#modal-input-tipo').trigger("chosen:updated");

            $('#modal-input-persona').empty(); //remove all child nodes
            $('#modal-input-persona').append(personasOp);
            $('#modal-input-persona').trigger("chosen:updated");

            $("#modal-input-tipo option").filter(function() {
                return this.text.replace(/\s+/g,' ').trim() == tipo[0]['innerHTML'].replace(/\s+/g,' ').trim();
            }).attr('selected', true);
            $('#modal-input-tipo').trigger("chosen:updated");

            $("#modal-input-persona option").filter(function() {
                return this.text.replace(/\s+/g,' ').trim() == productor[0]['innerHTML'].replace(/\s+/g,' ').trim();
            }).attr('selected', true);
            $('#modal-input-persona').trigger("chosen:updated");

            $("#edit-form").attr('action', 'animales/' + id[0]['innerHTML']);
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
            var arete = row.children("#arete_10");
            var res = row.children("#arete_res");
            var comentarios = row.children("#comentarios");

            // fill the data in the input fields
            $("#modal-input-id-delete").val(id[0]['innerHTML']);
            $("#modal-input-arete-delete").val(arete[0]['innerHTML']);
            $("#modal-input-res-delete").val(res[0]['innerHTML']);
            $("#modal-input-comentarios-delete").val(comentarios[0]['innerHTML']);

            $("#delete-form").attr('action', 'animales/' + id[0]['innerHTML']);

        });

        // on modal hide
        $('#delete-modal').on('hide.bs.modal', function() {
            $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
            $("#delete-form").trigger("reset");
        });

    });

</script>

@endsection
