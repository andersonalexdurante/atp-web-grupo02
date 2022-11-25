<x-layout>
    <x-slot:title>
        Itens emprestados
    </x-slot>
    <x-header></x-header>
    <style>
        
    </style>
    <div class="container">
        <h1 class="text-center my-3 fs-2">
            Itens pendentes
        </h1>
        <a href="/itens/create" role="button" type="button" class="my-2 btn btn-primary">Cadastrar novos itens</a>
        <div class="d-flex gap-3 flex-wrap">
            @if($itens)
                @foreach ($itens as $item)
                <div @class(['card mb-3 text-bg-warning', 'text-bg-danger' => date_create($item->dateReturnForecast) < now()]) style="width: 18rem;">
                    <a href="{{'usuario/itens/'.$item->id}}" class="card-body text-decoration-none" role="button">
                        <h5 class="card-title">{{$item->name}}</h5>
                        @if( date_create($item->dateReturnForecast) < now())
                            <h6 class="card-text">a devolução do item esta atrasado</h6>
                        @else
                            <h6 class="card-text">item ainda não devolvido</h6>
                        @endif
                        <p class="card-text"><small>previsão para devolução: {{date_format(date_create($item->dateReturnForecast),"Y/m/d \á\s H:i")}}</small></p>
                    </a>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</x-layout>