<!doctype html>
<html lang="pt-BR">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="css/app.css" rel="stylesheet" type="text/css">
    <title>Lista de chamada - {{ $nomeTurma }}</title>
    <style>
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h4>Lista de chamada - {{ $nomeTurma }}</h4>
                    </div>

                    <div class="panel-body text-center">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Cartão SUS</th>
                                    <th>Data nascimento</th>
                                    <th>Sexo</th>
                                    <th>Assinatura</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pacientes as $paciente)
                                    <tr>
                                        <td>{{ $paciente->Nome }}</td>
                                        <td>{{ $paciente->NumeroCartaoSUS }}</td>
                                        <td>{{ $paciente->DataNascimentoPadrao }}</td>
                                        <td>{{ $paciente->Sexo == 'M' ? 'Masculino' : 'Feminino' }}</td>
                                        <td></td>
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
