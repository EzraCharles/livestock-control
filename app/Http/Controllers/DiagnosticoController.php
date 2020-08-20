<?php

namespace App\Http\Controllers;

use App\Diagnostico;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
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
            $diagnosticos = \App\Diagnostico::all();
            return view('diagnosticos.index', compact('diagnosticos'));
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
            'comentarios' => 'nullable|max:255|min:2',
        ]);

        try {
            $diagnostico = \App\Diagnostico::create($request->except('_token', '_method'));
            alert()->success('Diagnóstico creado exitosamente!')->persistent('Cerrar');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back()->withErrors(['msg' => $validator]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $diagnostico = \App\Diagnostico::find($id);
            return view('diagnosticos.show', compact('diagnostico'));
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal! Si persiste el error favor de consultar servicio técnico')->persistent('Cerrar');
            return back()->withErrors(['msg' => $th]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnostico $diagnostico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = $request->validate([
            'nombre' => 'required|max:255|min:2',
            'comentarios' => 'nullable|max:255|min:2',
        ]);

        try {
            $diagnostico = \App\Diagnostico::whereId($request->id)->update($request->except('_token', '_method'));
            alert()->success('Diagnóstico editado exitosamente!')->persistent('Cerrar');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back()->withErrors(['msg' => $validator]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $diagnostico = \App\Diagnostico::whereId($id)->delete();
            alert()->success('Diagnóstico eliminado exitosamente!')->persistent('Cerrar');
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
        }

        return back();
    }

    /**
     * Restore the specified resource from deleted.
     *
     * @param  \App\Diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        try {
            $diagnostico = \App\Diagnostico::withTrashed()->find($request['input'])->restore();
            echo json_encode('success');
        } catch (\Throwable $th) {
            echo json_encode('error');
        }
    }

    /**
     * Remove permanently the specified resource from deleted.
     *
     * @param  \App\Diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        try {
            $diagnostico = \App\Diagnostico::withTrashed()->find($request['input'])->forceDelete();
            echo json_encode('success');
        } catch (\Throwable $th) {
            echo json_encode('error');
        }
    }
}
