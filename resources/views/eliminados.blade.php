@extends('partials.master')

@section('content')
<main class="main">
    <!-- Breadcrumb-->
    <div class="container-fluid" style="padding-top: 100px;">
        <div class="animated fadeIn">
            <div class="row justify-content-center" style="margin-top: 24px;">
                <div class="col-md-12">

                    <h2 style="text-align: center;"> <strong> Elementos eliminados </strong></h2>
                    <br/>

                    @if($errors->any())
                        <div class="card">
                            <div class="card-header">
                                <h4 style="text-align: center;"> <strong> Errores </strong></h4>
                            </div>

                            <br/>
                            <div class="alert alert-danger alert-block" style="margin-left: 30px; margin-right: 30px;">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>

                            @if (session('status'))
                                <div class="card-body">
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif


                    <div class="card">
                        <div class="card-header">
                            <h4><strong> Usuarios </strong></h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="users" class="display table table-striped table-hover table-condensed" style="text-align: center; vertical-align: middle; margin-bottom: 0px;">
                                    <thead>
                                        <tr>
                                            <th><strong>ID</strong></th>
                                            <th><strong>Nombre</strong></th>
                                            <th><strong>Privilegio</strong></th>
                                            <th><strong>Correo</strong></th>
                                            <th><strong>Creación</strong></th>
                                            <th><strong>Acciones</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usuarios as $usuario)
                                        <tr class="data-row">
                                            <td style="text-align: center; vertical-align: middle; " id="id">{{ $usuario->id }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="name">{{ $usuario->name }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="rol">{{ $usuario->rol }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="email">{{ $usuario->email }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="created_at">{{ date('d-m-Y H:i', strtotime($usuario->created_at)) }}</td>
                                            <td style="text-align: center; vertical-align: middle; ">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success" data-toggle="modal" id="restore-item">
                                                        <i class="fa fa-thumbs-up"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" id="delete-item">
                                                        <i class="fa fa-thumbs-down"></i>
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


                    <div class="card">
                        <div class="card-header">
                            <h4><strong> Precios </strong></h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="precios" class="display table table-striped table-hover table-condensed" style="text-align: center; vertical-align: middle; margin-bottom: 0px;">
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
                                            <th hidden><strong>Alimento</strong></th>
                                            <th hidden><strong>Materia Seca</strong></th>
                                            <th hidden><strong>Porción Comestible</strong></th>
                                            <th hidden><strong>Grasa</strong></th>
                                            <th hidden><strong>Fibra</strong></th>
                                            <th hidden><strong>Ceniza</strong></th>
                                            <th><strong>Datos</strong></th>
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
                                            <td style="text-align: center; vertical-align: middle; " id="created_at">{{ date('d-m-Y H:i', strtotime($precio->created_at)) }}</td>
                                            <td hidden style="text-align: center; vertical-align: middle; " id="rango">{{ $precio->rango }}</td>
                                            <td hidden style="text-align: center; vertical-align: middle; " id="rango_bajo">{{ $precio->rango_bajo }}</td>
                                            <td hidden style="text-align: center; vertical-align: middle; " id="rango_alto">{{ $precio->rango_alto }}</td>
                                            <td hidden style="text-align: center; vertical-align: middle; " id="alimento">{{ $precio->alimento }}</td>
                                            <td hidden style="text-align: center; vertical-align: middle; " id="materia_seca">{{ $precio->materia_seca }}</td>
                                            <td hidden style="text-align: center; vertical-align: middle; " id="porcion_comestible">{{ $precio->porcion_comestible }}</td>
                                            <td hidden style="text-align: center; vertical-align: middle; " id="grasa">{{ $precio->grasa }}</td>
                                            <td hidden style="text-align: center; vertical-align: middle; " id="fibra">{{ $precio->fibra }}</td>
                                            <td hidden style="text-align: center; vertical-align: middle; " id="ceniza">{{ $precio->ceniza }}</td>
                                            <td style="text-align: center; vertical-align: middle; ">
                                                <div class="btn-group">
                                                    @if ($precio->rango == 1 || $precio->alimento == 1)
                                                        <button type="button" class="btn {{ $precio->rango == 1 ? 'btn-warning' : 'btn-success' }}" data-toggle="modal" id="item">
                                                            <i
                                                                class="extraInfo fas {{ $precio->rango == 1 ? 'fa-code' : 'fa-utensils' }}"
                                                                data-content="
                                                                    {{ $precio->rango == 1 ? $precio->rango_bajo . ' - ' . $precio->rango_alto : '' }}
                                                                    {{ $precio->materia_seca != null ? "<strong> Materia Seca: </strong>"  . $precio->materia_seca . " <br/>" : '' }}
                                                                    {{ $precio->porcion_comestible != null ? "<strong> Porción comestible: </strong>"  . $precio->porcion_comestible . " <br/>" : '' }}
                                                                    {{ $precio->grasa != null ? "<strong> Grasa: </strong>"  . $precio->grasa . " <br/>" : '' }}
                                                                    {{ $precio->fibra != null ? "<strong> Fibra: </strong>"  . $precio->fibra . " <br/>" : '' }}
                                                                    {{ $precio->ceniza != null ? "<strong> Ceniza: </strong>"  . $precio->ceniza : '' }}
                                                                "
                                                                rel="popover" data-placement="bottom"
                                                                data-original-title="{{ $precio->rango == 0 ? 'Datos Alimenticios' : 'Rangos de peso' }}"
                                                                data-trigger="hover"
                                                                data-html="true" >
                                                            </i>
                                                        </button>
                                                    @else
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" id="item">
                                                            <i class="extraInfo fas fa-times" rel="popover"
                                                                data-placement="bottom" data-original-title="Sin Datos" data-trigger="hover">
                                                            </i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </td>
                                            <td style="text-align: center; vertical-align: middle; ">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success" data-toggle="modal" id="restore-item">
                                                        <i class="fa fa-thumbs-up"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" id="delete-item">
                                                        <i class="fa fa-thumbs-down"></i>
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


                    <div class="card">
                        <div class="card-header">
                            <h4><strong> Animales </strong></h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="animales" class="display table table-striped table-hover table-condensed" style="text-align: center; vertical-align: middle; margin-bottom: 0px;">
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
                                            <td style="text-align: center; vertical-align: middle; " id="created_at">{{ date('d-m-Y H:i', strtotime($animal->created_at)) }}</td>
                                            <td style="text-align: center; vertical-align: middle; ">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success" data-toggle="modal" id="restore-item">
                                                        <i class="fa fa-thumbs-up"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" id="delete-item">
                                                        <i class="fa fa-thumbs-down"></i>
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


                    <div class="card">
                        <div class="card-header">
                            <h4><strong> Personas </strong></h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="personas" class="display table table-striped table-hover table-condensed" style="text-align: center; vertical-align: middle; margin-bottom: 0px;">
                                    <thead>
                                        <tr>
                                            <th><strong>ID</strong></th>
                                            <th><strong>Nombre</strong></th>
                                            <th><strong>Tipo</strong></th>
                                            <th><strong>Correo</strong></th>
                                            <th><strong>Comentarios</strong></th>
                                            <th><strong>Creación</strong></th>
                                            <th><strong>Acciones</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($personas as $persona)
                                        <tr class="data-row">
                                            <td style="text-align: center; vertical-align: middle; " id="id">{{ $persona->id }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="nombre">{{ $persona->nombre }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="tipo">{{ $persona->tipoPersona->nombre }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="email">{{ $persona->email }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="comentarios">{{ $persona->comentarios }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="created_at">{{ date('d-m-Y H:i', strtotime($persona->created_at)) }}</td>
                                            <td style="text-align: center; vertical-align: middle; ">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success" data-toggle="modal" id="restore-item">
                                                        <i class="fa fa-thumbs-up"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" id="delete-item">
                                                        <i class="fa fa-thumbs-down"></i>
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


                    <div class="card">
                        <div class="card-header">
                            <h4><strong> Diagnósticos </strong></h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="diagnosticos" class="display table table-striped table-hover table-condensed" style="text-align: center; vertical-align: middle; margin-bottom: 0px;">
                                    <thead>
                                        <tr>
                                            <th><strong>ID</strong></th>
                                            <th><strong>Nombre</strong></th>
                                            <th><strong>Comentarios</strong></th>
                                            <th><strong>Creación</strong></th>
                                            <th><strong>Acciones</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($diagnosticos as $diagnostico)
                                        <tr class="data-row">
                                            <td style="text-align: center; vertical-align: middle; " id="id">{{ $diagnostico->id }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="nombre">{{ $diagnostico->nombre }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="comentarios">{{ $diagnostico->comentarios }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="created_at">{{ date('d-m-Y H:i', strtotime($diagnostico->created_at)) }}</td>
                                            <td style="text-align: center; vertical-align: middle; ">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success" data-toggle="modal" id="restore-item">
                                                        <i class="fa fa-thumbs-up"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" id="delete-item">
                                                        <i class="fa fa-thumbs-down"></i>
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


                    <div class="card">
                        <div class="card-header">
                            <h4><strong> Tratamientos </strong></h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tratamientos" class="display table table-striped table-hover table-condensed" style="text-align: center; vertical-align: middle; margin-bottom: 0px;">
                                    <thead>
                                        <tr>
                                            <th><strong>ID</strong></th>
                                            <th><strong>Nombre</strong></th>
                                            <th><strong>Precio</strong></th>
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
                                            <td style="text-align: center; vertical-align: middle; " id="precio_importe">${{ number_format($tratamiento->precio->precio) }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="precio">{{ $tratamiento->precio->concepto }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="tipo">{{ $tratamiento->tipoTratamiento->nombre }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="comentarios">{{ $tratamiento->comentarios }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="created_at">{{ date('d-m-Y H:i', strtotime($tratamiento->created_at)) }}</td>
                                            <td style="text-align: center; vertical-align: middle; ">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success" data-toggle="modal" id="restore-item">
                                                        <i class="fa fa-thumbs-up"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" id="delete-item">
                                                        <i class="fa fa-thumbs-down"></i>
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


                    <div class="card">
                        <div class="card-header">
                            <h4><strong> Corrales </strong></h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="corrales" class="display table table-striped table-hover table-condensed" style="text-align: center; vertical-align: middle; margin-bottom: 0px;">
                                    <thead>
                                        <tr>
                                            <th><strong>ID</strong></th>
                                            <th><strong>Nombre</strong></th>
                                            <th><strong>Comentarios</strong></th>
                                            <th><strong>Creación</strong></th>
                                            <th><strong>Acciones</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($corrales as $corral)
                                        <tr class="data-row">
                                            <td style="text-align: center; vertical-align: middle; " id="id">{{ $corral->id }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="nombre">{{ $corral->nombre }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="comentarios">{{ $corral->comentarios }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="created_at">{{ date('d-m-Y H:i', strtotime($corral->created_at)) }}</td>
                                            <td style="text-align: center; vertical-align: middle; ">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success" data-toggle="modal" id="restore-item">
                                                        <i class="fa fa-thumbs-up"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" id="delete-item">
                                                        <i class="fa fa-thumbs-down"></i>
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


                    <div class="card">
                        <div class="card-header">
                            <h4><strong> Fórmulas </strong></h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="formulas" class="display table table-striped table-hover table-condensed" style="text-align: center; vertical-align: middle; margin-bottom: 0px;">
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
                                                        <button type="button" class="btn btn-warning" data-toggle="modal" id="update-item">
                                                            <i class="fa fa-wrench"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-success" data-toggle="modal" id="restore-item">
                                                            <i class="fa fa-thumbs-up"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" id="delete-item">
                                                            <i class="fa fa-thumbs-down"></i>
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


                    <div class="card">
                        <div class="card-header">
                            <h4><strong> Tipos de Tratamiento </strong></h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tipos-tratamiento" class="display table table-striped table-hover table-condensed" style="text-align: center; vertical-align: middle; margin-bottom: 0px;">
                                    <thead>
                                        <tr>
                                            <th><strong>ID</strong></th>
                                            <th><strong>Nombre</strong></th>
                                            <th><strong>Comentarios</strong></th>
                                            <th><strong>Creación</strong></th>
                                            <th><strong>Acciones</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tipo_tratamientos as $tipo_tratamiento)
                                        <tr class="data-row">
                                            <td style="text-align: center; vertical-align: middle; " id="id">{{ $tipo_tratamiento->id }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="nombre">{{ $tipo_tratamiento->nombre }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="comentarios">{{ $tipo_tratamiento->comentarios }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="created_at">{{ date('d-m-Y H:i', strtotime($tipo_tratamiento->created_at)) }}</td>
                                            <td style="text-align: center; vertical-align: middle; ">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success" data-toggle="modal" id="restore-item">
                                                        <i class="fa fa-thumbs-up"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" id="delete-item">
                                                        <i class="fa fa-thumbs-down"></i>
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


                    <div class="card">
                        <div class="card-header">
                            <h4><strong> Tipos de Reproducción </strong></h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tipos-reproduccion" class="display table table-striped table-hover table-condensed" style="text-align: center; vertical-align: middle; margin-bottom: 0px;">
                                    <thead>
                                        <tr>
                                            <th><strong>ID</strong></th>
                                            <th><strong>Nombre</strong></th>
                                            <th><strong>Comentarios</strong></th>
                                            <th><strong>Creación</strong></th>
                                            <th><strong>Acciones</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tipo_reproducciones as $tipo_reproduccion)
                                        <tr class="data-row">
                                            <td style="text-align: center; vertical-align: middle; " id="id">{{ $tipo_reproduccion->id }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="nombre">{{ $tipo_reproduccion->nombre }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="comentarios">{{ $tipo_reproduccion->comentarios }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="created_at">{{ date('d-m-Y H:i', strtotime($tipo_reproduccion->created_at)) }}</td>
                                            <td style="text-align: center; vertical-align: middle; ">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success" data-toggle="modal" id="restore-item">
                                                        <i class="fa fa-thumbs-up"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" id="delete-item">
                                                        <i class="fa fa-thumbs-down"></i>
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


                    <div class="card">
                        <div class="card-header">
                            <h4><strong> Tipos de Animal </strong></h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tipos-animal" class="display table table-striped table-hover table-condensed" style="text-align: center; vertical-align: middle; margin-bottom: 0px;">
                                    <thead>
                                        <tr>
                                            <th><strong>ID</strong></th>
                                            <th><strong>Nombre</strong></th>
                                            <th><strong>Comentarios</strong></th>
                                            <th><strong>Creación</strong></th>
                                            <th><strong>Acciones</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tipo_animales as $tipo_animal)
                                        <tr class="data-row">
                                            <td style="text-align: center; vertical-align: middle; " id="id">{{ $tipo_animal->id }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="nombre">{{ $tipo_animal->nombre }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="comentarios">{{ $tipo_animal->comentarios }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="created_at">{{ date('d-m-Y H:i', strtotime($tipo_animal->created_at)) }}</td>
                                            <td style="text-align: center; vertical-align: middle; ">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success" data-toggle="modal" id="restore-item">
                                                        <i class="fa fa-thumbs-up"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" id="delete-item">
                                                        <i class="fa fa-thumbs-down"></i>
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


                    <div class="card">
                        <div class="card-header">
                            <h4><strong> Tipos de Persona </strong></h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tipos-persona" class="display table table-striped table-hover table-condensed" style="text-align: center; vertical-align: middle; margin-bottom: 0px;">
                                    <thead>
                                        <tr>
                                            <th><strong>ID</strong></th>
                                            <th><strong>Nombre</strong></th>
                                            <th><strong>Comentarios</strong></th>
                                            <th><strong>Creación</strong></th>
                                            <th><strong>Acciones</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tipo_personas as $tipo_persona)
                                        <tr class="data-row">
                                            <td style="text-align: center; vertical-align: middle; " id="id">{{ $tipo_persona->id }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="nombre">{{ $tipo_persona->nombre }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="comentarios">{{ $tipo_persona->comentarios }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="created_at">{{ date('d-m-Y H:i', strtotime($tipo_persona->created_at)) }}</td>
                                            <td style="text-align: center; vertical-align: middle; ">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success" data-toggle="modal" id="restore-item">
                                                        <i class="fa fa-thumbs-up"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" id="delete-item">
                                                        <i class="fa fa-thumbs-down"></i>
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


                    <div class="card">
                        <div class="card-header">
                            <h4><strong> Tipos de Alimentación </strong></h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tipos-alimentacion" class="display table table-striped table-hover table-condensed" style="text-align: center; vertical-align: middle; margin-bottom: 0px;">
                                    <thead>
                                        <tr>
                                            <th><strong>ID</strong></th>
                                            <th><strong>Nombre</strong></th>
                                            <th><strong>Fórmula</strong></th>
                                            <th><strong>Comentarios</strong></th>
                                            <th><strong>Creación</strong></th>
                                            <th><strong>Acciones</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tipo_alimentaciones as $tipo_alimentacion)
                                        <tr class="data-row">
                                            <td style="text-align: center; vertical-align: middle; " id="id">{{ $tipo_alimentacion->id }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="nombre">{{ $tipo_alimentacion->nombre }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="formula">{{ $tipo_alimentacion->formula->nombre }}
                                                <td style="text-align: center; vertical-align: middle; " id="comentarios">{{ $tipo_alimentacion->comentarios }}</td>
                                            <td style="text-align: center; vertical-align: middle; " id="created_at">{{ date('d-m-Y H:i', strtotime($tipo_alimentacion->created_at)) }}</td>
                                                {{-- <div class="btn-group">
                                                    <button type="button" class="btn btn-info" data-toggle="modal" id="formula-item">
                                                        <i class="fa fa-atom"></i>
                                                    </button>
                                                </div> --}}
                                            </td>
                                            <td style="text-align: center; vertical-align: middle; ">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success" data-toggle="modal" id="restore-item">
                                                        <i class="fa fa-thumbs-up"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" id="delete-item">
                                                        <i class="fa fa-thumbs-down"></i>
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

</main>

<div class="modal loadingmodal"></div>

<script>
    $(document).ready(function() {

        $('#users').DataTable({
            buttons: [
            {
                extend: 'csv',
                charset: 'UTF-8',
                bom: true,
                filename: 'Usuarios-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4 ]
                }
            },
            {
                extend: 'excel',
                charset: 'UTF-8',
                bom: true,
                filename: 'Usuarios-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4 ]
                }
            },
            {
                extend: 'pdf',
                customize: function(doc) {
                    doc.content[1].margin = [ 100, 0, 50, 0 ] //left, top, right, bottom
                },
                charset: 'UTF-8',
                bom: true,
                filename: 'Usuarios-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4 ]
                }
            },
            {
                extend: 'print',
                text: 'Imprimir',
                charset: 'UTF-8',
                bom: true,
                filename: 'Usuarios-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4 ]
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


        $('#precios').DataTable({
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


        $('#animales').DataTable({
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


        $('#personas').DataTable({
            buttons: [
            {
                extend: 'csv',
                charset: 'UTF-8',
                bom: true,
                filename: 'Personas-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5 ]
                }
            },
            {
                extend: 'excel',
                charset: 'UTF-8',
                bom: true,
                filename: 'Personas-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5 ]
                }
            },
            {
                extend: 'pdf',
                customize: function(doc) {
                    doc.content[1].margin = [ 50, 0, 50, 0 ] //left, top, right, bottom
                },
                charset: 'UTF-8',
                bom: true,
                filename: 'Personas-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5 ]
                }
            },
            {
                extend: 'print',
                text: 'Imprimir',
                charset: 'UTF-8',
                bom: true,
                filename: 'Personas-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5 ]
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


        $('#diagnosticos').DataTable({
            buttons: [
            {
                extend: 'csv',
                charset: 'UTF-8',
                bom: true,
                filename: 'Diagnósticos-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3 ]
                }
            },
            {
                extend: 'excel',
                charset: 'UTF-8',
                bom: true,
                filename: 'Diagnósticos-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3 ]
                }
            },
            {
                extend: 'pdf',
                customize: function(doc) {
                    doc.content[1].margin = [ 100, 0, 50, 0 ] //left, top, right, bottom
                },
                charset: 'UTF-8',
                bom: true,
                filename: 'Diagnósticos-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3 ]
                }
            },
            {
                extend: 'print',
                text: 'Imprimir',
                charset: 'UTF-8',
                bom: true,
                filename: 'Diagnósticos-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3 ]
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


        $('#tratamientos').DataTable({
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


        $('#corrales').DataTable({
            buttons: [
            {
                extend: 'csv',
                charset: 'UTF-8',
                bom: true,
                filename: 'Corrales-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3 ]
                }
            },
            {
                extend: 'excel',
                charset: 'UTF-8',
                bom: true,
                filename: 'Corrales-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3 ]
                }
            },
            {
                extend: 'pdf',
                customize: function(doc) {
                    doc.content[1].margin = [ 110, 0, 50, 0 ] //left, top, right, bottom
                },
                charset: 'UTF-8',
                bom: true,
                filename: 'Corrales-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3 ]
                }
            },
            {
                extend: 'print',
                text: 'Imprimir',
                charset: 'UTF-8',
                bom: true,
                filename: 'Corrales-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3 ]
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


        $('#formulas').DataTable({
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


        $('#tipos-tratamiento').DataTable({
            buttons: [
            {
                extend: 'csv',
                charset: 'UTF-8',
                bom: true,
                filename: 'Tipos-de-Tratamientos-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3 ]
                }
            },
            {
                extend: 'excel',
                charset: 'UTF-8',
                bom: true,
                filename: 'Tipos-de-Tratamientos-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3 ]
                }
            },
            {
                extend: 'pdf',
                customize: function(doc) {
                    doc.content[1].margin = [ 110, 0, 50, 0 ] //left, top, right, bottom
                },
                charset: 'UTF-8',
                bom: true,
                filename: 'Tipos-de-Tratamientos-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3 ]
                }
            },
            {
                extend: 'print',
                text: 'Imprimir',
                charset: 'UTF-8',
                bom: true,
                filename: 'Tipos-de-Tratamientos-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3 ]
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


        $('#tipos-reproduccion').DataTable({
            buttons: [
            {
                extend: 'csv',
                charset: 'UTF-8',
                bom: true,
                filename: 'Tipos-de-Reproduccion-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3 ]
                }
            },
            {
                extend: 'excel',
                charset: 'UTF-8',
                bom: true,
                filename: 'Tipos-de-Reproduccion-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3 ]
                }
            },
            {
                extend: 'pdf',
                customize: function(doc) {
                    doc.content[1].margin = [ 110, 0, 50, 0 ] //left, top, right, bottom
                },
                charset: 'UTF-8',
                bom: true,
                filename: 'Tipos-de-Reproduccion-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3 ]
                }
            },
            {
                extend: 'print',
                text: 'Imprimir',
                charset: 'UTF-8',
                bom: true,
                filename: 'Tipos-de-Reproduccion-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3 ]
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


        $('#tipos-animal').DataTable({
            buttons: [
            {
                extend: 'csv',
                charset: 'UTF-8',
                bom: true,
                filename: 'Tipos-de-Animales-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3 ]
                }
            },
            {
                extend: 'excel',
                charset: 'UTF-8',
                bom: true,
                filename: 'Tipos-de-Animales-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3 ]
                }
            },
            {
                extend: 'pdf',
                customize: function(doc) {
                    doc.content[1].margin = [ 110, 0, 50, 0 ] //left, top, right, bottom
                },
                charset: 'UTF-8',
                bom: true,
                filename: 'Tipos-de-Animales-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3 ]
                }
            },
            {
                extend: 'print',
                text: 'Imprimir',
                charset: 'UTF-8',
                bom: true,
                filename: 'Tipos-de-Animales-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3 ]
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


        $('#tipos-persona').DataTable({
            buttons: [
            {
                extend: 'csv',
                charset: 'UTF-8',
                bom: true,
                filename: 'Tipos-de-Persona-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3 ]
                }
            },
            {
                extend: 'excel',
                charset: 'UTF-8',
                bom: true,
                filename: 'Tipos-de-Persona-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3 ]
                }
            },
            {
                extend: 'pdf',
                customize: function(doc) {
                    doc.content[1].margin = [ 110, 0, 50, 0 ] //left, top, right, bottom
                },
                charset: 'UTF-8',
                bom: true,
                filename: 'Tipos-de-Persona-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3 ]
                }
            },
            {
                extend: 'print',
                text: 'Imprimir',
                charset: 'UTF-8',
                bom: true,
                filename: 'Tipos-de-Persona-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3 ]
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


        $('#tipos-alimentacion').DataTable({
            buttons: [
            {
                extend: 'csv',
                charset: 'UTF-8',
                bom: true,
                filename: 'Tipos-de-Alimentación-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4 ]
                }
            },
            {
                extend: 'excel',
                charset: 'UTF-8',
                bom: true,
                filename: 'Tipos-de-Alimentación-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4 ]
                }
            },
            {
                extend: 'pdf',
                customize: function(doc) {
                    doc.content[1].margin = [ 110, 0, 50, 0 ] //left, top, right, bottom
                },
                charset: 'UTF-8',
                bom: true,
                filename: 'Tipos-de-Alimentación-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4 ]
                }
            },
            {
                extend: 'print',
                text: 'Imprimir',
                charset: 'UTF-8',
                bom: true,
                filename: 'Tipos-de-Alimentación-Grupo-RES',
                exportOptions: {
                    columns: [ 1, 2, 3, 4 ]
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


    });

</script>
@endsection
