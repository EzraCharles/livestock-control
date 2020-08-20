<?php

namespace App\Http\Controllers;

use App\TipoAlimentacion;
use Illuminate\Http\Request;

class TipoAlimentacionController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $tipo_alimentaciones = \App\TipoAlimentacion::all();
            $formulas = \App\Formula::all();
            return view('tipo-alimentaciones.index', compact(['tipo_alimentaciones', 'formulas']));
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
            'formula_id' => 'required|integer|min:1',
            'comentarios' => 'nullable|min:2',
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
        try {
            $tipo = \App\TipoAlimentacion::find($id);
            return view('tipo-alimentaciones.show', compact('tipo'));
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal! Si persiste el error favor de consultar servicio técnico')->persistent('Cerrar');
            return back()->withErrors(['msg' => $th]);
        }
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
            'nombre' => 'required|max:255|min:2',
            'formula_id' => 'required|integer|min:1',
            'comentarios' => 'nullable|min:2',
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

    /**
     * Restore the specified resource from deleted.
     *
     * @param  \App\TipoAlimentacion  $tipo_alimentacion
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        try {
            $tipo_alimentacion = \App\TipoAlimentacion::withTrashed()->find($request['input'])->restore();
            echo json_encode('success');
        } catch (\Throwable $th) {
            echo json_encode('error');
        }
    }

    /**
     * Remove permanently the specified resource from deleted.
     *
     * @param  \App\TipoAlimentacion  $tipo_alimentacion
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        try {
            $tipo_alimentacion = \App\TipoAlimentacion::withTrashed()->find($request['input'])->forceDelete();
            echo json_encode('success');
        } catch (\Throwable $th) {
            echo json_encode('error');
        }
    }
}
