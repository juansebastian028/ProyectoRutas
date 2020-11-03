<?php
require('../model/RutaModel.php');

$opcion = $_POST['opcion'];

if ($opcion === "registrar") {

    $nRuta = $_POST['nRuta'];
    $nPlaca = $_POST['nPlaca'];
    $trayectos = $_POST['trayectos'];

    $ruta = new Ruta();

    echo $ruta->registrarRuta($nRuta, $nPlaca, $trayectos);
}
