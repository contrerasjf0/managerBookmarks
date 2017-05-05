@extends('themplate.default')

@section('content')

	@include('partials.sections.header')

	<div class="row row-main">
		<div class="col-xs-12" id="container-main">
			<div class="row">
				<div class="col-xs-7">
					<div class="row padding-row">
						<div class="col-xs-offset-1 col-xs-11">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#otherBookMarks" aria-controls="otherBookMarks" role="tab" data-toggle="tab">Otros marcadores</a></li>
								<li role="presentation"><a href="#folders" aria-controls="folders" role="tab" data-toggle="tab">Carpetas</a></li>
							</ul>
							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane fade in active" id="otherBookMarks">
									 <table class="table table-bordered hover" id="bookmark-table" width="100%">
										<thead>
											<tr>
												<th>Id</th>
												<th>Favicon</th>
												<th>Nombre</th>
												<th>Url</th>
												<th>Note</th>
												<th>Compartir</th>
											</tr>
										</thead>
									</table>
								</div>
								<div role="tabpanel" class="tab-pane" id="folders">
									 <table class="table table-bordered hover" id="folder-table" width="100%">
										<thead>
											<tr>
												<th>Id</th>
												<th></th>
												<th>Nombre</th>
												<th>Descripciòn</th>
											</tr>
										</thead>
									</table>
								</div>
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
