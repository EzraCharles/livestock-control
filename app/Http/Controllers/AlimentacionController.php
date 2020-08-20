<?php

namespace App\Http\Controllers;

use App\Alimentacion;
use Illuminate\Http\Request;

class AlimentacionController extends Controller
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
     * @param  \App\Alimentacion  $alimentacion
     * @return \Illuminate\Http\Response
     */
    public function show(Alimentacion $alimentacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alimentacion  $alimentacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Alimentacion $alimentacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alimentacion  $alimentacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alimentacion $alimentacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alimentacion  $alimentacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alimentacion $alimentacion)
    {
        //
    }
}
