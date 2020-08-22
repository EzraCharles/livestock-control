<?php

namespace App\Http\Controllers;

use App\Compra;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class CompraController extends Controller
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
        try {
            $tipos = \App\TipoAnimal::all();

            $proveedores = \App\Persona::with(['tipoPersona'=> function ($query) {
                $query->where([
                    ['nombre', '=', 'Proveedor'],
                ]);
            }])->whereHas('tipoPersona', function (Builder $query) {
                $query->where([
                    ['nombre', '=', 'Proveedor'],
                ]);
            })->get();

            $productores = \App\Persona::with(['tipoPersona'=> function ($query) {
                $query->where([
                    ['nombre', '=', 'Productor'],
                ]);
            }])->whereHas('tipoPersona', function (Builder $query) {
                $query->where([
                    ['nombre', '=', 'Productor'],
                ]);
            })->get();

            return view('compras.create', compact(['tipos', 'proveedores', 'productores']));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        //
    }
}
