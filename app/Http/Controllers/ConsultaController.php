<?php

namespace App\Http\Controllers;

use App\Models\consulta;
use App\Models\Doctor;
use App\Models\Paciente;

use Illuminate\Http\Request;

class ConsultaController extends Controller
{

    public function show()
    {
        $consultas = consulta::all();
        $doctores = Doctor::all();
        $pacientes = Paciente::all();
        return view("administrar.Doctores", ["consultas" => $consultas, "doctores" => $doctores, "pacientes" => $pacientes]);
    }


    public function store(Request $request)
    {
        //
    }


    public function edit(consulta $consulta)
    {
        //
    }



    public function destroy(consulta $consulta)
    {
        //
    }
}
