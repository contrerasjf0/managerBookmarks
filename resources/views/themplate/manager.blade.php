@extends('themplate.default')

@section('content')

	@include('partials.sections.header')

	<div class="row row-main">
		<div class="col-xs-12" id="container-main">
			<div class="row">
				<div class="col-xs-7">
					<div class="row padding-row">
						<div class="col-xs-offset-4 col-xs-8">
							<div class="btn-group" role="group" aria-label="...">
							  <button type="button" class="btn btn-default">Todos</button>
							  <button type="button" class="btn btn-default">Carpetas</button>
							  <button type="button" class="btn btn-default">Sin Carpeta</button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-5 divider-vertical">
					<div class="row padding-row">
						<div class="col-xs-offset-2 col-xs-10">
							<div class="btn-group" role="group" aria-label="...">
							  <button type="button" class="btn btn-default" id="add-link"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-link" aria-hidden="true"></i>&nbsp;&nbsp;Agregar Bookmark</button>
							  <button type="button" class="btn btn-default" id="add-folder"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-folder" aria-hidden="true"></i>&nbsp;&nbsp;Nueva carpeta</button>
							</div>
						</div>
					</div>

					<div class="row padding-row">
						<div class="col-xs-offset-1 col-xs-10" id="container-form">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
