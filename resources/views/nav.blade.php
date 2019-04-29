<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top" style="background-color: grey !important;color:white !important;">
    <div class="navbar-header">{{-- 
        <a class="navbar-brand" href="{{ route('principal')}}">
        <img src="/images/logo.png" width="40"></a> --}}
        <a class="navbar-brand" href="/">Umbook
            </a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item"><a class="nav-link" href="">Usuarios<span class="sr-only">(current)</span></a></li>
        </li>      

        

      </ul>
      <ul class="nav navbar-nav navbar-right">
        @guest
                            <li><a href="{{ route('login') }}">Iniciar Sesión</a></li> 
                            <li><a href="{{ route('register') }}">Registrarme</a></li>
                        @else

                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</span></a>          
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->type == "admin")
                                    <a class="dropdown-item" href="{{route('admin.inicio')}}">Mi Perfil</a>
                                @else                                    
                                   <a class="dropdown-item" href="">Mi Perfil</a>
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
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>