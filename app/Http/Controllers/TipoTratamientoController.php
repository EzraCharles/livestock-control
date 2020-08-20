<?php

namespace App\Http\Controllers;

use App\TipoTratamiento;
use Illuminate\Http\Request;

class TipoTratamientoController extends Controller
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
            $tipo_tratamientos = \App\TipoTratamiento::all();
            return view('tipo-tratamientos.index', compact(['tipo_tratamientos']));
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
            $tipo = \App\TipoTratamiento::create($request->except('_token', '_method'));
            alert()->success('Tipo de Tratamiento creado exitosamente!')->persistent('Cerrar');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back()->withErrors(['msg' => $validator]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoTratamiento  $tipoTratamiento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $tipo = \App\TipoTratamiento::find($id);
            return view('tipo-tratamientos.show', compact('tipo'));
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal! Si persiste el error favor de consultar servicio técnico')->persistent('Cerrar');
            return back()->withErrors(['msg' => $th]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoTratamiento  $tipoTratamiento
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoTratamiento $tipoTratamiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoTratamiento  $tipoTratamiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = $request->validate([
            'nombre' => 'required|max:255|min:2',
            'comentarios' => 'nullable|min:2',
        ]);

        try {
            $tipo = \App\TipoTratamiento::whereId($request->id)->update($request->except('_token', '_method'));
            alert()->success('Tipo de Tratamiento editado exitosamente!')->persistent('Cerrar');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back()->withErrors(['msg' => $validator]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoTratamiento  $tipoTratamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $tipo = \App\TipoTratamiento::whereId($id)->delete();
            alert()->success('Tipo de Tratamiento eliminado exitosamente!')->persistent('Cerrar');
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
        }

        return back();
    }

    /**
     * Restore the specified resource from deleted.
     *
     * @param  \App\TipoTratamiento  $tipo_tratamiento
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        try {
            $tipo_tratamiento = \App\TipoTratamiento::withTrashed()->find($request['input'])->restore();
            echo json_encode('success');
        } catch (\Throwable $th) {
            echo json_encode('error');
        }
    }

    /**
     * Remove permanently the specified resource from deleted.
     *
     * @param  \App\TipoTratamiento  $tipo_tratamiento
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        try {
            $tipo_tratamiento = \App\TipoTratamiento::withTrashed()->find($request['input'])->forceDelete();
            echo json_encode('success');
        } catch (\Throwable $th) {
            echo json_encode('error');
        }
    }
}
