<?php

namespace App\Http\Controllers;

use App\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
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
        $validator = $request->validate([
            'arete' => 'required|max:15|min:10',
            'arete_res' => 'nullable|size:4',
            'tipo_id' => 'required|integer|min:1',
            'persona_id' => 'required|integer|min:1',
            'comentarios' => 'nullable|max:255|min:2',
        ]);

        try {
            $animal = \App\Animal::create($request->except('_token', '_method'));
            alert()->success('Animal creado exitosamente!')->persistent('Cerrar');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back()->withErrors(['msg' => $validator]);
        }
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
}
