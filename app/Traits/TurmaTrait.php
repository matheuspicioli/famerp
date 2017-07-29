<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 29/07/17
 * Time: 11:12
 */

namespace Famerp\Traits;


trait TurmaTrait
{
    public function getHoraCadastroAttribute(){
        $hora = $this->created_at->hour;
        $minuto = $this->created_at->minute;
        $segundo = $this->created_at->second;
        return "$hora:$minuto:$segundo";
    }
}