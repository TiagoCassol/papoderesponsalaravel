@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')


<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Solicitante</th>
                <th>Multiplicador</th>
                <th>Descrição</th>
                <th>Data de Criação</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($solicitacoes as $solicitacao)
                <tr>
                    <td>{{ $solicitacao->id_solicitacao }}</td>
                    <td>{{ $solicitacao->solicitante->nome_instituicao ?? 'N/A' }}</td>
                    <td>{{ $solicitacao->multiplicador->nome_multiplicador ?? 'N/A' }}</td>
                    <td>{{ $solicitacao->descricao }}</td>
                    <td>{{ date('d/m/Y', strtotime($solicitacao->data_criacao)) }}</td>
                    <td>{{ $solicitacao->status_solicitacao }}</td>
                    <td>
                        <!-- Botões ou links de ação -->
                        {{-- <a href="{{ route('solicitacoes.show', $solicitacao->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('solicitacoes.edit', $solicitacao->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('solicitacoes.destroy', $solicitacao->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
