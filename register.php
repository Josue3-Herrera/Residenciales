<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/2484/2484004.png">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>

</head>

<body>
  <style>
    body {
      background: rgb(92,209,173);
      background: linear-gradient(90deg, rgba(92,209,173,1) 55%, rgba(39,199,146,1) 98%);
    }
  </style>

  <div class="container w-75 mt-5 mb-4 sm-mb-4 md-mb-5 lg-mb-5 rounded shadow login custom-container" style="background-color: #fff;">
    <div class="row alig-items-stretch">
      
      <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 d-flex align-items-center justify-content-center p-0">
        <img id="imagenAleatoria" src="" alt="Imagen Aleatoria" class="rounded-start img-fluid">
      </div>

      <div class="col px-4 pt-4 pb-2 rounded-end">
        <div class="text-start fw-semibold mx-2">🏘️ House+</div>
        <h1 class="fw-semibold mx-2 text-start pt-3 pb-2">Regístrate ✍🏻</h1>

        <!-- Register -->
        <form action="servidor/registro/registrar.php" method="post" class="row">

        <!-- Nombre -->
          <div class="mb-4 col-6 form-floating">
            <input type="text" class="form-control" name="nombre" placeholder="Ingrese su nombre" id="nombre" required>
            <label for="nombre" class="form-label fw-semibold mx-2" id="nombre">Nombre/s 📒</label>
            <div class="invalid-feedback">Por favor ingrese su nombre.</div>
            <div class="valid-feedback">¡Está bien!</div>
          </div>

          <!-- Apellido -->
          <div class="mb-4 col-6 form-floating">
            <input type="text" class="form-control" name="apellido" placeholder="Ingrese su apellido" id="apellido" required>
            <label for="apellido" class="form-label fw-semibold mx-2" id="apellido">Apellidos 🖋️</label>
            <div class="invalid-feedback">Por favor ingrese sus apellidos.</div>
            <div class="valid-feedback">¡Ok!</div>
          </div>

          <!-- email -->
          <div class="mb-4 col-6 form-floating">
            <input type="text" class="form-control" name="email" placeholder="Ingrese su email" id="email" required>
            <label for="emial" class="form-label fw-semibold mx-2" id="email">Email 📧</label>
            <div class="invalid-feedback">Por favor ingrese su email.</div>
            <div class="valid-feedback">¡Bien!</div>
          </div>

          <!-- teléfono -->
          <div class="mb-4 col-6 form-floating">
            <input type="text" class="form-control" name="telefono" placeholder="Ingrese su teléfono" id="telefono" required>
            <label for="telefono" class="form-label fw-semibold mx-2" id="telefono">Teléfono ☎️ </label>
            <div class="invalid-feedback">Por favor ingrese su teléfono.</div>
            <div class="valid-feedback">¡Ok!</div>
          </div>

          <!-- dirección -->
          <div class="mb-4 col-12 form-floating">
            <input type="" class="form-control" name="direccion" placeholder="Ingrese su dirección" id="direccion" required>
            <label for="direccion" class="form-label fw-semibold mx-2" id="direccion">Dirección 🏡📌</label>
            <div class="invalid-feedback">Por favor ingrese su dirección.</div>
            <div class="valid-feedback">¡Se mira bien!</div>
          </div>


          <!-- Usuario -->
          <div class="mb-4 col-12 form-floating">
            <input type="text" class="form-control" name="usuario" placeholder="Ingresa un usuario" id="usuario" required>
            <label for="usuario" class="form-label fw-semibold mx-2 mx-2" id="usuario">Usuario 🪪</label>
            <div class="invalid-feedback">Por favor ingresa un usuario.</div>
            <div class="valid-feedback">¡Se mira bien 😁!</div>
          </div>

          <!-- Contraseña -->
          <div class="mb-4 col-12 form-floating">
            <input type="password" class="form-control" name="password" placeholder="Ingresa una contraseña" id="password" required>
            <label for="password" class="form-label fw-semibold mx-2 mx-2" id="password">Contraseña 🔒</label>
            <div class="invalid-feedback">Por favor ingresa una contraseña.</div>
            <div class="valid-feedback">¡Bien 👍!</div>
          </div>

          <div class="d-grid">
            <button type="submit" class="btn btn-primary btb-subir">Registrarse</button>
          </div>

          <div class="my-3">
            <span>¿Ya tienes cuenta? <a href="index.php" class="text-decoration-none">Inicia sesión</a></span>
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
    ];

    const imagenAleatoria = document.getElementById('imagenAleatoria');
    const imagenSeleccionada = imagenes[Math.floor(Math.random() * imagenes.length)];
    imagenAleatoria.src = imagenSeleccionada;
    });
  </script>


  <script>
    (() => {
  'use strict'

  const forms = document.querySelectorAll('.needs-validation')

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

</body>

</html>
