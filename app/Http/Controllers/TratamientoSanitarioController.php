<?php

namespace App\Http\Controllers;

use App\TratamientoSanitario;
use Illuminate\Http\Request;

class TratamientoSanitarioController extends Controller
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
     * @param  \App\TratamientoSanitario  $tratamientoSanitario
     * @return \Illuminate\Http\Response
     */
    public function show(TratamientoSanitario $tratamientoSanitario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TratamientoSanitario  $tratamientoSanitario
     * @return \Illuminate\Http\Response
     */
    public function edit(TratamientoSanitario $tratamientoSanitario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TratamientoSanitario  $tratamientoSanitario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TratamientoSanitario $tratamientoSanitario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TratamientoSanitario  $tratamientoSanitario
     * @return \Illuminate\Http\Response
     */
    public function destroy(TratamientoSanitario $tratamientoSanitario)
    {
        //
    }
}
