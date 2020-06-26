<?php

namespace App\Http\Controllers;

use App\Tratamiento;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tratamientos = \App\Tratamiento::all();
        $precios = \App\Precio::all();
        $tipos = \App\TipoTratamiento::all();
        return view('tratamientos.index', compact(['tratamientos', 'precios', 'tipos']));
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
            'precio_id' => 'required|numeric',
            'tipo_tratamiento_id' => 'required|numeric',
            'comentarios' => 'nullable|max:255|min:4',
        ]);

        try {
            $precio = \App\Precio::find($request['precio_id']);
            $tratamiento = \App\Tratamiento::create(array_merge($request->except('_token', '_method'), ['precio_registro' => $precio->precio]));
            alert()->success('Tratamiento creado exitosamente!')->persistent('Cerrar');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back()->withErrors(['msg' => $validator]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tratamiento = \App\Tratamiento::find($id);
        return view('tratamientos.show', compact('tratamiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Tratamiento $tratamiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = $request->validate([
            'nombre' => 'required|max:255|min:4',
            'precio_registro' => 'required|numeric',
            'precio_id' => 'required|numeric',
            'tipo_tratamiento_id' => 'required|numeric',
            'comentarios' => 'nullable|max:255|min:4',
        ]);

        try {
            $tratamiento = \App\Tratamiento::whereId($request->id)->update($request->except('_token', '_method'));
            alert()->success('Tratamiento editado exitosamente!')->persistent('Cerrar');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back()->withErrors(['msg' => $validator]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $tratamiento = \App\Tratamiento::whereId($id)->delete();
            alert()->success('Tratamiento eliminado exitosamente!')->persistent('Cerrar');
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
        }

        return back();
    }
}
