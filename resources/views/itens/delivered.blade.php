<x-layout>
    <x-slot:title>
        Itens devolvidos
    </x-slot>
    <x-header></x-header>
    <style>
        
    </style>
    <div class="container">
        <h1 class="text-center my-3 fs-2">
            Itens ja devolvidos
        </h1>
        <a href="{{route('view.item.create')}}" role="button" type="button" class="my-2 btn btn-primary">Cadastrar novos itens</a>
        <div class="d-flex gap-3 flex-wrap">
            @if($itens)
                @foreach ($itens as $item)
                <div class="card mb-3 text-bg-success" style="width: 18rem;">
                    <div class="card-body text-decoration-none">
                        <h5 class="card-title">{{$item->name}}</h5>
                        <h6 class="card-text">a devolução do item foi realizada por {{$item->nameReceiver}}</h6>
                        <p class="card-text"><small>devolução realizada em: {{date_format(date_create($item->dateReturned),"Y/m/d \á\s H:i")}}</small></p>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</x-layout>