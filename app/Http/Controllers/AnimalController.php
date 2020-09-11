<?php

namespace App\Http\Controllers;

use App\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnimalController extends Controller
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
            $animales = \App\Animal::all();
            $personas = \App\Persona::where('tipo_persona_id', 3)->get();
            $tipos = \App\TipoAnimal::all();

            return view('animales.index', compact(['animales', 'personas', 'tipos']));
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
            return view('animales.create');
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
        /* dd($request["embarque"]); */

        /* try { */
        if ($request["embarque"] == 0) {
            $proveedor = $request['form'][0]['proveedor'];

            if ($proveedor == "otro") {
                $proveedor = new \App\Persona([
                    "nombre" => $request['form'][0]['nombre_proveedor'],
                    "tipo_persona_id" => 2,
                ]);
                $proveedor->save();

                $proveedor = $proveedor->id;
            }

            $acopio = false;

            if (array_key_exists('acopio', $request['form'][0])) {
                $acopio = true;
            }

            $embarque = new \App\Embarque([
                "persona_id" => $proveedor,
                "usuario_id" => auth()->user()->id,
                "tipo_embarque" => 'Compra',
                "fecha" => $request['form'][0]['fecha'],
                "acopio" => $acopio,
                "comentarios" => $request['form'][0]['comentarios_embarque'],
            ]);
            $embarque->save();

            $observations = [];

            foreach ($request['input'] as $row) {
                $productor = '';
                $sexo = '';
                $animal = '';

                if (!is_numeric($row['Productor'])) {
                    $productor = new \App\Persona([
                        "nombre" => $row['Productor'],
                        "tipo_persona_id" => 3,
                    ]);
                    $productor->save();

                    $productor = $productor->id;
                }
                else{
                    $productor = $row['Productor'];
                }

                if (!is_numeric($row['Sexo'])) {
                    $sexo = new \App\TipoAnimal([
                        "nombre" => $row['Sexo'],
                    ]);
                    $sexo->save();

                    $sexo = $sexo->id;
                }
                else{
                    $sexo = $row['Sexo'];
                }

                //get element with all relationships if already exist
                $animal_known = \App\Animal::with('persona', 'tipoAnimal', 'registros')->where('arete', 'LIKE', '%' . substr($row['Arete'], -10))->get()->first();
                /* $animal_owned =  (array) DB::connection('mysql')->select('CALL sp_checkAnimalExistence (?)', [substr($row['Arete'], -10)])[0]; */

                if ($animal_known) {
                    $animal_known['fila'] = $row["Fila"];
                    array_push($observations, $animal_known);
                    $animal = $animal_known;
                }
                else{
                    $animal = new \App\Animal([
                        "arete" => $row['Arete'],
                        "arete_4" => substr($row['Arete'], -4),
                        "persona_id" => $productor,
                        "tipo_animal_id" => $sexo,
                        "comentarios" => $request['form'][0]['comentarios'],
                ]);
                    $animal->save();
                }

                /* if ($animal_owned) {
                    $animal_owned['observations'] = 'Presente';
                    array_push($observations, $animal_owned);
                    $flag = 1;
                    $animal = $animal_owned;
                } */

                $compra = new \App\Compra([
                    "folio_factura" => $row['Folio'],
                    "factura_fiscal" => $row['Factura'],
                    "reemo" => $row['Reemo'],
                    "peso" => $row['Peso'],
                    "embarque_id" => $embarque->id,
                    "animal_id" => $animal->id,
                    "comentarios" => $request['form'][0]['comentarios'],
                    /* "peso_neto" => $request['fecha'],
                    "importe" => $request['fecha'], */
                    /* "dieta" => , */
                ]);
                $compra->save();

            }

            echo json_encode(['observaciones' => $observations, 'embarque' => $embarque->id]);
        }
        else {

        }
        /* } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back()->withErrors(['msg' => $validator]);
        } */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $animal = \App\Animal::find($id);
            return view('animales.show', compact('animal'));
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal! Si persiste el error favor de consultar servicio técnico')->persistent('Cerrar');
            return back()->withErrors(['msg' => $th]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $animal = \App\Animal::find($id);
            return view('animales.edit', compact('animal'));
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal! Si persiste el error favor de consultar servicio técnico')->persistent('Cerrar');
            return back()->withErrors(['msg' => $th]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request->all());
        $validator = $request->validate([
            'arete' => 'required|max:15|min:10',
            'arete_res' => 'nullable|size:4',
            'tipo_animal_id' => 'required|integer|min:1',
            'persona_id' => 'required|integer|min:1',
            'comentarios' => 'nullable|max:255|min:2',
        ]);

        try {
            $animal = \App\Animal::whereId($request->id)->update($request->except('_token', '_method'));
            alert()->success('Animal editado exitosamente!')->persistent('Cerrar');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back()->withErrors(['msg' => $validator]); //th
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $animal = \App\Animal::whereId($id)->delete();
            alert()->success('Animal eliminado exitosamente!')->persistent('Cerrar');
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
        }

        return back();
    }

    /**
     * Restore the specified resource from deleted.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        try {
            $animal = \App\Animal::withTrashed()->find($request['input'])->restore();
            echo json_encode('success');
        } catch (\Throwable $th) {
            echo json_encode('error');
        }
    }

    /**
     * Remove permanently the specified resource from deleted.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        try {
            $animal = \App\Animal::withTrashed()->find($request['input'])->forceDelete();
            echo json_encode('success');
        } catch (\Throwable $th) {
            echo json_encode('error');
        }
    }
}
