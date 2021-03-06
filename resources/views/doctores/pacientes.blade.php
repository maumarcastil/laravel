@extends('layouts.base')

@section('title')
    Administrar pacientes
@endsection

@section('content')

    <div class="container w-1000">
        <div class="text-center text-uppercase mb-4">
            <h1 class="p-4 ">administrar Pacientes</h1>
        </div>


        {{-- Options --}}
        <div class="py-3">
            <button type="button" class="btn btn-color" data-bs-toggle="modal" data-bs-target="#crear_paciente">
                Crear paciente
            </button>
            <button type="button" class="btn btn-color" onClick="window.location='{{ route('doctores') }}'">
                Volver
            </button>
        </div>

        {{-- Tables --}}

        {{-- Mensaje si no existen pacientes --}}
        @if (count($pacientes) == 0)

            <div class="alert alert-light shadow p-3 bg-body rounded">
                <div class="d-flex flex-row justify-content-between">
                    <div>
                        <h5 class="card-title text-capitalize fz-1">Status</h5>
                        <h6 class="card-subtitle text-muted text-capitalize fz-1-25">No hay pacientes creados</h6>
                    </div>
                </div>
            </div>
        @else



            @for ($i = 0; $i < count($pacientes); $i++)
                <div class="alert alert-light shadow p-3 bg-body rounded row">
                    <div class="col-10 row gy-2">
                        <div class="col-6 col-md-4">
                            <h5 class="card-title fz-1">Nombre completo</h5>
                            <h6 class="card-subtitle text-muted text-capitalize fz-1-25">{{ $pacientes[$i]['nombre'] }}
                            </h6>
                        </div>
                        <div class="col-6 col-md-4">
                            <h5 class="card-title text-capitalize fz-1">Eps</h5>
                            <h6 class="card-subtitle text-muted text-capitalize fz-1-25">
                                {{ $pacientes[$i]['eps'] }}
                            </h6>
                        </div>
                        <div class="col-6 col-md-4">
                            <h5 class="card-title text-capitalize fz-1">Direccion</h5>
                            <h6 class="card-subtitle text-muted text-capitalize fz-1-25">{{ $pacientes[$i]['direccion'] }}
                            </h6>
                        </div>
                        <div class="col-6 col-md-4">
                            <h5 class="card-title fz-1">Telefono</h5>
                            <h6 class="card-subtitle text-muted text-capitalize fz-1-25">
                                {{ $pacientes[$i]['tel'] }}</h6>
                        </div>
                        <div class="col-6 col-md-4">
                            <h5 class="card-title fz-1">Nombre acompa??ante</h5>
                            <h6 class="card-subtitle text-muted text-capitalize fz-1-25">
                                {{ $pacientes[$i]['nombre_acompa??ante'] }}</h6>
                        </div>
                        <div class="col-6 col-md-4">
                            <h5 class="card-title fz-1">Tel acompa??ante</h5>
                            <h6 class="card-subtitle text-muted text-capitalize fz-1-25">
                                {{ $pacientes[$i]['tel_acompa??ante'] }}</h6>
                        </div>

                    </div>
                    <div class="col-2">
                        <div class="h-100 d-flex align-content-center justify-content-center">
                            <a data-bs-toggle="modal" data-bs-target="#editar_doctor"
                                class="icons-options | p-2 d-flex align-items-center">
                                <i class="far fa-edit"></i>
                            </a>

                            <a href="{{ route('eliminarPaciente', ['id' => $pacientes[$i]]) }}"
                                class=" icons-options | p-2 d-flex align-items-center">
                                <i class="fas fa-trash-alt"></i>
                            </a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Crear paciente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('guadarPaciente') }}" method="POST">
                        @method("POST")

                        <div class="mb-3">
                            <h5 class="card-title fz-1">Hospital a afiliar</h5>
                            <select class="form-select" aria-label="Default select example" id="txtHospitalId"
                                name="txtHospitalId" onchange="actualizarBtn()">
                                <option value="" selected>Seleccione una opcion</option>
                                @foreach ($hospitales as $hospital)
                                    <option value="{{ $hospital['id'] }}">{{ $hospital['nombre'] }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Nombre" class="form-label">Nombre completo</label>
                            <input type="text" class="form-control" id="txtNombre" name="txtNombre"
                                aria-describedby="Nombre-clinica" onkeyup="actualizarBtn()">
                        </div>
                        <div class="mb-3">
                            <label for="nit" class="form-label">Eps</label>
                            <select class="form-select" aria-label="Default select example" id="txtEps" name="txtEps"
                                onchange="actualizarBtn()">
                                <option value="" selected>Seleccione una opcion</option>
                                <option value="sura">Sura</option>
                                <option value="coomeva">Coomeva</option>
                                <option value="susalud">Susalud</option>
                                <option value="cafesalud">Cafesalud</option>
                                <option value="viva1a">viva1a</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nit" class="form-label">Direccion</label>
                            <input type="text" class="form-control" id="txtDireccion" name="txtDireccion"
                                onkeyup="actualizarBtn()">
                        </div>
                        <div class="mb-3">
                            <label for="nit" class="form-label">Telefono</label>
                            <input type="tel" class="form-control" id="txtTel" name="txtTel" onkeyup="actualizarBtn()">
                        </div>
                        <div class="mb-3">
                            <label for="nit" class="form-label">Nombre acompa??ante</label>
                            <input type="text" class="form-control" id="txtNombreAcompa??ante" name="txtNombreAcompa??ante"
                                onkeyup="actualizarBtn()">
                        </div>
                        <div class="mb-3">
                            <label for="nit" class="form-label">Telefono acompa??ante</label>
                            <input type="tel" class="form-control" id="txtTelAcompa??ante" name="txtTelAcompa??ante"
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
            txtHospitalId = document.getElementById("txtHospitalId").value
            txtNombre = document.getElementById("txtNombre").value
            txtEps = document.getElementById("txtEps").value
            txtDireccion = document.getElementById("txtDireccion").value
            txtTel = document.getElementById("txtTel").value
            txtNombreAcompa??ante = document.getElementById("txtNombreAcompa??ante").value
            txtTelAcompa??ante = document.getElementById("txtTelAcompa??ante").value
            btnEnviar = document.getElementById("btnEnviar")

            if (txtHospitalId === "" || txtNombre === "" || txtEps === "" || txtDireccion === "" || txtTel === "") {

                btnEnviar.disabled = true
            } else {
                btnEnviar.disabled = false
            }
        }

    </script>

@endsection
