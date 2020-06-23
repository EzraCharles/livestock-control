<?php

namespace App\Http\Controllers;

use App\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animales = \App\Animal::all();
        $personas = \App\Persona::where('tipo_persona_id', 3)->get();
        $tipos = \App\TipoAnimal::all();

        return view('animales.index', compact(['animales', 'personas', 'tipos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('animales.create');
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
            'arete' => 'required|max:15|min:10',
            'arete_res' => 'nullable|size:4',
            'tipo_id' => 'required|numeric',
            'persona_id' => 'required|numeric',
            'comentarios' => 'nullable|max:255|min:4',
        ]);

        try {
            $animal = \App\Animal::create($request->except('_token', '_method'));
            alert()->success('Animal creado exitosamente!')->persistent('Cerrar');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back()->withErrors(['msg' => $validator]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal = \App\Animal::find($id);
        $productor = $animal->persona();
        $tipo = $animal->tipoAnimal();
        $registros = $animal->registros();
        $compra = $animal->compra();
        $venta = $animal->venta();
        $tratamientos = $animal->tratamientosSanitarios();

        return view('animales.show', compact(['animal', 'productor', 'tipo', 'registros', 'compra', 'venta', 'tratamientos']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal = \App\Animal::find($id);
        return view('animales.edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request->all());
        $validator = $request->validate([
            'arete' => 'required|max:15|min:10',
            'arete_res' => 'nullable|size:4',
            'tipo_animal_id' => 'required|numeric',
            'persona_id' => 'required|numeric',
            'comentarios' => 'nullable|max:255|min:4',
        ]);

        try {
            $animal = \App\Animal::whereId($request->id)->update($request->except('_token', '_method'));
            alert()->success('Animal editado exitosamente!')->persistent('Cerrar');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back()->withErrors(['msg' => $validator]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $animal = \App\Animal::whereId($id)->delete();
            alert()->success('Animal eliminado exitosamente!')->persistent('Cerrar');
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
        }

        return back();
    }
}
