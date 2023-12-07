<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar sesión</title>
  <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/2484/2484004.png">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
<style>
  body {
    background: rgb(100,149,218);
    background: linear-gradient(90deg, rgba(100,149,218,0.8016456582633054) 44%, rgba(39,136,199,1) 98%);
  }
</style>

  <div class="container w-75 mt-5 rounded shadow login custom-container" style="background-color: #fff;">
    <div class="row alig-items-stretch">
      
      <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 d-flex p-0">
        <img id="imagenAleatoria" src="" alt="Imagen Aleatoria" class="rounded-start img-fluid">
      </div>

      <div class="col p-5 rounded-end">
        <div class="text-start fw-bold">🏘️ House+</div>
        <h1 class="fw-bold text-start pt-5 pb-5">Iniciar Sesión</h1>

        <!-- Login -->
        <form action="servidor/login/logear.php" method="post">

          <div class="mb-4 form-floating">
            <input type="text" class="form-control" name="usuario" placeholder="Ingresa tu usuario" id="usuario" required>
            <label for="usuario" class="form-label fw-semibold" id="usuario">Usuario 🪪</label>
            <div class="invalid-feedback">¡Ingresa un usuario 😵‍💫!</div>
            <div class="valid-feedback">¡Bien!</div>
          </div>

          <div class="mb-4 form-floating">
            <input type="password" class="form-control" name="password" placeholder="Ingresa tu contraseña" id="password" required>
            <label for="password" class="form-label fw-semibold" id="password">Contraseña 🔑</label>
            <div class="invalid-feedback">¡Ingresa una contraseña 🔑!</div>
            <div class="valid-feedback">¡Ok!</div>
          </div>

          <div class="d-grid">
            <button type="submit" class="btn btn-primary btb-subir">Iniciar sesión</button>
          </div>

          <div class="my-3">
            <span>¿No tienes cuenta? <a href="register.php" class="text-decoration-none">Regístrate</a></span>
          </div>

        </form>
      </div>

    </div>
  </div>

  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
    const imagenes = [
        'img/login-1.webp',
        'img/login-2.jpg',
        'img/login-3.jpg',
        'img/login-4.jpg'
        // Agrega más URLs de imágenes según sea necesario
    ];

    const imagenAleatoria = document.getElementById('imagenAleatoria');
    const imagenSeleccionada = imagenes[Math.floor(Math.random() * imagenes.length)];
    imagenAleatoria.src = imagenSeleccionada;
    });
  </script>
  <script>
    (() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
  </script>
  <script src="js/script.js"></script>
</body>

</html>
