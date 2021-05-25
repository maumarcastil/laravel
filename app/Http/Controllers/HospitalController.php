<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{

    /* mostrar todos los hospitales */
    public function show()
    {
        $hospitales = Hospital::all();
        #echo($hospitales);
        return view("administrar.hospital", ["hospitales" => $hospitales]);
    }


    /* guardando hospital */
    public function store(Request $request)
    {
        $cantidad = Hospital::all()->count();

        if ($cantidad < 1) {
            $nuevoHospital = new Hospital();
            $nuevoHospital->nombre = $request->txtHospital;
            $nuevoHospital->nit = $request->txtNit;
            $nuevoHospital->save();

            return redirect()->route("administrarHospital");
        } else {
            return redirect()->route("administrador");
        }
    }

    public function destroy(Request $request)
    {
        $clinica = Hospital::where("id", $request->id)->delete();
        return redirect()->route("administrarHospital");
    }
}
