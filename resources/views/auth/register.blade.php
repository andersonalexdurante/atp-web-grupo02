<x-layout>
    <x-slot:title>
        Registrar
    </x-slot>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh">
        <form method="POST" action="/registrar">
            @csrf
            <div class="mb-3">
                <img src="images/login.svg" alt="imagem de login" style="height: 300px">
            </div>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="ajuda" name="email">
                <div id="ajuda" class="form-text">Nunca compartilhe seu email com ninguém</div>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="phone">
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="password">
            </div>
            <div class="mb-3">
                <label for="resenha" class="form-label">Repetir Senha</label>
                <input type="password" class="form-control" id="resenha">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="/login">já tem uma conta?</a>
        </form>
    </div>
</x-layout>