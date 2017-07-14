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
                    <div class="panel-body" ng-app="famerp" ng-controller="pacienteController">
                        <form>
                            <input type="text" class="form-control" ng-model="busca">
                        </form>
                        <table class="table table-striped">
                            <thead>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Sexo</th>
                                <th>Avaliação alterada?</th>
                                <th>Ações</th>
                            </thead>
                            <tbody>
                                <tr ng-repeat="paciente in pacientes | filter:busca">
                                    <td>@{{ paciente.PacienteID }}</td>
                                    <td>@{{ paciente.Nome }}</td>
                                    <td>@{{ paciente.Sexo == 'M' ? "Masculino" : "Feminino" }}</td>
                                    <td>@{{
                                            paciente.AvaliacaoAlterada == 1 ?
                                            'Sim' :
                                            'Não'
                                         }}
                                    </td>
                                    <td>
                                        <a href="/pacientes/@{{ paciente.PacienteID }}/edit">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <a href="/pacientes/@{{ paciente.PacienteID }}">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </a>
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

@push('styles')
<style type="text/css">
    /*table > thead > tr > th:nth-child(9){
        width: 40%;
    }*/
</style>
@endpush