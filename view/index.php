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

            <a class="vertical-menu__link" href="#">
                <i class="vertical-menu__icon fas fa-route"></i>
                <h4 class="vertical-menu__title">Rutas</h4>
            </a>
        </div>

        <div class="container-fluid"> 
            <div class="container my-2">
                <form class="d-flex">
                        <input class="form-control mr-2" type="search" placeholder="Escribe tu búsqueda aquí" aria-label="Search">
                        <button class="btn btn-primary" type="submit">Buscar</button>
                </form>
            </div>    

            <div class="row d-flex flex-row justify-content-center">
                <div class="col-xs-12 col-sm-6 col-lg-3 m-2">
                    <button class="btn d-block w-100 p-0">
                        <div class="card">
                            <div class="container-fluid bg-gray text-center py-4">
                                <i class="fas fa-bus display-1"></i>
                            </div>
                            <div class="container-fluid bg-gray-dark text-center">
                                <h5 class="card-title">Ruta 17</h5>
                            </div>
                        </div>
                    </button>
                </div>  
            </div>

            <div class="d-flex justify-content-center mt-2">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item" aria-current="page">
                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </div>

            

        </div>

    <!-- Script Bootstrap -->
    <script src="assets/bootstrap/js/jquery-3.5.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>