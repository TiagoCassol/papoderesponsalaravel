<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Multiplicador;

class MultiplicadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Multiplicador::create([
            'nome_multiplicador'=>'Naka',
            'email_multiplicador'=>'nakadepanaka@gmail.com',
            'senha_multiplicador'=>bcrypt('123456789'),
            'matricula'=>'87654321',
            'cpf_multiplicador'=>'86051695024',
            'endereco_multiplicador'=>'Erondina Viegas machado',
            'status_multiplicador'=>'A',
            'nivel_hierarquia'=>'administrador',
        ]);
    }
}
