<?php
session_start();
include '../../clases/auth.php';
$auth = new auth();
$idUsuario = $auth->obtenerIdUsuario($_SESSION['usuario']);

include '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $monto_pagado = $_POST["monto"];
    $id_gasto = $_POST["id_gasto"]; // Este campo viene del formulario

    // Obtener el ID del usuario (aquí debes obtener el ID del usuario de la sesión actual)
    $id_usuario = $idUsuario; // Utiliza la variable $idUsuario obtenida de la clase auth

    // Insertar el pago en la tabla t_pagos
    $sql_insert_pago = "INSERT INTO t_pagos (id_usuario, id_gasto, monto_pagado) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql_insert_pago);
    $stmt->bind_param("iid", $id_usuario, $id_gasto, $monto_pagado);

    if ($stmt->execute()) {
        // Éxito al registrar el pago

        // Opción 1: Redirigir inmediatamente a la página de inicio después de un segundo (opcional)
        header('Refresh: 1; URL=inicio.php');

        // Opción 2: Devuelve una respuesta JSON indicando el éxito del pago
        header('Content-Type: application/json');
        // echo json_encode(array('success' => true));
        exit();
    } else {
        // Error al registrar el pago
        echo "Error al procesar el pago: " . $stmt->error;
    }

    $stmt->close();
}

// Consulta para obtener los gastos pagados en formato PHP
$sql = "SELECT id_gasto FROM t_pagos WHERE id_usuario = $idUsuario";
$resultado = $conn->query($sql);

$pagos = [];

if ($resultado && $resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $pagos[] = $fila['id_gasto'];
    }
} else {
    // No se encontraron gastos pagados
    $pagos = ['message' => 'No hay gastos pagados'];
}

$conn->close();
?>
