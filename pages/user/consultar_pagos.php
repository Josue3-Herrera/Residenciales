<?php
session_start();
include '../conexion.php';
include '../../clases/auth.php';

if (!isset($_SESSION['usuario'])) {
    // Manejo de sesión no iniciada
    exit();
}

$usuario = $_SESSION['usuario'];
$auth = new auth();
$id_usuario = $auth->obtenerIdUsuario($usuario);

$sql = "SELECT id_gasto FROM t_pagos WHERE id_usuario = $id_usuario";
$resultado = $conn->query($sql);

$pagos = [];

if ($resultado && $resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $pagos[] = $fila['id_gasto'];
    }
}

$conn->close();

echo '<script src="eliminar_tarjeta.js"></script>';
echo '<script>';
foreach ($pagos as $idGasto) {
    echo "eliminarTarjeta($idGasto);";
}
echo '</script>';
?>
