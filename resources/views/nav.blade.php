<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top" style="background-color: grey !important;color:white !important;">
    <div class="navbar-header">{{--
        <a class="navbar-brand" href="{{ route('principal')}}">
            <img src="/images/logo.png" width="40"></a> --}}
        <a class="btn btn-primary navbar-brand" href="/"><i class="fas fa-university"> </i> UMbook</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="nav navbar-nav navbar-right">
            @guest
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Iniciar Sesion</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrarse</a></li>
            @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</span></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @if(Illuminate\Support\Facades\Auth::user()->type == "admin")
                            <a class="dropdown-item" href="{{route('admin.inicio')}}">Mi Perfil</a>
                        @else
                            <a class="dropdown-item" href="">Mi Perfil</a>
                            <a class="dropdown-item" href="{{route('friends.requests')}}">Solicitudes pendientes</a>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                            Cerrar Sesion
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>