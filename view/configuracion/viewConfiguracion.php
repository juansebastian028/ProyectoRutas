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
</head>

<body>
    <?php
        require('../../controller/validarURL.php');
        session_start();
        if(!isset($_SESSION["username"])){

        }
    ?>
    <!-- Nav -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link" href="../../controller/cerrarSesion.php">Cerrar Sesión</a>
        </div>
    </nav>

    <div class="d-flex d-row height--100">
        <!-- Vertical Menu -->
        <div class="vertical-menu">
                <a class="vertical-menu__link <?= validateRoute($_SERVER["REQUEST_URI"], "configuracion") ? 'is-active' : '' ?>" href="viewConfiguracion.php">
                    <i class="vertical-menu__icon fas fa-cog"></i>
                    <h4 class="vertical-menu__title">Configuración</h4>
                </a>        
                <a class="vertical-menu__link" href="../rutas/viewRutas.php">
                    <i class="vertical-menu__icon fas fa-route"></i>
                    <h4 class="vertical-menu__title">Rutas</h4>
                </a>
        </div>

        <div class="container-fluid">
            <div class="row d-flex flex-row justify-content-center align-content-center height--100">
                <div class="col-xs-12 col-sm-6 col-lg-3 m-2">
                    <a class="d-block w-100 p-0 link-icon" href="viewUsuarios.php">
                        <div class="card">
                            <div class="container-fluid bg-gray text-center py-4">
                                <i class="fas fa-user display-1"></i>
                            </div>
                            <div class="container-fluid bg-gray-dark text-center py-2">
                                <h5 class="card-title mb-0">Usuarios</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-3 m-2">
                    <a class="d-block w-100 p-0 link-icon" href="viewRutas.php">
                        <div class="card">
                            <div class="container-fluid bg-gray text-center py-4">
                                <i class="fas fa-route display-1"></i>
                            </div>
                            <div class="container-fluid bg-gray-dark text-center py-2">
                                <h5 class="card-title mb-0">Rutas</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Script Bootstrap -->
        <script src="../frameworks/bootstrap/js/jquery-3.5.1.min.js"></script>
        <script src="../frameworks/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>