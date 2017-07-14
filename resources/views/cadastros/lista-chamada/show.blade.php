@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h4>Descrição da lista de chamada</h4>
                        <div class="row">
                            {!! Button::primary(Icon::create('pencil'))->asLinkTo(route('lista-chamada.edit', $listaChamada->ListaChamadaID)) !!}
                            {!! Button::danger(Icon::create('remove'))
                                    ->asLinkTo(route('lista-chamada.destroy', $listaChamada->ListaChamadaID))
                                     ->addAttributes(['onclick' => "event.preventDefault();document.getElementById(\"form-delete\").submit();"])
                            !!}
                        </div>
                    </div>
                    <div class="panel-body">
                        @php $formDelete = FormBuilder::plain([
                                'id'        => 'form-delete',
                                'route'     => ['lista-chamada.destroy', $listaChamada->ListaChamadaID],
                                'method'    => 'DELETE',
                                'style'     => 'display:none'
                            ]) @endphp
                        {!! form($formDelete) !!}
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">#</th>
                                    <td>{{ $listaChamada->ListaChamadaID }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Horas</th>
                                    <td>{{ $listaChamada->HoraCadastro }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Prontuario</th>
                                    <td>{{ $listaChamada->Prontuario }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Observacao</th>
                                    <td>{{ $listaChamada->Observacao }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Paciente</th>
                                    <td>{{ $listaChamada->PacienteNome }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
