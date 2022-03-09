<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .page-break {
            page-break-after: always;
        }
        .titulo {
            border: 1px;
            background-color: #c2c2c2;
            text-align: center;
            width: 100%;
            text-transform: uppercase;
            font-weight: 700;
            margin-bottom: 25px
        }

        table {
            width: 100%;
        }

        table th {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="titulo">Lista de tarefas</div>

    <table>
        <thead>
            <th>Id</th>
            <th>Tarefa</th>
            <th>Data conclusão</th>
        </thead>
        <tbody>
            @foreach ($tarefas as $tarefa)
                <tr>
                    <td>{{ $tarefa->id }}</td>
                    <td>{{ $tarefa->tarefa }}</td>
                    <td>{{ date('d/m/Y', strtotime($tarefa->data_limite_conclusao)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="page-break"></div>
    Página 2

    <div class="page-break"></div>
    Página 3

</body>
</html>