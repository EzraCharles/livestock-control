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
                                <button id="delete_info" type="button" class="btn btn-danger" style="float: right; margin-left: 5px;">Borrar</button>
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
                                {{-- <div id="pdf_frame"></div> --}}
                                <div class="row">
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
        /* var table = $('#apd_table').DataTable({
            "paging": false,
            "autoWidth": true,
        }); */
        var count = 0;

        $(".select-objects").on('change', function() {
            if ($(this).val() == 'otro') {
                var tipo_id = 0;

                if (this.id == 'proveedor') {
                    tipo_id = 2;
                }
                else if (this.id == 'productor') {
                    tipo_id = 3;
                }

                var html = `
                <div class="col-4 form-group nueva-persona-` + this.id + `">
                    <label for="nombre">Nombre de nuevo ` + this.id + `: </label>
                    <input class="form-control" type="text" name="tipo_persona_id" id="tipo_persona_id" value="` + tipo_id + `" hidden>
                    <input class="form-control" type="text" name="nombre[]" id="nombre">
                </div>
                `;
                $(this).parent().after(html);
            }
            else{
                //console.log($(this).parent().parent().find('.nueva-persona'));
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
                return true;
            }

            if (!isNaN(arete)) {
                count++;
                var markup =
                `<tr>
                    <td>` + count + `</td>
                    <td><input type='checkbox' name='record'></td>
                    <td class="attrArete">` + $('#arete').val() + `</td>
                    <td class="attrSexo">` + $('#sexo').val() + `</td>
                    <td class="attrPeso">` + $('#peso').val() + `</td>
                    <td class="attrComentarios">` + $('#comentarios').val() + `</td>
                    <td class="attrFolio">` + $('#folio_factura').val() + `</td>
                    <td class="attrFactura">` + $('#factura_fiscal').val() + `</td>
                    <td class="attrREEMO">` + $('#reemo').val() + `</td>
                    <td class="attrProductor">` + $('#productor').val() + `</td>
                </tr>`;

                $("table tbody").append(markup);
                /* table.row.add(
                    [
                        count, 'd', data[0].serial, data[0].mlfbbackflush, package, data[0].quantity, code
                    ]
                ).draw(); */

                //$("#palet").trigger('reset');
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
            if($(this).val() == 'stop' || $(this).val() == 'STOP'){
                pdf();
            }
        });


    });


    var masterID = 0;

    function pdf(){

        var array = [];

        $('.attrTable tr').each(function (a, b) {
            var serie = $('.attrSerie', b).text();
            var mlfb = $('.attrMLFB', b).text();
            var quantity = $('.attrQuantity', b).text();
            var package = $('.attrPackage', b).text();
            var code = $('.attrCode', b).text();

            array.push({
                Serie: serie,
                MLFB: mlfb,
                Quantity: quantity,
                Package: package,
                Code: code,
            });

        });
        array.shift();

        $.ajax({
            type: "POST",
            dataType: 'json',
            url: 'generatePDF',
            data: {
                "_token": "{{ csrf_token() }}",
                input: array,
                storagefloor: $('#storagefloor').val(),
                flag: masterID,
            },
            success: function(data)
            {
                masterID = data.id;
                //location.reload();

                // window.open('../'.concat(String(data).substring(1, data.length-1)), '_blank');
                var render =
                `<div id='remove_div'>
                    <iframe
                        src="` + String(data.url) + `" id="myFrame"
                        frameborder="0" style="border:0;"
                        width="100%" height="500" >
                    </iframe>
                    <input class='btn btn-warning' type="button" id="bt" onclick="print()" value="Imprimir PDF" />
                    <input class='btn btn-danger' type="button" id="cancel"
                        onclick="
                            $('#remove_div').remove();
                            $('#serie').val('');
                            $('#serie').focus();"
                    value="Cancelar PDF" />
                </div>`;

                $('#pdf_frame').html(render);

                //$('#bt').click();

                swal({
                    title: "",
                    text: "Master generada exitosamente!",
                    icon: "success",
                    type: "success",
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
        $.ajax({
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
        });
    });
</script>

@endsection
