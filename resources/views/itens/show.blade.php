<x-layout>
    <x-slot:title>
        Verificar item
    </x-slot>
    <x-header></x-header>
    <div class="container">
        <h1 class="text-center my-3 fs-2">
            Verificar item
        </h1>
        <div class="card" style="width: auto;">
            <div class="card-body text-center">
                <h5 class="card-title">{{$item->name}}</h5>
                <p class="card-text">nome de para quem emprestou: {{$item->nameReceiver}}</p>
                <p class="card-text">contato: {{$item->contactReceiver}}</p>
                <p class="card-text">data emprestada: {{date_format(date_create($item->dataBorrowed),"Y/m/d \á\s H:i")}}</p>
                <p class="card-text">data prevista para devolver: {{date_format(date_create($item->dateReturnForecast),"Y/m/d \á\s H:i")}}</p>
                
                <form class="row g-3" method="post" action="{{'/item/'.$item->id}}">
                @method('patch')
                @csrf
                <button type="submit" class="btn btn-success">Marcar como entregue</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>