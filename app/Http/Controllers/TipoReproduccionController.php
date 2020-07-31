<?php

namespace App\Http\Controllers;

use App\TipoReproduccion;
use Illuminate\Http\Request;

class TipoReproduccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_reproducciones = \App\TipoReproduccion::all();
        return view('tipo-reproducciones.index', compact(['tipo_reproducciones']));
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
            $tipo = \App\TipoReproduccion::create($request->except('_token', '_method'));
            alert()->success('Tipo de Reproducción creado exitosamente!')->persistent('Cerrar');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back()->withErrors(['msg' => $validator]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoReproduccion  $tipoReproduccion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo = \App\TipoReproduccion::find($id);
        return view('tipo-reproducciones.show', compact('tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoReproduccion  $tipoReproduccion
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoReproduccion $tipoReproduccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoReproduccion  $tipoReproduccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = $request->validate([
            'nombre' => 'required|max:255|min:2',
            'comentarios' => 'nullable|min:2',
        ]);

        try {
            $tipo = \App\TipoReproduccion::whereId($request->id)->update($request->except('_token', '_method'));
            alert()->success('Tipo de Reproducción editado exitosamente!')->persistent('Cerrar');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back()->withErrors(['msg' => $validator]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoReproduccion  $tipoReproduccion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $tipo = \App\TipoReproduccion::whereId($id)->delete();
            alert()->success('Tipo de Reproducción eliminado exitosamente!')->persistent('Cerrar');
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
        }

        return back();
    }
}
