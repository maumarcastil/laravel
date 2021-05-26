@extends('layouts.base')

@section('title')
    Administrar consultas
@endsection

@section('content')

    <div class="container w-1000">
        <div class="text-center text-uppercase mb-4">
            <h1 class="p-4 ">administrar consultas</h1>
        </div>


        {{-- Options --}}
        <div class="py-3">
            <button type="button" class="btn btn-color" data-bs-toggle="modal" data-bs-target="#crear_paciente">
                Crear consultas
            </button>
            <button type="button" class="btn btn-color" onClick="window.location='{{ route('doctores') }}'">
                Volver
            </button>
        </div>

        {{-- Tables --}}

        {{-- Mensaje si no existen consultas --}}
        @if (count($consultas) == 0)

            <div class="alert alert-light shadow p-3 bg-body rounded">
                <div class="d-flex flex-row justify-content-between">
                    <div>
                        <h5 class="card-title text-capitalize fz-1">Status</h5>
                        <h6 class="card-subtitle text-muted text-capitalize fz-1-25">No hay consultas creadas</h6>
                    </div>
                </div>
            </div>
        @else
            @for ($i = 0; $i < count($consultas); $i++)
                <div class="alert alert-light shadow p-3 bg-body rounded row">
                    <div class="col-10 row gy-2">
                        <div class="col-6 col-md-4">
                            <h5 class="card-title fz-1">Doctor</h5>
                            <h6 class="card-subtitle text-muted text-capitalize fz-1-25">
                                @foreach ($doctores as $doctor)
                                    @if ($doctor->id == $consultas[$i]['doctor_id'])
                                        {{ $doctor->nombre }}
                                    @endif
                                @endforeach
                            </h6>
                        </div>
                        <div class="col-6 col-md-4">
                            <h5 class="card-title fz-1">Paciente</h5>
                            <h6 class="card-subtitle text-muted text-capitalize fz-1-25">
                                @foreach ($pacientes as $paciente)
                                    @if ($paciente->id == $consultas[$i]['paciente_id'])
                                        {{ $paciente->nombre }}
                                    @endif
                                @endforeach
                            </h6>
                        </div>
                        <div class="col-6 col-md-4">
                            <h5 class="card-title fz-1">Antecedentes</h5>
                            <h6 class="card-subtitle text-muted text-capitalize fz-1-25">
                                {{ $consultas[$i]['antecedentes'] }}
                            </h6>
                        </div>
                        <div class="col-6 col-md-4">
                            <h5 class="card-title text-capitalize fz-1">Motivos</h5>
                            <h6 class="card-subtitle text-muted text-capitalize fz-1-25">
                                {{ $consultas[$i]['motivos'] }}
                            </h6>
                        </div>
                        <div class="col-6 col-md-4">
                            <h5 class="card-title text-capitalize fz-1">Diagnostico</h5>
                            <h6 class="card-subtitle text-muted text-capitalize fz-1-25">
                                {{ $consultas[$i]['diagnostico'] }}
                            </h6>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="h-100 d-flex align-content-center justify-content-center">
                            {{-- opciones eliminar y editar --}}
                        </div>
                    </div>
                </div>
            @endfor
        @endif


    </div>

    <!-- Modal crear hospital-->
    <div class="modal fade" id="crear_paciente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear consulta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('guadarConsulta') }}" method="POST">
                        @method("POST")


                        <div class="mb-3">
                            <label for="Nombre" class="form-label">Seleccione el doctor</label>
                            <select class="form-select" aria-label="Default select example" id="txtDoctor" name="txtDoctor"
                                onchange="actualizarBtn()">
                                <option value="" selected>Seleccione una opcion</option>
                                @foreach ($doctores as $doctor)
                                    <option value="{{ $doctor['id'] }}">{{ $doctor['nombre'] }}</option>
                                @endforeach

                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="Nombre" class="form-label">Seleccione el Paciente</label>
                            <select class="form-select" aria-label="Default select example" id="txtPaciente"
                                name="txtPaciente" onchange="actualizarBtn()">
                                <option value="" selected>Seleccione una opcion</option>
                                @foreach ($pacientes as $paciente)
                                    <option value="{{ $paciente['id'] }}">{{ $paciente['nombre'] }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkAntecedentes"
                                onChange="tieneAntecedentes()">
                            <label class="form-check-label" for="flexCheckDefault">
                                Tiene antecedentes?
                            </label>
                        </div>


                        <div class="mb-3">
                            <label for="nit" class="form-label">Antecedentes</label>
                            <input type="tel" class="form-control" id="txtAntecedentes" name="txtAntecedentes"
                                onkeyup="actualizarBtn()" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="nit" class="form-label">Motivos</label>
                            <input type="text" class="form-control" id="txtMotivos" name="txtMotivos"
                                onkeyup="actualizarBtn()">
                        </div>
                        <div class="mb-3">
                            <label for="nit" class="form-label">Diagnostico</label>
                            <input type="tel" class="form-control" id="txtDiagnostico" name="txtDiagnostico"
                                onkeyup="actualizarBtn()">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-color" id="btnEnviar" disabled>Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const actualizarBtn = () => {
            txtDoctor = document.getElementById("txtDoctor").value
            txtPaciente = document.getElementById("txtPaciente").value
            txtAntecedentes = document.getElementById("txtAntecedentes").value
            txtMotivos = document.getElementById("txtMotivos").value
            txtDiagnostico = document.getElementById("txtDiagnostico").value

            btnEnviar = document.getElementById("btnEnviar")

            if (txtDoctor === "" || txtPaciente === "" || txtMotivos === "" ||
                txtDiagnostico === "") {

                btnEnviar.disabled = true
            } else {
                btnEnviar.disabled = false
            }
        }


        const tieneAntecedentes = () => {
            check = document.getElementById("checkAntecedentes").checked;
            txtAntecedentes = document.getElementById("txtAntecedentes")

            if (check === true) {
                txtAntecedentes.disabled = false
            } else {
                txtAntecedentes.disabled = true
            }

        }

    </script>

@endsection
