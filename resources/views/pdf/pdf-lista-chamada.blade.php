<!doctype html>
<html lang="pt-BR">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <title>Lista de chamada</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h4>Lista de chamada</h4>
                    </div>

                    <div class="panel-body text-center">
                        <table class="table table-striped">
                            <thead>
                                <th>#</th>
                                <th>Cartão SUS</th>
                                <th>Data de nascimento</th>
                                <th>Avaliação alterada</th>
                                <th>Peso</th>
                                <th>Altura</th>
                                <th>Assinatura</th>
                            </thead>
                            <tbody>
                                @foreach($pacientes as $paciente)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $paciente->NumeroCartaoSUS }}</td>
                                        <td>{{ $paciente->DataNascimento }}</td>
                                        <td>{!!
                                                $paciente->AvaliacaoAlterada == 1 ?
                                                    Icon::ok().' Sim' :
                                                    Icon::remove().' Não'
                                            !!}
                                        </td>
                                        <td>{{ $paciente->Peso }}</td>
                                        <td>{{ $paciente->Altura }}</td>
                                        <td>  </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
