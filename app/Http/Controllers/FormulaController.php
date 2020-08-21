<?php

namespace App\Http\Controllers;

use App\Formula;
use Illuminate\Http\Request;

class FormulaController extends Controller
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
            $formulas = \App\Formula::all();
            $precios = \App\Precio::where('tipo', 'Formulación')->get();
            return view('formulas.index', compact(['formulas', 'precios']));
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
        try {
            $precios = \App\Precio::where('tipo', 'Formulación')->get();
            return view('formulas.create', compact(['precios']));
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal! Si persiste el error favor de consultar servicio técnico')->persistent('Cerrar');
            return back()->withErrors(['msg' => $th]);
        }
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
            'comentarios' => 'nullable|min:2|max:255',
        ]);

        try {
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
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal! Si persiste el error favor de consultar servicio técnico')->persistent('Cerrar');
            return back()->withErrors(['msg' => $th]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Formula  $formula
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $formula = \App\Formula::find($id);
            return view('formulas.show', compact('formula'));
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal! Si persiste el error favor de consultar servicio técnico')->persistent('Cerrar');
            return back()->withErrors(['msg' => $th]);
        }
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
            'comentarios' => 'nullable|min:2|max:255',
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

    public function check(Request $request)
    {
        //dd($request->all());
        try {
            $formula = \App\Formula::find($request->input);

            $proteina = 0.0;
            $grasa = 0.0;
            $ceniza = 0.0;

            foreach ($formula->formulaciones as $componente) {
                $proteina += $componente->kilogramos * $componente->precio->porcion_comestible / 1000;
                $grasa += $componente->kilogramos * $componente->precio->grasa / 1000;
                $ceniza += $componente->kilogramos * $componente->precio->ceniza / 1000;

                if ($componente->importe != $componente->precio->precio / $componente->precio->factor * $componente->kilogramos) {
                    $componente->importe = $componente->precio->precio / $componente->precio->factor * $componente->kilogramos;
                    $componente->save();
                }
            }

            $formula->proteina = $proteina;
            $formula->grasa = $grasa;
            $formula->ceniza = $ceniza;
            $formula->updated_at = \Carbon\Carbon::now();
            $formula->save();

            $formula->importe = $formula->formulaciones()->sum('importe');
            $formula->save();

            $formula->kilogramos = $formula->formulaciones()->sum('kilogramos');
            $formula->save();

            echo json_encode($formula);
        } catch (\Throwable $th) {
            //echo json_encode('error');
            //return response()->json(['error' => "Error"], 500);
            return back()->withErrors(['msg' => $th]);
        }
    }

    public function componentes(Request $request)
    {
        try {
            $componentes = \App\Formulacion::where('formula_id', $request['input'])->with('precio')->get();
            echo json_encode($componentes);
        } catch (\Throwable $th) {
            echo json_encode('error');
        }
    }

    public function getPrecios()
    {
        try {
            $precios = \App\Precio::where('tipo', 'Formulación')->get();
            echo json_encode($precios);
        } catch (\Throwable $th) {
            echo json_encode('error');
        }
    }

    /**
     * Restore the specified resource from deleted.
     *
     * @param  \App\Formula  $formula
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        try {
            $formula = \App\Formula::withTrashed()->find($request['input'])->restore();
            echo json_encode('success');
        } catch (\Throwable $th) {
            echo json_encode('error');
        }
    }

    /**
     * Remove permanently the specified resource from deleted.
     *
     * @param  \App\Formula  $formula
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        try {
            $formula = \App\Formula::withTrashed()->find($request['input']);
            $formula->formulaciones()->forceDelete();
            $formula->forceDelete();
            echo json_encode('success');
        } catch (\Throwable $th) {
            echo json_encode('error');
        }
    }

}
