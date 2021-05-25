<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PacienteController;


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
Route::get('/administrador/doctor', [DoctorController::class, "show"])->name("administrarDoctor");
Route::post('/guardar_doctor', [DoctorController::class, "store"])->name("guadarDoctor");
Route::get('/eliminar_doctor', [DoctorController::class, "destroy"])->name("eliminarDoctor");


/* Admin doctores */
Route::get('/doctores', function () {
    return view('admin_doctor');
})->name("doctores");
/* administrar paciente */
Route::get('/doctores/paciente', [PacienteController::class, "show"])->name("administrarPaciente");
Route::post('/guardar_paciente', [PacienteController::class, "store"])->name("guadarPaciente");
Route::get('/eliminar_paciente', [PacienteController::class, "destroy"])->name("eliminarPaciente");
/* administrar consultas */


