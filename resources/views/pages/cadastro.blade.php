
@extends('layouts.app')

@section('title', 'Cadastro')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Cadastro de Cliente</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input name="nome" type="text" class="form-control" id="nome" placeholder="Digite seu nome">
        </div>

        <div class="mb-3">
            <label for="sobrenome" class="form-label">Sobrenome</label>
            <input name="sobrenome" type="text" class="form-control" id="sobrenome" placeholder="Digite seu sobrenome">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="exemplo@email.com">
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">Cpf</label>
            <input name="cpf" type="text" class="form-control" id="cpf" placeholder="Digite seu CPF">
        </div>

        <h4 class="mt-4 mb-3 text-secondary">EndereÃ§o</h4>

        <div class="mb-3">
            <label for="cep" class="form-label">CEP</label>
            <input name="cep" type="text" class="form-control" id="cep" placeholder="00000-000" onblur="consultaCEP()">
        </div>

        <div class="mb-3">
            <label for="logradouro" class="form-label">Logradouro</label>
            <input name="logradouro" type="text" class="form-control" id="logradouro" placeholder="Rua, Avenida, etc.">
        </div>

        <div class="mb-3">
            <label for="bairro" class="form-label">Bairro</label>
            <input name="bairro" type="text" class="form-control" id="bairro" placeholder="Digite o bairro">
        </div>

        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="localidade" class="form-label">Cidade</label>
                <input name="cidade" type="text" class="form-control" id="localidade" placeholder="Digite a cidade">
            </div>
            <div class="col-md-4 mb-3">
                <label for="uf" class="form-label">UF</label>
                <input name="uf" type="text" class="form-control text-uppercase" id="uf" maxlength="2" placeholder="Ex: SC">
            </div>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success btn-lg px-5 shadow-sm">
                <i class="bi bi-check-circle me-2"></i> Cadastrar
            </button>
        </div>
    </form>
</div>

    <script>
        function consultaCEP() {
            let cep = document.getElementById('cep').value
            let url = 'https://viacep.com.br/ws/' + cep + '/json/'
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('logradouro').value = data.logradouro
                    document.getElementById('bairro').value = data.bairro
                    document.getElementById('localidade').value = data.localidade
                    document.getElementById('uf').value = data.uf
            })
        .catch(error => console.error(error));

        }
    </script>

@endsection
