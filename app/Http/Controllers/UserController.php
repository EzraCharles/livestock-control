<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $usuarios = \App\User::all();
            return view('users.index', compact('usuarios'));
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
            'name' => 'required|max:255|min:2',
            'email' => 'required|email|unique:users|max:255|min:4',
            'rol' => 'required|max:255|min:4',
        ]);

        try {
            $user = \App\User::create($request->except('_token', '_method'));
            alert()->success('Usuario creado exitosamente!')->persistent('Cerrar');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back()->withErrors(['msg' => $validator]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user = \App\User::find($id);
            return view('users.show', compact('user'));
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal! Si persiste el error favor de consultar servicio técnico')->persistent('Cerrar');
            return back()->withErrors(['msg' => $th]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request['email'] == \App\User::find($request->id)->email) {
            $validator = $request->validate([
                'name' => 'required|max:255|min:2',
                'rol' => 'required|max:255|min:4',
            ]);
        }
        else{
            $validator = $request->validate([
                'name' => 'required|max:255|min:2',
                'email' => 'required|email|unique:users|max:255|min:4',
                'rol' => 'required|max:255|min:4',
            ]);
        }

        try {
            $user = \App\User::whereId($request->id)->update($request->except('_token', '_method'));
            alert()->success('Usuario editado exitosamente!')->persistent('Cerrar');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
            return back()->withErrors(['msg' => $validator]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = \App\User::whereId($id)->delete();
            alert()->success('Usuario eliminado exitosamente!')->persistent('Cerrar');
        } catch (\Throwable $th) {
            alert()->error('Oops, algo salió mal!')->persistent('Cerrar');
        }

        return back();
    }

    /**
     * Restore the specified resource from deleted.
     *
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        try {
            $persona = \App\User::withTrashed()->find($request['input'])->restore();
            echo json_encode('success');
        } catch (\Throwable $th) {
            echo json_encode('error');
        }
    }

    /**
     * Remove permanently the specified resource from deleted.
     *
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        try {
            $usuario = \App\User::withTrashed()->find($request['input'])->forceDelete();
            echo json_encode('success');
        } catch (\Throwable $th) {
            echo json_encode('error');
        }
    }
}
