<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $personas = \App\Persona::all();
            $tipos = \App\TipoPersona::all();

            return view('personas.index', compact(['personas', 'tipos']));
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
            'email' => 'nullable|email|unique:personas|max:255|min:4',
            'tipo_persona_id' => 'required|integer|min:1',
            'comentarios' => 'nullable|min:2',
        ]);

        try {
            $persona = \App\Persona::create($request->except('_token', '_method'));
            alert()->success('Persona creada exitosamente!')->persistent('Cerrar');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back()->withErrors(['msg' => $validator]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $persona = \App\Persona::find($id);
            return view('personas.show', compact('persona'));
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal! Si persiste el error favor de consultar servicio técnico')->persistent('Cerrar');
            return back()->withErrors(['msg' => $th]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {

        if ($request['email'] == \App\Persona::find($request->id)->email) {
            $validator = $request->validate([
                'nombre' => 'required|max:255|min:2',
                'tipo_persona_id' => 'required|integer|min:1',
                'comentarios' => 'nullable|min:2',
            ]);
        }
        else{
            $validator = $request->validate([
                'nombre' => 'required|max:255|min:2',
                'email' => 'nullable|email|unique:personas|max:255|min:4',
                'tipo_persona_id' => 'required|integer|min:1',
                'comentarios' => 'nullable|min:2',
            ]);
        }

        try {
            $persona = \App\Persona::whereId($request->id)->update($request->except('_token', '_method'));
            alert()->success('Persona editada exitosamente!')->persistent('Cerrar');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back()->withErrors(['msg' => $validator]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $persona = \App\Persona::whereId($id)->delete();
            alert()->success('Persona eliminada exitosamente!')->persistent('Cerrar');
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
        }

        return back();
    }
}
