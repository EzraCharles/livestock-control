<?php

namespace App\Http\Controllers;

use App\Reproduccion;
use Illuminate\Http\Request;

class ReproduccionController extends Controller
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
     * @param  \App\Reproduccion  $reproduccion
     * @return \Illuminate\Http\Response
     */
    public function show(Reproduccion $reproduccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reproduccion  $reproduccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Reproduccion $reproduccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reproduccion  $reproduccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reproduccion $reproduccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reproduccion  $reproduccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reproduccion $reproduccion)
    {
        //
    }
}
