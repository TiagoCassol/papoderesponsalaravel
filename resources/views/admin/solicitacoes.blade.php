@extends('layouts.app')

@section('content')
<header>
    <nav class="nav-left">
        <img src="{{ asset('images/policiaCivil2.png') }}" alt="Logo Papo de Responsa">
    </nav>
    <nav class="nav-center">
        <h1>Bem vindo, {{ session('nome_multiplicador') }}!</h1>
    </nav>
    <nav class="nav-right">
        <img src="{{ asset('images/papoLogo2.png') }}" alt="Logo Papo de Responsa">
    </nav>
</header>

@include('partials.menuMultiplicador')

<h2>Solicitações Disponíveis</h2>
<ul class="solicitacoes-disponiveis">
    @foreach ($solicitacoesDisponiveis as $solicitacao)
        <li>
            {{ $solicitacao->descricao }} - Endereço: {{ $solicitacao->endereco_solicitante }} -
            Distância: {{ app('googleMaps')->getDistance($solicitacao->endereco_solicitante, $enderecoMultiplicador, 'k') }}
            Responsável: {{ $solicitacao->responsavel }}<br>
            Email: {{ $solicitacao->email_solicitante }}<br>
            <form action="{{ route('solicitacoes.aceitar') }}" method="POST">
                @csrf
                <input type="hidden" name="id_solicitacao" value="{{ $solicitacao->id }}">
                <button type="submit">Aceitar</button>
            </form>
        </li>
    @endforeach
</ul>

<h2>Solicitações Aceitas por Você</h2>
<ul class="solicitacoes-aceitas">
    @foreach ($solicitacoesAceitas as $solicitacao)
        <li>
            {{ $solicitacao->descricao }} - Endereço: {{ $solicitacao->endereco_solicitante }}<br>
            Responsável: {{ $solicitacao->responsavel }}<br>
            Email: {{ $solicitacao->email_solicitante }}<br>
            <div class="solicitacao-actions">
                <form action="{{ route('solicitacoes.desistir') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_solicitacao" value="{{ $solicitacao->id }}">
                    <button type="submit">Desistir</button>
                </form>
                <form action="{{ route('solicitacoes.concluir') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_solicitacao" value="{{ $solicitacao->id }}">
                    <button type="submit">Visita realizada</button>
                </form>
            </div>
        </li>
    @endforeach
</ul>

<div id="map"></div>

<script src="https://maps.googleapis.com/maps/api/js?key=API_KEY&callback=initMap" async></script>
<script>
    function initMap() {
        const multiplicador = { lat: {{ $latitudeMultiplicador }}, lng: {{ $longitudeMultiplicador }} };
        const map = new google.maps.Map(document.getElementById("map"), { zoom: 17.56, center: multiplicador });

        new google.maps.Marker({ position: multiplicador, map: map, title: 'Multiplicador' });

        const solicitacoes = @json($solicitacoesCoordenadas);
        solicitacoes.forEach(function(solicitacao) {
            new google.maps.Marker({
                position: { lat: solicitacao.lat, lng: solicitacao.lng },
                map: map,
                title: solicitacao.descricao
            });
        });
    }
</script>
@endsection
