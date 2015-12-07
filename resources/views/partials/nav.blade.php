<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{url()}}">Centro Médico</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href=""></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      @if (Auth::guest())
        <li><a href="{!! url('auth/login') !!}">Ingresar</a></li>
        <li><a href="{!! url('auth/register') !!}">Registrarse</a></li>
      @else
        <li><a href="{!! url('auth/logout') !!}">Salir</a></li>
      @endif
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>