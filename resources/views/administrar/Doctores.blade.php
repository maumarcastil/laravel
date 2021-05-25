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
        <div class="pb-3">
            <button type="button" class="btn btn-color" data-bs-toggle="modal" data-bs-target="#crear_doctor">
                Crear doctor
            </button>
        </div>

        {{-- Tables --}}
        <div class="alert alert-light shadow p-3 bg-body rounded row">
            <div class="col-10 row gy-2">
                <div class="col-6 col-md-4">
                    <h5 class="card-title fz-1">Nombre completo</h5>
                    <h6 class="card-subtitle text-muted text-capitalize fz-1-25">coomeva s.a</h6>
                </div>
                <div class="col-6 col-md-4">
                    <h5 class="card-title text-capitalize fz-1">dirreción</h5>
                    <h6 class="card-subtitle text-muted text-capitalize fz-1-25">cra 16 # 46-22</h6>
                </div>
                <div class="col-6 col-md-4">
                    <h5 class="card-title text-capitalize fz-1">telefono</h5>
                    <h6 class="card-subtitle text-muted text-capitalize fz-1-25">3653511</h6>
                </div>
                <div class="col-6 col-md-4">
                    <h5 class="card-title fz-1">Tipo de sangre</h5>
                    <h6 class="card-subtitle text-muted text-capitalize fz-1-25">o+</h6>
                </div>
                <div class="col-6 col-md-4">
                    <h5 class="card-title fz-1">Años de experiencia</h5>
                    <h6 class="card-subtitle text-muted text-capitalize fz-1-25">5</h6>
                </div>
                <div class="col-6 col-md-4">
                    <h5 class="card-title fz-1">Fecha de nacimiento</h5>
                    <h6 class="card-subtitle text-muted text-capitalize fz-1-25">16/05/2000</h6>
                </div>

            </div>
            <div class="col-2">
                <div class="h-100 d-flex align-content-center justify-content-center">
                    <a data-bs-toggle="modal" data-bs-target="#editar_doctor"
                        class="icons-options | p-2 d-flex align-items-center">
                        <i class="far fa-edit"></i>
                    </a>

                    <a data-bs-toggle="modal" data-bs-target="#borrar_doctor"
                        class="icons-options | p-2 d-flex align-items-center">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>
            </div>
        </div>


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
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-color">Save changes</button>
                </div>
            </div>
        </div>
    </div>


@endsection
