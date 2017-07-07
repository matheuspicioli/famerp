@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h2>Lista de pacientes</h2>
                        <div class="row">
                            {!! Button::primary('Novo(a) paciente')->asLinkTo(route('pacientes.create')) !!}
                        </div>
                    </div>
                    <div class="panel-body">
                        {!!
                            Table::withContents($pacientes->items())
                                ->striped()
                                ->callback('Avaliação alterada?', function($field, $paciente){
                                    return $paciente->AvaliacaoAlterada == 1 ? Icon::ok().' Sim' : Icon::remove().' Não';
                                })
                                ->callback('Ações', function($field, $paciente){
                                    $linkEdit = route('pacientes.edit',['paciente' => $paciente->PacienteID]);
                                    $linkShow = route('pacientes.show',['paciente' => $paciente->PacienteID]);
                                    return Button::link(Icon::create('pencil'))->asLinkTo($linkEdit).'|'.
                                            Button::link(Icon::create('remove'))->asLinkTo($linkShow);
                                })
                        !!}
                    </div>
                    <div class="panel-body">
                        {!! $pacientes->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style type="text/css">
    /*table > thead > tr > th:nth-child(9){
        width: 40%;
    }*/
</style>
@endpush