<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitacao;
use DB;

class DashBoardSolicitacaoController extends Controller
{
    public function index()
    {
        // Busca os dados dos multiplicadores no banco
        $solicitacoes = Solicitacao::all();

        // Retorna a view com os dados
        return view('admin.dashboardsolicitacao', compact('solicitacoes'));
    }
}
