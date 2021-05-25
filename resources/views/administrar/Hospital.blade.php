@extends('layouts.base')

@section('title')
    Opciones_Hospital
@endsection

@section('content')

    <div class="container w-1000">

        <div class="text-center text-uppercase mb-4">
            <h1 class="p-4 ">administrar hospital</h1>
        </div>


        {{-- Options --}}
        <div class="pb-3">
            <button type="button" class="btn btn-color" data-bs-toggle="modal" data-bs-target="#crear_hospital">
                Crear hospital
            </button>
        </div>

        {{-- Tables --}}

        @if (count($hospitales) == 0)

            <div class="alert alert-light shadow p-3 bg-body rounded">
                <div class="d-flex flex-row justify-content-between">
                    <div>
                        <h5 class="card-title text-capitalize fz-1">Status</h5>
                        <h6 class="card-subtitle text-muted text-capitalize fz-1-25">No hay hospitales creados</h6>
                    </div>
                </div>
            </div>

        @endif


        @for ($i = 0; $i < count($hospitales); $i++)

            <div class="alert alert-light shadow p-3 bg-body rounded">
                <div class="d-flex flex-row justify-content-between">

                    <div>
                        <h5 class="card-title text-capitalize fz-1">nombre</h5>
                        <h6 class="card-subtitle text-muted text-capitalize fz-1-25">{{ $hospitales[$i]['nombre'] }}</h6>
                    </div>
                    <div>
                        <h5 class="card-title text-capitalize fz-1">Nit</h5>
                        <h6 class="card-subtitle text-muted text-capitalize fz-1-25">{{ $hospitales[$i]['nit'] }}</h6>
                    </div>
                    <div class="d-flex align-content-center">

                        <a href="{{ route('eliminarHospital', ['id' => $hospitales[$i]]) }}"
                            class="icons-options | p-2 d-flex align-items-center btn-borrar">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>

                </div>
            </div>

        @endfor

    </div>




    <!-- Modal crear hospital-->
    <div class="modal fade" id="crear_hospital" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear hospital</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('guadarHospital') }}" method="POST">
                        @method("POST")
                        <div class="mb-3">
                            <label for="Nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="txtHospital" name="txtHospital"
                                aria-describedby="Nombre-clinica" onkeyup="actualizarBtn()">
                        </div>
                        <div class="mb-3">
                            <label for="nit" class="form-label">Nit</label>
                            <input type="text" class="form-control" id="txtNit" name="txtNit" onkeyup="actualizarBtn()">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-color" id="btnEnviarCrear" disabled>Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>




    <script>
        const actualizarBtn = () => {
            txtHospital = document.getElementById("txtHospital").value
            txtNit = document.getElementById("txtNit").value
            btnEnviarCrear = document.getElementById("btnEnviarCrear")

            if (txtNit === "" || txtHospital === "") {
                btnEnviarCrear.disabled = true
            } else {
                btnEnviarCrear.disabled = false
            }
        }

    </script>

@endsection
