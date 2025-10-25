<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function login(): View {
        return view("pages.login");
    }

    public function cadastro(): View {
        return view("pages.cadastro");
    }

    public function sobre(): View {
        return view("pages.sobre");
    }

    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email',
            'cpf' => 'required|unique:clientes,cpf',
            'cep' => 'required',
            'logradouro' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required|max:2',
        ]);
        Cliente::create($request->all());
        return redirect('/login')->with('success', 'Cadastro realizado com sucesso!');
    }
}
