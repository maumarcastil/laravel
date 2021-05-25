@extends('layouts.base')

@section('title')
    Inicio
@endsection





@section('content')

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="text-center">
                <h1 class="p-2 text-uppercase">Opciones de inicio</h1>
            </div>

            <div class="col-md-6 d-flex justify-content-center | ">

                <div class="card shadow p-3 mb-5 bg-body rounded | tm-card">
                    <div class="card-img-top text-center ">
                        <i class="fas fa-user-cog | icon-card-inicio" alt="..."></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center text-uppercase">Administrador</h5>
                        <div class="d-grid gap-2">
                            <button type="button"
                                class="btn btn-lg btn-outline-primary | d-flex justify-content-center align-items-center"
                                onClick="window.location='{{ route('administrador') }}'">Ir
                                &nbsp;<i class="fas fa-chevron-circle-right"></i> </button>
                        </div>


                    </div>
                </div>

            </div>

            <div class="col-md-6 d-flex justify-content-center |">

                <div class="card shadow p-3 mb-5 bg-body rounded | tm-card">
                    <i class="fas fa-user-md card-img-top text-center | icon-card-inicio" alt="..."></i>
                    <div class="card-body">
                        <h5 class="card-title text-center text-uppercase">Doctores</h5>
                        <div class="d-grid gap-2">
                            <button type="button"
                                class="btn btn-lg btn-outline-primary | d-flex justify-content-center align-items-center">Ir
                                &nbsp;<i class="fas fa-chevron-circle-right"></i> </button>
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </div>



@stop
