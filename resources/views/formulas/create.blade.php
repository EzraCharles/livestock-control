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
                            <h3> <strong> Crear Fórmula </strong></h3>
                            <div class="col-md-12" style="padding-top: 15px; ">
                                <button class="btn grupo-res" style="text-align: left; float: right; margin-top: -50px;" onclick="window.location = 'formulas'">Regresar</button>
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

                        <div class="content" id="new_req" style="display: none">
                            <div class="row" style="border-radius: 10px;">
                                <div class="form-group col-4">
                                    <label for="precio_id">Concepto:</label>
                                    <select class="form-control precio" id="precio_id" name="precio_id[]">
                                        {{-- <option disabled selected="selected">Eligir una opción...</option>
                                        @foreach ($precios as $precio)
                                            <option value="{{ $precio->id }}"> {{ $precio->concepto }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="porcentaje">Porcentaje:</label>
                                    <input type="number" min="0" step="0.01" max="100" class="form-control porcentaje" id="porcentaje" name="porcentaje[]" required disabled>
                                </div>
                                <div class="form-group col-4">
                                    <label for="kilogramos">Kilogramos:</label>
                                    <input type="number" min="0.01" step="0.01" class="form-control kilogramos" id="kilogramos" name="kilogramos[]" required disabled>
                                </div>
                            </div>
                            <button id="add_request" type="button" class="btn btn-info" style="float:right; margin: 5px;"><i class="fa fa-plus" aria-hidden="true"></i></button>
                            <button id="remove" type="button" class="btn btn-danger" style="float:right; margin: 5px;"><i class="fa fa-minus" aria-hidden="true"></i></button>
                            <br/><br/><hr>
                        </div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="content">
                                <form  id="form_project" class="" action="{{ route('formulas.store') }}" method="post" style="padding:5px;">
                                    @method('POST')
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="nombre">Nombre:</label>
                                                <input type="text" class="form-control" name="nombre" id="nombre" minlength="2" maxlength="255" required>
                                            </div>
                                        </div>
                                        {{-- <div class="col-3">
                                            <div class="form-group ">
                                                <label for="proteina">Proteina:</label><br/>
                                                <input type="number" min="0.01" step="0.01" class="form-control" name="proteina" id="proteina" required>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group ">
                                                <label for="grasa">Grasa:</label><br/>
                                                <input type="number" min="0.01" step="0.01" class="form-control" name="grasa" id="grasa" required>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group ">
                                                <label for="ceniza">Ceniza:</label><br/>
                                                <input type="number" min="0.01" step="0.01" class="form-control" name="ceniza" id="ceniza" required>
                                            </div>
                                        </div> --}}
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="comentarios">Comentarios:</label>
                                                <textarea rows="3" class="form-control" name="comentarios" id="comentarios" minlength="2" maxlength="255"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button id="add_request" type="button" class="btn btn-info" style="float:right;"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    <br/>
                                    <br/>
                                    <div id="multiple-req-adds">
                                        <div class="row">

                                        </div>
                                    <br/>
                                    </div>
                                    <button style="float: right" class="btn grupo-res">Crear</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<div class="modal loadingmodal"></div>

<script>
    $(document).ready(function() {

        $(document).on("click", "#add_request", function(){

            if ($('#nombre').val().length != 0) { //&& $('#proteina').val().length != 0 && $('#grasa').val().length != 0 && $('#ceniza').val().length != 0
                var newobject = $("#new_req").clone(true).appendTo($("#multiple-req-adds"));
                newobject.show();

                $('body').addClass('loading');
                var precio = newobject.find('#precio_id');

                $.ajax({
                    url: "getPrecios",
                    method: "GET",
                    dataSrc: "",
                    dataType: "json",
                    success: function(response) {

                        optionString = "<option value=''>Selecciona una opción...</option>";
                        $.each(response, function(k,v){
                            optionString += "<option id='" + v.id + "' value='" + v.id + "'>" + v.concepto + "</option>";
                        });

                        precio.html(optionString);
                        precio.prop("disabled", false);

                        precio.chosen({
                            no_results_text: 'Oops, no se encontró elemento: ',
                            placeholder_text: ' ',
                            search_contains: true,
                            width: '100%'
                        });

                        precio.chosen().trigger('chosen:updated');
                        $('body').removeClass('loading');

                    },
                    error: function(response) {
                        //alert("Error al contactar a la base de datos, por favor intenta mas tarde");
                        $.ajax(this);
                    }
                });

            }
            else{
                swal({
                    title: "",
                    text: "Se debe llenar la información previa antes de continuar!",
                    icon: "error",
                    button: 'Ok',
                }).then(() => {
                    //
                });
            }
        });

        $(document).on("click", "#remove", function(){
            $(this).parent().remove();
        });

        $('.precio').on('change', function() {
            $(this).parent().parent().find('#porcentaje').prop("disabled", false);
            $(this).parent().parent().find('#kilogramos').prop("disabled", false);
        });

        $('#form_project').submit(function(e) {
            $('.validation-error').removeClass('validation-error');

            e.preventDefault(); //this will prevent the default submit

            var precio_id = [];
            $('[id=precio_id]').each(function () {
                precio_id.push($(this).val());
            });

            precio_id = precio_id.filter(function (el) {
                return el != null && el != "";
            });

            if (precio_id.length == 0) {
                $('body').removeClass('loading');
                swal({
                    title: "",
                    text: "No se ha añadido ningún concepto a la Fórmula!",
                    icon: "error",
                    buttons: 'Ok',
                });
                return false;
            }

            let findDuplicates = precio_id => precio_id.filter((item, index) => precio_id.indexOf(item) != index);
            var duplicates = findDuplicates(precio_id); // All duplicates

            if (duplicates.length != 0) {
                $('body').removeClass('loading');

                var elements = [...new Set(findDuplicates(precio_id))]; // Unique duplicates
                $.each(elements, function(k,v){
                    elements[k] = $('#' + v).text();
                });

                swal({
                    title: "",
                    text: "Los siguientes elementos están repetidos: <<" + elements.join(" || ") + ">>",
                    icon: "error",
                    buttons: 'Ok',
                });
            }
            else{
                var porcentaje = [];
                $('[id=porcentaje]').each(function () {
                    porcentaje.push($(this).val());
                });

                porcentaje = porcentaje.filter(function (el) {
                    return el != null && el != "";
                });

                var total = porcentaje.reduce((a, b) => parseFloat(a) + parseFloat(b), 0);
                if(total != 100){
                    $('body').removeClass('loading');

                    swal({
                        title: "",
                        text: "La relación de porcentaje está incorrecta! Suma: " + total,
                        icon: "error",
                        buttons: 'Ok',
                    });
                    return false;
                }
                else{
                    var kilogramos = [];
                    $('[id=kilogramos]').each(function () {
                        kilogramos.push($(this).val());
                    });

                    kilogramos = kilogramos.filter(function (el) {
                        return el != null && el != "";
                    });

                    var tmpTot = [];
                    var tmpTot2 = [];
                    var tmpTot3 = [];
                    for (let index = 0; index < kilogramos.length; index++) {
                        tmpTot.push({id: precio_id[index], total: kilogramos[index] * 100 / porcentaje[index]});
                        tmpTot2[index] = kilogramos[index] * 100 / porcentaje[index];
                    }

                    var repeated = [];
                    var different = [];

                    for (var i in tmpTot) {
                        if (different.includes(tmpTot[i]['total'])) {
                            repeated.push(tmpTot[i]['total']);
                        }
                        else{
                            different.push(tmpTot[i]['total']);
                        }
                    }

                    if(different.length != 1){

                        function mode(arr){
                            return arr.sort((a,b) =>
                                arr.filter(v => v===a).length
                                - arr.filter(v => v===b).length
                            ).pop();
                        }

                        function getAllIndexes(arr, val) {
                            var indexes = [], i;
                            for(i = 0; i < arr.length; i++)
                                if (arr[i] === val)
                                    indexes.push(i);
                            return indexes;
                        }

                        var tmp = new Array;
                        tmp = tmpTot2.slice(0);

                        var result = mode(tmp);
                        var result2 = getAllIndexes(tmpTot2, result);

                        for (var i = result2.length -1; i >= 0; i--)
                            tmpTot.splice(result2[i],1);

                        var id = [];

                        $.each(tmpTot, function(k,v){
                            id[k] = $('#' + v.id).text();
                            $('[id=' + v.id + ']').each(function () {
                                if($(this).is(':selected')){
                                    $(this).parent().parent().parent().addClass('validation-error');
                                }
                            });
                        });

                        $('body').removeClass('loading');
                        swal({
                            title: "",
                            text: "Error de proporcionalidad en: <<" + id.join(" || ") + ">>",
                            icon: "error",
                            buttons: 'Ok',
                        });
                    }
                    else{
                        $(this).unbind('submit').submit(); // continue the submit unbind preventDefault
                    }
                }

            }

        });

    });

</script>
@endsection
