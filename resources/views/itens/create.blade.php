<x-layout>
    <x-slot:title>
        Cadastro de itens
    </x-slot>
    <x-header></x-header>
    <div class="container">
        <h1 class="text-center my-3 fs-2">
            Cadastro de item emprestado
        </h1>
        <form class="row g-3" method="post" action="{{route('api.item.create')}}">
            @csrf
            <div class="col-md-12">
                <label for="name" class="form-label">Nome do item</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="col-md-6">
                <label for="nameReceiver" class="form-label">Nome para quem emprestou</label>
                <input id="nameReceiver" class="form-control" name="nameReceiver" type="text">
            </div>
            <div class="col-md-6">
                <label for="contactReceiver" class="form-label">Contato</label>
                <input type="text" class="form-control" id="contactReceiver" name="contactReceiver">
            </div>
            <div class="col-12">
                <label for="dateReturnForecast" class="form-label">Data prevista para devolução</label>
                <input type="datetime-local" class="form-control" id="dateReturnForecast" name="dateReturnForecast">
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
            <div class="col-12">
                <button type="submit" class="btn btn-dark">Cadastrar</button>
            </div>
        </form>
    </div>
</x-layout>