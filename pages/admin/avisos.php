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

      <!-- Avisos -->
      <li style="background-color: #107FA3;">
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
        <span id="saludo" style="color: #107FA3;" class="text-capitalize fs-3">Avisos 🚨</span>
      </span>
    </div>

    <!-- Boton para agregar nuevo aviso 🚨 -->
    <button type="button" class="btn btn-success mx-5 mt-4 fw-semibold fs-6" data-bs-toggle="modal" data-bs-target="#modalForm" style="padding: 1rem; margin-left: 4rem !important; background-color: #107FA3; border-color: transparent;">Agregar nuevo aviso</button>

    <!-- Modal de formulario de nuevo aviso-->
    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo aviso</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <form action="avisos.php" method="post" name="myform">
              <div class="mb-3">
                <label class="form-label">Nombre de aviso 📋</label>
                <input type="text" class="form-control" id="nombre_aviso" name="nombre_aviso" placeholder="Nombre" required />
              </div>
              <div class="mb-3">
                <label class="form-label">Descripcion</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion 🗒️" required />
              </div>
              <div class="mb-3">
                <label class="form-label" for="importancia" id="importancia">Importancia</label>
                <select name="aviso" id="aviso" class="form-select" required>
                  <option value="">Seleccione una opción</option>
                  <option value="1">Alta ⚠️</option>
                  <option value="2">Media 🚨</option>
                  <option value="3">Baja 👍🏻</option>
                  <option value="4">Resuelto ✅</option>
                </select>
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
    // Verifica si se envió el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      include '../conexion.php'; // Incluye tu archivo de conexión

      // Obtén los datos del formulario
      $nombreAviso = $_POST['nombre_aviso'];
      $descripcion = $_POST['descripcion'];
      $importancia = $_POST['aviso'];
      $fecha = date('Y-m-d');

      // Inserta los datos en la base de datos
      $sql = "INSERT INTO t_avisos (nombre_aviso, descripcion, fecha, importancia) 
            VALUES ('$nombreAviso', '$descripcion', '$fecha', '$importancia')";

      if ($conn->query($sql) === TRUE) {
        $conn->close(); // Cierra la conexión
        echo "El aviso fue generado correctamente";
        print "<script>window.setTimeout(function() { window.location = '/sistemas-de-informacion/pages/admin/avisos.php' }, 1000);</script>";
      } else {
        echo "Error al registrar el aviso: " . $conn->error;
      }
    }
    ?>

    <div class="container mt-5">
      <h1 class="mb-4">Lista de Avisos</h1>
      <div class="container mt-5">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Descripción</th>
              <th scope="col">Fecha</th>
              <th scope="col">Importancia</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include '../conexion.php';

            $sql = "SELECT * FROM t_avisos";
            $resultado = $conn->query($sql);

            if ($resultado->num_rows > 0) {
              $i = 1;
              while ($fila = $resultado->fetch_assoc()) {
                $idAviso = $fila['id_aviso'];
                $nombreAviso = $fila['nombre_aviso'];
                $descripcion = $fila['descripcion'];
                $fecha = $fila['fecha'];
                $importancia = $fila['importancia'];

                $importanciaClasses = [
                  'Alta' => 'bg-danger',
                  'Media' => 'bg-warning',
                  'Baja' => 'bg-success',
                  'Resuelto' => 'bg-primary',
                  'Desconocida' => 'bg-secondary',
                ];

                $importanciaClass = $importanciaClasses[$importancia] ?? $importanciaClasses['Desconocida'];
            ?>
                <tr>
                  <th scope="row"><?= $i ?></th>
                  <td><?= $nombreAviso ?></td>
                  <td><?= $descripcion ?></td>
                  <td><?= $fecha ?></td>
                  <td><span class="badge <?= $importanciaClass ?>"><?= $importancia ?></span></td>
                  <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#editarAvisoModal<?= $idAviso ?>" class="btn btn-success">Editar</a>
                  </td>
                </tr>

                <!-- Modal de edición para cada aviso -->
                <div class="modal fade" id="editarAvisoModal<?= $idAviso ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Aviso</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="/sistemas-de-informacion/pages/admin/editar_aviso.php" method="post">
                          <input type="hidden" name="id_aviso" value="<?= $idAviso ?>">
                          <div class="mb-3">
                            <label class="form-label">Nombre de aviso 📋</label>
                            <input type="text" class="form-control" name="nombre_aviso" value="<?= $nombreAviso ?>" required />
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" value="<?= $descripcion ?>" required />
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="importancia">Importancia</label>
                            <select name="importancia" class="form-select" required>
                              <?php
                              $importancias = ['Alta', 'Media', 'Baja', 'Resuelto'];
                              foreach ($importancias as $imp) {
                                $selected = ($imp === $importancia) ? 'selected' : '';
                                echo "<option value='$imp' $selected>$imp</option>";
                              }
                              ?>
                            </select>
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
              echo "<tr><td colspan='6'>No se encontraron avisos.</td></tr>";
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