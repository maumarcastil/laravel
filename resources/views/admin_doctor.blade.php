@extends('layouts.base')

@section('title')
    Docotres
@endsection

@section('content')

    <div class="container">
        <div class="row d-flex justify-content-evenly">
            <div class="text-center">
                <h1 class="p-2 text-uppercase">panel de doctores</h1>
            </div>


            <div class="col-md-6 d-flex justify-content-center | ">

                <div class="card shadow p-3 mb-5 bg-body rounded | tm-card">
                    <div class="card-img-top text-center ">
                        <i class="fas fa-hospital-user | icon-card-inicio" alt="..."></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center text-uppercase"> Crear paciente</h5>
                        <div class="d-grid gap-2">
                            <button type="button"
                                class="btn btn-lg btn-outline-primary | d-flex justify-content-center align-items-center"
                                onClick="window.location='{{ route('administrarPaciente') }}'">Ir
                                &nbsp;<i class="fas fa-chevron-circle-right"></i> </button>
                        </div>


                    </div>
                </div>

            </div>


            <div class="col-md-6 d-flex justify-content-center | ">

                <div class="card shadow p-3 mb-5 bg-body rounded | tm-card">
                    <div class="card-img-top text-center ">
                        <i class="fas fa-clipboard-list | icon-card-inicio" alt="..."></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center text-uppercase">administrar Consultas</h5>
                        <div class="d-grid gap-2">
                            <button type="button"
                                class="btn btn-lg btn-outline-primary | d-flex justify-content-center align-items-center"
                                onClick="window.location='{{ route('administrarConsulta') }}'">Ir
                                &nbsp;<i class="fas fa-chevron-circle-right"></i> </button>
                        </div>


                    </div>
                </div>

            </div>


        </div>

    </div>

@endsection

{{-- @if (isset($error) == true)

    <script>
        alert("Ya hay un hospital")

    </script>

@endif --}}
