<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Manager URL</title>
	<link rel="stylesheet" href="{{asset('css/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/font-awesome-4-7-0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/styleMain.css')}}" media="screen">

</head>
<body>

	<div class="row">
		<div class="col-xs-12">
			@yield('content')
		</div>
	</div>
	<script src="{{asset('js/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('css/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/build/app.js')}}"></script>
</body>
</html>
