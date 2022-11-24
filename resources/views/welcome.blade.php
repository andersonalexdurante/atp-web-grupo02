<x-layout>
    <x-slot:title>
        Itens emprestados
    </x-slot>
    <header class="p-3 text-bg-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                    <img src="images/logo.png" alt="logo do site" height="30px" class="me-2">
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class="nav-link mx-1 text-dark fw-semibold">Home</a></li>
                    <li><a href="/" class="nav-link mx-1 text-dark fw-semibold">Items entregues</a></li>
                </ul>
                <div class="text-end d-flex align-items-center">
                    <p class="m-0 mx-1">{{ Auth::user()->name}}</p>
                    <button type="button" class="btn btn-danger px-3 mx-1">Sair</button>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <h1 class="text-center my-3 fs-2">
            Controle de itens emprestados
        </h1>
        <a href="/itens/create" role="button" type="button" class="my-2 btn btn-dark">Cadastrar novo item</a>
        <div class="d-flex gap-3 flex-wrap">
            @if($itens)
                @foreach ($itens as $item)
                <div @class(['card mb-3', 'text-bg-light' => $item->returned == 1, 'text-bg-warning' => $item->returned == 0]) style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->name}}</h5>
                        @if ($item->returned == 0)
                            <h6 class="card-text">item não devolvido</h6>
                            <p class="card-text"><small class="text-muted">previsão para devolução: {{date_format(date_create($item->dateReturnForecast),"Y/m/d \á\s H:i")}}</small></p>
                        @else
                            <h6 class="card-text">item ja devolvido</h6>
                            <p class="card-text"><small class="text-muted">data em que foi devolvido: {{date_format(date_create($item->dateBorrowed),"Y/m/d \á\s H:i")}}</small></p>
                        @endif
                        
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</x-layout>