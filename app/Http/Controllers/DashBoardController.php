<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Produto;
use DB;

class DashBoardController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth')->only('index');
    // }
    public function index(){
     return view('admin.dashboard');
    }
}
