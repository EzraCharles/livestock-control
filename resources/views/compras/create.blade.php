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
                                <form id="palet" action="backflush" method="post" enctype="multipart/form-data">
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
                                                <label for="factura_fisacal">Factura Fiscal: </label>
                                                <input class="form-control" type="text" name="factura_fisacal" value="" id="factura_fisacal">
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
                                                <div class="col-3 form-group"></div>
                                                <div class="col-6 form-group">
                                                    <label for="arete"># Arete: </label>
                                                    <input class="form-control" type="text" name="arete" id="arete" required>
                                                </div>
                                                <div class="col-3 form-group"></div>
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
                                        <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar..." align='right'>
                                    </div>
                                </div>
                                <table width="100%" id="apd_table" align="center" class="attrTable table table-striped table-hover table-condensed" >
                                    <thead>
                                        <tr>
                                            <th><strong>No.</strong></th>
                                            <th><strong>Borrar</strong></th>
                                            <th><strong>No. Serie</strong></th>
                                            <th><strong>MLFB</strong></th>
                                            <th><strong>Tipo de empaque</strong></th>
                                            <th><strong>Cantidad</strong></th>
                                            <th><strong>Código</strong></th>
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

                console.log('fsdsf');
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

        $("#palet").submit(function(e){
            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');

            var serie = String($("#serie").val());
            var package = String($("#package").val().toUpperCase());

            if(package != "CARTON" && package != "RETORNABLE" && package != "carton" && package != "retornable"){
                $('#package').val('');
                $('#package').focus();
                return true;
            }


            if (serie == 'stop' || package == 'stop' || serie == 'STOP' || package == 'STOP') {
                return true;
            }

            $.ajax({
                type: "POST",
                dataType: 'json',
                url: url,
                data: {
                    "_token": "{{ csrf_token() }}",
                    input: serie,
                },

                success: function(data)
                {
                    //console.log(data)
                    if (data != '0') {
                        var code = data[0].serial + '\t' + data[0].mlfbbackflush + '\t' + data[0].quantity  + '\t' + package;
                        //console.log(code)
                        count++;
                        var markup =
                        `<tr>
                            <td>` + count + `</td>
                            <td><input type='checkbox' name='record'></td>
                            <td class="attrSerie">` + data[0].serial + `</td>
                            <td class="attrMLFB">` + data[0].mlfbbackflush + `</td>
                            <td class="attrPackage">` + package + `</td>
                            <td class="attrQuantity">` + data[0].quantity + `</td>
                            <td class="attrCode">` + code + `</td>
                        </tr>`;

                        $("table tbody").append(markup);
                        /* table.row.add(
                            [
                                count, 'd', data[0].serial, data[0].mlfbbackflush, package, data[0].quantity, code
                            ]
                        ).draw(); */

                        //$("#palet").trigger('reset');
                        $('#serie').val('');
                        $('#serie').focus();
                    }
                    else{
                        //PlaySound("sound1");
                        var snd = new Audio("data:audio/mp3;base64,SUQzBAAAAAABAFRYWFgAAAASAAADbWFqb3JfYnJhbmQAbXA0MgBUWFhYAAAAEQAAA21pbm9yX3ZlcnNpb24AMABUWFhYAAAAHAAAA2NvbXBhdGlibGVfYnJhbmRzAGlzb21tcDQyAFRTU0UAAAAPAAADTGF2ZjU3LjE5LjEwMAAAAAAAAAAAAAAA//uwZAAP8AAAaQAAAAgAAA0gAAABAAABpAAAACAAADSAAAAETEFNRTMuOTkuNVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUxBTUUzLjk5LjVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVX/+7JkAA/wAABpAAAACAAADSAAAAEAAAGkAAAAIAAANIAAAARMQU1FMy45OS41VVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUxBTUUzLjk5LjVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVX/+7JkAA/wAABpAAAACAAADSAAAAEAAAGkAAAAIAAANIAAAARMQU1FMy45OS41VVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUxBTUUzLjk5LjVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVX/+7JkAA/wAABpAAAACAAADSAAAAEAAAGkAAAAIAAANIAAAARMQU1FMy45OS41VVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUxBTUUzLjk5LjVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVRDUZhLVAKTfE3nVrR4ABjYg4lW8DAGZRscagMRApTSc4MBzEdzKkzjMpwU9DgZjHNppGuIuYZmG5gOIwQQjPUjQQBITdMpTKUzlLfqyHGZxSAjrjLmGAhmQDiPSACGQBgIDkKdgkJnOCht+pWWXMpwM9s68AAYzAToeYvYYgFpEFH1QTlky7a/Fplly7ap2DsgUELqA5cNNYLqFtE6GwsnT3NgnMlKAswlDBt0ZYrYWbRTU3YQWkQAMkgNr6XiABdEIQzR/UzR/aoXbYe36wjXHcib0PIwCDpUziAUx1tL/+7Jkb47wBQCAACAACAAADSAAAAElwZCiTGMNyAAANIAAAARcLDvK7cncByS5a8l6opwCuda8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VVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV//uyZAAP8AAAaQAAAAgAAA0gAAABAAABpAAAACAAADSAAAAETEFNRTMuOTkuNVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVMQU1FMy45OS41VVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV//uyZAAP8AAAaQAAAAgAAA0gAAABAAABpAAAACAAADSAAAAETEFNRTMuOTkuNVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVMQU1FMy45OS41VVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV//uyZAAP8AAAaQAAAAgAAA0gAAABAAABpAAAACAAADSAAAAETEFNRTMuOTkuNVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVMQU1FMy45OS41VVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV//uyZAAP8AAAaQAAAAgAAA0gAAABAAABpAAAACAAADSAAAAETEFNRTMuOTkuNVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVMQU1FMy45OS41VVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV//uyZAAP8AAAaQAAAAgAAA0gAAABAAABpAAAACAAADSAAAAETEFNRTMuOTkuNVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVMQU1FMy45OS41VVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV//uyZAAP8AAAaQAAAAgAAA0gAAABAAABpAAAACAAADSAAAAETEFNRTMuOTkuNVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVMQU1FMy45OS41VVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV//uyZAAP8AAAaQAAAAgAAA0gAAABAAABpAAAACAAADSAAAAETEFNRTMuOTkuNVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVMQU1FMy45OS41VVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV//uwZAAP8AAAaQAAAAgAAA0gAAABAAABpAAAACAAADSAAAAETEFNRTMuOTkuNVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUxBTUUzLjk5LjVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVX/+7JkAA/wAABpAAAACAAADSAAAAEAAAGkAAAAIAAANIAAAARMQU1FMy45OS41VVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUxBTUUzLjk5LjVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVU=");
                        snd.play();
                        swal({
                            title: "",
                            text: "El número de serie es incorrecto o no existe!",
                            icon: "error",
                            type: "error",
                            buttons: false,
                            allowOutsideClick: false
                        }).then(() => {
                            $('#serie').val('');
                            //$('#package').val('');
                            $('#serie').focus();
                        });
                    }
                }
            });

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
        table = document.getElementById("apd_table");
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
