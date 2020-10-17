<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/verticalmenu.css">
	<link rel="stylesheet" href="assets/css/Registrar_Usuarios.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<title>Registrar Usuarios</title>
</head>
<body>

	<nav class="navbar navbar-dark bg-dark">
		<div class="navbar-nav ml-auto">
			<a class="nav-item nav-link" href="#">Iniciar Sesión</a>
		</div>
	</nav> 


	<form action="">
		
		<div class="divprincipal">
			
			<div class="titulo">
				<h1 class="textotitulo">Registrar usuario</h1>
			</div>

			<div class="formulario">
				
				<label for="">Cedula</label>
				<input class="form-control tamaño_input " type="number" placeholder="Ingrese su Cedula"> <br>

				<label for="">Nombre</label>
				<input class="form-control" type="text" placeholder="Ingrese su nombre">
				<br>

				<label for="">Apellido</label>
				<input class="form-control" type="text" placeholder="Ingrese su Apellido">
				<br>

				<label for="">Usuario</label>
				<input class="form-control" type="text" placeholder="Ingrese su Nombre de usuario">
				<br>

				<label for="">Contraseña</label>
				<input class="form-control" type="text" placeholder="Ingrese su Contraseña">
				<br>

				<label for="">Selecione su Perfil</label>
				<select class="custom-select" name="perfilUsuario" id="">
					<option value="">Admisnistrador</option>
					<option value="">Usuario General</option>
				</select>

				<input type="submit" class="btn btn-success" value="Guardar" >
				
			</div>

		</div>


	</form>

	<button class="btn btn-danger btncancelar">Cancelar</button>


	<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/bootstrap/js/jquery-3.5.1.min.js"></script>
	
</body>
</html>