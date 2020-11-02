<?php
    require('../model/UsuarioModel.php');

    $opcion = $_POST['opcion'];

    if($opcion === "login"){

        $username = $_POST["usuario"];
        $password = $_POST["password"];
    
        $usuario = new Usuario();
        $esValido = $usuario->validarUsuario($username,$password);
        
        if($esValido){

            session_start();
            $_SESSION["username"] = $user;
        }

        echo $esValido;
        
    }elseif ($opcion === "registrarse") {

        $Nombre_Usuario = $_POST['Nombre-Usuario'];
        $Apellido_Usuario = $_POST['Apellido-Usuario'];
        $Nombre_De_Usuario = $_POST['Nombre_De_Usuario'];
        $Contraseña_Usuario = $_POST['Contraseña-Usuario'];
        $Perfil_Usuario = $_POST['perfilUsuario'];

        $Contraseña_encriptada = password_hash($Contraseña_Usuario, PASSWORD_DEFAULT);

        $admin = new Admin();

        echo $admin->registrarUsuario($Nombre_Usuario,$Apellido_Usuario,$Nombre_De_Usuario,$Contraseña_encriptada,$Perfil_Usuario);

        
    }
