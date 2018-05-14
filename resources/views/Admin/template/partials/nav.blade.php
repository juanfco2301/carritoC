

<div class="container text-center">
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  {!! link_to('/inicio', "Fco", $attributes = array('class' => 'navbar-brand main-title')) !!}
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">sad</span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/inicio">Inicio <span class="sr-only">(current)</span></a>
      </li>
      @if(Auth::user()->type=='admin')
      <li class="nav-item">
          <a class="nav-link" href="{{route('users.index')}}">Usuarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('productos.index')}}">Productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('historial.index')}}">Historial</a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" href="{{route('store.index')}}">Store</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('cart.mostrar')}}">
                <button type="button" class="btn btn-default btn-sm">
                  <span class="glyphicon glyphicon-shopping-cart"></span> Cart
                </button>
        </a>
      </li>
      <li class="nav-item dropdown">

        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="glyphicon glyphicon-user"></span>
        {{Auth::user()->name}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Finalizar sesión') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </div>
      </li>

    </ul>
  </div>
</div>
</nav>
