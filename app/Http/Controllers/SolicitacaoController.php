<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitacao;
use App\Models\Multiplicador;
use App\Services\GoogleMapsService;

class SolicitacaoController extends Controller
{
    public function index()
    {
        // Verifica sessão
        if (!session()->has('ativa')) {
            return redirect()->route('login');
        }

        $idMultiplicador = session('id_multiplicador');

        // Buscar dados
        $solicitacoesDisponiveis = Solicitacao::disponiveis();
        $solicitacoesAceitas = Solicitacao::aceitasPorMultiplicador($idMultiplicador);
        $enderecoMultiplicador = Multiplicador::find($idMultiplicador)->endereco;

        // Obter coordenadas
        list($latitudeMultiplicador, $longitudeMultiplicador) = GoogleMapsService::getCoordenada($enderecoMultiplicador);
        $solicitacoesCoordenadas = array_map(function ($solicitacao) {
            $coordenadas = GoogleMapsService::getCoordenada($solicitacao['endereco_solicitante']);
            return [
                'descricao' => $solicitacao['descricao'],
                'lat' => $coordenadas[0],
                'lng' => $coordenadas[1],
            ];
        }, $solicitacoesDisponiveis->toArray());

        return view('solicitacoes.index', compact(
            'solicitacoesDisponiveis',
            'solicitacoesAceitas',
            'latitudeMultiplicador',
            'longitudeMultiplicador',
            'solicitacoesCoordenadas'
        ));
    }

    public function aceitar(Request $request)
    {
        Solicitacao::aceitar($request->id_solicitacao, session('id_multiplicador'));
        return redirect()->route('solicitacoes.index');
    }

    public function desistir(Request $request)
    {
        Solicitacao::desistir($request->id_solicitacao, session('id_multiplicador'));
        return redirect()->route('solicitacoes.index');
    }

    public function concluir(Request $request)
    {
        Solicitacao::concluir($request->id_solicitacao);
        return redirect()->route('solicitacoes.index');
    }
}
