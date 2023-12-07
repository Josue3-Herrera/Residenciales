<?php
// Verifica si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../conexion.php';

    // Obtén los datos del formulario
    $idAviso = $_POST['id_aviso'];
    $nombreAviso = $_POST['nombre_aviso'];
    $descripcion = $_POST['descripcion'];
    $importancia = $_POST['importancia'];

    // Actualiza la fila en la base de datos
    $sql = "UPDATE t_avisos SET nombre_aviso='$nombreAviso', descripcion='$descripcion', importancia='$importancia' WHERE id_aviso=$idAviso";
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        // Redirige de vuelta a la página de avisos
        header("Location: /sistemas-de-informacion/pages/admin/avisos.php");
        exit(); // Asegura que el script no siga ejecutándose
    } else {
        echo "Error al actualizar el aviso: " . $conn->error;
    }
}
?>
