<?php

namespace Famerp\Http\Controllers\API;

use Famerp\Models\Turma;
use Famerp\Http\Controllers\Controller;

class TurmasAPIController extends Controller
{
    public function index()
    {
        return Turma::all();
    }
}
