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
        return view('animales.index', compact('animales'));
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
            'concepto' => 'required|max:255|min:4',
            'precio' => 'required|numeric',
            'factor' => 'required|numeric',
            'rango' => 'nullable',
            'rango_alto' => 'nullable|numeric',
            'rango_bajo' => 'nullable|numeric',
            'comentarios' => 'nullable|max:255|min:4',
        ]);

        try {
            $precio = \App\Precio::create($request->except('_token', '_method'));
            alert()->success('Precio creado exitosamente!')->persistent('Cerrar');
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
    public function update(Request $request, Animal $animal)
    {
        $validator = $request->validate([
            'concepto' => 'required|max:255|min:4',
            'precio' => 'required|numeric',
            'factor' => 'required|numeric',
            'rango' => 'nullable',
            'rango_alto' => 'nullable|numeric',
            'rango_bajo' => 'nullable|numeric',
            'comentarios' => 'nullable|max:255|min:4',
        ]);

        try {
            $precio = \App\Precio::whereId($request->id)->update($request->except('_token', '_method'));
            alert()->success('Precio editado exitosamente!')->persistent('Cerrar');
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
    public function destroy(Animal $animal)
    {
        try {
            $precio = \App\Precio::whereId($id)->delete();
            alert()->success('Precio eliminado exitosamente!')->persistent('Cerrar');
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
        }

        return back();
    }
}
