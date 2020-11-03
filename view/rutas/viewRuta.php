<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> </title>
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="../frameworks/bootstrap/css/bootstrap.min.css">
    <!--Own CSS-->
    <link rel="stylesheet" href="../css/style.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1wl3SnXAn5GdplIRneLT4fQ-Nl4-cA6c&callback=initMap" async defer></script>
    <style>
        .div-map {
            height: 500px !important;
        }

        #map {
            height: 100%;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <?php
    require('../../controller/validarURL.php');
    session_start();
    ?>
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="btn btn-outline-light" href="viewRutas.php">Volver</a>
        <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link" href="<?= isset($_SESSION["username"]) ?  '../../controller/cerrarSesion.php' : '../login/viewLogin.php' ?>">
                <?= isset($_SESSION["username"]) ? 'Cerrar Sesión' : 'Iniciar Sesión' ?>
            </a>
        </div>
    </nav>

    <div class="d-flex d-row height--100">
        <!-- Vertical Menu -->
        <div class="vertical-menu">
            <?php if (isset($_SESSION["username"])) : ?>
                <a class="vertical-menu__link" href="../configuracion/viewConfiguracion.php">
                    <i class="vertical-menu__icon fas fa-cog"></i>
                    <h4 class="vertical-menu__title">Configuración</h4>
                </a>
                <a class="vertical-menu__link <?= validateRoute($_SERVER["REQUEST_URI"], "rutas") ? 'is-active' : '' ?>" href="viewRutas.php">
                    <i class="vertical-menu__icon fas fa-route"></i>
                    <h4 class="vertical-menu__title">Rutas</h4>
                </a>
            <?php else : ?>
                <a class="vertical-menu__link <?= validateRoute($_SERVER["REQUEST_URI"], "rutas") ? 'is-active' : '' ?>" href="viewRutas.php">
                    <i class="vertical-menu__icon fas fa-route"></i>
                    <h4 class="vertical-menu__title">Rutas</h4>
                </a>
            <?php endif ?>
        </div>

        <div class="container-fluid d-flex flex-column align-content-center justify-content-center">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8 div-map">
                    <div id="floating-panel">
                        <b>Mode of Travel: </b>
                        <select id="mode">
                            <option value="DRIVING">Driving</option>
                            <option value="WALKING">Walking</option>
                            <option value="BICYCLING">Bicycling</option>
                            <option value="TRANSIT">Transit</option>
                        </select>
                    </div>

                    <div id="map"> </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered table-sm table-hover table-fixed table-striped">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>Trayecto de ida</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12">
                            <table class="table table-bordered table-sm table-hover table-fixed table-striped">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>Trayecto de vuelta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Script Bootstrap -->
        <script src="../frameworks/bootstrap/js/jquery-3.5.1.min.js"></script>
        <script src="../frameworks/bootstrap/js/bootstrap.min.js"></script>

        <script src="../js/rutas/viewRuta.js"></script>

</body>

</html>