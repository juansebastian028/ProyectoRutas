<?php
require('../../helpers/validarURL.php');
require('../../model/rutaModel.php');
session_start();
$ruta = new Ruta();
if (isset($_GET['id'])) {

    $arrTrayectos = $ruta->getTrayectos($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trayecto de Rutas</title>
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="../assets/libs/bootstrap/css/bootstrap.min.css">
    <!--Own CSS-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!--Mapbox-->
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />

    <style>
        .mapboxgl-ctrl-compass {
            display: none !important;
        }
    </style>

</head>

<body>
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
        <a class="btn btn-outline-light" href="viewRutas.php">Volver</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['arrUser'])) : ?>
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
                <?php else : ?>
                    <li class="nav-item"> <a class="nav-link" href="../login/viewLogin.php">Iniciar Sesión</a> </li>
                <?php endif; ?>
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
            <a class="vertical-menu__link <?= validateRoute($_SERVER["REQUEST_URI"], "rutas") ? 'is-active' : '' ?>" href="viewRutas.php">
                <i class="vertical-menu__icon fas fa-route"></i>
                <h4 class="vertical-menu__title">Rutas</h4>
            </a>
            <?php if (isset($_SESSION["arrUser"])) : ?>
                <a class="vertical-menu__link" href="../configuracion/viewConfiguracion.php">
                    <i class="vertical-menu__icon fas fa-cog"></i>
                    <h4 class="vertical-menu__title">Configuración</h4>
                </a>
            <?php endif ?>
        </div>

        <div class="col-10 col-md-10 col-lg-10 col-xl-11 d-flex flex-column align-content-center justify-content-center">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8">
                    <div id='map' style='width: 100%; height: 500px;'></div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="row">
                        <div class="col-12">
                            <table id="tablaTrayectoIda" class="table table-bordered table-sm table-hover table-fixed table-striped">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>Trayecto de ida</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12">
                            <table id="tablaTrayectoVuelta" class="table table-bordered table-sm table-hover table-fixed table-striped">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>Trayecto de vuelta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Script Bootstrap -->
        <script src="../assets/libs/bootstrap/js/jquery-3.5.1.min.js"></script>
        <script src="../assets/libs/bootstrap/js/bootstrap.min.js"></script>
        <!--Own JS-->
        <script>
            let arrTrayectos = <?= json_encode($arrTrayectos) ?>;
        </script>
        <script src="../assets/js/darkMode.js"></script>
        <script src="../assets/js/rutas/viewRuta.js"></script>


</body>

</html>