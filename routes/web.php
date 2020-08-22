<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Auth::routes();

Route::get('dashboard', 'HomeController@index')->name('dashboard');

Route::group(['middleware' => 'admin'], function () {
    Route::get('eliminados', 'HomeController@eliminados')->name('eliminados')->middleware('admin');

    Route::resource('usuarios', 'UserController')->except(['create', 'edit'])->middleware('admin');
    Route::resource('precios', 'PrecioController')->except(['create', 'edit'])->middleware('admin');
});

Route::resource('personas', 'PersonaController')->except(['create', 'edit']);
Route::resource('diagnosticos', 'DiagnosticoController')->except(['create', 'edit']);
Route::resource('tratamientos', 'TratamientoController')->except(['create', 'edit']);
Route::resource('corrales', 'CorralController')->except(['create', 'edit']);
Route::resource('tipo-reproducciones', 'TipoReproduccionController')->except(['create', 'edit']);
Route::resource('tipo-tratamientos', 'TipoTratamientoController')->except(['create', 'edit']);
Route::resource('tipo-animales', 'TipoAnimalController')->except(['create', 'edit']);
Route::resource('tipo-alimentaciones', 'TipoAlimentacionController')->except(['create', 'edit']);
Route::resource('tipo-personas', 'TipoPersonaController')->except(['create', 'edit']);

Route::resource('formulas', 'FormulaController')->except(['edit'])->middleware('admin');
Route::resource('formulaciones', 'FormulacionController')->only(['update', 'destroy', 'store'])->middleware('admin');

Route::resource('animales', 'AnimalController');
Route::resource('animales', 'AnimalController')->only(['destroy', 'edit'])->middleware('admin'); // missing store.edit

Route::group(['middleware' => 'admin'], function () {
    Route::post('revisar_formula', 'FormulaController@check');
    Route::get('componentes', 'FormulaController@componentes');
    Route::get('getPrecios', 'FormulaController@getPrecios');

    // Delete
    Route::post('eliminar-usuario', 'UserController@delete');
    Route::post('eliminar-precio', 'PrecioController@delete');
    Route::post('eliminar-animal', 'AnimalController@delete');
    Route::post('eliminar-persona', 'PersonaController@delete');
    Route::post('eliminar-diagnostico', 'DiagnosticoController@delete');
    Route::post('eliminar-tratamiento', 'TratamientoController@delete');
    Route::post('eliminar-corral', 'CorralController@delete');
    Route::post('eliminar-formula', 'FormulaController@delete');
    Route::post('eliminar-tipoTratamiento', 'TipoTratamientoController@delete');
    Route::post('eliminar-tipoReproduccion', 'TipoReproduccionController@delete');
    Route::post('eliminar-tipoAnimal', 'TipoAnimalController@delete');
    Route::post('eliminar-tipoPersona', 'TipoPersonaController@delete');
    Route::post('eliminar-tipoAlimentacion', 'TipoAlimentacionController@delete');

    // Restore
    Route::post('recuperar-usuario', 'UserController@restore');
    Route::post('recuperar-precio', 'PrecioController@restore');
    Route::post('recuperar-animal', 'AnimalController@restore');
    Route::post('recuperar-persona', 'PersonaController@restore');
    Route::post('recuperar-diagnostico', 'DiagnosticoController@restore');
    Route::post('recuperar-tratamiento', 'TratamientoController@restore');
    Route::post('recuperar-corral', 'CorralController@restore');
    Route::post('recuperar-formula', 'FormulaController@restore');
    Route::post('recuperar-tipoTratamiento', 'TipoTratamientoController@restore');
    Route::post('recuperar-tipoReproduccion', 'TipoReproduccionController@restore');
    Route::post('recuperar-tipoAnimal', 'TipoAnimalController@restore');
    Route::post('recuperar-tipoPersona', 'TipoPersonaController@restore');
    Route::post('recuperar-tipoAlimentacion', 'TipoAlimentacionController@restore');
});

// MODULES HIGH IMPORTANCE
Route::resource('compras', 'CompraController')->except(['edit'])->middleware('admin');

