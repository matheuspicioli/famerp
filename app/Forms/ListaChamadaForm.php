<?php

namespace Famerp\Forms;

use Famerp\Models\Paciente;
use Kris\LaravelFormBuilder\Form;

class ListaChamadaForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('PacienteID', 'entity',
                [
                    'class' => Paciente::class,
                    'property' => 'Nome',
                    'empty_value' => 'Selecione o paciente',
                    'label' => 'Paciente',
                    'rules' => 'exists:Pacientes,PacienteID'
                ]
            )
            ->add('Prontuario', 'text', [
                'rules' => 'nullable|max:30',
                'label' => 'Prontuário'
            ])
            ->add('Observacao', 'textarea', [
                'label' => 'Observação',
                'rules' => 'nullable'
            ])
        ;
    }
}
