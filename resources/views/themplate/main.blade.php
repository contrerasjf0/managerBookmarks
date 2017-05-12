@extends('themplate.default')

@section('content')

	@include('partials.sections.header')
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
