<form id="form-register" method="post" action="{{ route('user.store') }}" accept-charset="UTF-8">
  <h3 style="color:white;">Registrate Ahora</h3>
  <h4 style="color:white;">Y gestiona tus marcadores</h4>
  @include('partials.succes.StoreUser')
  <div class="form-group
    @if($errors->has('name'))
      has-error
    @endif
    ">
    <input type="text" class="form-control" id="name" placeholder="Nombre" name="name" value="{{old('name')}}" aria-describedby="helpBlockname">

    @include('partials.errors.storeUser', ['nameInput'=>'name'])

  </div>
  <div class="form-group
    @if($errors->has('last_name'))
      has-error
    @endif
  ">
    <input type="text" class="form-control" id="last_name" placeholder="Apellidos" name="last_name" value="{{old('last_name')}}" aria-describedby="helpBlockLastlast_name">

    @include('partials.errors.storeUser', ['nameInput'=>'last_name'])

  </div>
  <div class="form-group
    @if($errors->has('user_name'))
      has-error
    @endif
  ">
    <input type="text" class="form-control" id="user_name" placeholder="Nombre de usuario" name="user_name" value="{{old('user_name')}}" aria-describedby="helpBlockUserName">

    @include('partials.errors.storeUser', ['nameInput'=>'user_name'])
  </div>
  <div class="form-group
    @if($errors->has('email'))
      has-error
    @endif
  ">
    <input type="email" class="form-control" id="email" placeholder="Correo" name="email" value="{{old('email')}}" aria-describedby="helpBlockPassword">

    @include('partials.errors.storeUser', ['nameInput'=>'email'])

  </div>
  <div class="form-group

    @if($errors->has('password'))
      has-error
    @endif
  ">
    <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password">
    @include('partials.errors.storeUser', ['nameInput'=>'password'])

  </div>
  <div class="form-group
    @if($errors->has('password'))
      has-error
    @endif
  ">
    <input type="password" class="form-control" id="password_confirmation" placeholder="Confirmaciòn de contraseña" name="password_confirmation">
  </div>
  {{ csrf_field() }}
  <button type="submit" class="btn btn-default">Registrarse</button>
</form>
