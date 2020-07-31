<?php

namespace App\Http\Controllers;

use App\Precio;
use Illuminate\Http\Request;

class PrecioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $precios = \App\Precio::all();
        return view('precios.index', compact('precios'));
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
        //dd($request->all());
        $validator = $request->validate([
            'concepto' => 'required|max:255|min:2',
            'tipo' => 'required|max:255|min:4',
            'precio' => 'required|numeric',
            'factor' => 'required|numeric',
            'rango' => 'nullable',
            'rango_alto' => 'nullable|numeric',
            'rango_bajo' => 'nullable|numeric',
            'alimento' => 'nullable',
            'materia_seca' => 'nullable|numeric',
            'porcion_comestible' => 'nullable|numeric',
            'grasa' => 'nullable|numeric',
            'fibra' => 'nullable|numeric',
            'ceniza' => 'nullable|numeric',
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
     * @param  \App\Precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $precio = \App\Precio::find($id);
        return view('precios.show', compact('precio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function edit(Precio $precio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request->all());
        $validator = $request->validate([
            'concepto' => 'required|max:255|min:4',
            'precio' => 'required|numeric',
            'factor' => 'required|numeric',
            'rango' => 'nullable',
            'rango_alto' => 'nullable|numeric',
            'rango_bajo' => 'nullable|numeric',
            'alimento' => 'nullable',
            'materia_seca' => 'nullable|numeric',
            'porcion_comestible' => 'nullable|numeric',
            'grasa' => 'nullable|numeric',
            'fibra' => 'nullable|numeric',
            'ceniza' => 'nullable|numeric',
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
     * @param  \App\Precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
