<?php

namespace Famerp\Http\Controllers\API;

use Famerp\Models\Paciente;
use Famerp\Http\Controllers\Controller;

class PacientesAPIController extends Controller
{
    public function index()
    {
        return Paciente::all();
    }
}
