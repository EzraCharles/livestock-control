<?php

namespace App\Http\Controllers;

use App\Financiero;
use Illuminate\Http\Request;

class FinancieroController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
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
     * @param  \App\Financiero  $financiero
     * @return \Illuminate\Http\Response
     */
    public function show(Financiero $financiero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Financiero  $financiero
     * @return \Illuminate\Http\Response
     */
    public function edit(Financiero $financiero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Financiero  $financiero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Financiero $financiero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Financiero  $financiero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Financiero $financiero)
    {
        //
    }
}
