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
          <li><a class="link_name" href="pagos.php">Pagos 💵</a></li>
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
          <i class='bx bxs-dog'></i>
          <span class="link_name">Residentes</span>
        </a>

        <ul class="sub-menu blank">
          <li><a class="link_name" href="mascotas.php">Mascotas 🐶</a></li>
        </ul>
      </li>

      <li style="background-color: #107FA3;">
        <a href="proveedores.php">
          <i class='bx bx-group'></i>
          <span class="link_name">Proveedores</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="proveedores.php">Proveedores 👷</a></li>
        </ul>
      </li>

      <!-- Avisos -->
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

    <!-- Titulo de sección -->
    <div class="home-content mx-2">
      <i class='bx bx-menu'></i>
      <span class="fw-bold fs-4">
        <span id="saludo" style="color: #107FA3;" class="text-capitalize fs-3">Proveedores 👷</span>
      </span>
    </div>

    <!-- Boton para agregar proveedor 👷 -->
    <button type="button" class="btn btn-success mx-5 mt-4 fw-semibold fs-6" data-bs-toggle="modal" data-bs-target="#modalForm" style="padding: 1rem; margin-left: 4rem !important; background-color: #107FA3; border-color: transparent;">Agregar proveedor</button>

    <!-- Modal de formulario de nuevo proveedor-->
    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo proveedor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <form action="proveedores.php" method="post" name="myform">
              <div class="mb-3">
                <label class="form-label">Nombre del proveedor 📝</label>
                <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor" placeholder="Nombre" required />
              </div>
              <div class="mb-3">
                <label class="form-label">Servicio ofrecido</label>
                <input type="text" class="form-control" id="servicio_ofrecido" name="servicio_ofrecido" placeholder="Servicio ofrecido" required />
              </div>
              <div class="mb-3">
                <label class="form-label">Teléfono de contacto</label>
                <input type="text" class="form-control" id="telefono_contacto" name="telefono_contacto" placeholder="Teléfono de contacto" required />
              </div>
              <div class="mb-3">
                <label class="form-label">Email de contacto</label>
                <input type="email" class="form-control" id="email_contacto" name="email_contacto" placeholder="Email de contacto" required />
              </div>
              <div class="mb-3">
                <label class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required />
              </div>
              <div class="modal-footer d-block">
                <button type="submit" class="btn btn-warning float-end">Registrar <span><i class='bx bxs-edit-alt'></i></span></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php
    // Verifica si se envió el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      include '../conexion.php'; // Incluye tu archivo de conexión

      // Obtén los datos del formulario
      $nombreProveedor = $_POST['nombre_proveedor'];
      $servicioOfrecido = $_POST['servicio_ofrecido'];
      $telefonoContacto = $_POST['telefono_contacto'];
      $emailContacto = $_POST['email_contacto'];
      $direccion = $_POST['direccion'];
      $fecha = date('Y-m-d');

      // Inserta los datos en la base de datos
      $sql = "INSERT INTO t_proveedores (nombre, servicio_ofrecido, telefono_contacto, email_contacto, direccion, fecha_registro) 
            VALUES ('$nombreProveedor', '$servicioOfrecido', '$telefonoContacto', '$emailContacto', '$direccion', '$fecha')";

      if ($conn->query($sql) === TRUE) {
        $conn->close(); // Cierra la conexión
        echo "El proveedor fue registrado correctamente";
        print "<script>window.setTimeout(function() { window.location = '/RESIDENCIALES/pages/admin/proveedores.php' }, 1000);</script>";
      } else {
        echo "Error al registrar el proveedor: " . $conn->error;
      }
    }
    ?>

    <div class="container mt-5">
      <h1 class="mb-4">Lista de Proveedores</h1>
      <div class="container mt-5">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Servicio Ofrecido</th>
              <th scope="col">Contacto</th>
              <th scope="col">Fecha Registro</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include '../conexion.php';

            $sql = "SELECT * FROM t_proveedores";
            $resultado = $conn->query($sql);

            if ($resultado->num_rows > 0) {
              $i = 1;
              while ($fila = $resultado->fetch_assoc()) {
                $idProveedor = $fila['id_proveedor'];
                $nombreProveedor = $fila['nombre'];
                $servicioOfrecido = $fila['servicio_ofrecido'];
                $telefonoContacto = $fila['telefono_contacto'];
                $emailContacto = $fila['email_contacto'];
                $direccion = $fila['direccion'];
                $fechaRegistro = $fila['fecha_registro'];
            ?>
                <tr>
                  <th scope="row"><?= $i ?></th>
                  <td><?= $nombreProveedor ?></td>
                  <td><?= $servicioOfrecido ?></td>
                  <td><?= $telefonoContacto ?> (<?= $emailContacto ?>)</td>
                  <td><?= $fechaRegistro ?></td>
                  <td>
                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editarProveedorModal<?= $idProveedor ?>">Editar</a>
                    <a href="#" class="btn btn-danger">Eliminar</a>
                  </td>
                </tr>

                <!-- Modal de edición para cada proveedor -->
                <div class="modal fade" id="editarProveedorModal<?= $idProveedor ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Proveedor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="/RESIDENCIALES/pages/admin/editar_proveedor.php" method="post">
                          <input type="hidden" name="id_proveedor" value="<?= $idProveedor ?>">
                          <div class="mb-3">
                            <label class="form-label">Nombre de proveedor 📋</label>
                            <input type="text" class="form-control" name="nombre_proveedor" value="<?= $nombreProveedor ?>" required />
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Servicio Ofrecido</label>
                            <input type="text" class="form-control" name="servicio_ofrecido" value="<?= $servicioOfrecido ?>" required />
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Teléfono de Contacto</label>
                            <input type="text" class="form-control" name="telefono_contacto" value="<?= $telefonoContacto ?>" required />
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Email de Contacto</label>
                            <input type="email" class="form-control" name="email_contacto" value="<?= $emailContacto ?>" required />
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Dirección</label>
                            <input type="text" class="form-control" name="direccion" value="<?= $direccion ?>" required />
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            <?php
                $i++;
              }
            } else {
              echo "<tr><td colspan='6'>No hay proveedores registrados</td></tr>";
            }

            $conn->close();
            ?>
          </tbody>
      </div>

      </table>
    </div>



  </section>


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

  <script src="script.js"></script>

</body>

</html>