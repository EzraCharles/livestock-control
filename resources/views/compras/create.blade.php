@extends('partials.master')

@section('content')
<main class="main">
    <style>
        hr{
            border-top: 2px solid black;
        }
    </style>
    <!-- Breadcrumb-->
    <div class="container-fluid" style="padding-top: 100px;">
        <div class="animated fadeIn">
            <div class="row justify-content-center" style="margin-top: 24px;">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3> <strong> Ingreso </strong></h3>
                            <div class="col-md-12" style="margin-top: -35px;">
                                {{-- <button class="btn grupo-res" style="text-align: left; float: right; margin-top: -50px;" onclick="window.location = 'compras'">Ver Compras</button> --}}
                                <button id="new" type="button" class="btn btn-info" style="float: right;">Nuevo</button>
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
                                <form id="embarque" action="{{ route('animales.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <br/>
                                    <div class="col-md-12">
                                        <h4 style="text-align: center">Datos fijos</h4>
                                        <div class="row">
                                            <div class="col-4 form-group">
                                                <label for="proveedor">Proveedor:</label>
                                                <select class="form-control select-objects" name="proveedor" id="proveedor" autofocus>
                                                    <option value="" disabled selected>Eligir una opción...</option>
                                                    @foreach($proveedores as $proveedor)
                                                        <option value="{{ $proveedor->id }}">{{$proveedor->nombre}}</option>
                                                    @endforeach
                                                    <option value="otro">Otro</option>
                                                </select>
                                            </div>
                                            <div class="col-4 form-group">
                                                <label for="package">Fecha: </label>
                                                <input class="form-control" type="date" name="fecha" value="{{ date('Y-m-d') }}" id="fecha" required>
                                            </div>
                                            <div class="col-4" style="padding-top: 30px; ">
                                                <label for="acopio"><input class="check" id="acopio" type="checkbox" name="acopio"> Acopio</label>
                                            </div>
                                            <div class="col-12 form-group">
                                                <label for="comentarios_embarque">Comentarios del embarque: </label>
                                                <input class="form-control" type="text" name="comentarios_embarque" id="comentarios_embarque">
                                            </div>
                                        </div>
                                        <br/><hr><br/>

                                        <h4 style="text-align: center">Datos semi-variables</h4>
                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label for="folio_factura">Folio Factura: </label>
                                                <input class="form-control" type="text" name="folio_factura" value="" id="folio_factura">
                                            </div>
                                            <div class="col-12 form-group">
                                                <label for="factura_fiscal">Factura Fiscal: </label>
                                                <input class="form-control" type="text" name="factura_fiscal" value="" id="factura_fiscal">
                                            </div>
                                            <div class="col-12 form-group">
                                                <label for="reemo">Guía REEMO: </label>
                                                <input class="form-control" type="text" name="reemo" value="" id="reemo" >
                                            </div>
                                            <div class="col-4 form-group">
                                                <label for="label" id="type-label">Productor:</label>
                                                <select class="form-control select-objects" name="productor" id="productor">
                                                    <option value="" disabled selected>Eligir una opción...</option>
                                                    @foreach($productores as $productor)
                                                        <option value="{{ $productor->id }}">{{$productor->nombre}}</option>
                                                    @endforeach
                                                    <option value="otro">Otro</option>
                                                </select>
                                            </div>
                                            <div class="col-4 form-group">
                                                <label for="sexo">Sexo: </label>
                                                <select class="form-control select-objects" name="sexo" id="sexo">
                                                    <option value="" disabled selected>Eligir una opción...</option>
                                                    @foreach($tipos as $tipo)
                                                        <option value="{{ $tipo->id }}">{{$tipo->nombre}}</option>
                                                    @endforeach
                                                    <option value="otro">Otro</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br/><hr><br/>

                                        <div class="col-md-12">
                                            <div class="row" align='center'>
                                                <div class="col-5 form-group">
                                                    <label for="arete"># Arete: </label>
                                                    <input class="form-control" type="text" name="arete" id="arete" required>
                                                </div>
                                                <div class="col-3 form-group">
                                                    <label for="peso">Peso: </label>
                                                    <input class="form-control" type="number" min="1" max="2000" name="peso" id="peso" required>
                                                </div>
                                                <div class="col-4 form-group">
                                                    <label for="comentarios">Comentarios: </label>
                                                    <input class="form-control" type="text" name="comentarios" id="comentarios">
                                                </div>
                                                <button type="submit" hidden></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div id="show_frame" style="border: solid 3px red;
                                border-radius: 15px;
                                padding: 10px;
                                margin-bottom: 10px;
                                text-align: center;">
                                    <input type="number" id="embarque_id" name="embarque_id" value="0" hidden>
                                    <button id="delete_info" type="button" class="btn btn-danger" style="float: right; margin-left: 5px; margin-bottom: 10px;">Borrar Todo</button>

                                    <h3><strong>Observaciones</strong></h3>
                                    <table width="100%" id="observations_table" align="center" class="table table-striped table-hover table-condensed" >
                                        <thead>
                                            <tr>
                                                <th hidden><strong>ID</strong></th>
                                                <th><strong>Fila</strong></th>
                                                <th><strong>Arete</strong></th>
                                                <th><strong>Sexo</strong></th>
                                                <th><strong>Productor</strong></th>
                                                <th><strong>Comentarios</strong></th>
                                                <th><strong>Creación</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="row" style="padding-top: 15px">
                                    <div class="col-md-9">
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" style="margin-bottom: 10px" placeholder="Buscar..." align='right'>
                                    </div>
                                </div>
                                <table width="100%" id="aretes_table" align="center" class="attrTable table table-striped table-hover table-condensed" >
                                    <thead>
                                        <tr>
                                            <th><strong>No.</strong></th>
                                            <th><strong>Borrar</strong></th>
                                            <th><strong>Arete</strong></th>
                                            <th><strong>Sexo</strong></th>
                                            <th><strong>Peso</strong></th>
                                            <th><strong>Comentarios</strong></th>
                                            <th><strong>Folio</strong></th>
                                            <th><strong>Factura</strong></th>
                                            <th><strong>REEMO</strong></th>
                                            <th><strong>Productor</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-warning delete-row">Borrar Fila</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<div class="modal loadingmodal"></div>

<script type="text/javascript">
    $(document).ready(function(){
        var count = 0;
        $('#show_frame').hide();

        $(".select-objects").on('change', function() {
            if ($(this).val() == 'otro') {
                /* var tipo_id = 0;

                if (this.id == 'proveedor') {
                    tipo_id = 2;
                }
                else if (this.id == 'productor') {
                    tipo_id = 3;
                } */

                var html = `
                <div class="col-4 form-group nueva-persona-` + this.id + `">
                    <label for="nombre">Nombre de nuevo ` + this.id + `: </label>
                    <input class="form-control" type="text" name="nombre_` + this.id + `" id="nombre_` + this.id + `">
                </div>
                `;
                $(this).parent().after(html);
            }
            else{
                $(this).parent().parent().find('.nueva-persona-' + this.id).remove();
            }
        });

        $("#embarque").submit(function(e){
            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');

            var arete = String($("#arete").val().toUpperCase());
            var color = "";

            if(arete != "STOP"){
                if(arete.length == 10){
                    color = "#ffffce";
                }
                else if(arete.length < 10){
                    color = "#ff8a84";
                }
                else{
                    color = "#a4f2a4";
                }
            }
            else{
                console.log('else terturn');
                //return true;
            }

            if (!isNaN(arete)) {
                count++;

                var sexo_text = '';
                var sexo_val = '';
                var productor_text = '';
                var productor_val = '';

                if ($('#sexo').val() == null) {
                    swal({
                        title: "",
                        text: "No ha elegido ninguna opción para Sexo!",
                        icon: "error",
                        type: "error",
                    }).then(() => {
                        $('#sexo').trigger('chosen:deactivate');
                        $('#sexo').focus();
                        $('#sexo').trigger('chosen:activate');
                    });
                }
                else if ($('#sexo').val() == 'otro') {
                    sexo_text = $('#nombre_sexo').val();
                    sexo_val = $('#nombre_sexo').val();
                }
                else{
                    sexo_text = $('#sexo option:selected').text();
                    sexo_val = $('#sexo').val();
                }

                if ($('#productor').val() == null) {
                    swal({
                        title: "",
                        text: "No ha elegido ninguna opción para Productor!",
                        icon: "error",
                        type: "error",
                    }).then(() => {
                        $('#productor').trigger('chosen:deactivate');
                        $('#productor').focus();
                        $('#productor').trigger('chosen:activate');
                    });
                }
                else if ($('#productor').val() == 'otro') {
                    productor_text = $('#nombre_productor').val();
                    productor_val = $('#nombre_productor').val();
                }
                else{
                    productor_text = $('#productor option:selected').text();
                    productor_val = $('#productor').val();
                }

                var markup =
                `<tr id='tr` + count + `' style='background:` + color + `'>
                    <td class="attrRow">` + count + `</td>
                    <td><input type='checkbox' name='record'></td>
                    <td class="attrArete">` + $('#arete').val() + `</td>
                    <td>` + sexo_text + `</td>
                    <td class="attrSexo" hidden>` + sexo_val + `</td>
                    <td class="attrPeso">` + $('#peso').val() + `</td>
                    <td class="attrComentarios">` + $('#comentarios').val() + `</td>
                    <td class="attrFolio">` + $('#folio_factura').val() + `</td>
                    <td class="attrFactura">` + $('#factura_fiscal').val() + `</td>
                    <td class="attrREEMO">` + $('#reemo').val() + `</td>
                    <td>` + productor_text + `</td>
                    <td class="attrProductor" hidden>` + productor_val + `</td>
                </tr>`;

                $("#aretes_table tbody").append(markup);

                $('#arete').val('');
                $('#peso').val('');
                $('#comentarios').val('');
                $('#arete').focus();
            }
            else{
                swal({
                    title: "",
                    text: "El arete es incorrecto, deben ser sólo números!",
                    icon: "error",
                    type: "error",
                    buttons: false,
                    allowOutsideClick: false
                }).then(() => {
                    $('#arete').val('');
                    $('#arete').focus();
                });
            }

            $('body').removeClass('loading');
        });

        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
            	if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });

        $('input').on("change", function(e) {
            /* console.log($(this).val());
            console.log(this.id); */

            if($(this).val() == 'stop' || $(this).val() == 'STOP'){
                if ($('#proveedor').val() == null) {
                    swal({
                        title: "",
                        text: "No ha elegido ninguna opción para Proveedor!",
                        icon: "error",
                        type: "error",
                    }).then(() => {
                        $('#proveedor').trigger('chosen:deactivate');
                        $('#proveedor').focus();
                        $('#proveedor').trigger('chosen:activate');
                    });
                }
                else{
                    submitInfo();
                }
            }
        });


    });


    var embarqueID = 0;

    function submitInfo(){
        $('body').addClass('loading');

        console.log('subinfo');
        var array = [];

        $('.attrTable tr').each(function (a, b) {
            var fila = $('.attrRow', b).text();
            var arete = $('.attrArete', b).text();
            var sexo = $('.attrSexo', b).text();
            var peso = $('.attrPeso', b).text();
            var comentarios = $('.attrComentarios', b).text();
            var folio = $('.attrFolio', b).text();
            var factura = $('.attrFactura', b).text();
            var reemo = $('.attrREEMO', b).text();
            var productor = $('.attrProductor', b).text();

            array.push({
                Fila: fila,
                Arete: arete,
                Sexo: sexo,
                Peso: peso,
                Comentarios: comentarios,
                Folio: folio,
                Factura: factura,
                Reemo: reemo,
                Productor: productor,
            });

        });
        array.shift();

        var form = $("#embarque").serializeArray();
        var formData = [];
        var arr = {};

        $.each(form, function(i, field){
            var name = field.name;
            var val = field.value;
            arr[name] = val;
        });
        formData.push(arr);

        /* jQuery.each( fields, function( i, field ) {
            $( "#results" ).append( field.value + " " );
        }); */

        $.ajax({
            type: "POST",
            dataType: 'json',
            url: 'animales',
            data: {
                "_token": "{{ csrf_token() }}",
                input: array,
                form: formData,
                embarque: $('#embarque_id').val(),
            },
            success: function(data)
            {
                console.log(data);
                console.log(data.observaciones);
                console.log(data.embarque);
                $('body').removeClass('loading');

                embarqueID = data.embarque;
                $('#embarque_id').val(embarqueID);

                var render = '';

                data.observaciones.forEach(element => {
                    console.log(element);
                    console.log(element.fila);
                    render +=
                        `<tr>
                            <td hidden>` + element.id + `</td>
                            <td>` + element.fila + `</td>
                            <td>` + element.arete + `</td>
                            <td>` + element.tipo_animal.nombre + `</td>
                            <td>` + element.persona.nombre + `</td>
                            <td>` + element.comentarios + `</td>
                            <td>` + element.created_at + `</td>
                        </tr>`;
                });

                console.log(render);

                $('#show_frame').show();
                $('#observations_table tbody').html("");
                $('#observations_table tbody').append(render);

                swal({
                    title: "",
                    text: "Embarque generado exitosamente!",
                    icon: "success",
                    type: "success",
                }).then(() => {
                    //location.reload();
                });
            },
            error: function() {
                $('body').removeClass('loading');
                swal({
                    title: "",
                    text: "Oops, algo salió mal, intente más tarde!",
                    icon: "error",
                    type: "error",
                }).then(() => {
                    //location.reload();
                });
            }
        });

    }

    function print() {
        var objFra = document.getElementById('myFrame');
        objFra.contentWindow.focus();
        objFra.contentWindow.print();
    }

    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i ;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("aretes_table");
        tr = table.getElementsByTagName("tr"),
        th = table.getElementsByTagName("th");

        // Loop through all table rows, and hide those who don't match the        search query
        for (i = 1; i < tr.length; i++) {
                    tr[i].style.display = "none";
                    for(var j=0; j<th.length; j++){
                td = tr[i].getElementsByTagName("td")[j];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1)                               {
                        tr[i].style.display = "";
                        break;
                    }
                }
            }
        }
    }

    $('#new').on('click', function(){
        $('body').addClass('loading');
        location.reload();
    });


    $('#delete_info').on('click', function(){
        //console.log(masterID)
        /* $.ajax({
            type: "POST",
            dataType: 'json',
            url: 'deletemasterajax',
            data: {
                "_token": "{{ csrf_token() }}",
                id: masterID,
            },
            success: function(data)
            {
                swal({
                    title: "",
                    text: "Información eliminada exitosamente!",
                    icon: "success",
                    type: "success",
                }).then(() => {
                    location.reload();
                });
            },
            error: function(){
                swal({
                    title: "",
                    text: "Oops, algo salió mal!",
                    icon: "error",
                    type: "error",
                }).then(() => {
                    //location.reload();
                });
            }
        }); */
    });
</script>

@endsection
