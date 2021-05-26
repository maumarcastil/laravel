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

        return view("doctores.consulta", ["consultas" => $consultas, "doctores" => $doctores, "pacientes" => $pacientes]);
    }


    public function store(Request $request)
    {
        $nuevaConsulta = new consulta();
        $nuevaConsulta->antecedentes = $request->txtAntecedentes;
        $nuevaConsulta->motivos = $request->txtMotivos;
        $nuevaConsulta->diagnostico = $request->txtDiagnostico;
        $nuevaConsulta->doctor_id = $request->txtDoctor;
        $nuevaConsulta->paciente_id = $request->txtPaciente;
        $nuevaConsulta->save();

        return redirect()->route("administrarConsulta");
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
