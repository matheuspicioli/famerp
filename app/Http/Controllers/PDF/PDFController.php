<?php

namespace Famerp\Http\Controllers\PDF;

use PDF;
use Famerp\Models\Paciente;
use Famerp\Http\Controllers\Controller;

class PDFController extends Controller
{
    public function pdfListaChamada()
    {
        $pacientes = Paciente::all();
        $pdf = PDF::loadView('pdf.pdf-lista-chamada', array('pacientes' => $pacientes));
        return $pdf->setPaper('a4')->download('lista-chamada.pdf');
    }
}