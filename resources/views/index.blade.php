@extends('../layout/template')

@section('pageTitle', 'MODA CRUD | Bienvenido')

@section('content')

    <style>
        .card-custom-size {
            max-width: 320px;
        }
    </style>

    <div class="card text-center ">
        <h5 class="card-header">¿Qué quieres hacer?</h5>
        <h5 class="card-title mt-3">Campeones</h5>
        <p class="card-text  px-5">Aquí podras añadir un nuevo campeon o consultar la información de los campeones
            disponibles.</p>
        <div class="card-body">
            <div class="d-flex justify-content-around flex-md-row flex-column">
                <div class="champ-containter py-1 px-3">
                    <h5 class="card-title">Estadisticas</h5>
                    <p class="card-text px-1">Aquí podrás ingresar las estadísticas de cada campeón, como su vida máxima,
                        maná,
                        daño físico y mágico, entre otros
                    </p>
                    <a href="{{ route('championsStats.create') }}" class="btn btn-primary mx-2 my-1">Añadir Estadisticas</a>
                    <a href="{{ route('championsStats.index') }}" class="btn btn-success mx-2 my-1">Consultar
                        Estadisticas</a>
                </div>
                <div class="champ-containter mt-3 m-md-0 py-1 px-5">
                    <h5 class="card-title">Descripciones</h5>
                    <p class="card-text px-1">Aquí podrás ingresar la descripción del campeón, como la región de la que
                        procede, o el título que tiene asignado.
                    </p>
                    <a href="#" class="btn btn-primary mx-2 my-1">Añadir Descripción</a>
                    <a href="#" class="btn btn-success mx-2 my-1">Consultar Descripciones</a>
                </div>
            </div>
        </div>
        <hr>
        <h5 class="card-title mt-3">Habilidades</h5>
        <p class="card-text px-5">Aquí podrás añadir las habilidades de los campeones o consultar todas las habilidades
            según
            sean habilidad pasiva, habilidad 1, habilidad 2, habilidad 3 o habilidad definitiva.
        </p>
        <div class="card-body">
            <div class="d-flex justify-content-around flex-wrap  flex-md-row flex-column">
                <div class="row d-flex justify-content-center">
                    <div class="champ-containter py-1 px-3 pb-5  card-custom-size">
                        <h5 class="card-title">Pasiva</h5>
                        <p class="card-text px-1">Aquí podrás ingresar o consultar la champion_description y estadisticas de las
                            habilidades pasivas
                        </p>
                        <a href="#" class="btn btn-primary mx-2 my-1">Añadir Pasiva</a>
                        <a href="#" class="btn btn-success mx-2 my-1">Consultar Pasivas</a>
                    </div>
                </div>

                <div class="row d-flex justify-content-center ">
                    <div class="champ-containter py-1 px-3 pb-5  card-custom-size">
                        <h5 class="card-title">Habilidad 1</h5>
                        <p class="card-text px-1">Aquí podrás ingresar o consultar la champion_description y estadisticas de las
                            habilidades 1
                        </p>
                        <a href="#" class="btn btn-primary mx-2 my-1">Añadir Habilidad 1</a>
                        <a href="#" class="btn btn-success mx-2 my-1">Consultar Habilidades 1</a>
                    </div>

                    <div class="champ-containter py-1 px-3 pb-5  card-custom-size">
                        <h5 class="card-title">Habilidad 2</h5>
                        <p class="card-text px-1">Aquí podrás ingresar o consultar la champion_description y estadisticas de las
                            habilidades 2
                        </p>
                        <a href="#" class="btn btn-primary mx-2 my-1">Añadir Habilidad 1</a>
                        <a href="#" class="btn btn-success mx-2 my-1">Consultar Habilidades 2</a>
                    </div>

                    <div class="champ-containter py-1 px-3 pb-5  card-custom-size">
                        <h5 class="card-title">Habilidad 3</h5>
                        <p class="card-text px-1">Aquí podrás ingresar o consultar la champion_description y estadisticas de las
                            habilidades 3
                        </p>
                        <a href="#" class="btn btn-primary mx-2 my-1">Añadir Habilidad 3</a>
                        <a href="#" class="btn btn-success mx-2 my-1">Consultar Habilidades 3</a>
                    </div>

                    <div class="champ-containter py-1 px-3 pb-5  card-custom-size">
                        <h5 class="card-title">Habilidad Definitiva</h5>
                        <p class="card-text px-1">Aquí podrás ingresar o consultar la champion_description y estadisticas de las
                            habilidades definitivas
                        </p>
                        <a href="#" class="btn btn-primary mx-2 my-1">Añadir Habilidad Definitiva</a>
                        <a href="#" class="btn btn-success mx-2 my-1">Consultar Habilidades Definitivas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
