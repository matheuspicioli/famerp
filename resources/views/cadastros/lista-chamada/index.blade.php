@extends('layouts.app')

@section('content')
    <div class="container" ng-app="famerp">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Listas de chamadas</h3>
                        <div class="row">
                            {!! Button::primary('Nova lista de chamada')->asLinkTo(route('lista-chamada.create')) !!}
                        </div>
                    </div>
                    <div class="panel-body" ng-controller="listaController">
                        <form>
                            <input type="text" class="form-control" ng-model="busca">
                        </form>
                        <table class="table table-striped">
                            <thead>
                                <th>#</th>
                                <th>Hora do cadastro</th>
                                <th>Nome do paciente</th>
                                <th>Prontuário</th>
                                <th>Ações</th>
                            </thead>
                            <tbody>
                                <tr ng-repeat="lista in listas | filter:busca">
                                    <td>@{{ lista.ListaChamadaID }}</td>
                                    <td>@{{ lista.HoraCadastro }}</td>
                                    <td>@{{ lista.PacienteNome }}</td>
                                    <td>@{{ lista.Prontuario }}</td>
                                    <td>
                                        <a href="/lista-chamada/@{{ lista.ListaChamadaID }}/edit">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <a href="/lista-chamada/@{{ lista.ListaChamadaID }}">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--<div class="panel-body">
                    </div>-->
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