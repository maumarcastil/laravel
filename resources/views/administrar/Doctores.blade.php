@extends('layouts.base')

@section('title')
    Administrar doctores
@endsection

@section('content')

    <div class="container w-1000">
        <div class="text-center text-uppercase mb-4">
            <h1 class="p-4 ">administrar doctores</h1>
        </div>


        {{-- Options --}}
        {{-- onClick="window.location='{{ route('doctores') }}'" --}}
        <div class="pb-3">
            <button type="button" class="btn btn-color" data-bs-toggle="modal" data-bs-target="#crear_doctor">
                Crear doctor
            </button>
            <button type="button" class="btn btn-color" onClick="window.location='{{ route('administrador') }}'">
                Volver
            </button>
        </div>

        {{-- Tables --}}

        {{-- Mensaje si no existen doctores --}}
        @if (count($doctores) == 0)

            <div class="alert alert-light shadow p-3 bg-body rounded">
                <div class="d-flex flex-row justify-content-between">
                    <div>
                        <h5 class="card-title text-capitalize fz-1">Status</h5>
                        <h6 class="card-subtitle text-muted text-capitalize fz-1-25">No hay hospitales creados</h6>
                    </div>
                </div>
            </div>

        @else



            @for ($i = 0; $i < count($doctores); $i++)
                <div class="alert alert-light shadow p-3 bg-body rounded row">
                    <div class="col-10 row gy-2">
                        <div class="col-6 col-md-4">
                            <h5 class="card-title fz-1">Nombre completo</h5>
                            <h6 class="card-subtitle text-muted text-capitalize fz-1-25">{{ $doctores[$i]['nombre'] }}
                            </h6>
                        </div>
                        <div class="col-6 col-md-4">
                            <h5 class="card-title text-capitalize fz-1">dirreción</h5>
                            <h6 class="card-subtitle text-muted text-capitalize fz-1-25">{{ $doctores[$i]['dirreccion'] }}
                            </h6>
                        </div>
                        <div class="col-6 col-md-4">
                            <h5 class="card-title text-capitalize fz-1">telefono</h5>
                            <h6 class="card-subtitle text-muted text-capitalize fz-1-25">{{ $doctores[$i]['telefono'] }}
                            </h6>
                        </div>
                        <div class="col-6 col-md-4">
                            <h5 class="card-title fz-1">Tipo de sangre</h5>
                            <h6 class="card-subtitle text-muted text-capitalize fz-1-25">
                                {{ $doctores[$i]['tipo_sangre'] }}</h6>
                        </div>
                        <div class="col-6 col-md-4">
                            <h5 class="card-title fz-1">Años de experiencia</h5>
                            <h6 class="card-subtitle text-muted text-capitalize fz-1-25">
                                {{ $doctores[$i]['experiencia'] }}</h6>
                        </div>
                        <div class="col-6 col-md-4">
                            <h5 class="card-title fz-1">Fecha de nacimiento</h5>
                            <h6 class="card-subtitle text-muted text-capitalize fz-1-25">
                                {{ $doctores[$i]['fecha_nacimiento'] }}</h6>
                        </div>

                    </div>
                    <div class="col-2">
                        <div class="h-100 d-flex align-content-center justify-content-center">
                            <a data-bs-toggle="modal" data-bs-target="#editar_doctor"
                                class="icons-options | p-2 d-flex align-items-center">
                                <i class="far fa-edit"></i>
                            </a>

                            <a href="{{ route('eliminarDoctor', ['id' => $doctores[$i]]) }}" class=" icons-options | p-2
                                    d-flex align-items-center">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endfor


        @endif


    </div>



    <!-- Modal crear hospital-->
    <div class="modal fade" id="crear_doctor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear doctor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('guadarDoctor') }}" method="POST">
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
                            <label for="nit" class="form-label">Dirreccion</label>
                            <input type="text" class="form-control" id="txtDireccion" name="txtDireccion"
                                onkeyup="actualizarBtn()">
                        </div>
                        <div class="mb-3">
                            <label for="nit" class="form-label">Telefono</label>
                            <input type="tel" class="form-control" id="txtTel" name="txtTel" onkeyup="actualizarBtn()">
                        </div>
                        <div class="mb-3">
                            <label for="nit" class="form-label">Tipo de sangre</label>
                            <input type="text" class="form-control" id="txtTipoSangre" name="txtTipoSangre"
                                onkeyup="actualizarBtn()">
                        </div>
                        <div class="mb-3">
                            <label for="nit" class="form-label">Años de experiencia</label>
                            <input type="text" class="form-control" id="txtExperiencia" name="txtExperiencia"
                                onkeyup="actualizarBtn()">
                        </div>
                        <div class="mb-3">
                            <label for="nit" class="form-label">Fecha de nacimiento(YYYY-MM-DD)</label>
                            <input type="text" class="form-control" id="txtFecha" name="txtFecha" onkeyup="actualizarBtn()">
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
            txtDireccion = document.getElementById("txtDireccion").value
            txtTel = document.getElementById("txtTel").value
            txtTipoSangre = document.getElementById("txtTipoSangre").value
            txtExperiencia = document.getElementById("txtExperiencia").value
            txtFecha = document.getElementById("txtFecha").value
            btnEnviar = document.getElementById("btnEnviar")

            if (txtHospitalId === "" || txtNombre === "" || txtDireccion === "" || txtTel === "" || txtTipoSangre ===
                "" ||
                txtExperiencia === "" || txtFecha === "") {
                btnEnviar.disabled = true
            } else {
                btnEnviar.disabled = false
            }
        }

    </script>

@endsection
