<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\facades\Auth;

use Illuminate\Support\Facades\Hash;

use App\Controllers\MultiplicadorController;
use App\Models\Multiplicador;

class LoginController extends Controller
{
    public function auth(Request $request) {
        // Valida os dados
        $credenciais = $request->validate([
            'email_multiplicador' => ['required', 'email'],
            'senha_multiplicador' => ['required'],
        ], [
            'email_multiplicador.required' => 'O campo e-mail é obrigatório',
            'email_multiplicador.email' => 'O email não é válido',
            'senha_multiplicador.required' => 'O campo senha é obrigatório!',
        ]);

        // Procura o multiplicador pelo email
        $multiplicador = Multiplicador::where('email_multiplicador', $credenciais['email_multiplicador'])->first();

        if ($multiplicador && Hash::check($credenciais['senha_multiplicador'], $multiplicador->senha_multiplicador)) {
            // Senha correta, realiza o login
            Auth::guard('multiplicador')->login($multiplicador, $request->remember);
            $request->session()->regenerate();
           // dd(route('admin.dashboard')); // Aqui você pode ver para onde o redirecionamento está indo
            return redirect()->intended(route('admin.dashboard'));
        } else {
            // Senha incorreta ou email não encontrado
            return redirect()->back()->with('erro', 'Email ou senha inválidos');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('site.index'));
    }

    public function create(){
        return view('login.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
