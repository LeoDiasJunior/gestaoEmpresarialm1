<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use App\Models\Cliente;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    protected array $products = [
        ['id' => 1, 'nome' => 'Produto 1', 'descricao' => 'Descrição 1', 'preco' => 100],
        ['id' => 2, 'nome' => 'Produto 2', 'descricao' => 'Descrição 2', 'preco' => 200],
    ];

    protected array $fornecedores = [
        ['id' => 1, 'nome' => 'Fornecedor 1'],
        ['id' => 2, 'nome' => 'Fornecedor 2'],
    ];

    public function login(): View {
        return view("pages.admin.login");
    }

    public function dashboard(): View {
        return view("pages.admin.dashboard");
    }

    public function clientes(): View {
        $clientes = Cliente::all(); 
        return view('pages.admin.clientes.index', compact('clientes'));
    }

    public function show_cliente(int $id): View {
        $cliente = Cliente::findOrFail($id); 
        return view("pages.admin.clientes.show", compact('cliente'));
    }

    public function fornecedores(): View {
        return view("pages.admin.fornecedores", ['fornecedores' => $this->fornecedores]);
    }

    public function produtos(): View {
        return view("pages.admin.produtos.index", ['produtos' => $this->products]);
    }

    public function find_product(string $slug): View {
        $produto = collect($this->products)
            ->first(function ($produto) use ($slug) {
                return $produto['id'] == $slug || Str::contains($produto['nome'], $slug);
            });

        return view("pages.admin.produtos.show", compact('produto'));
    }
       public function createProduto(): View {
        return view('pages.admin.produtos.create');
    }

    public function storeProduto(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric',
            'imagem' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('imagem')->store('products', 'public');

        Produto::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'imagem' => $path,
        ]);

        return redirect('/admin/produtos')->with('success', 'Produto cadastrado com sucesso!');
    }
}
