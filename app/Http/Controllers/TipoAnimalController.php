<?php

namespace App\Http\Controllers;

use App\TipoAnimal;
use Illuminate\Http\Request;

class TipoAnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_animales = \App\TipoAnimal::all();
        return view('tipo-animales.index', compact(['tipo_animales']));
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
            'comentarios' => 'nullable|max:255|min:4',
        ]);

        try {
            $tipo = \App\TipoAnimal::create($request->except('_token', '_method'));
            alert()->success('Tipo de Animal creado exitosamente!')->persistent('Cerrar');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back()->withErrors(['msg' => $validator]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoAnimal  $tipoAnimal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo = \App\TipoAnimal::find($id);
        return view('tipo-animales.show', compact('tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoAnimal  $tipoAnimal
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoAnimal $tipoAnimal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoAnimal  $tipoAnimal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = $request->validate([
            'nombre' => 'required|max:255|min:4',
            'comentarios' => 'nullable|max:255|min:4',
        ]);

        try {
            $tipo = \App\TipoAnimal::whereId($request->id)->update($request->except('_token', '_method'));
            alert()->success('Tipo de Animal editado exitosamente!')->persistent('Cerrar');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back()->withErrors(['msg' => $validator]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoAnimal  $tipoAnimal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $tipo = \App\TipoAnimal::whereId($id)->delete();
            alert()->success('Tipo de Animal eliminado exitosamente!')->persistent('Cerrar');
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
        }

        return back();
    }
}
