<?php 
    class Usuario{

        protected $db;

        public function __construct()
        {
            require_once('../db/Conexion.php');

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

        public function registrarUsuario($nombre,$apellido,$nombreUsuario,$contrasenaUsuario,$perfilId){

            $sql = "SELECT * FROM usuario WHERE Usuario= ?";

            $stmt= $this->db->prepare($sql);

            $stmt ->bind_param("s",$nombreUsuario);

            $stmt ->execute();
            $user = $stmt->get_result()->fetch_assoc();

            if ($user == null){
                $sql = "INSERT INTO usuario (Nombre, Apellido, Usuario, Contrasena, PerfilId) VALUES (?,?,?,?,?)";
    
                $result = $this->db->prepare($sql);
    
                $result->bind_param("ssssi",$nombre,$apellido,$nombreUsuario,$contrasenaUsuario,$perfilId);
    
                return $result->execute();
            } else {
                return 2;
            }

        }

        public function actualizarUsuario($idUsuario,$nombre,$apellido,$nombreUsuario,$contrasenaUsuario,
        $perfilId){
            

            if($contrasenaUsuario == ''){
                $sql = "UPDATE usuario SET Nombre=?, Apellido=?, Usuario=?, Perfilid=? WHERE Usuarioid=?";
            }else{
                $sql = "UPDATE usuario SET Nombre=?, Apellido=?, Usuario=?, Contrasena=?, Perfilid=? WHERE Usuarioid=?";
            }

            $result = $this->db->prepare($sql);

            if($contrasenaUsuario == ''){
                $result->bind_param("sssii",$nombre,$apellido,$nombreUsuario,intval($perfilId),$idUsuario);
            }else{
                $result->bind_param("ssssii",$nombre,$apellido,$nombreUsuario,$contrasenaUsuario,
                intval($perfilId),$idUsuario);
            }


            return $result->execute();
        }

        public function getUsuarios(){
            $sql = "SELECT u.Usuarioid, u.Nombre, u.Apellido, u.Usuario, u.Contrasena, p.Perfilid, p.Nombre AS Perfil FROM usuario u INNER JOIN perfil p ON u.Perfilid=p.Perfilid";
            
            if($exec_query = $this->db->query($sql)){
    
                $arr= $exec_query->fetch_all(MYSQLI_ASSOC);

                return $arr;
            }else{
                return [];
            }
        }

        public function eliminarUsuario($id){
            $sql = "DELETE FROM usuario WHERE Usuarioid=$id";

            if ($this->db->query($sql)) {
                return true;
             } else {
                return false;
             }
        }
    }
