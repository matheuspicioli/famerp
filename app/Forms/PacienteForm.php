<?php

namespace Famerp;

use Kris\LaravelFormBuilder\Form;

class PacienteForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('Nome', 'text', [
                'rules' => 'required|max:255'
            ])
            ->add('NumeroCartaoSUS', 'number', [
                'rules' => 'required',
                'label' => 'Cartão SUS'
            ])
            ->add('Sexo', 'select', [
                'choices' => ['M' => 'Masculino', 'F' => 'Feminino'],
                'rules' => 'required'
            ])
            ->add('DataNascimento', 'date', [
                'rules' => 'required|date'
            ])
            ->add('AvaliacaoAlterada', 'checkbox', [
                'label' => 'Avaliação alterada?'
            ])
            ->add('Peso', 'text', [
                'help_block' => [
                    'text' => 'Use o ponto( . ) para acrescentar números decimais. PS: Somente 1 número após o ponto',
                    'tag' => 'p',
                    'attr' => ['class' => 'help-block']
                ],
                'rules' => 'required|max:5'
            ])
            ->add('Altura', 'text', [
                'help_block' => [
                    'text' => 'Use o ponto( . ) para acrescentar números decimais. PS: Somente 2 números após o ponto',
                    'tag' => 'p',
                    'attr' => ['class' => 'help-block']
                ],
                'rules' => 'required|max:5'
            ]);
    }
}
