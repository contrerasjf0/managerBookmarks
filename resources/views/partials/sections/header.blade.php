
<nav class="navbar navbar-default">
  <div class="container-fluid">

    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <img src="{{asset('img/64Logo.png')}}" class="icon-header">
      </a>
      <p class="navbar-text navbar-left">Manager Bookmarks</p>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

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
            <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Salir</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
