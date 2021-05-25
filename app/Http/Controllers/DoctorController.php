<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Hospital;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{

    public function show()
    {
        $hospitales = Hospital::all();
        $doctores = Doctor::all();

        return view("administrar.Doctores", ["hospitales" => $hospitales, "doctores" => $doctores]);
    }



    public function store(Request $request)
    {
        $nuevoDoctor = new Doctor();
        $nuevoDoctor->nombre = $request->txtNombre;
        $nuevoDoctor->dirreccion = $request->txtDireccion;
        $nuevoDoctor->telefono = $request->txtTel;
        $nuevoDoctor->tipo_sangre = $request->txtTipoSangre;
        $nuevoDoctor->experiencia = $request->txtExperiencia;
        $nuevoDoctor->fecha_nacimiento = $request->txtFecha;
        $nuevoDoctor->hospital_id = $request->txtHospitalId;

        $nuevoDoctor->save();

        return redirect()->route("administrarDoctor");
    }

    public function edit(Doctor $doctor)
    {
        //
    }

    public function destroy(Request $request)
    {
        $doctor = Doctor::where("id", $request->id)->delete();
        return redirect()->route("administrarDoctor");
    }
}
