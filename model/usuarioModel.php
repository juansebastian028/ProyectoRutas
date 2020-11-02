<?php 
    class Usuario{

        private $db;

        public function __construct()
        {
            require_once('ConexionDB.php');

            $this->db = Conexion::realizarConexion();

        }

        public function validarUsuario($username,$password){
            
            $sql = 'SELECT * FROM usuario WHERE Usuario = ? AND Contrasena=?';

            $result = $this->db->prepare($sql);

            $result->bind_param("ss",$username,$password);

            $result->execute();
            $result->store_result();
            return $result->num_rows;
        }
    }
    
    class Admin extends Usuario{
        public function __construct()
        {
            parent::__construct();
        }

        public function registrarUsuario(){

        }
    }
?>