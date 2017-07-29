<?php

namespace Famerp\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Famerp\Traits\PacienteTrait;

class Paciente extends Model implements TableInterface
{
    use PacienteTrait;

    protected $fillable = [
        'Nome', 'NumeroCartaoSUS', 'Sexo', 'DataNascimento',
        'AvaliacaoAlterada', 'Peso', 'Altura', 'TurmaID'
    ];

    protected $appends = ['DataNascimentoPadrao', 'HoraCadastro', 'NomeTurma'];
    protected $primaryKey = 'PacienteID';
    protected $table = 'Pacientes';

    public function Turma()
    {
        return $this->belongsTo(Turma::class, 'TurmaID');
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
                return $this->DataNascimento;
        }
    }
}
