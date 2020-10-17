<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>  </title>
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!--Own CSS-->
    <link rel="stylesheet" href="assets/css/verticalmenu.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- datatables -->
    <link rel="stylesheet" href="assets/dataTables/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/dataTables/css/dataTables.bootstrap4.css">
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

            <a class="vertical-menu__link" href="#">
                <i class="vertical-menu__icon fas fa-route"></i>
                <h4 class="vertical-menu__title">Rutas</h4>
            </a>
        </div>

        <div class="container-fluid">     
            <div class="row p-0">
                <div class="card ml-3 mr-3 mt-2 mb-5 w-100 text-center">
                    <div class="card-header bg-primary text-white">
                        <h5>Rutas</h5>
                    </div>
                </div>
                <div class="col-2 mb-4">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalRegistro">Registrar</button>
                </div>
                <div class="col-12">
                    <table class="table table-bordered table-sm table-hover table-fixed table-striped" id="tblRutas">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>N° Ruta</th>
                                <th>Trayecto ida</th>
                                <th>Trayecto vuelta</th>
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
                                    <td>Trayecto vuelta <?= $i ?></td>
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

        <div class="modal fade" id="modalRegistro" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ruta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="POST" id="frm">
                            <input type="hidden" name="id">
                            <div class="form-group">
                                <label for="nRuta" class="col-form-label">N° Ruta</label>
                                <input type="text" class="form-control" name="nRuta" maxlength="30" required>
                            </div>
                            <div class="form-group">
                                <label for="nPlaca" class="col-form-label">N° Placa</label>
                                <input type="text" class="form-control" name="nPlaca" maxlength="30" required>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="trayecto" class="col-form-label">Trayecto</label>
                                        <input type="text" class="form-control" name="trayecto" maxlength="30" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="tipo" class="col-form-label">Tipo</label>
                                        <select class="form-control" name="tipo" id="tipo">
                                            <option value="" selected disabled></option>
                                            <option value="">Ida</option>
                                            <option value="">Vuelta</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <button class="btn btn-success">Agregar</button>
                                </div>
                                <div class="col-12">
                                    <table class="table table-bodered">
                                        <thead>
                                            <tr>
                                                <th>Trayecto</th>
                                                <th>Tipo</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>La casa</td>
                                                <td>Ida</td>
                                                <td>
                                                    <button class="btn btn-sm btn-danger">X</button>
                                                </td>
                                            </tr>
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

    </div>

    <!-- Script Bootstrap -->
    <script src="assets/bootstrap/js/jquery-3.5.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    
    <script src="assets/dataTables/js/jquery.dataTables.min.js"></script>
    <script src="assets/dataTables/js/dataTables.bootstrap4.js"></script>
    <script src="assets/js/rutas.js"></script>

</body>
</html>