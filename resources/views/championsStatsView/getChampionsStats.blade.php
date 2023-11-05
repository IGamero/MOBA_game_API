@extends('./layout/template')

@section('pageTitle', 'MOBA CRUD | Estadisticas de campeones')


@section('content')

    <div class="card">
        <h5 class="card-header">Estadísticas de campeones</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    @php
                        $post_response = Session::get('response');
                    @endphp

                    @if ($post_response)
                        @if ($post_response->success)
                            <div class="alert alert-success text-center" role="alert">
                                {{ $post_response->msg }}
                            </div>
                        @else
                            <div class="alert alert-danger text-center" role="alert">
                                {{ $post_response->msg }}
                            </div>
                        @endif
                    @endif


                </div>
            </div>
            <h5 class="text-center pt-2 pb-3">Listado campeones</h5>
            <div class="card-text">

                @if ($data->count())
                    <div class="table table-responsive">
                        <table class="table table-sm table-bordered mb-0" style="white-space: nowrap">
                            <thead style="font-size: 10px">
                                <th class="text-center">Nombre del campeón</th>
                                <th class="text-center">Tipo de campeón</th>
                                <th class="text-center">Imagen</th>
                                <th class="text-center">Vida Inicial</th>
                                <th class="text-center">Regeneración de Vida</th>
                                <th class="text-center">Recurso Inicial</th>
                                <th class="text-center">Regeneración de Recurso</th>
                                <th class="text-center">Champion Armor</th>
                                <th class="text-center">Resistencia Mágica</th>
                                <th class="text-center">Ataque Físico (AD)</th>
                                <th class="text-center">Ataque Mágico (AP)</th>
                                <th class="text-center">Velocidad de Ataque</th>
                                <th class="text-center">Rango de Ataque</th>
                                <th class="text-center">Velocidad de Movimiento</th>
                                <th class="text-center">Editar / Eliminar</th>
                            </thead>
                            <tbody class="border-1 ">
                                @foreach ($data as $item)
                                    <tr class="border-bottom-0 ">
                                        <td class="text-center">{{ $item->champion_name }}</td>
                                        <td class="text-center">{{ $item->champion_type }}</td>
                                        {{-- <td class="text-center">{{ $item->champion_image_path }}</td> --}}
                                        <td class="text-center ">
                                            <a href="{{ asset($item->champion_image_path) }}" target="_blank"
                                                class="btn btn-primary btn-sm"
                                                style="font-size: 1<0px; padding: 2px 10px">Ver
                                                imagen</a>
                                        </td>
                                        <td class="text-center">{{ $item->champion_initial_health }}</td>
                                        <td class="text-center">{{ $item->champion_health_regeneration }}</td>
                                        <td class="text-center">
                                            {{ $item->champion_initial_resource == -1 ? '-' : $item->champion_initial_resource }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->champion_resource_regeneration == -1 ? '-' : $item->champion_resource_regeneration }}
                                        </td>
                                        </td>
                                        <td class="text-center">{{ $item->champion_armor }}</td>
                                        <td class="text-center">{{ $item->champion_magic_resistance }}</td>
                                        <td class="text-center">{{ $item->champion_AD }}</td>
                                        <td class="text-center">{{ $item->champion_AP }}</td>
                                        <td class="text-center">{{ $item->champion_attack_speed }}</td>
                                        <td class="text-center">
                                            {{ $item->champion_attack_range == 0 ? 'Melé' : $item->champion_attack_range }}
                                        </td>
                                        <td class="text-center">{{ $item->champion_movement_speed }}</td>
                                        <td class="text-center">
                                            <div class="actions d-flex justify-content-around ">
                                                <form action="{{ route('championsStats.edit', $item->champion_id) }}"
                                                    method="GET">
                                                    <button class="btn btn-warning"
                                                        style="font-size: 10px; padding: 5px 10px">
                                                        <span class="fas fa-user-edit"></span></button>
                                                </form>
                                                <form action="{{ route('championsStats.show', $item->champion_id) }}"
                                                    method="GET">
                                                    <button class="btn btn-danger"
                                                        style="font-size: 10px; padding: 5px 10px">
                                                        <span class="fas fa-user-times"></span></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="card-text text-center">Aun no hay ningun Campeón.</p>
                    <p class="card-text text-center">¡Añade uno!</p>

                @endif

                {{-- <div class="row p-0 m-0">
                    <div class="col-sm-12 p-0 m-0 d-flex justify-content-end">
                        {{ $data->links() }}
                    </div>
                </div> --}}

                <hr>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('index') }}" class="btn btn-secondary me-3">
                        <span class="fas fa-undo-alt"></span>
                        Volver
                    </a>
                    <a href="{{ route('championsStats.create') }}" class="btn btn-primary">
                        <span class="fas fa-user-plus"></span>
                        Añadir nuevo campeon
                    </a>
                </div>
            </div>


        </div>
    </div>

    {{-- <div class="row">
        <h1>Hola desde welcome blade</h1>
        <p>Blade permite generar secciones de codigo html que podran manejarse desde otros archivos extendiendo la
            información</p>
        <a href="{{ route('persons.create') }}">Añadir usuario</a>
    </div> --}}
@endsection
