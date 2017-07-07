<?php

namespace Famerp\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class ListaChamada extends Model implements TableInterface
{
    protected $fillable = [
        'ID', 'Proc', 'CID', 'Prontuario',
        'Observacao', 'PacienteID'
    ];

    //protected $dateFormat = 'U';

    protected $primaryKey = 'ListaChamadaID';
    protected $table = 'ListaChamadas';

    public function Paciente()
    {
        return $this->belongsTo('Famerp\Models\Paciente', 'PacienteID');
    }

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return [
            '#',
            'Horas',
            'Paciente',
            'Prontuário',
            'ID',
            'CID'
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
                return $this->ListaChamadaID;
            case 'Horas':
                return $this->getHoraCadastro();
            case 'Paciente':
                return $this->getPaciente();
            case 'Prontuário':
                return $this->Prontuario;
            case 'ID':
                return $this->ID;
            case 'CID':
                return $this->CID;
        }
    }

    public function getHoraCadastro(){
        $hora = $this->created_at->hour;
        $minuto = $this->created_at->minute;
        $segundo = $this->created_at->second;
        return "$hora:$minuto:$segundo";
    }

    public function getPaciente(){
        $lista = ListaChamada::find($this->ListaChamadaID);
        return $lista->Paciente->Nome;
    }
}
