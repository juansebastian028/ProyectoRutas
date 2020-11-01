<?php 
    class Login{
        private $db;
        public function __construct()
        {
            require_once('ConexionDB.php');

            $this->db = Conexion::realizarConexion();

        }
    }
?>