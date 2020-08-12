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
        try {
            $tratamientos = \App\Tratamiento::all();
            $precios = \App\Precio::where('tipo', 'Tratamiento')->get();
            $tipos = \App\TipoTratamiento::all();
            return view('tratamientos.index', compact(['tratamientos', 'precios', 'tipos']));
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
            'precio_id' => 'required|integer|min:1',
            'tipo_tratamiento_id' => 'required|integer|min:1',
            'comentarios' => 'nullable|min:2',
        ]);

        try {
            $precio = \App\Precio::find($request['precio_id']);
            $tratamiento = \App\Tratamiento::create($request->except('_token', '_method')); //['precio_registro' => $precio->precio]
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
        try {
            $tratamiento = \App\Tratamiento::find($id);
            return view('tratamientos.show', compact('tratamiento'));
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal! Si persiste el error favor de consultar servicio técnico')->persistent('Cerrar');
            return back()->withErrors(['msg' => $th]);
        }
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
            'nombre' => 'required|max:255|min:2',
            'precio_id' => 'required|integer|min:1',
            'tipo_tratamiento_id' => 'required|integer|min:1',
            'comentarios' => 'nullable|min:2',
        ]);

        try {
            $precio = \App\Precio::find($request['precio_id']);
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

    /**
     * Restore the specified resource from deleted.
     *
     * @param  \App\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        try {
            $tratamiento = \App\Tratamiento::withTrashed()->find($request['input'])->restore();
            echo json_encode('success');
        } catch (\Throwable $th) {
            echo json_encode('error');
        }
    }

    /**
     * Remove permanently the specified resource from deleted.
     *
     * @param  \App\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        try {
            $tratamiento = \App\Tratamiento::withTrashed()->find($request['input'])->forceDelete();
            echo json_encode('success');
        } catch (\Throwable $th) {
            echo json_encode('error');
        }
    }
}
