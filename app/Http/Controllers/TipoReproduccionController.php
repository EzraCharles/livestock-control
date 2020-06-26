<?php

namespace App\Http\Controllers;

use App\TipoReproduccion;
use Illuminate\Http\Request;

class TipoReproduccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_reproducciones = \App\TipoReproduccion::all();
        return view('tipo-reproducciones.index', compact(['tipo_reproducciones']));
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
     * @param  \App\TipoReproduccion  $tipoReproduccion
     * @return \Illuminate\Http\Response
     */
    public function show(TipoReproduccion $tipoReproduccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoReproduccion  $tipoReproduccion
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoReproduccion $tipoReproduccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoReproduccion  $tipoReproduccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoReproduccion $tipoReproduccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoReproduccion  $tipoReproduccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoReproduccion $tipoReproduccion)
    {
        //
    }
}
