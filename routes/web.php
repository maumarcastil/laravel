<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HospitalController;


/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    return view('inicio');
})->name("inicio");


/* administrador*/

Route::get('/administrador', function () {
    return view('administrador');
})->name("administrador");




/* hospital */
Route::get('/administrador/hospital', [HospitalController::class, "show"])->name("administrarHospital");
Route::post('/guardar_hospital', [HospitalController::class, "store"])->name("guadarHospital");
Route::get('/eliminar_hospital', [HospitalController::class, "destroy"])->name("eliminarHospital");


/* Doctores */

Route::get('/administrador/doctores', function () {
    return view('administrar.Doctores');
})->name("administrarDoctores");