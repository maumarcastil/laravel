<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{

    public function show(Paciente $paciente)
    {
        $pacientes = Paciente::all();
        $hospitales = Hospital::all();
        #echo($hospitales);
        return view("doctores.pacientes", ["pacientes" => $pacientes, "hospitales" => $hospitales]);
    }


    public function store(Request $request)
    {
        $nuevoPaciente = new Paciente();
        $nuevoPaciente->nombre = $request->txtNombre;
        $nuevoPaciente->eps = $request->txtEps;
        $nuevoPaciente->direccion = $request->txtDireccion;
        $nuevoPaciente->tel = $request->txtTel;
        $nuevoPaciente->nombre_acompañante = $request->txtNombreAcompañante;
        $nuevoPaciente->tel_acompañante = $request->txtTelAcompañante;
        $nuevoPaciente->hospital_id = $request->txtHospitalId;

        $nuevoPaciente->save();

        return redirect()->route("administrarPaciente");
    }

    public function edit(Paciente $paciente)
    {
        //
    }

    public function destroy(Request $request)
    {
        $paciente = Paciente::where("id", $request->id)->delete();
        return redirect()->route("administrarPaciente");
    }
}
