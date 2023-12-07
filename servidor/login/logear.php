<?php
include '../../clases/auth.php';
session_start();
if(isset($_POST['usuario']) && isset($_POST['password'])){
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $auth = new auth();
    if ($auth->logear($usuario, $password)) {
        $_SESSION['usuario'] = $usuario;
        $rol = $auth->obtenerRol($usuario);

        switch ($rol) {
            case 1:
                header("location: ../../pages/user/inicio.php");
                break;
            case 2:
                header("location: ../../pages/admin/index.php");
                break;
            default:
                echo "Rol no válido";
                break;
        }
    } else {
        echo "No se pudo logear";
    }
} else {
    echo "No se recibieron los datos del formulario.";
}
?>
