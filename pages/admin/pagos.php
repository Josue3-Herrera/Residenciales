<?php
session_start();
include('../conexion.php');
if (!isset($_SESSION['usuario'])) {
  header("location:../../index.php");
  exit();
}

$usuario = $_SESSION['usuario'];
$sql = "SELECT rol FROM t_usuarios WHERE usuario = '$usuario'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $rol = $row['rol'];

  if ($rol != 2) {
    header("location: ../../index.php");
    exit();
  }
} else {
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
  <style>
     .card:hover {
        border-radius: 4px;
        background-color: #CEEEF9; 
        transition: 0.3s;
    }

    .card .card-body a.btn-primary:hover {
        background-color: #007bff;
    }
  </style>

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
      <li style="background-color: #107FA3;">

        <a href="#">
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

      <li>
        <a href="proveedores.php">
        <i class='bx bx-group' ></i>
          <span class="link_name">Proveedores</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="proveedores.php">Proveedores 👷</a></li>
        </ul>
      </li>

      <li>
        <a href="avisos.php">
        <i class='bx bx-bell' ></i>
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
            <div class="job text-capitalize"><?php echo $usuario; ?></div>
          </div>
          <a href="../../servidor/login/logout.php"><i class='bx bx-log-out'></i></a>
        </div>
      </li>


    </ul>
  </div>


  <!-- Sección dentro del Dashboard -->
  <section class="home-section">
    
    <!-- Titulo de sección -->
    <div class="home-content mx-2">
        <i class='bx bx-menu'></i>
        <span class="fw-bold fs-4">
            <span id="saludo" style="color: #107FA3;" class="text-capitalize fs-3">Pagos 💵</span> 
        </span>
    </div>


<!-- Boton para agregar nuevo gasto -->
<button type="button" class="btn btn-success mx-5 mt-4 fw-semibold fs-6" data-bs-toggle="modal" data-bs-target="#modalForm" style="padding: 1rem; margin-left: 4rem !important;">Agregar nuevo gasto 💲</button>

<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo gasto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="pagos.php" method="post" name="myform">
                    <div class="mb-3">
                        <label class="form-label">Nombre de gasto 📋</label>
                        <input type="text" class="form-control" id="nombre_gasto" name="nombre_gasto" placeholder="Nombre" required/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion 🗒️" required/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="costo" id="costo">Costo</label>
                        <input value="" type="number" step="any" class="form-control" id="costo" name="costo" placeholder="Costo 💵" required/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="proveedor">Proveedor</label>
                        <select name="proveedor" id="proveedor" class="form-select" required>
                            <option value="">Seleccione un proveedor</option>
                            <?php
                            include '../conexion.php';
                            $sql = "SELECT id_proveedor, nombre FROM t_proveedores";
                            $resultado = $conn->query($sql);
                            while ($fila = $resultado->fetch_assoc()) {
                                echo "<option value='{$fila['id_proveedor']}'>{$fila['nombre']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="fecha_exp">Fecha de Caducidad</label>
                        <input type="date" class="form-control" id="fecha_exp" name="fecha_exp" required/>
                    </div>
                    <div class="modal-footer d-block">
                        <button type="submit" class="btn btn-warning float-end">Generar <span><i class='bx bxs-send'></i></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

// Envía el formulario de gastos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../conexion.php'; // Incluye tu archivo de conexión

    // Obtén los datos del formulario
    $nombreGasto = $_POST['nombre_gasto'];
    $descripcion = $_POST['descripcion'];
    $costo = $_POST['costo'];
    $fechaExp = $_POST['fecha_exp']; // Nueva variable para la fecha de caducidad
    $idProveedor = $_POST['proveedor']; // Nueva variable para el id_proveedor

    // Genera la fecha actual
    $fecha = date('Y-m-d');

    // Inserta los datos en la base de datos
    $sql = "INSERT INTO t_gastos (nombre_gasto, descripcion, fecha, fecha_exp, monto, id_proveedor) 
            VALUES ('$nombreGasto', '$descripcion', '$fecha', '$fechaExp', $costo, $idProveedor)";

    if ($conn->query($sql) === TRUE) {
        $conn->close(); // Cierra la conexión

        // Redirige al usuario a la página de gastos
        print "<script>window.setTimeout(function() { window.location = '/RESIDENCIALES/pages/admin/pagos.php' }, 1000);</script>";
        exit(); // Asegura que el script se detenga aquí para evitar cualquier salida adicional
    } else {
        echo "Error al registrar el gasto: " . $conn->error;
    }
}

?>

<div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php
        include '../conexion.php'; // Incluye tu archivo de conexión

        $sql = "SELECT g.*, p.nombre AS nombre_proveedor, p.fecha_registro AS fecha_registro_proveedor 
                FROM t_gastos g
                INNER JOIN t_proveedores p ON g.id_proveedor = p.id_proveedor";
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            while($fila = $resultado->fetch_assoc()) {
        ?>

          <div class="col cards">

            <div class="card shadow">
              <div class="card-body" data-bs-toggle="modal" data-bs-target="#modal_<?php echo $fila['Id_gasto']; ?>">

                <h5 class="card-title"><?php echo $fila['nombre_gasto']; ?></h5>
                  <p class="card-text"><?php echo $fila['descripcion']; ?></p>
                  <p class="card-text">Fecha de Registro: <?php echo $fila['fecha']; ?></p>
                  <p class="card-text">Fecha de Caducidad: <?php echo $fila['fecha_exp']; ?></p>
                  <p class="card-text">Monto: <?php echo $fila['monto']; ?></p>  
                  <p class="card-text">Proveedor: <?php echo $fila['nombre_proveedor']; ?></p>
                </div>
              </div>
          </div>

        <?php
            }
        } else {
            echo "No se encontraron gastos.";
        }

        $conn->close(); // Cierra la conexión
        ?>
    </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
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

  <script src="../../assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>