<?php
    require('../model/UsuarioModel.php');

    $opcion = $_PSOT['opcion'];

    if($opcion === "login"){
        
        $username = $_POST["usuario"];
        $password = $_POST["password"];
    
        $usuario = new Usuario();
    
        $numsFila = $usuario->validarUsuario($username,$password);
    
        if($numsFila>0){
    
            session_start();
            $_SESSION["username"] = $user;
            json_encode("Te has logueado con éxito");
    
        }else{
            json_encode("Nombre de usuario o contraseña incorrecta");
        }
    }


?>