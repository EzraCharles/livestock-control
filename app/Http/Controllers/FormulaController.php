<?php

namespace App\Http\Controllers;

use App\Formula;
use Illuminate\Http\Request;

class FormulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formulas = \App\Formula::all();
        $precios = \App\Precio::where('tipo', 'Formulación')->get();
        return view('formulas.index', compact(['formulas', 'precios']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $precios = \App\Precio::where('tipo', 'Formulación')->get();
        return view('formulas.create', compact(['precios']));
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
            'nombre' => 'required|min:2|max:255',
            /* 'proteina' => 'required|numeric|min:0.01|max:100',
            'grasa' => 'required|numeric|min:0.01|max:100',
            'ceniza' => 'required|numeric|min:0.01|max:100', */
            'comentarios' => 'nullable|min:2',
        ]);

        $formula = new \App\Formula([
            'nombre'  => request('nombre'),
            /* 'proteina'  => request('proteina'),
            'grasa'  => request('grasa'),
            'ceniza'  => request('ceniza'), */
            'comentarios' => request('comentarios'),
            'importe' => 0,
            'kilogramos' => 0,
        ]);
        $formula->save();

        for ($i=0; $i < sizeof(request('porcentaje')); $i++) {
            $precio = \App\Precio::find(request('precio_id')[$i]);

            $formulacion = new \App\Formulacion([
                'kilogramos' => request('kilogramos')[$i],
                'porcentaje' => request('porcentaje')[$i],
                'formula_id' => $formula->id,
                'precio_id' => request('precio_id')[$i],
                'importe' => $precio->precio / $precio->factor * request('kilogramos')[$i],
            ]);
            $formulacion->save();
        }

        $formula->importe = $formula->formulaciones()->sum('importe');
        $formula->save();

        $formula->kilogramos = $formula->formulaciones()->sum('kilogramos');
        $formula->save();

        $proteina = 0.0;
        $grasa = 0.0;
        $ceniza = 0.0;

        foreach ($formula->formulaciones as $componente) {
            $proteina += $componente->kilogramos * $componente->precio->porcion_comestible / 1000;
            $grasa += $componente->kilogramos * $componente->precio->grasa / 1000;
            $ceniza += $componente->kilogramos * $componente->precio->ceniza / 1000;
        }

        $formula->proteina = $proteina;
        $formula->grasa = $grasa;
        $formula->ceniza = $ceniza;
        $formula->save();

        alert()->success('Fórmula creada exitosamente!')->persistent('Cerrar');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Formula  $formula
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formula = \App\Formula::find($id);
        return view('formulas.show', compact('formula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Formula  $formula
     * @return \Illuminate\Http\Response
     */
    public function edit(Formula $formula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Formula  $formula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = $request->validate([
            'nombre' => 'required|min:2|max:255',
            /* 'proteina' => 'required|numeric|min:0.01|max:100',
            'grasa' => 'required|numeric|min:0.01|max:100',
            'ceniza' => 'required|numeric|min:0.01|max:100', */
            'comentarios' => 'nullable|min:2',
        ]);

        try {
            $formula = \App\Formula::whereId($request->id)->update($request->except('_token', '_method'));
            alert()->success('Fórmula editada exitosamente!')->persistent('Cerrar');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Formula  $formula
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $formula = \App\Formula::whereId($id)->delete();
            alert()->success('Fórmula eliminada exitosamente!')->persistent('Cerrar');
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
        }

        return back();
    }

    public function componentes(Request $request)
    {
        $componentes = \App\Formulacion::where('formula_id', $request['input'])->with('precio')->get();
        echo json_encode($componentes);
    }

    public function getPrecios()
    {
        $precios = \App\Precio::where('tipo', 'Formulación')->get();
        echo json_encode($precios);
    }

}
