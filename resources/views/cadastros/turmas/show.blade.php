@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h4>Descrição da da turma</h4>
                        <div class="row">
                            {!! Button::primary(Icon::create('pencil'))->asLinkTo(route('turmas.edit', $turma->TurmaID)) !!}
                            {!! Button::danger(Icon::create('remove'))
                                    ->asLinkTo(route('turmas.destroy', $turma->TurmaID))
                                     ->addAttributes(['onclick' => "event.preventDefault();document.getElementById(\"form-delete\").submit();"])
                            !!}
                        </div>
                    </div>
                    <div class="panel-body">
                        @php $formDelete = FormBuilder::plain([
                                'id'        => 'form-delete',
                                'route'     => ['turmas.destroy', $turma->TurmaID],
                                'method'    => 'DELETE',
                                'style'     => 'display:none'
                            ]) @endphp
                        {!! form($formDelete) !!}
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">#</th>
                                    <td>{{ $turma->TurmaID }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Hora do cadastro</th>
                                    <td>{{ $turma->HoraCadastro }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nome turma</th>
                                    <td>{{ $turma->Nome }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Prontuário</th>
                                    <td>{{ $turma->Prontuario }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Observacao</th>
                                    <td>{{ $turma->Observacao }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Pacientes</th>
                                    <td>
                                        @foreach($turma->Pacientes as $paciente)
                                            {{ $paciente->Nome }}<br>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
