<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
            return view('dashboard');
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal! Si persiste el error favor de consultar servicio técnico')->persistent('Cerrar');
            return back()->withErrors(['msg' => $th]);
        }
    }

    /**
     * Show erased elements view.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function eliminados()
    {
        try {
            $usuarios = \App\User::onlyTrashed()->get();
            $precios = \App\Precio::onlyTrashed()->get();
            $animales = \App\Animal::onlyTrashed()->get();
            $personas = \App\Persona::onlyTrashed()->get();
            $diagnosticos = \App\Diagnostico::onlyTrashed()->get();
            $tratamientos = \App\Tratamiento::onlyTrashed()->get();
            $tipo_tratamientos = \App\TipoTratamiento::onlyTrashed()->get();
            $tipo_reproducciones = \App\TipoReproduccion::onlyTrashed()->get();
            $tipo_animales = \App\TipoAnimal::onlyTrashed()->get();
            $tipo_personas = \App\TipoPersona::onlyTrashed()->get();
            $tipo_alimentaciones = \App\TipoAlimentacion::onlyTrashed()->get();
            $corrales = \App\Corral::onlyTrashed()->get();
            $formulas = \App\Formula::onlyTrashed()->get();

            return view('eliminados', compact([
                'usuarios',
                'precios',
                'animales',
                'personas',
                'diagnosticos',
                'tratamientos',
                'tipo_tratamientos',
                'tipo_reproducciones',
                'tipo_animales',
                'tipo_personas',
                'tipo_alimentaciones',
                'corrales',
                'formulas',
            ]));
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal! Si persiste el error favor de consultar servicio técnico')->persistent('Cerrar');
            return back()->withErrors(['msg' => $th]);
        }
    }
}
