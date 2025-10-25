@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">Lista de Clientes</h1>

    @if($clientes->isEmpty())
        <p class="text-center">Nenhum cliente cadastrado.</p>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>CPF</th>
                        <th>Cidade</th>
                        <th>UF</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nome }} {{ $cliente->sobrenome }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->cpf }}</td>
                            <td>{{ $cliente->cidade }}</td>
                            <td>{{ $cliente->uf }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection

