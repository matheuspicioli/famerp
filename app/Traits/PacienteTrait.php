<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 29/07/17
 * Time: 11:10
 */

namespace Famerp\Traits;


trait PacienteTrait
{
    public function getNomeTurmaAttribute()
    {
        return $this->Turma->Nome;
    }

    public function getDataNascimentoPadraoAttribute()
    {
        $dataNascimento = $this->DataNascimento;
        $novaData = explode('-', $dataNascimento);
        $ano = $novaData[0];
        $mes = $novaData[1];
        $dia = $novaData[2];

        return "$dia/$mes/$ano";
    }

    public function getHoraCadastroAttribute(){
        $hora = $this->created_at->hour;
        $minuto = $this->created_at->minute;
        $segundo = $this->created_at->second;
        return "$hora:$minuto:$segundo";
    }
}