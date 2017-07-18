@extends('layouts.app')
@section('Titulo', 'Turmas')
@section('content')
    <div class="container" ng-app="famerp">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Listas de turmas</h3>
                        <div class="row">
                            {!! Button::primary('Nova turma')->asLinkTo(route('turmas.create')) !!}
                        </div>
                    </div>
                    <div class="panel-body" ng-controller="turmasController">
                        <form>
                            <input type="text" class="form-control" ng-model="busca">
                        </form>
                        <hr>
                        <table class="table table-striped">
                            <thead>
                                <th>#</th>
                                <th>Hora do cadastro</th>
                                <th>Nome da turma</th>
                                <th>Prontuário</th>
                                <th>Ações</th>
                            </thead>
                            <tbody>
                                <tr ng-repeat="turma in turmas| filter:busca">
                                    <td>@{{ turma.TurmaID }}</td>
                                    <td>@{{ turma.HoraCadastro }}</td>
                                    <td>@{{ turma.Nome }}</td>
                                    <td>@{{ turma.Prontuario }}</td>
                                    <td>
                                        <a href="/pdf-lista-chamada-turma/@{{ turma.TurmaID  }}">
                                            <span class="glyphicon glyphicon-download-alt"></span>
                                        </a>
                                        <a href="/turmas/@{{ turma.TurmaID }}/edit">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <a href="/turmas/@{{ turma.TurmaID }}">
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