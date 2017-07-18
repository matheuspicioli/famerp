<?php

namespace Famerp\Forms;

use Famerp\Models\Paciente;
use Kris\LaravelFormBuilder\Form;

class TurmaForm extends Form
{
    public function buildForm()
    {
        $this
            /*->add('Pacientes', 'entity', [
                'class'     => Paciente::class,
                'property'  => 'Nome',
                'multiple'  => true,
                'attr'      => [
                    'name' => 'Pacientes[]'
                ],
                'label'     => 'Pacientes',
                'rules'     => 'required|exists:Pacientes,PacienteID'
            ])*/
            ->add('Nome', 'text', [
                'rules' => 'required|max:100',
                'label' => 'Nome da turma'
            ])
            ->add('Prontuario', 'text', [
                'rules' => 'nullable|max:100',
                'label' => 'Prontuário'
            ])
            ->add('Observacao', 'textarea', [
                'label' => 'Observação',
                'rules' => 'nullable'
            ]);
    }
}
