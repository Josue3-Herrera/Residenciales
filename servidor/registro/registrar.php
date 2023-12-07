<?php
include '../../clases/auth.php';

$usuario=$_POST['usuario'];
$password=password_hash($_POST['password'], PASSWORD_DEFAULT);
$nombre=$_POST['nombre'];
$apellidos=$_POST['apellido'];
$email=$_POST['email'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];

$auth=new auth();

if($auth->registrar($usuario, $password,$nombre,$apellidos,$email,$telefono,$direccion)){
    header("location:../../index.php");
}
else{
    echo "<h1>No se pudo registrar, intentelo de nuevo!</h1>";
}
?>
