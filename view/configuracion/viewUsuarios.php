<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="../assets/frameworks/bootstrap/css/bootstrap.min.css">
    <!--Own CSS-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- datatables -->
    <link rel="stylesheet" href="../assets/frameworks/dataTables/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/frameworks/dataTables/css/dataTables.bootstrap4.css">
    <!-- Alertify -->
    <link rel="stylesheet" href="../assets/frameworks/alertify/css/alertify.min.css" />
    <link rel="stylesheet" href="../assets/frameworks/alertify/css/themes/default.min.css" />
</head>

<body>
    <?php
    require('../../helpers/validarURL.php');
    session_start();
    if (!isset($_SESSION["username"])) {
        header("location:../login/viewLogin.php");
    }
    ?>
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
        <a class="btn btn-outline-light" href="viewConfiguracion.php">Volver</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $_SESSION["username"] ?>
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
        <div class="vertical-menu">
            <div class="text-center my-2">
                <label class="switch">
                    <input class="switch__checkbox" type="checkbox">
                    <span class="switch__slider switch__round"></span>
                </label>
                <h4 class="vertical-menu__title font-color">Dark Mode</h4>
            </div>
            <a class="vertical-menu__link" href="../rutas/viewRutas.php">
                <i class="vertical-menu__icon fas fa-route"></i>
                <h4 class="vertical-menu__title"> Rutas</h4>
            </a>
            <a class="vertical-menu__link <?= validateRoute($_SERVER["REQUEST_URI"], "configuracion") ? 'is-active' : '' ?>" href="viewConfiguracion.php">
                <i class="vertical-menu__icon fas fa-cog"></i>
                <h4 class="vertical-menu__title">Configuración</h4>
            </a>
        </div>

        <div class="container-fluid">
            <div class="row p-0">
                <div class="ml-3 mr-3 mt-2 mb-4 col-12 text-center">
                    <h5 class="display-4 font-color">Usuarios</h5>
                </div>
                <div class="col-2 mb-4">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalRegistro">Registrar</button>
                </div>
                <div class="col-12">
                    <table class="table table-striped table-bordered table-sm" id="tblUsuarios">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Usuario</th>
                                <th>Perfil</th>
                                <th>Perfil Id</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Modal Registro-->
    <div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tituloModal">Registrar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="frm">
                        <input type="hidden" name="usuarioId">
                        <label for="">Nombre</label>
                        <input class="form-control" type="text" placeholder="Ingrese su nombre" name="nombre">
                        <br>

                        <label for="">Apellido</label>
                        <input class="form-control" type="text" placeholder="Ingrese su apellido" name="apellido">
                        <br>

                        <label for="">Usuario</label>
                        <input class="form-control" type="text" placeholder="Ingrese su nombre de usuario" name="usuario" autocomplete="off">
                        <br>

                        <label for="">Contraseña</label>
                        <input class="form-control" type="password" placeholder="Ingrese su contraseña" name="contrasena" autocomplete="off">
                        <br>

                        <label for="">Selecione su Perfil</label>
                        <select class="custom-select" name="perfilId">
                            <option value="1">Admisnistrador</option>
                            <option value="2">Usuario General</option>
                        </select>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" form="frm" id="evenbutton" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </div>


    </div>

    <!-- Script Bootstrap -->
    <script src="../assets/frameworks/bootstrap/js/jquery-3.5.1.min.js"></script>
    <script src="../assets/frameworks/bootstrap/js/bootstrap.min.js"></script>
    <!-- Script DataTables -->
    <script src="../assets/frameworks/dataTables/js/jquery.dataTables.min.js"></script>
    <script src="../assets/frameworks/dataTables/js/dataTables.bootstrap4.js"></script>
    <!-- Script Altertify -->
    <script src="../assets/frameworks/alertify/alertify.js"></script>
    <!-- Own JS -->
    <script src="../assets/js/configuracion/usuarios.js"></script>
    <script src="../assets/js/darkMode.js"></script>


</body>

</html>