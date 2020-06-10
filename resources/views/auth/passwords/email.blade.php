@extends('layouts.app')

@section('general')
<style>
    body,html {
        height: 100%;
    }
    body{
        background-image: url("../img/cattle-logos.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
</style>
<body>
    <div class="container d-flex h-100 justify-content-center">
        <div class="row align-self-center w-100">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header" style="text-align: center"><h3> <strong style="font-family:Verdana, Geneva, Tahoma, sans-serif; color: #cb6502">Reestablecer contraseña</strong> </h3></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Correo</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn" style="background-color: #cb6502;">
                                        Enviar Enlace
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
