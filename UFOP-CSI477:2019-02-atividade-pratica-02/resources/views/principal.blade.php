<!DOCTYPE html>
<html lang="br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Página principal do sistema</title>
  </head>
  <body>

    <!-- Links - menu lateral //-->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #563D7C;">

      <ul class="navbar-nav mr-auto">
          <a class="navbar-brand" href="{{ url('/') }}">
            Protocolos
        </a>
        @if(Auth::guest())
          <li class="nav-item"><a href="{{ route('subjects.index') }}" class="nav-link">Geral</a></li>
        @endif
        @if(!Auth::guest() and Auth::user()->type == 0)
        <li class="nav-item"><a href="{{ route('requets.create') }}" class="nav-link">Inclusão de requerimento</a></li>
        <li class="nav-item"><a href="{{ route('requets.index') }}" class="nav-link">Lista de requerimentos</a></li>
        @endif
        @if(!Auth::guest() and Auth::user()->type == 1)
      <li class="nav-item"><a href="{{route('subjects.index')}}" class="nav-link">Administração</a></li>
        @endif
        </ul>
        <ul class="navbar-nav ml-auto">
          @if(Auth::guest())
          <li class="nav-item"><a href="/register" class="nav-link">Registrar</a></li>
          <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
          @else
            <li class="nav-item dropdown" >
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            </ul>
          @endif
      
    </nav>

    <!-- Conteúdo -- parte central //-->
    @yield('conteudo')

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
