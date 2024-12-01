<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

use illuminate\Support\Facades\Gate;

class SiteController extends Controller
{
    public function index(){
        return view("site/home");

    }

}
