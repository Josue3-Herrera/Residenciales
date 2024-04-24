<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location:../../index.php");
    exit();
}

include '../../clases/auth.php';

$auth = new auth();
$rol = $auth->obtenerRol($_SESSION['usuario']);

if ($rol != 2) {
    header("location: ../../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/4919/4919646.png">
    <link rel="stylesheet" href="css/index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="sidebar close">

        <!-- Logo -->
        <div class="logo-details">
            <i class='bx bx-building-house'></i>
            <span class="logo_name">House +</span>
        </div>

        <ul class="nav-links">

            <!-- Incio -->
            <li>

                <a href="index.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Inicio</span>
                </a>

                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Inicio 🏠</a></li>
                </ul>
            </li>


            <!-- Pagos -->
            <li>

                <a href="pagos.php">
                    <i class='bx bx-wallet'></i>
                    <span class="link_name">Pagos</span>
                </a>

                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Pagos 💵</a></li>
                </ul>

            </li>

            <!-- Residentes -->
            <li>

                <a href="residentes.php">
                    <i class='bx bx-user'></i>
                    <span class="link_name">Residentes</span>
                </a>

                <ul class="sub-menu blank">
                    <li><a class="link_name" href="residentes.php">Residentes 👨🏻‍👩🏻‍👧🏼</a></li>
                </ul>
            </li>


            <!-- Mascotas -->
            <li>

                <a href="mascotas.php">
                    <i class='bx bxs-dog' style="background-color: #107FA3;"></i>
                    <span class="link_name">Residentes</span>
                </a>

                <ul class="sub-menu blank">
                    <li><a class="link_name" href="mascotas.php">Mascotas 🐶</a></li>
                </ul>
            </li>


            <li>
                <a href="proveedores.php">
                    <i class='bx bx-group'></i>
                    <span class="link_name">Proveedores</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="proveedores.php">Proveedores 👷</a></li>
                </ul>
            </li>


            <li>
                <a href="avisos.php">
                    <i class='bx bx-bell'></i>
                    <span class="link_name">Avisos</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="avisos.php">Avisos 🚨</a></li>
                </ul>
            </li>

            <!-- Usuario Admin -->
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="https://cdn-icons-png.flaticon.com/512/2206/2206368.png" alt="profileImg">
                    </div>
                    <div class="name-job">
                        <div class="profile_name fs-6">Administrador</div>
                        <div class="job text-capitalize"><?php echo $_SESSION['usuario'] ?></div>
                    </div>
                    <a href="../../servidor/login/logout.php"><i class='bx bx-log-out'></i></a>
                </div>
            </li>


        </ul>
    </div>


    <!-- Sección dentro del Dashboard -->
    <section class="home-section">


        <div class="home-content mx-2">
            <i class='bx bx-menu'></i>
            <span class="fw-bold fs-4">
                <span id="saludo" style="color: #107FA3;" class="text-capitalize fs-3">Mascotas 🐶</span>
            </span>
        </div>


        <!-- CARDS   -->
        <div class="">
            <!-- Boton para agregar nuevo aviso 🚨 -->
            <button type="button" class="btn btn-success mx-5 mt-4 fw-semibold fs-6" data-bs-toggle="modal" data-bs-target="#modalForm" style="padding: 1rem; margin-left: 4rem !important; background-color: #107FA3; border-color: transparent;">Agregar nueva mascota 😺</button>

            <!-- Modal de formulario de nuevo aviso-->
            <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nueva mascota</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Aqui va el formulario -->

                            <form action="mascotas.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="id">ID del usuario:</label>
                                    <input type="number" class="form-control" id="id" name="id" required>
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Nombre de la mascota:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                </div>
                                <div class="form-group">
                                    <label for="tipo">Tipo de mascota:</label>
                                    <input type="text" class="form-control" id="tipo" name="tipo" required>
                                </div>
                                <div class="form-group">
                                    <label for="raza">Raza:</label>
                                    <input type="text" class="form-control" id="raza" name="raza">
                                </div>
                                <div class="form-group">
                                    <label for="edad">Edad:</label>
                                    <input type="number" class="form-control" id="edad" name="edad">
                                </div>
                                <div class="form-group">
                                    <label for="color">Color:</label>
                                    <input type="text" class="form-control" id="color" name="color">
                                </div>
                                <div class="form-group">
                                    <label for="sexo">Sexo:</label>
                                    <select class="form-control" id="sexo" name="sexo">
                                        <option value="Macho">Macho</option>
                                        <option value="Hembra">Hembra</option>
                                    </select>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="foto">Foto de la mascota:</label>
                                    <input type="file" class="form-control-file" id="foto" name="foto">
                                </div> -->
                                <button type="submit" class="btn btn-primary mt-3">Registrar Mascota</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include '../conexion.php'; // Incluir el archivo de conexión a la base de datos

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recibir datos del formulario
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $tipo = $_POST['tipo'];
            $raza = $_POST['raza'];
            $edad = $_POST['edad'];
            $color = $_POST['color'];
            $sexo = $_POST['sexo'];

            // // Procesar la imagen si se envió
            // if ($_FILES['foto']['error'] === 0) {
            //     $foto_nombre = $_FILES['foto']['name'];
            //     $foto_temp = $_FILES['foto']['tmp_name'];
            //     $foto_destino = "ruta/para/guardar/imagenes/" . $foto_nombre;
            //     move_uploaded_file($foto_temp, $foto_destino);
            // } else {
            //     $foto_destino = NULL;
            // }

            // Insertar datos en la tabla de mascotas
            $sql = "INSERT INTO t_mascotas (id_usuario, nombre, tipo, raza, edad, color, sexo) 
            VALUES ('$id', '$nombre', '$tipo', '$raza', $edad, '$color', '$sexo')";

            if ($conn->query($sql) === TRUE) {
                echo "Mascota registrada correctamente";
            } else {
                echo "Error al registrar la mascota: " . $conn->error;
            }
        }
        ?>

        <article class="container mt-5">
            <h2 class="mt-5">Tabla de Mascotas</h2>
            <input type="text" class="form-control mt-3" id="busqueda" placeholder="Buscar mascota...">
            <table id="tablaMascotas" class="table mt-4 table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Dirección</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Raza</th>
                        <th>Edad</th>
                        <th>Color</th>
                        <th>Sexo</th>
                        <!-- <th>Foto</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'conexion.php';

                    // Consulta para obtener las mascotas con información de la dirección del usuario asociado
                    $sql_mascotas = "SELECT t_mascotas.*, t_usuarios.direccion 
                        FROM t_mascotas 
                        INNER JOIN t_usuarios ON t_mascotas.id_usuario = t_usuarios.Id_usuario";
                    $result_mascotas = $conn->query($sql_mascotas);

                    if ($result_mascotas->num_rows > 0) {
                        while ($row_mascota = $result_mascotas->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row_mascota['direccion'] . "</td>"; // Cambiado de 'usuario' a 'direccion'
                            echo "<td>" . $row_mascota['nombre'] . "</td>";
                            echo "<td>" . $row_mascota['tipo'] . "</td>";
                            echo "<td>" . $row_mascota['raza'] . "</td>";
                            echo "<td>" . $row_mascota['edad'] . "</td>";
                            echo "<td>" . $row_mascota['color'] . "</td>";
                            echo "<td>" . $row_mascota['sexo'] . "</td>";
                            // echo "<td><img src='" . $row_mascota['foto'] . "' alt='Foto de la mascota' style='max-width: 100px;'></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No hay mascotas registradas</td></tr>";
                    }
                    ?>

                </tbody>
            </table>
        </article>


    </section>


    <script>
        // * ---------------------------------------------------- *

        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let inputBusqueda = document.getElementById('busqueda');
            let tablaMascotas = document.getElementById('tablaMascotas');
            let rows = tablaMascotas.getElementsByTagName('tr');

            inputBusqueda.addEventListener('input', function() {
                let filtro = inputBusqueda.value.toLowerCase();

                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].getElementsByTagName('td');
                    let mostrar = false;

                    for (let j = 0; j < cells.length; j++) {
                        let cellValue = cells[j].innerText.toLowerCase();
                        if (cellValue.indexOf(filtro) > -1) {
                            mostrar = true;
                            break;
                        }
                    }

                    if (mostrar) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            });
        });
    </script>

    <script src="../../assets/js/bootstrap.bundle.min.js"></script>

    <script src="script.js"></script>

</body>

</html>