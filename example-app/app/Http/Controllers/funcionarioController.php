<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Funcionario; // Importando a Model

class funcionarioController extends Controller
{
    public function getFuncionarios(){
        $dados = Funcionario::all(); // Pega todos os dados da Model(Funcionario.php) e salva na variável
        return view('funcionarios', compact('dados'));
    }
}
