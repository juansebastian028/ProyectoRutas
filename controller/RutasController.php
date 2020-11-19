<?php
require('../model/RutaModel.php');
require('../helpers/Paginacion.php');

$opcion = $_POST['opcion'];
$ruta = new Ruta();

if ($opcion === "registrar") {

    $nRuta = $_POST['nRuta'];
    $nPlaca = $_POST['nPlaca'];
    $trayectos = $_POST['trayectos'];
    echo $ruta->registrarRuta($nRuta, $nPlaca, $trayectos);
} elseif ($opcion === "actualizar") {

    $id = $_POST['id'];
    $nRuta = $_POST['nRuta'];
    $nPlaca = $_POST['nPlaca'];
    $trayectos = $_POST['trayectos'];
    echo $ruta->actualizarRuta($id, $nRuta, $nPlaca, $trayectos);
} elseif ($opcion === "obtener") {

    $cantidadRegistros = $ruta->getNumeroDeRegistros();
    $paginacion = new Paginacion($cantidadRegistros, 6);
    $numFilaInicial = $paginacion->getstartRowNumber();
    $numFilaLimite = $paginacion->getLimitRowNumber();
    $totalPaginas = $paginacion->getTotalPages();
    echo json_encode(['totalPaginas' => $totalPaginas, 'rutas' => $ruta->getRutas()]);
} elseif ($opcion === "eliminar") {
    $id = json_decode($_POST['id']);
    echo $ruta->eliminarRuta($id);
} elseif ($opcion === "consulta") {

    echo '{"data": ' . json_encode($ruta->getRutas()) . '}';
} elseif ($opcion === "trayectos") {
    $rutaId = $_POST['id'];
    echo json_encode($ruta->getTrayectos($rutaId));
}
