<?php

namespace Famerp\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model implements TableInterface
{
    protected $fillable = [
        'Nome', 'Prontuario', 'Observacao'
    ];

    protected $appends = ['HoraCadastro'];

    protected $primaryKey = 'TurmaID';
    protected $table = 'Turmas';

    public function Pacientes()
    {
        return $this->hasMany(Paciente::class, 'TurmaID');
    }

    public function getHoraCadastroAttribute(){
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
            '#',
            'Hora do cadastro',
            'Paciente',
            'Prontuário'
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
            case 'Hora do cadastro':
                return $this->getHoraCadastro();
            case 'Paciente':
                return $this->getPaciente();
            case 'Prontuário':
                return $this->Prontuario;
        }
    }
}
