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
        //
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

        try {
            $f = \App\Formulacion::whereId($request->id)->update($request->except('_token', '_method'));

            $formulacion = \App\Formulacion::find($request->id);

            $formulacion->importe = $formulacion->precio->precio / $formulacion->precio->factor * $formulacion->kilogramos;
            $formulacion->save();

            $formulacion->formula->importe = $formulacion->formula->formulaciones()->sum('importe');
            $formulacion->formula->save();

            $formulacion->formula->kilogramos = $formulacion->formula->formulaciones()->sum('kilogramos');
            $formulacion->formula->save();

            alert()->success('Componente de fórmula editado exitosamente!')->persistent('Cerrar');
            echo json_encode($formulacion->formula);
        } catch (\Throwable $th) {
            echo json_encode('error');
        }
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
