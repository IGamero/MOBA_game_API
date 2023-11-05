<?php

namespace App\Http\Controllers;

use App\Models\ChampionsStats;
use Illuminate\Http\Request;
use stdClass;
use GuzzleHttp\Client;


class ChampionsStatsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = ChampionsStats::where('isActive', true)->get();

        return view("./championsStatsView/getChampionsStats", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("./championsStatsView/postChampionStats");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $uuid = uuid_create(UUID_TYPE_RANDOM); // Genera un UUID aleatorio

        $response = new stdClass();

        // Subir imagen si estamos en PROD
        if ($request->hasFile('champion_image')) {
            $image = $request->file('champion_image');

            $storePath = "uploads/images/character_images/" . $request->champion_name;
            $fileName = $request->champion_name . "_image_" . $uuid . "." . $image->getClientOriginalExtension();

            $champion_image_path = $image->storeAs($storePath, $fileName, 'public');

        } else {
            $response->status = 500;
            $response->success = false;
            $response->error = true;
            $response->code = "championStat_ERROR_IMAGE";
            $response->data = new stdClass();
            $response->msg = "No se ha podido subir la imagen";

            return $response;
        }

        if (config('app.env') === 'local') {
            // Subir imagen si estamos en localhost
            $client = new Client();
            $res = $client->request('POST', 'https://api.imgur.com/3/image', [
                'headers' => [
                    'Authorization' => 'Client-ID ' . env('IMGUR_CLIENT_ID'),
                ],
                'form_params' => [
                    'image' => base64_encode(file_get_contents($request->file('champion_image')->path())),
                ],
            ]);

            $responseData = json_decode($res->getBody());

            $champion_image_path = $responseData->data->link;
        }


        $championStats = new ChampionsStats();
        $championStats->champion_id = $request->champion_name . "_" . $uuid;
        $championStats->champion_name = $request->champion_name;
        $request->champion_type == null ? $championStats->champion_type = "ERROR" : $championStats->champion_type = $request->champion_type;
        $championStats->champion_image_path = $champion_image_path;
        $championStats->champion_initial_health = $request->champion_initial_health;
        $championStats->champion_health_regeneration = $request->champion_health_regeneration;
        $championStats->champion_initial_resource = $request->champion_initial_resource;
        $championStats->champion_resource_regeneration = $request->champion_resource_regeneration;
        $championStats->champion_AD = $request->champion_physical_attack;
        $championStats->champion_AP = $request->champion_magic_attack;
        $championStats->champion_armor = $request->champion_armor;
        $championStats->champion_magic_resistance = $request->champion_magic_resistance;
        $championStats->champion_attack_speed = $request->champion_attack_speed;
        $championStats->champion_cooldown = 0;
        $championStats->champion_critical_strike = 0;
        $championStats->champion_movement_speed = $request->champion_movement_speed;
        $championStats->champion_attack_range = $request->champion_attack_range;
        $championStats->isACtive = true;

        try {
            $championStats->save();

            $response->status = 200;
            $response->success = true;
            $response->msg = "Datos subidos correctamente";

        } catch (\Throwable $th) {
            $response->status = 500;
            $response->success = false;
            $response->error = true;
            $response->thowError = $th;
            $response->code = "championStat_ERROR_POST";
            $response->msg = "Ha habido un error al subir los datos. Consulta con el administrador";

        }

        return redirect()->route("championsStats.index")->with("response", $response);
    }

    /**
     * Display the specified resource.
     */
    public function show($champion_id)
    {
        //
        $championStats = ChampionsStats::where('champion_id', $champion_id)->first();

        return view("./championsStatsView/deleteChampionStats", compact("championStats"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($champion_id)
    {
        //
        $championStats = ChampionsStats::where('champion_id', $champion_id)->first();

        return view("./championsStatsView/editChampionStats", compact("championStats"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $champion_id)
    {
        //
        $championStats = ChampionsStats::where('champion_id', $champion_id)->first();

        $response = new stdClass();

        if ($request->hasFile('champion_image')) {
            $image = $request->file('champion_image');

            $storePath = "uploads/images/character_images/" . $request->champion_name;
            $fileName = $request->champion_name . "_image_" . $champion_id . "." . $image->getClientOriginalExtension();

            $champion_image_path = $image->storeAs($storePath, $fileName, 'public');

            if (!$champion_image_path) {
                $response->status = 500;
                $response->success = false;
                $response->error = true;
                $response->code = "championStat_ERROR_IMAGE";
                $response->data = new stdClass();
                $response->msg = "No se ha podido subir la imagen";

                return $response;
            }


            if (config('app.env') === 'local') {
                // Subir imagen si estamos en localhost
                $client = new Client();
                $res = $client->request('POST', 'https://api.imgur.com/3/image', [
                    'headers' => [
                        'Authorization' => 'Client-ID ' . env('IMGUR_CLIENT_ID'),
                    ],
                    'form_params' => [
                        'image' => base64_encode(file_get_contents($request->file('champion_image')->path())),
                    ],
                ]);

                $responseData = json_decode($res->getBody());

                $champion_image_path = $responseData->data->link;
            }

        }

        $request->champion_type == null ? $championStats->champion_type = "ERROR" : $championStats->champion_type = $request->champion_type;
        if ($request->hasFile('champion_image')) {
            $championStats->champion_image_path = $champion_image_path;
        } else {

            $champion_image_path = $championStats->champion_image_path;
        }

        try {
            ChampionsStats::where('champion_id', $champion_id)->update([
                'champion_name' => $request->champion_name,
                'champion_type' => $request->champion_type,
                'champion_image_path' => $champion_image_path,
                'champion_initial_health' => $request->champion_initial_health,
                'champion_health_regeneration' => $request->champion_health_regeneration,
                'champion_initial_resource' => $request->champion_initial_resource,
                'champion_resource_regeneration' => $request->champion_resource_regeneration,
                'champion_AD' => $request->champion_physical_attack,
                'champion_AP' => $request->champion_magic_attack,
                'champion_armor' => $request->champion_armor,
                'champion_magic_resistance' => $request->champion_magic_resistance,
                'champion_attack_speed' => $request->champion_attack_speed,
                'champion_movement_speed' => $request->champion_movement_speed,
            ]);

            $response->status = 200;
            $response->success = true;
            $response->msg = "Datos subidos correctamente";

        } catch (\Throwable $th) {
            $response->status = 500;
            $response->success = false;
            $response->error = true;
            $response->thowError = $th;
            $response->code = "championStat_ERROR_POST";
            $response->msg = "Ha habido un error al subir los datos. Consulta con el administrador";
        }

        return redirect()->route("championsStats.index")->with("response", $response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($champion_id)
    {
        //
        $permanent = false;

        $championStats = ChampionsStats::where('champion_id', $champion_id)->first();

        $response = new stdClass();

        try {
            if ($permanent) {
                $championStats->delete();
            } else {
                ChampionsStats::where('champion_id', $champion_id)->update([
                    'isactive' => 0,
                    'updated_at' => now() // Actualiza la fecha y hora de actualización
                ]);
            }

            $response->status = 200;
            $response->success = true;
            $response->msg = "Datos eliminados correctamente";
            // return $status;
        } catch (\Throwable $th) {
            $response->status = 500;
            $response->success = false;
            $response->error = true;
            $response->thowError = $th;
            $response->code = "championStat_ERROR_DELETE";
            $response->msg = "Ha habido un error al eliminar el campeon. Consulta con el administrador";
            throw $th;
        }

        if ($response->success) {
            return redirect()->route("championsStats.index")->with("response", $response);
            ;
        } else {
            return redirect()->route("championsStats.index")->with("response", $response);
            ;
        }
    }
}
