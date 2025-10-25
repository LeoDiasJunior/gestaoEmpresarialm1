@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Lista de Produtos</h1>

    {{-- Formulário de cadastro --}}
    <div class="card mb-4">
        <div class="card-header bg-success text-white">Cadastrar Novo Produto</div>
        <div class="card-body">
            <form action="{{ route('admin.produtos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nome do Produto</label>
                    <input type="text" name="nome" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <textarea name="descricao" class="form-control" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Preço</label>
                    <input type="number" name="preco" step="0.01" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Imagem do Produto</label>
                    <input type="file" name="imagem" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Cadastrar Produto</button>
            </form>
        </div>
    </div>

    {{-- Tabela de produtos --}}
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
                    <tr>
                        <td>{{ $produto['id'] }}</td>
                        <td>
                            @if(isset($produto['imagem']) && $produto['imagem'])
                                <img src="{{ asset('storage/' . $produto['imagem']) }}" alt="{{ $produto['nome'] }}" width="60">
                            @else
                                <span class="text-muted">Sem imagem</span>
                            @endif
                        </td>
                        <td>{{ $produto['nome'] }}</td>
                        <td>{{ $produto['descricao'] }}</td>
                        <td>R$ {{ number_format($produto['preco'], 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('produtos.show', ['id' => $produto['id']]) }}" class="btn btn-primary btn-sm">Ver Produto</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


