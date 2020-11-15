<?php
require('../model/UsuarioModel.php');
$opcion = $_POST['opcion'];

$admin = new Admin();
$usuario = new Usuario();

if ($opcion === "login") {

    $username = $_POST["usuario"];
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
        $user = false;
    } else {
        $user = $usuario->validarUsuario($username, $password);
    }
    
    if ($user != false) {
        
        session_start();
        $_SESSION["username"] = $user;
        
    }

    echo $user;

} elseif ($opcion === "registrarse") {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $perfilId = $_POST['perfilId'];

    $ContrasenaEncriptada = password_hash($contrasena, PASSWORD_DEFAULT);

    echo $admin->registrarUsuario($nombre, $apellido, $usuario, $ContrasenaEncriptada, $perfilId);
} elseif ($opcion === "consulta") {

    echo '{"data": ' . json_encode($admin->getUsuarios()) . '}';
} elseif ($opcion === "eliminar") {
    $id = json_decode($_POST['id']);
    echo $admin->eliminarUsuario($id);
} elseif ($opcion === "actualizar") {

    $usuarioId = $_POST['usuarioId'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $perfilId = $_POST['perfilId'];
    $ContrasenaEncriptada = "";
    if ($contrasena !== "") {
        $ContrasenaEncriptada = password_hash($contrasena, PASSWORD_DEFAULT);
    }

    echo $admin->actualizarUsuario($usuarioId, $nombre, $apellido, $usuario, $ContrasenaEncriptada, $perfilId);
}
