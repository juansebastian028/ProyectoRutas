<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/css/login.css">
	<link rel="stylesheet" href="../assets/frameworks/bootstrap/css/bootstrap.min.css">
	<title>Login</title>
	<!--Font Awesome-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<!-- Alertify -->
	<link rel="stylesheet" href="../assets/frameworks/alertify/css/alertify.min.css" />
	<link rel="stylesheet" href="../assets/frameworks/alertify/css/themes/default.min.css" />
</head>

<body>
	<div class="box">
		<form class="form" id="form">

			<h1 class="text-center h2">Iniciar sesión</h1>

			<label for="usuario">Usuario</label>
			<input class="form-control" type="text" name="usuario" placeholder="Ingrese su nombre de usuario">

			<label for="password">Contraseña</label>

			<div class="input-group inputs-container">
				<input id="inputPassword" class="form-control pwd" name="password" type="password" placeholder="Ingrese su contraseña">

				<button id="eyePassword" class="form-control d-flex justify-content-center align-items-center">
					<i class="fa fa-eye" aria-hidden="true"></i>
				</button>
			</div>

			<input class="btn btn-primary btn-block my-2" type="submit" id="ingresar" name="ingresar" value="Ingresar">

		</form>
	</div>

	<script src="../assets/frameworks/bootstrap/js/jquery-3.5.1.min.js"></script>
	<script src="../assets/frameworks/bootstrap/js/bootstrap.min.js"></script>

	<script src="../assets/frameworks/alertify/alertify.js"></script>

	<script src="../assets/js/login.js"></script>
</body>

</html>