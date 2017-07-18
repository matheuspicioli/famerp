<?php

namespace Famerp\Http\Controllers\PDF;

use PDF;
use Famerp\Models\Turma;
use Famerp\Http\Controllers\Controller;

class PDFController extends Controller
{
    public function pdfListaChamada($id)
    {
        $turma = Turma::find($id);
        $pacientes = $turma->Pacientes;
        $pdf = PDF::loadView('pdf.pdf-lista-chamada', array('pacientes' => $pacientes, 'nomeTurma' => $turma->Nome));
        //return view('pdf.pdf-lista-chamada', array('pacientes' => $pacientes, 'nomeTurma' => $turma->Nome));
        return $pdf->download("lista-chamada-turma-$turma->Nome.pdf");
    }
}