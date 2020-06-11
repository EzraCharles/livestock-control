@extends('layouts.app')

@section('general')
{{--
    background-engorda
    background-vacuno
    beef-cattle
    cattle
    --}}
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
            <div id="responsive-phone" class="col-6 mx-auto">
                <div class="card">
                    <div class="card-header" style="text-align: center"> <h3> <strong style="font-family:Verdana, Geneva, Tahoma, sans-serif; color: #cb6502">Sistema de Control Ganadero</strong> </h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Correo</label>

                                <div class="col-md-7">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Constraseña</label>

                                <div class="col-md-7">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8 offset-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            Recordarme
                                        </label>
                                        <a href="{{ route('register') }}" style="color: #994e14; padding-left: 50px;">Registrarme</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-9 offset-md-3">
                                    <button type="submit" class="btn grupo-res">
                                        Ingresar
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #994e14">
                                            ¿Olvidó su constraseña?
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    $(window).resize(function(){
        if($(window).width() < 768){
            $('#responsive-phone').removeClass('col-6');
            $('#responsive-phone').addClass('col-12');
        }

        if($(window).width() > 767){
            $('#responsive-phone').removeClass('col-12');
            $('#responsive-phone').addClass('col-6');
        }
    });
</script>
@endsection
