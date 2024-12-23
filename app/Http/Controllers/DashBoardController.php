<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Multiplicador;
use DB;

class DashBoardController extends Controller
{
    public function index()
    {
        // Busca os dados dos multiplicadores no banco
        $multiplicadores = Multiplicador::all();

        // Retorna a view com os dados
        return view('admin.dashboard', compact('multiplicadores'));
    }
}
