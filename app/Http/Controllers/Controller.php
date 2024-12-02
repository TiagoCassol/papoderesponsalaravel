<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Multiplicador; // Modelo para a tabela de usuários

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}


// class AdminController extends Controller
// {
//     public function dashboard()
//     {
//         // Busca os dados dos usuários do banco
//         $usuarios = Multiplicador::all();

//         // Retorna a view com os dados
//         return view('admin.dashboard', compact('multiplicadors'));
//     }
// }
