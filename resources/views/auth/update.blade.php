<x-layout>
    <x-slot:title>
        Editar perfil
    </x-slot>
    <x-header></x-header>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh">
        <form method="POST" action="/perfil/edit">
            @method('PATCH')
            @csrf
            <p class="fs-2 text-center">{{Auth::User()->name}}</p>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="ajuda" name="email" value="{{Auth::User()->email}}">
                <div id="ajuda" class="form-text">Nunca compartilhe seu email com ninguém</div>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="phone" value="{{Auth::User()->phone}}">
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Dados</button>
        </form>
    </div>
</x-layout>