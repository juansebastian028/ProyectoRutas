<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>  </title>
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!--Own CSS-->
    <link rel="stylesheet" href="css/verticalmenu.css">
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

            <a class="vertical-menu__link" href="#">
                <i class="vertical-menu__icon fas fa-route"></i>
                <h4 class="vertical-menu__title">Rutas</h4>
            </a>
        </div>

        <div class="container-fluid">     
            <form>
                <div class="form-inline">
                    <input class="form-control d-inline-block w-50 m-2" type="search" placeholder="Escribe tu búsqueda aquí" aria-label="Search">
                    <button class="btn btn-primary d-inline-block" type="submit">Buscar</button>
                </div>
            </form>


        </div>

    </div>

    <!-- Script Bootstrap -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/jquery-3.5.1.min.js"></script>

</body>
</html>