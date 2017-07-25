@extends('layouts.app')
@section('Titulo', 'Criar turma')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h4>Cadastro turma</h4>
                    </div>
                    <div class="panel-body">
                        {!!
                            form($form->add('btn-cadastrar', 'submit', [
                                'attr' => ['class' => 'btn btn-primary btn-block'],
                                'label' => Icon::create('floppy-disk')
                            ]))
                        !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
