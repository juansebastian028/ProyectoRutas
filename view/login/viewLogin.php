<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/css/login.css">
	<link rel="stylesheet" href="../assets/frameworks/bootstrap/css/bootstrap.min.css">
	<title>Login</title>
	<!-- Alertify -->
	<link rel="stylesheet" href="../assets/frameworks/alertify/css/alertify.min.css" />
	<link rel="stylesheet" href="../assets/frameworks/alertify/css/themes/default.min.css" />
</head>

<body>
	<div class="box">
		<form class="form" id="form" method="POST">
			<div>
				<h1 class="text-center h2">Iniciar sesión </h1>

				<label for="usuario">Usuario</label>
				<input class="form-control" type="text" name="usuario" placeholder="Ingrese su nombre de usuario" maxlength="20" minlength="1">

				<label for="password">Contraseña</label>
				<input class="form-control" type="password" name="password" placeholder="Ingrese su contraseña" maxlength="20" minlength="1">

				<input class="btn btn-primary btn-block my-2" type="submit" id="ingresar" name="ingresar" value="Ingresar">
			</div>
		</form>
	</div>

	<script src="../assets/frameworks/bootstrap/js/jquery-3.5.1.min.js"></script>
	<script src="../assets/frameworks/bootstrap/js/bootstrap.min.js"></script>

	<script src="../assets/frameworks/alertify/alertify.js"></script>

	<script src="../assets/js/login.js"></script>
</body>

</html>