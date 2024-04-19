<?php
session_start();
// Conexión a la base de datos (debes establecer estos valores)
$servername = "localhost";
$username = "root";
$password = "";
$database = "privadas";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Verificar si el usuario está autenticado y obtener su número de usuario
if (isset($_SESSION['usuario'])) {
    $numeroUsuario = $_SESSION['usuario'];

    // Consulta SQL para obtener el nombre del usuario
    $sql = "SELECT nombre FROM t_usuarios WHERE usuario = '$numeroUsuario'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Si se encuentra al menos una fila, obtenemos el nombre del usuario
        $row = $result->fetch_assoc();
        $name = $row["nombre"];
    } else {
        $name = "Usuario no encontrado"; // En caso de que no se encuentre el usuario
    }
} else {
    $name = "Usuario no autenticado"; // Otra respuesta en caso de que el usuario no esté autenticado
}

echo $name;
// Cerrar la conexión a la base de datos
$conn->close();

// Ahora tienes el nombre del usuario en la variable $name
?>
