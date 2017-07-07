<?php

namespace Famerp\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model implements TableInterface
{
    protected $fillable = [
        'Nome', 'NumeroCartaoSUS', 'Sexo', 'DataNascimento',
        'AvaliacaoAlterada', 'Peso', 'Altura'
    ];

    protected $primaryKey = 'PacienteID';
    protected $table = 'Pacientes';

    public function ListasChamadas()
    {
        return $this->hasMany('Famerp\Models\ListaChamada', 'PacienteID');
    }

    public function getDataNascimento()
    {
        $dataNascimento = $this->DataNascimento;
        $novaData = explode('-', $dataNascimento);
        $ano = $novaData[0];
        $mes = $novaData[1];
        $dia = $novaData[2];

        return "$dia/$mes/$ano";
    }

    public function getHoraCadastro(){
        $hora = $this->created_at->hour;
        $minuto = $this->created_at->minute;
        $segundo = $this->created_at->second;
        return "$hora:$minuto:$segundo";
    }

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return [
            '#', 'Nome', 'Data nascimento'
        ];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch ($header){
            case '#':
                return $this->PacienteID;
            case 'Nome':
                return $this->Nome;
            case 'Data nascimento':
                return $this->getDataNascimento();
        }
    }
}
