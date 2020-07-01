<?php

namespace App\Http\Controllers;

use App\TipoAlimentacion;
use Illuminate\Http\Request;

class TipoAlimentacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_alimentaciones = \App\TipoAlimentacion::all();
        $formulas = \App\Formula::all();
        return view('tipo-alimentaciones.index', compact(['tipo_alimentaciones', 'formulas']));
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
            'nombre' => 'required|max:255|min:4',
            'formula_id' => 'required|numeric',
            'comentarios' => 'nullable|max:255|min:4',
        ]);

        try {
            $tipo = \App\TipoAlimentacion::create($request->except('_token', '_method'));
            alert()->success('Tipo de Alimentación creado exitosamente!')->persistent('Cerrar');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoAlimentacion  $tipoAlimentacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo = \App\TipoAlimentacion::find($id);
        return view('tipo-alimentaciones.show', compact('tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoAlimentacion  $tipoAlimentacion
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoAlimentacion $tipoAlimentacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoAlimentacion  $tipoAlimentacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = $request->validate([
            'nombre' => 'required|max:255|min:4',
            'formula_id' => 'required|numeric',
            'comentarios' => 'nullable|max:255|min:4',
        ]);

        try {
            $tipo = \App\TipoAlimentacion::whereId($request->id)->update($request->except('_token', '_method'));
            alert()->success('Tipo de Alimentación editado exitosamente!')->persistent('Cerrar');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back()->withErrors(['msg' => $validator]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoAlimentacion  $tipoAlimentacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $tipo = \App\TipoAlimentacion::whereId($id)->delete();
            alert()->success('Tipo de Alimentación eliminado exitosamente!')->persistent('Cerrar');
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
        }

        return back();
    }
}
