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
                'rules' => 'nullable|max:10',
                'label' => 'Prontuário'
            ])
            ->add('ID', 'number', [
                'rules' => 'nullable|min:1'
            ])
            ->add('Proc', 'text', [
                'rules' => 'nullable|max:100',
                'label' => 'Proc.'
            ])
            ->add('CID', 'number', [
                'rules' => 'nullable|min:1',
                'label' => 'CID'
            ])
            ->add('Observacao', 'textarea', [
                'label' => 'Observação',
                'rules' => 'nullable'
            ])
        ;
    }
}
