<x-layout>
    <x-slot:title>
        Cadastro de itens
    </x-slot>
    <header class="p-3 text-bg-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                    <img src="{{asset('images/logo.png')}}" alt="logo do site" height="30px" class="me-2">
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class="nav-link mx-1 text-dark fw-semibold">Home</a></li>
                    <li><a href="/" class="nav-link mx-1 text-dark fw-semibold">Items entregues</a></li>
                </ul>
                <div class="text-end d-flex align-items-center">
                    <p class="m-0 mx-1">Gustavo Alexandre</p>
                    <button type="button" class="btn btn-danger px-3 mx-1">Sair</button>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <h1 class="text-center my-3 fs-2">
            Cadastro de item emprestado
        </h1>
        <form class="row g-3">
            <div class="col-md-5">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="col-md-7">
                <label for="idOwner" class="form-label">Dono do item</label>
                <select id="idOwner" class="form-select" name="idWoner" required>
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}} - {{$user->email}}</option>
                @endforeach
                </select>
            </div>
            <div class="col-6">
                <label for="dateReturnForecast" class="form-label">Data prevista para devolução</label>
                <input type="datetime-local" class="form-control" id="dateReturnForecast" name="dateReturnForecast">
            </div>
            <div class="col-6">
                <label for="dateBorrowed" class="form-label">Data em que ira emprestar</label>
                <input type="datetime-local" class="form-control" id="dateBorrowed" name="dateBorrowed">
            </div>
            <div class="col-12">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" id="returned" name="returned">
                <label class="form-check-label" for="returned">
                    Marcar como devolvido ?
                </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-dark">Cadastrar</button>
            </div>
        </form>
    </div>
</x-layout>