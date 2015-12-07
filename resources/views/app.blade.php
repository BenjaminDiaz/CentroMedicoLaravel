<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Taller de Desarrollo de Software</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<style type="text/css">
		.navbar {
			margin-bottom: 0;
			border-radius: 0;
		}

		.banner {
			margin-left: auto;
			margin-right: auto;
		}
	</style>
</head>
<body>
	@include('partials.nav')	

	@yield('content')

	@yield('footer')
</body>
</html>