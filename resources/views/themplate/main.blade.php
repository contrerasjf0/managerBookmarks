@extends('themplate.default')

@section('content')

	<link rel="stylesheet" href="{{asset('css/vegas/vegas.min.css')}}">
	<div class="row row-header">
		<div class="col-xs-2">
			<img src="{{asset('img/64Logo.png')}}">
		</div>
		<div class="col-xs-5 col-xs-offset-5">

			<form class="form-inline" id="form-login" method="post" action="{{ route('login') }}" accept-charset="UTF-8">
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
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12" style="height: 650px;" id="container-main-page-init">
			<div class="row">
				<!--<div class="" slider-background style="width: 500px;height: 500px;">

				</div>-->
				<div class="col-xs-offset-8 col-xs-3">
					@include('partials.forms.CreateUser')
				</div>
			</div>
		</div>
	</div>
@endsection
