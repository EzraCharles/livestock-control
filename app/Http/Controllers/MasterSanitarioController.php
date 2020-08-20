<?php

namespace App\Http\Controllers;

use App\MasterSanitario;
use Illuminate\Http\Request;

class MasterSanitarioController extends Controller
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
     * @param  \App\MasterSanitario  $masterSanitario
     * @return \Illuminate\Http\Response
     */
    public function show(MasterSanitario $masterSanitario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MasterSanitario  $masterSanitario
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterSanitario $masterSanitario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MasterSanitario  $masterSanitario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterSanitario $masterSanitario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MasterSanitario  $masterSanitario
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterSanitario $masterSanitario)
    {
        //
    }
}
