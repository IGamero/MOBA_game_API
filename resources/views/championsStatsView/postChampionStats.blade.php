@extends('./layout/template')

@section('pageTitle', 'MOBA CRUD | Añadir estadisticas nuevo campeon')

@section('content')

    <div class="card">
        <div class="card-header">
            Añadir Estadisticas
        </div>
        <div class="card-body">
            <div class="card-text">
                <form action="{{ route('championsStats.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="champion_name">Nombre del campeón</label>
                        <input type="text" name="champion_name" id="champion_name" class="form-control" required
                            value="demo_name">
                    </div>

                    <div class="mb-3">
                        <label for="champion_type">Tipo de campeón</label>
                        <select name="champion_type" id="champion_type" class="form-control" required>
                            <option value="" disabled selected>-- Selecciona tipo de campeon --</option>
                            <option value="mele">Mele</option>
                            <option value="tirador">Tirador</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="champion_image">Imagen</label>
                        <input type="file" name="champion_image" id="champion_image" class="form-control-file w-100"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="champion_initial_health">Vida Inicial</label>
                        <input type="number" name="champion_initial_health" id="champion_initial_health" value="0"
                            class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="champion_health_regeneration">Regeneración de Vida</label>
                        <input type="number" name="champion_health_regeneration" id="champion_health_regeneration"
                            value="0" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="champion_initial_resource">Recurso Inicial</label>
                        <input type="text" name="champion_initial_resource" id="champion_initial_resource" value="0_mana"
                            class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="champion_resource_regeneration">Regeneración de Recurso</label>
                        <input type="number" name="champion_resource_regeneration" id="champion_resource_regeneration"
                            value="0" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="champion_armor">Champion Armor</label>
                        <input type="number" name="champion_armor" id="champion_armor" class="form-control" required
                            value="0">
                    </div>

                    <div class="mb-3">
                        <label for="champion_magic_resistance">Resistencia Mágica</label>
                        <input type="number" name="champion_magic_resistance" id="champion_magic_resistance" value="0"
                            class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="champion_physical_attack">Ataque Físico (AD)</label>
                        <input type="number" name="champion_physical_attack" id="champion_physical_attack" value="0"
                            class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="champion_magic_attack">Ataque Mágico (AP)</label>
                        <input type="number" name="champion_magic_attack" id="champion_magic_attack" class="form-control"
                            required value="0">
                    </div>

                    <div class="mb-3">
                        <label for="champion_attack_speed">Velocidad de Ataque</label>
                        <input type="number" name="champion_attack_speed" id="champion_attack_speed" class="form-control"
                            required value="0">
                    </div>

                    <div class="mb-3">
                        <label for="champion_attack_range">Rango de Ataque</label>
                        <input type="number" name="champion_attack_range" id="champion_attack_range" class="form-control"
                            required value="0">
                    </div>

                    <div class="mb-3">
                        <label for="champion_movement_speed">Velocidad de Movimiento</label>
                        <input type="number" name="champion_movement_speed" id="champion_movement_speed" value="0"
                            class="form-control" required>
                    </div>


                    <div class=" mt-3 d-flex justify-content-end ">
                        <a href="{{ route('index') }}" class="btn btn-secondary me-3">
                            <span class="fas fa-undo-alt"></span>
                            Volver
                        </a>
                        <button class="btn btn-primary">
                            <span class="fas fa-user-plus"></span> Crear Estadisticas
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
