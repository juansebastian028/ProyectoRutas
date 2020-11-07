<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> </title>
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="../assets/frameworks/bootstrap/css/bootstrap.min.css">
    <!--Own CSS-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <?php
    require('../../helpers/validarURL.php');
    session_start();
    ?>
    <!-- Nav -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link" href="<?= isset($_SESSION["username"]) ?  '../../helpers/cerrarSesion.php' : '../login/viewLogin.php' ?>">
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

        <div class="container-fluid" id="container-rutas">
            <div id="formSearch" class="container my-2">
                <form class="d-flex">
                    <input name="inputSearch" class="form-control mr-2" type="search" placeholder="Escribe tu búsqueda aquí" aria-label="Search">
                </form>
            </div>
            <div id="cards-container" class="row d-flex flex-row justify-content-center">
            </div>
            <div class="d-flex justify-content-center mt-2">
                <ul class="pagination" id="rutas-pagination">
                    
                </ul>
            </div>
        </div>

        <!-- Script Bootstrap -->
        <script src="../assets/frameworks/bootstrap/js/jquery-3.5.1.min.js"></script>
        <script src="../assets/frameworks/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/rutas/viewRutas.js"></script>

</body>

</html>