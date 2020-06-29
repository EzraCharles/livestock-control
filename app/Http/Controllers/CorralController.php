<?php

namespace App\Http\Controllers;

use App\Corral;
use Illuminate\Http\Request;

class CorralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $corrales = \App\Corral::all();
        return view('corrales.index', compact(['corrales']));
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
            'nombre' => 'required|max:255|min:4',
            'comentarios' => 'nullable|max:255|min:4',
        ]);

        try {
            $corral = \App\Corral::create($request->except('_token', '_method'));
            alert()->success('Corral creado exitosamente!')->persistent('Cerrar');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back()->withErrors(['msg' => $validator]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Corral  $corral
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $corral = \App\Corral::find($id);
        return view('corrales.show', compact('corral'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Corral  $corral
     * @return \Illuminate\Http\Response
     */
    public function edit(Corral $corral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Corral  $corral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = $request->validate([
            'nombre' => 'required|max:255|min:4',
            'comentarios' => 'nullable|max:255|min:4',
        ]);

        try {
            $corral = \App\Corral::whereId($request->id)->update($request->except('_token', '_method'));
            alert()->success('Corral editado exitosamente!')->persistent('Cerrar');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back()->withErrors(['msg' => $validator]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Corral  $corral
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $corral = \App\Corral::whereId($id)->delete();
            alert()->success('Corral eliminado exitosamente!')->persistent('Cerrar');
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
        }

        return back();
    }
}
