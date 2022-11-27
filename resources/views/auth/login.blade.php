<x-layout>
    <x-slot:title>
        Entrar
    </x-slot>
    <div class="d-flex justify-content-center align-items-center my-5" style="height: 100vh">
        <form method="post" action="/autenticar">
            @csrf
            <div class="mb-3">
                <img src="images/login.svg" alt="imagem de login" style="height: 300px">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Nunca compartilhe seu email com ninguém</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="m-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Entrar</button>
            <a href="{{route('register')}}">ainda não tem uma conta?</a>
        </form>
    </div>
</x-layout>