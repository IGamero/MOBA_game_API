<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    //
    public function show404()
    {
        return view('errors.404'); // Nombre de la vista personalizada
    }
}
