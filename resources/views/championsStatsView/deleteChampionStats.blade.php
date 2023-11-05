@extends('layout/template')

@section('pageTitle', 'Eliminar un Campeon')

@section('content')
    <div class="card mt-5">
        <div class="card-header">
            Eliminar un registro
        </div>
        <div class="card-body">
            <div class="card-text">
                <div class="alert alert-danger" role="alert">
                    ¿Estas seguro que quieres eliminar este campeón?
                </div>
                <div class="table table-responsive">
                    <table class="table table-sm table-hover table-bordered">
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
                        </thead>
                        <tbody>
                            <td class="text-center">{{ $championStats->champion_name }}</td>
                            <td class="text-center">{{ $championStats->champion_type }}</td>
                            {{-- <td class="text-center">{{ $championStats->champion_image_path }}</td> --}}
                            <td class="text-center ">
                                <a href="{{ asset($championStats->champion_image_path) }}" target="_blank"
                                    class="btn btn-primary btn-sm" style="font-size: 10px; padding: 2px 10px">Ver
                                    imagen
                                </a>
                            </td>
                            <td class="text-center">{{ $championStats->champion_initial_health }}</td>
                            <td class="text-center">{{ $championStats->champion_health_regeneration }}</td>
                            <td class="text-center">
                                {{ $championStats->champion_initial_resource == -1 ? '-' : $championStats->champion_initial_resource }}</td>
                            <td class="text-center">
                                {{ $championStats->champion_resource_regeneration == -1 ? '-' : $championStats->champion_resource_regeneration }}
                            </td>
                            </td>
                            <td class="text-center">{{ $championStats->champion_armor }}</td>
                            <td class="text-center">{{ $championStats->champion_magic_resistance }}</td>
                            <td class="text-center">{{ $championStats->champion_AD }}</td>
                            <td class="text-center">{{ $championStats->champion_AP }}</td>
                            <td class="text-center">{{ $championStats->champion_attack_speed }}</td>
                            <td class="text-center">{{ $championStats->champion_attack_range == 0 ? 'Melé' : $championStats->champion_attack_range }}
                            </td>
                            <td class="text-center">{{ $championStats->champion_movement_speed }}</td>
                        </tbody>
                    </table>
                </div>
                <hr>
                {{-- <form action="{{ route('persons.destroy', $person->id) }}" method="POST"> --}}
                <form action="{{ route('championsStats.destroy', $championStats->champion_id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class=" mt-3 d-flex justify-content-end ">
                        <a href="{{ route('championsStats.index') }}" class="btn btn-secondary me-3">
                            <span class="fas fa-undo-alt"></span> Volver
                        </a>
                        <button class="btn btn-danger ">
                            <span class="fas fa-user-times"></span> Eliminar registro
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
