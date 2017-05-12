
<nav class="navbar navbar-default">
  <div class="container-fluid">

    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <img src="{{asset('img/64Logo.png')}}" class="icon-header">
      </a>
      <p class="navbar-text navbar-left">Manager Bookmarks</p>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      @if(!Auth::check())
          <form class="navbar-form navbar-right" id="form-login" method="post" action="{{ route('login') }}" accept-charset="UTF-8">
              @include('partials.errors.loginUser')
              <div class="form-group">
                <input type="text" class="form-control" id="user_name" placeholder="Usuario" name="user_name">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password">
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="remember"> Recordarme
                </label>
              </div>
              {{ csrf_field() }}
              <button type="submit" class="btn btn-default">Iniciar</button>
          </form>
      @else
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#" class="size-icon margin-icon-header"><i class="fa fa-inbox" aria-hidden="true"></i></a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <img src="{{asset('img/iconuser/photo.jpeg')}}" class="img-circle photo-user-header">
              &nbsp;&nbsp;NameUser <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Mi perfil</a></li>
              <li role="separator" class="divider"></li>
              <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Salir
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
              </li>
            </ul>
          </li>
        </ul>
      @endif
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
