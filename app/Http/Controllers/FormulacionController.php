<?php

namespace App\Http\Controllers;

use App\Formulacion;
use Illuminate\Http\Request;

class FormulacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'porcentaje' => 'required|numeric',
            'kilogramos' => 'required|numeric',
            'formula_id' => 'required|numeric',
            'precio_id' => 'required|numeric',
        ]);

        //try {
        $formula = \App\Formula::find(request('formula_id'));
        if ($formula->formulaciones()->where('precio_id', request('precio_id'))->exists()) {
            return response()->json(['error' => "El elemento <<" . \App\Precio::find(request('precio_id'))->concepto . ">> ya existe en la Fórmula"], 500);
        }

        $precio = \App\Precio::find(request('precio_id'));
        $importe = $precio->precio / $precio->factor * request('kilogramos');

        $formulacion = new \App\Formulacion([
            "formula_id" => request("formula_id"),
            "precio_id" => request("precio_id"),
            "kilogramos" => request("kilogramos"),
            "porcentaje" => request("porcentaje"),
            "importe" => $importe,
        ]);
        $formulacion->save();

        $formulacion->formula->importe = $formulacion->formula->formulaciones()->sum('importe');
        $formulacion->formula->save();

        $formulacion->formula->kilogramos = $formulacion->formula->formulaciones()->sum('kilogramos');
        $formulacion->formula->save();

        echo json_encode($formulacion->formula);

        /* } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back()->withErrors(['msg' => $validator]);
        } */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Formulacion  $formulacion
     * @return \Illuminate\Http\Response
     */
    public function show(Formulacion $formulacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Formulacion  $formulacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Formulacion $formulacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Formulacion  $formulacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = $request->validate([
            'id' => 'required|numeric',
            'precio_id' => 'required|numeric',
            'porcentaje' => 'required|numeric',
            'kilogramos' => 'required|numeric',
        ]);

        //try {
        $f = \App\Formulacion::whereId($request->id)->update($request->except('_token', '_method'));

        $formulacion = \App\Formulacion::find($request->id);

        $formulacion->importe = $formulacion->precio->precio / $formulacion->precio->factor * $formulacion->kilogramos;
        $formulacion->save();

        $formulacion->formula->importe = $formulacion->formula->formulaciones()->sum('importe');
        $formulacion->formula->save();

        $formulacion->formula->kilogramos = $formulacion->formula->formulaciones()->sum('kilogramos');
        $formulacion->formula->save();

        echo json_encode($formulacion->formula);
        /* } catch (\Throwable $th) {
            echo json_encode('error');
        } */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Formulacion  $formulacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formulacion $formulacion)
    {
        //
    }
}
