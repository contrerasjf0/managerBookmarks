@extends('themplate.default')

@section('content')
	<div class="row">
		<div class="col-xs-2">
			<img src="{{asset('assets/img/64Logo.png')}}">
		</div>
		<div class="col-xs-5 col-xs-offset-5">
			<form class="form-inline">
			  <div class="form-group">
			    <label class="sr-only" for="user_name">Nombre de usuario</label>
			    <input type="email" class="form-control" id="user_name" name="user_name">
			  </div>
			  <div class="form-group">
			    <label class="sr-onlcleary" for="password">Contraseña</label>
			    <input type="password" class="form-control" id="password" name="password">
			  </div>
			  <div class="checkbox">
			    <label>
			      <input type="checkbox" name="remember"> Recordarme
			    </label>
			  </div>
			  <button type="submit" class="btn btn-default">Iniciar</button>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">

		</div>
	</div>
@endsection
