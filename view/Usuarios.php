<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!--Own CSS-->
    <link rel="stylesheet" href="assets/css/app.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <!-- Nav -->
    <nav class="navbar navbar-dark bg-dark">
      <div class="navbar-nav ml-auto">
        <a class="nav-item nav-link" href="#">Iniciar Sesión</a>
      </div>
    </nav> 

    <div class="d-flex d-row">
        <!-- Vertical Menu -->
        <div class="vertical-menu">
            <a class="vertical-menu__link" href="#">
                <i class="vertical-menu__icon fas fa-cog"></i>
                <h4 class="vertical-menu__title">Configuración</h4>
            </a>

            <a class="vertical-menu__link" href="">
                <i class="vertical-menu__icon fas fa-route"></i>
                <h4 class="vertical-menu__title"> Rutas</h4>
            </a>
        </div>

        <div class="container-fluid">     
            <div class="row p-0">
                <div class="card ml-3 mr-3 mt-2 mb-5 w-100 text-center">
                    <div class="card-header bg-primary text-white">
                        <h5>Usuarios</h5>
                    </div>
                </div>
                <div class="col-2 mb-4">
                    <button  class="btn btn-primary" data-toggle="modal" data-target="#modalRegistro">Registrar</button>
                </div>
                <div class="col-12">
                    <table class="table table-bordered table-sm table-hover table-fixed table-striped" id="tblRutas">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Nombre</th>
                                <th>Usuarios</th>
                                <th>acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for($i = 0; $i < 50; $i++){
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td>Trayecto ida <?= $i ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Editar</button>
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        
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

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" onclick="" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Bootstrap -->
     <script src="assets/bootstrap/js/jquery-3.5.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   

</body>
</html>