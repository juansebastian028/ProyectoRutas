<?php
require('../model/UsuarioModel.php');
$opcion = $_POST['opcion'];

$admin = new Admin();
$usuario = new Usuario();

if ($opcion === "login") {

    $username = $_POST["usuario"];
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
        $esValido = false;
        $fullname = false;
    } else {
        $fullname = $usuario->validarUsuario($username, $password);
    }

    if ($fullname !== false) {

        session_start();
        $_SESSION["username"] = $fullname;
        $esValido = true;
        echo $esValido;
    } else {

        $esValido = false;
        echo $esValido;
    }
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
    $contrasena = $_POST['contrasena'];
    $perfilId = $_POST['perfilId'];
    $ContrasenaEncriptada = "";
    echo $usuario;
    if ($contrasena !== "") {
        $ContrasenaEncriptada = password_hash($contrasena, PASSWORD_DEFAULT);
    }

    echo $admin->actualizarUsuario($usuarioId, $nombre, $apellido, $ContrasenaEncriptada, $perfilId);
}
