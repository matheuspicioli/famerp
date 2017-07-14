<?php

namespace Famerp\Http\Controllers\API;

use Famerp\Models\ListaChamada;
use Famerp\Http\Controllers\Controller;

class ListasChamadasAPIController extends Controller
{
    public function index()
    {
        return ListaChamada::all();
    }
}
