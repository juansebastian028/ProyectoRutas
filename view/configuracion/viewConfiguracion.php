<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Configuración</title>
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="../assets/libs/bootstrap/css/bootstrap.min.css">
    <!--Own CSS-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <?php
    require('../../helpers/validarURL.php');
    session_start();
    if (!isset($_SESSION["arrUser"])) {
        header("location:../rutas/viewRutas.php");
    }
    ?>
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
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
            <div class="row d-flex flex-row justify-content-center align-content-center height--100">
                <?php if ($_SESSION["arrUser"]["Perfilid"] === 1) : ?>
                    <div class="col-xs-12 col-sm-6 col-lg-3 m-2">
                        <a class="d-block w-100 p-0 link-icon" href="viewUsuarios.php">
                            <div class="card border-0">
                                <div class="container-fluid primary-color text-center py-4">
                                    <i class="fas fa-user display-1"></i>
                                </div>
                                <div class="container-fluid secondary-color text-center py-2">
                                    <h5 class="card-title mb-0">Usuarios</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-lg-3 m-2">
                        <a class="d-block w-100 p-0 link-icon" href="viewRutas.php">
                            <div class="card border-0">
                                <div class="container-fluid primary-color text-center py-4">
                                    <i class="fas fa-route display-1"></i>
                                </div>
                                <div class="container-fluid secondary-color text-center py-2">
                                    <h5 class="card-title mb-0">Rutas</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php else : ?>
                    <div class="col-xs-12 col-sm-6 col-lg-3 m-2">
                        <a class="d-block w-100 p-0 link-icon" href="viewRutas.php">
                            <div class="card border-0">
                                <div class="container-fluid primary-color text-center py-4">
                                    <i class="fas fa-route display-1"></i>
                                </div>
                                <div class="container-fluid secondary-color text-center py-2">
                                    <h5 class="card-title mb-0">Rutas</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Script Bootstrap -->
    <script src="../assets/libs/bootstrap/js/jquery-3.5.1.min.js"></script>
    <script src="../assets/libs/bootstrap/js/bootstrap.min.js"></script>
    <!--Own JS-->
    <script src="../assets/js/darkMode.js"></script>
</body>

</html>