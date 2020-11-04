<?php
require('../model/RutaModel.php');

$opcion = $_POST['opcion'];
$ruta = new Ruta();

if ($opcion === "registrar") {

    $nRuta = $_POST['nRuta'];
    $nPlaca = $_POST['nPlaca'];
    $trayectos = $_POST['trayectos'];
    echo $ruta->registrarRuta($nRuta, $nPlaca, $trayectos);

}elseif($opcion === "obtener"){
    echo json_encode($ruta->getRutas());
}
