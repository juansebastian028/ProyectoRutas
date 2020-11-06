<?php
require('../model/RutaModel.php');

$opcion = $_POST['opcion'];
$ruta = new Ruta();

if ($opcion === "registrar") {

    $nRuta = $_POST['nRuta'];
    $nPlaca = $_POST['nPlaca'];
    $trayectos = $_POST['trayectos'];
    echo $ruta->registrarRuta($nRuta, $nPlaca, $trayectos);

} elseif ($opcion === "eliminar") {
    $id = json_decode($_POST['id']);
    echo $ruta->eliminarRuta($id);
} elseif($opcion === "obtener"){

    echo json_encode($ruta->getRutas());

} elseif ($opcion === "consulta") {

    echo '{"data": ' . json_encode($ruta->getRutas()) . '}';

} elseif ($opcion === "trayectos"){
    $rutaId = $_POST['id'];
    echo json_encode($ruta->getTrayectos($rutaId));
}