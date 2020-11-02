<?php 
    class Usuario{

        protected $db;

        public function __construct()
        {
            require_once('ConexionDB.php');

            $this->db = Conexion::realizarConexion();

        }

        public function validarUsuario($username,$password){
            
            $password_ecriptada = $this->getContrasena($username);

            $sql = 'SELECT * FROM usuario WHERE Usuario = ?';

            $stmt= $this->db->prepare($sql);

            $stmt ->bind_param("s",$username);

            $stmt ->execute();
            $user = $stmt->get_result()->fetch_assoc();

            if($user && password_verify($password,$password_ecriptada)){
                
                return true;
            }else{

                return false;
            }
        
        }
        
        private function getContrasena($username){

            $sql = "SELECT Contrasena FROM usuario WHERE Usuario= ?";

            $stmt= $this->db->prepare($sql);

            $stmt ->bind_param("s",$username);

            $stmt ->execute();
            $password = $stmt->get_result()->fetch_assoc();

            return $password['Contrasena'];
            
        }
    }
    
    class Admin extends Usuario{

        public function __construct()
        {
            parent::__construct();
        }

        public function registrarUsuario($nombre,$apellido,$nombreUsuario,$contrasenaUsuario,
            $perfilUsuario){

            $Registrar_Usuario = "INSERT INTO usuario (Nombre, Apellido, Usuario, Contrasena, PerfilId) VALUES (?,?,?,?,?)";

            $result = $this->db->prepare($Registrar_Usuario);

            $result->bind_param("ssssi",$nombre,$apellido,$nombreUsuario,$contrasenaUsuario,
            intval($perfilUsuario));

            return $result->execute();
        }

        public function registrarRuta($nRuta,$nPlaca){

            $Registrar_Ruta = "INSERT INTO ruta (Numero,Placa) VALUES (?,?)";

            $result = $this->db->prepare($Registrar_Ruta);

            $result->bind_param("is",$nRuta,$nPlaca);

            return $result->execute();



        }


    }
?>