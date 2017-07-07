@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h4>Descrição do(a) paciente</h4>
                        <div class="row">
                            {!! Button::primary(Icon::create('pencil'))->asLinkTo(route('pacientes.edit',['paciente' => $paciente->PacienteID])) !!}
                            {!! Button::danger(Icon::create('remove'))
                                    ->asLinkTo(route('pacientes.destroy', ['paciente' => $paciente->PacienteID]))
                                     ->addAttributes(['onclick' => "event.preventDefault();document.getElementById(\"form-delete\").submit();"])
                            !!}
                        </div>
                    </div>
                    <div class="panel-body">
                        @php $formDelete = FormBuilder::plain([
                                'id'        => 'form-delete',
                                'route'     => ['pacientes.destroy','paciente' => $paciente->PacienteID],
                                'method'    => 'DELETE',
                                'style'     => 'display:none'
                            ]) @endphp
                        {!! form($formDelete) !!}
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">#</th>
                                    <td>{{ $paciente->PacienteID }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Hora do cadastro</th>
                                    <td>{{ $paciente->getHoraCadastro() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nome</th>
                                    <td>{{ $paciente->Nome }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Cartão do SUS</th>
                                    <td>{{ $paciente->NumeroCartaoSUS }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Sexo</th>
                                    <td>{{ $paciente->Sexo == 'M' ? 'Masculino' : 'Feminino' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Data de nascimento</th>
                                    <td>{{ $paciente->getDataNascimento() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Avaliacao alterada?</th>
                                    <td>
                                        {!!
                                            $paciente->AvaliacaoAlterada == 1 ?
                                                Icon::ok().' Sim' :
                                                Icon::remove().' Não'
                                         !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Peso</th>
                                    <td>{{ $paciente->Peso }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Altura</th>
                                    <td>{{ $paciente->Altura }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
