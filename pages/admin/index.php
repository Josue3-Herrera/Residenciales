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
      <li style="background-color: #107FA3;">

        <a href="#">
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
        <span id="saludo" style="color: #107FA3;" class="text-capitalize"></span> 
    </span>
  </div>


    <!-- CARDS   -->
    <div class="container mt-4">
      
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
        
        <!-- Residentes sin atrasos -->
        <div class="col mb-4">
          <div class="card mx-auto shadow" style="max-width: 18rem;">
              <div class="card-body text-center">
                  <h5 class="card-title d-flex justify-content-center align-items-center fw-bold">
                  <i class='bx bx-user' style='font-size: 50px; color:#157ce3'></i>
                      <span class="ms-3 text-start ">Usuarios sin retrasos</span>
                  </h5>
                  <span class="fw-bolder fs-5 text-start" style="color: #1062B3;">19 Residentes</span>
              </div>
          </div>
        </div>


        <!-- Usuarios con atrasos -->
        <div class="col mb-4">
          <div class="card mx-auto shadow" style="max-width: 18rem;">
              <div class="card-body text-center">
                  <h5 class="card-title d-flex justify-content-center align-items-center fw-bold">
                    <i class='bx bx-alarm-exclamation' style='color:#831fa5; font-size: 50px;'></i>
                    <span class="ms-3 text-start ">Usuarios con retrasos</span>
                  </h5>
                  <span class="fw-bolder fs-5 text-start" style="color: #5E1079;">10 Residentes</span>
              </div>
          </div>
        </div>


        <!-- Dinero recaudado -->
        <div class="col mb-4">
          <div class="card mx-auto shadow" style="max-width: 18rem;">
              <div class="card-body text-center">
                  <h5 class="card-title d-flex justify-content-center align-items-center fw-bold">
                  <i class='bx bx-money' style='color:#0f9f53; font-size: 50px;'></i>
                    <span class="ms-3 text-start ">Dinero recaudado</span>
                  </h5>
                  <span class="fw-bolder fs-5 text-start" style="color: #008740;">$ 15,500.00</span>
              </div>
          </div>
        </div>


        <!-- Dinero restante -->
        <div class="col mb-4">
          <div class="card mx-auto shadow" style="max-width: 18rem;">
              <div class="card-body text-center">
                  <h5 class="card-title d-flex justify-content-center align-items-center fw-bold">
                  <i class='bx bx-line-chart-down' style='color:#9a0919; font-size: 50px;'></i>
                    <span class="ms-3 text-start ">Dinero restante</span>
                  </h5>
                  <span class="fw-bolder fs-5 text-start" style="color: #6A0A15;">$ 7,810.50</span>
              </div>
          </div>
        </div>

        </div>
    </div>

    <div class="container mt-4">
      
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
        
      </div>
    </div>


    

  </section>


  <script>
   // Obtener la hora actual
let hora = new Date().getHours();
let saludo = "";

let xhr = new XMLHttpRequest();
xhr.open('GET', 'nombre.php', true);

xhr.onload = function() {
  if (xhr.status === 200) {
    let usuario = xhr.responseText;

    if (hora >= 6 && hora < 12) {
        saludo = "Buenos días " + usuario + " 🌅";
    } else if (hora >= 12 && hora < 18) {
      saludo = "Buenas tardes " + usuario +" 🌇";
    } else {
        saludo = "Buenas noches " + usuario +" 🌔";
    }

    // Actualizar el texto del saludo en el elemento con ID "saludo"
    document.getElementById("saludo").textContent = saludo;
  }
};

xhr.send();



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

  <script src="../../assets/js/bootstrap.bundle.min.js"></script>

  <script src="script.js"></script>

</body>

</html>