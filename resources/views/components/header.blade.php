<header class="p-3 text-bg-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="{{route('view.home')}}" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <img src="{{asset('images/logo.png')}}" alt="logo do site" height="30px" class="me-2">
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{route('view.home')}}" class="nav-link mx-1 text-dark fw-semibold">Home</a></li>
                <li><a href="{{route('view.itens.delivered')}}" class="nav-link mx-1 text-dark fw-semibold">Items entregues</a></li>
            </ul>
            <div class="text-end d-flex align-items-center">
                <p class="m-0 mx-1">{{ Auth::user()->name}}</p>
                <a href="{{route('view.usuario.edit')}}" type="button" class="btn btn-dark px-3 mx-1">Perfil</a>
                <form method="post" action="{{route('api.logout')}}">
                    @csrf
                    <button type="submit" class="btn btn-danger px-3 mx-1">Sair</button>
                </form>
            </div>
        </div>
    </div>
</header>