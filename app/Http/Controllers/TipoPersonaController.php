<?php

namespace App\Http\Controllers;

use App\TipoPersona;
use Illuminate\Http\Request;

class TipoPersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $tipo_personas = \App\TipoPersona::all();
            return view('tipo-personas.index', compact(['tipo_personas']));
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal! Si persiste el error favor de consultar servicio técnico')->persistent('Cerrar');
            return back()->withErrors(['msg' => $th]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'nombre' => 'required|max:255|min:2',
            'comentarios' => 'nullable|min:2',
        ]);

        try {
            $tipo = \App\TipoPersona::create($request->except('_token', '_method'));
            alert()->success('Tipo de Persona creado exitosamente!')->persistent('Cerrar');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoPersona  $tipoPersona
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $tipo = \App\TipoPersona::find($id);
            return view('tipo-personas.show', compact('tipo'));
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal! Si persiste el error favor de consultar servicio técnico')->persistent('Cerrar');
            return back()->withErrors(['msg' => $th]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoPersona  $tipoPersona
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoPersona $tipoPersona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoPersona  $tipoPersona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = $request->validate([
            'nombre' => 'required|max:255|min:2',
            'comentarios' => 'nullable|min:2',
        ]);

        try {
            $tipo = \App\TipoPersona::whereId($request->id)->update($request->except('_token', '_method'));
            alert()->success('Tipo de Persona editado exitosamente!')->persistent('Cerrar');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back()->withErrors(['msg' => $validator]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoPersona  $tipoPersona
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $tipo = \App\TipoPersona::whereId($id)->delete();
            alert()->success('Tipo de Persona eliminado exitosamente!')->persistent('Cerrar');
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
        }

        return back();
    }
}
