<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/login.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<title>Login</title>
</head>
<body>

	<form action="index.php"  method="POST" >
		
		<div class="centrardiv">
			
			<h1>Iniciar sesión</h1>

			
			<label class="moverlabel" for="lbusuario">Usuario</label>
			<input class="form-control" type="text"  id="lbusuario" name="txtusuario" placeholder="Ingrese su nombre de usuario"
			maxlength="20" minlength="1">
			
			

			<label class="moverlabel" for="lbpassword">Contraseña</label>
			<input class="form-control" type="password" id="lbpassword" name="txtpassword" 
			placeholder="Ingrese su contraseña" maxlength="20" minlength="1">

			<input class="btn btn-primary" type="submit" name="ingresar" value="Ingresar">
		</div>

	</form>



	
</body>
</html>