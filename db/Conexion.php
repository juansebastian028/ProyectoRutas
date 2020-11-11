<?php 
    require(dirname(__FILE__) . '/config.php');

    class Conexion{
        public static function realizarConexion(){

            $conexion = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

            if($conexion->connect_errno){

                die('Error ' . $conexion->connect_error);
            }
            return $conexion;
        }
    }
