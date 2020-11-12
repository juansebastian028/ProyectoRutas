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
    <link rel="stylesheet" href="../assets/frameworks/bootstrap/css/bootstrap.min.css">
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
        <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link" href="<?= isset($_SESSION["username"]) ?  '../../helpers/cerrarSesion.php' : '../login/viewLogin.php' ?>">
                <?= isset($_SESSION["username"]) ? 'Cerrar Sesión' : 'Iniciar Sesión' ?>
            </a>
        </div>
    </nav>

    <div class="d-flex d-row height--100">
        <!-- Vertical Menu -->
        <div class="vertical-menu">
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
            <?php if (isset($_SESSION["username"])) : ?>
                <a class="vertical-menu__link" href="../configuracion/viewConfiguracion.php">
                    <i class="vertical-menu__icon fas fa-cog"></i>
                    <h4 class="vertical-menu__title">Configuración</h4>
                </a>
            <?php endif ?>
        </div>

        <div class="container-fluid d-flex flex-column align-content-center justify-content-center">
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
        <script src="../assets/frameworks/bootstrap/js/jquery-3.5.1.min.js"></script>
        <script src="../assets/frameworks/bootstrap/js/bootstrap.min.js"></script>
        <!--Own JS-->
        <script>
            let arrTrayectos = <?= json_encode($arrTrayectos) ?>;
        </script>
        <script src="../assets/js/darkMode.js"></script>
        <script src="../assets/js/rutas/viewRuta.js"></script>


</body>

</html>