<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Rutas</title>
	<!-- CSS Bootstrap -->
	<link rel="stylesheet" href="../assets/libs/bootstrap/css/bootstrap.min.css">
	<!--Own CSS-->
	<link rel="stylesheet" href="../assets/css/style.css">
	<!--Font Awesome-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<!-- datatables -->
	<link rel="stylesheet" href="../assets/libs/dataTables/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="../assets/libs/dataTables/css/dataTables.bootstrap4.css">
	<!-- Alertify -->
	<link rel="stylesheet" href="../assets/libs/alertify/css/alertify.min.css" />
	<link rel="stylesheet" href="../assets/libs/alertify/css/themes/default.min.css" />
	<!--Mapbox-->
	<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
	<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css" type="text/css" />

	<script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
	<link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />
	<style>
		.mapboxgl-ctrl-compass {
			display: none !important;
		}
	</style>
</head>

<body>
	<?php
	require('../../helpers/validarURL.php');
	session_start();
	if (!isset($_SESSION["arrUser"])) {
		header("location:../rutas/viewRutas.php");
	}
	?>
	<!--Nav-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-black">
		<a class="btn btn-outline-light" href="viewConfiguracion.php">Volver</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?= $_SESSION["arrUser"]["Nombre"] . " " . $_SESSION["arrUser"]["Apellido"] ?>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="../../helpers/cerrarSesion.php">
							Cerrar Sesión
						</a>
					</div>
				</li>
			</ul>

		</div>
	</nav>

	<div class="d-flex d-row height--100">
		<!-- Vertical Menu -->
		<div class="vertical-menu col-2 col-md-2 col-lg-2 col-xl-1 p-0">
			<div class="text-center my-2">
				<label class="switch">
					<input class="switch__checkbox" type="checkbox">
					<span class="switch__slider switch__round"></span>
				</label>
				<h4 class="vertical-menu__title font-color">Dark Mode</h4>
			</div>
			<a class="vertical-menu__link" href="../rutas/viewRutas.php">
				<i class="vertical-menu__icon fas fa-route"></i>
				<h4 class="vertical-menu__title">Rutas</h4>
			</a>
			<a class="vertical-menu__link <?= validateRoute($_SERVER["REQUEST_URI"], "configuracion") ? 'is-active' : '' ?>" href="viewConfiguracion.php">
				<i class="vertical-menu__icon fas fa-cog"></i>
				<h4 class="vertical-menu__title">Configuración</h4>
			</a>
		</div>

		<div class="col-10 col-md-10 col-lg-10 col-xl-11">
			<div class="row">
				<div class="mt-2 mb-4 w-100 text-center p-0">
					<h5 class="display-4 font-color">Rutas</h5>
				</div>
				<div class="col-sm-11 m-auto">
					<button class="btn btn-primary mb-4" data-toggle="modal" data-target="#modalRegistro">Registrar</button>
					<table class="table table-bordered table-sm table-hover table-fixed table-striped display nowrap" id="tblRutas" style="width: 100%;">
						<thead class="bg-primary text-white">
							<tr>
								<th>Id</th>
								<th>N° Ruta</th>
								<th>Placa</th>
								<th>Trayecto ida</th>
								<th>Trayecto vuelta</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!-- Modal Registro y edición de Rutas -->
		<div class="modal fade" id="modalRegistro" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="tituloModal">Ruta</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="POST" id="frm">
							<input type="hidden" name="id">
							<input type="hidden" name="longitud">
							<input type="hidden" name="latitud">
							<div class="form-group">
								<label for="nRuta" class="col-form-label">N° Ruta</label>
								<input type="text" class="form-control" placeholder="Ingrese el número de ruta" name="ruta" maxlength="30" required>
							</div>
							<div class="form-group">
								<label for="nPlaca" class="col-form-label">N° Placa</label>
								<input type="text" class="form-control" placeholder="Ingrese el número de placa" name="placa" maxlength="30" required>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label for="trayecto" class="col-form-label">Trayecto</label>
										<input type="text" class="form-control" placeholder="Ingrese el lugar de trayecto" name="trayecto" maxlength="30">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="tipo" class="col-form-label">Tipo</label>
										<select class="form-control" name="tipo">
											<option value="Ida">Ida</option>
											<option value="Vuelta">Vuelta</option>
										</select>
									</div>
								</div>
								<div class="col-12 mb-2">
									<button id="btnModalMapa" class="btn btn-warning btn-block" data-toggle="modal" data-target="#modalMapa">Seleccionar ubicación en el mapa</button>
								</div>
								<div class="col-5 mb-2">
									<button class="btn btn-success" id="btnAgregarTrayecto">Agregar</button>
								</div>
								<div class="col-12 pr-0 table-content">
									<table class="table table-bordered table-sm table-hover table-fixed table-striped" id="tblTrayectos">
										<thead>
											<tr>
												<th>Trayecto</th>
												<th>Tipo</th>
												<th>Latitud</th>
												<th>Longitud</th>
												<th>Eliminar</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary" id="btnGuardar" form="frm">Guardar</button>
					</div>
				</div>
			</div>
		</div>

		<!--Modal mapa-->
		<div class="modal" id="modalMapa" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Mapa</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p>Arrastra el marcador hacia una ubicación en el mapa y cuando salga la alerta cierra el modal.</p>
						<div id='map' style='width: 100%; height: 400px;'></div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" id="btnCerrarMapa" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Script Bootstrap -->
	<script src="../assets/libs/bootstrap/js/jquery-3.5.1.min.js"></script>
	<script src="../assets/libs/bootstrap/js/bootstrap.min.js"></script>
	<!-- Script DataTables -->
	<script src="../assets/libs/dataTables/js/jquery.dataTables.min.js"></script>
	<script src="../assets/libs/dataTables/js/dataTables.bootstrap4.js"></script>
	<!-- Script Altertify -->
	<script src="../assets/libs/alertify/alertify.js"></script>
	<!-- Own JS -->
	<script src="../assets/js/configuracion/mapa.js"></script>
	<script src="../assets/js/configuracion/rutas.js"></script>
	<script src="../assets/js/darkMode.js"></script>

</body>

</html>