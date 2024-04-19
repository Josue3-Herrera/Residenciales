<?php
// Verifica si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../conexion.php';

    // Obtén los datos del formulario
    $idProveedor = $_POST['id_proveedor'];
    $nombreProveedor = $_POST['nombre_proveedor'];
    $servicioOfrecido = $_POST['servicio_ofrecido'];
    $telefonoContacto = $_POST['telefono_contacto'];
    $emailContacto = $_POST['email_contacto'];
    $direccion = $_POST['direccion'];

    // Actualiza la fila en la base de datos
    $sql = "UPDATE t_proveedores SET nombre='$nombreProveedor', servicio_ofrecido='$servicioOfrecido', telefono_contacto='$telefonoContacto', email_contacto='$emailContacto', direccion='$direccion' WHERE id_proveedor=$idProveedor";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        // Redirige de vuelta a la página de proveedores
        header("Location: /RESIDENCIALES/pages/admin/proveedores.php");
        exit(); // Asegura que el script no siga ejecutándose
    } else {
        echo "Error al actualizar el proveedor: " . $conn->error;
    }
}
?>
