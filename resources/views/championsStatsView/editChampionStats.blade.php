@extends('./layout/template')

@section('pageTitle', 'MOBA CRUD | Añadir estadisticas nuevo campeon')

@section('content')

    <div class="card">
        <div class="card-header">
            Añadir Estadisticas
        </div>
        <div class="card-body">
            <div class="card-text">
                <form action="{{ route('championsStats.update', $championStats->champion_id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="champion_name">Nombre del campeón</label>
                        <input type="text" name="champion_name" id="champion_name" class="form-control"
                            value="{{ $championStats->champion_name }}">
                    </div>

                    <div class="mb-3">
                        <label for="champion_type">Tipo de campeón</label>
                        <select name="champion_type" id="champion_type" class="form-control">
                            <option value="mele" {{ $championStats->champion_type === 'mele' ? 'selected' : '' }}>Mele
                            </option>
                            <option value="tirador" {{ $championStats->champion_type === 'tirador' ? 'selected' : '' }}>
                                Tirador</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="champion_image">Imagen</label>
                        <div class="d-flex justify-content-between align-items-center">

                            <input type="file" name="champion_image" id="champion_image" class="form-control-file">
                            <a href="{{ $championStats->champion_image_path ? asset($championStats->champion_image_path) : route('error.4$championStats->4') }}"
                                target="_blank" class="btn btn-primary btn-sm"
                                style="font-size: 15px; padding: 2px 1$championStats->px">Ver
                                imagen</a>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="champion_initial_health">Vida Inicial</label>
                        <input type="number" name="champion_initial_health" id="champion_initial_health"
                            value="{{ $championStats->champion_initial_health }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="champion_health_regeneration">Regeneración de Vida</label>
                        <input type="number" name="champion_health_regeneration" id="champion_health_regeneration"
                            value="{{ $championStats->champion_health_regeneration }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="champion_initial_resource">Recurso Inicial</label>
                        <input type="text" name="champion_initial_resource" id="champion_initial_resource"
                            value="{{ $championStats->champion_initial_resource }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="champion_resource_regeneration">Regeneración de Recurso</label>
                        <input type="number" name="champion_resource_regeneration" id="champion_resource_regeneration"
                            value="{{ $championStats->champion_resource_regeneration }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="champion_armor">Champion Armor</label>
                        <input type="number" name="champion_armor" id="champion_armor" class="form-control"
                            value="{{ $championStats->champion_armor }}">
                    </div>

                    <div class="mb-3">
                        <label for="champion_magic_resistance">Resistencia Mágica</label>
                        <input type="number" name="champion_magic_resistance" id="champion_magic_resistance"
                            value="{{ $championStats->champion_magic_resistance }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="champion_physical_attack">Ataque Físico (AD)</label>
                        <input type="number" name="champion_physical_attack" id="champion_physical_attack"
                            value="{{ $championStats->champion_AD }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="champion_magic_attack">Ataque Mágico (AP)</label>
                        <input type="number" name="champion_magic_attack" id="champion_magic_attack" class="form-control"
                            value="{{ $championStats->champion_AP }}">
                    </div>

                    <div class="mb-3">
                        <label for="champion_attack_speed">Velocidad de Ataque</label>
                        <input type="number" name="champion_attack_speed" id="champion_attack_speed" class="form-control"
                            value="{{ $championStats->champion_attack_speed }}">
                    </div>

                    <div class="mb-3">
                        <label for="champion_attack_range">Rango de Ataque</label>
                        <input type="number" name="champion_attack_range" id="champion_attack_range" class="form-control"
                            value="{{ $championStats->champion_attack_range }}">
                    </div>

                    <div class="mb-3">
                        <label for="champion_movement_speed">Velocidad de Movimiento</label>
                        <input type="number" name="champion_movement_speed" id="champion_movement_speed"
                            value="{{ $championStats->champion_movement_speed }}" class="form-control">
                    </div>


                    <div class=" mt-3 d-flex justify-content-end ">
                        <a href="{{ route('index') }}" class="btn btn-secondary me-3">
                            <span class="fas fa-undo-alt"></span>
                            Volver
                        </a>
                        <button class="btn btn-primary">
                            <span class="fas fa-user-plus"></span> Actualizar Estadísticas
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
