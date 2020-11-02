<?php
<<<<<<< HEAD
require('../model/UsuarioModel.php');

$opcion = $_POST['opcion'];

if($opcion === "login"){

    $username = $_POST["usuario"];
    $password = $_POST["password"];
    
    $usuario = new Usuario();
    $esValido = $usuario->validarUsuario($username,$password);
    
    if($esValido){
=======
    require('../model/UsuarioModel.php');
    //var_dump($_POST);
    $opcion = $_POST['opcion'];

    $admin = new Admin();
    $usuario = new Usuario();

    if($opcion === "login"){

        $username = $_POST["usuario"];
        $password = $_POST["password"];
        
        $esValido = $usuario->validarUsuario($username,$password);
        
        if($esValido){
>>>>>>> 32633e7f4d0aefbd8e36eb4f723aa720c6febbbb

        session_start();
        $_SESSION["username"] = $user;
        $_SERVER['']
    }

    echo $esValido;
    
}elseif ($opcion === "registrarse") {

<<<<<<< HEAD
    $Nombre_Usuario = $_POST['Nombre-Usuario'];
    $Apellido_Usuario = $_POST['Apellido-Usuario'];
    $Nombre_De_Usuario = $_POST['Nombre_De_Usuario'];
    $Contraseña_Usuario = $_POST['Contraseña-Usuario'];
    $Perfil_Usuario = $_POST['perfilUsuario'];

    $Contraseña_encriptada = password_hash($Contraseña_Usuario, PASSWORD_DEFAULT);

    $admin = new Admin();

    echo $admin->registrarUsuario($Nombre_Usuario,$Apellido_Usuario,$Nombre_De_Usuario,$Contraseña_encriptada,$Perfil_Usuario);

    
}
=======
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        $perfilId = $_POST['perfilId'];

        $ContrasenaEncriptada = password_hash($contrasena, PASSWORD_DEFAULT);

        echo $admin->registrarUsuario($nombre,$apellido,$usuario,$ContraseñaEncriptada,$perfilId);

    }elseif ($opcion === "consulta") {

        echo '{"data": '.json_encode($admin->getUsuarios()).'}';
    
    }elseif ($opcion === "eliminar"){
        $id = json_decode($_POST['id']);
        echo $admin->eliminarUsuario($id);

    }elseif($opcion === "actualizar"){

        $usuarioId = $_POST['usuarioId'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        $perfilId = $_POST['perfilId'];
    
        echo $admin->actualizarUsuario($usuarioId,$nombre,$apellido,$usuario,$contrasena,$perfilId);
    }
>>>>>>> 32633e7f4d0aefbd8e36eb4f723aa720c6febbbb
