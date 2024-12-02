@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
    

<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Status</th>
                <th>Cargo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($multiplicadores as $multiplicador)
                <tr>
                    <td>{{ $multiplicador->id_multiplicador }}</td>
                    <td>{{ $multiplicador->nome_multiplicador }}</td>
                    <td>{{ $multiplicador->email_multiplicador }}</td>
                    <td>{{ $multiplicador->cpf_multiplicador }}</td>
                    <td>{{ $multiplicador->status_multiplicador }}</td>
                    <td>{{ $multiplicador->nivel_hierarquia }}</td>
                    <td>
                        <!-- Botões ou links de ação -->
                        {{-- <a href="{{ route('multiplicadores.edit', $multiplicador->id_multiplicador) }}">Editar</a>
                        <a href="{{ route('multiplicadores.delete', $multiplicador->id_multiplicador) }}">Excluir</a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
