<?php

namespace App\Http\Controllers;

use App\Precio;
use Illuminate\Http\Request;

class PrecioController extends Controller
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
            $precios = \App\Precio::all();
            return view('precios.index', compact('precios'));
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
        //dd($request->all());
        $validator = $request->validate([
            'concepto' => 'required|max:255|min:2',
            'tipo' => 'required|max:255|min:2',
            'precio' => 'required|numeric|min:0.01',
            'factor' => 'required|numeric|min:0.01',
            'rango' => 'nullable|boolean',
            'rango_alto' => 'nullable|numeric|min:0.01',
            'rango_bajo' => 'nullable|numeric|min:0',
            'alimento' => 'nullable|boolean',
            'materia_seca' => 'nullable|numeric|min:0.01|max:100',
            'porcion_comestible' => 'nullable|numeric|min:0.01|max:100',
            'grasa' => 'nullable|numeric|min:0.01|max:100',
            'fibra' => 'nullable|numeric|min:0.01|max:100',
            'ceniza' => 'nullable|numeric|min:0.01|max:100',
            'comentarios' => 'nullable|min:2',
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
        try {
            $precio = \App\Precio::find($id);
            return view('precios.show', compact('precio'));
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal! Si persiste el error favor de consultar servicio técnico')->persistent('Cerrar');
            return back()->withErrors(['msg' => $th]);
        }
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
            'concepto' => 'required|max:255|min:2',
            'tipo' => 'required|max:255|min:2',
            'precio' => 'required|numeric|min:0.01',
            'factor' => 'required|numeric|min:0.01',
            'rango' => 'nullable|boolean',
            'rango_alto' => 'nullable|numeric|min:0.01',
            'rango_bajo' => 'nullable|numeric|min:0',
            'alimento' => 'nullable|boolean',
            'materia_seca' => 'nullable|numeric|min:0.01|max:100',
            'porcion_comestible' => 'nullable|numeric|min:0.01|max:100',
            'grasa' => 'nullable|numeric|min:0.01|max:100',
            'fibra' => 'nullable|numeric|min:0.01|max:100',
            'ceniza' => 'nullable|numeric|min:0.01|max:100',
            'comentarios' => 'nullable|min:2',
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

    /**
     * Restore the specified resource from deleted.
     *
     * @param  \App\Precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        try {
            $precio = \App\Precio::withTrashed()->find($request['input'])->restore();
            echo json_encode('success');
        } catch (\Throwable $th) {
            echo json_encode('error');
        }
    }

    /**
     * Remove permanently the specified resource from deleted.
     *
     * @param  \App\Precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        try {
            $precio = \App\Precio::withTrashed()->find($request['input'])->forceDelete();
            echo json_encode('success');
        } catch (\Throwable $th) {
            echo json_encode('error');
        }
    }
}
