<?php
// FORMATEAR EL FORMat ofan es Shift + Alt + F
session_start();
include "db_conectar/conexion.php";


if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
  header("Location: loginadmin.php");
  exit;
}
$admin_id = $_SESSION['id_usuario'];
$query = "SELECT * FROM administradores WHERE ID_administradores = '$admin_id'";
$resultado = mysqli_query($conexion, $query);
$admin_logged_in = mysqli_fetch_assoc($resultado); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/adminindex.css" />
  <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .container {
      margin-top: 20px;
    }

    .schema-table {
      background-color: #f9f9f9;
      border: 1px solid #ddd;
      padding: 15px;
      border-radius: 5px;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <nav class="sidebar close">
    <header>
      <div class="image-text">
        <span class="image"><img src="imagenes/img/log.png" /></span>

        <div class="text logo-text">
          <span class="name">aca debe ir nombre del admin</span>
          <span class="profession">ADMIN</span>
        </div>
      </div>
      <i class="bx bx-chevron-right toggle"></i>
    </header>

    <div class="menu-bar">
      <div class="menu">
        <li class="search-box">
          <i class="bx bx-search icon"></i>
          <input type="text" placeholder="Buscar" />
        </li>

        <ul class="menu-links">
          <li class="nav-link">
            <a href="#perfil">
              <i class="bx bx-user icon"></i>
              <span class="text nav-text">Perfil</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="#agregar-producto">
              <i class="bx bx-plus icon"></i>
              <span class="text nav-text">Añadir</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="#buscarUserProduct">
              <i class="bx bx-search icon"></i>
              <span class="text nav-text">Buscar USER Productos</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="#ver-productos">
              <i class="bx bx-show icon"></i>
              <span class="text nav-text">Ver-productosUSER</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="#A-agradmin">
              <i class="bx bx-plus icon"></i>
              <span class="text nav-text">añadir admins</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="#A-soporte">
              <i class="bx bx-support icon"></i>
              <span class="text nav-text">Soporte</span>
            </a>
          </li>
        </ul>
      </div>

      <div class="bottom-content">
        <li class="">
          <a href="salir.php">
            <i class="bx bx-log-out icon"></i>
            <span class="text nav-text">Cerrar cesion</span>
          </a>
        </li>

        <li class="mode">
          <div class="sun-moon">
            <i class="bx bx-moon icon moon"></i>
            <i class="bx bx-sun icon sun"></i>
          </div>
          <span class="mode-text text">Modo oscuro</span>

          <div class="toggle-switch">
            <span class="switch"></span>
          </div>
        </li>
      </div>
    </div>
  </nav>

  <div class="perfiladmins">
    <h1>PERFIL ADMIN</h1>
  </div>
  <div class="contper">
    <div class="containerPERFIL">
      <h2>Bienvenido, <?php echo $admin_logged_in['nombre']; ?></h2>
      <ul>
        <form action="" method="post">
          <li><strong>Correo:</strong> <?php echo $admin_logged_in['correo']; ?></li>
          <li><strong>Nombre:</strong> <?php echo $admin_logged_in['nombre']; ?></li>
          <li><strong>Contraseña:</strong> ********</li>
          <button type="submit" name="camcontra" class="btncontra" style="font-size: 1.2rem; padding: 0.5rem; border-radius: 5px; border: none; background-color: #007bff; color: #fff; cursor: pointer;">CAMBIAR CONTRASEÑA</button>
        </form>
      </ul>
    </div>

  </div>

  </section>

  <section id="agregar-producto" class="agregarproducto">
    <div class="container mt-5">
      <h2>Ingresar Producto Nuevo</h2>
      <form action="procesar_producto.php" method="post">
        <!-- Primera fila -->
        <div class="row">
          <label for="proveedor_id" class="col-sm-2 col-form-label">Proveedor:</label>
          <div class="col-md-6">
            <select class="form-control select-short" id="proveedor_id" name="proveedor_id" required>
              <?php echo $proveedoresOptions; ?>
            </select>
          </div>
          <div class="col-sm-2">
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalNuevoProveedor" id="btnOpenModal">Insertar Nuevo</button>
          </div>
        </div>
        <div class="form-group row">
          <label for="presentacion_id" class="col-md-3 col-form-label">Presentación:</label>
          <div class="col-md-6">
            <select class="form-control" id="presentacion_id" name="presentacion_id" required>
              <?php echo $presentacionesOptions; ?>
            </select>
          </div>
          <div class="col-md-3">
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalNuevaPresentacion" id="btnOpenModalPresentacion">Insertar Presentación</button>
          </div>
        </div>

        <div class="form-group row">
          <label for="unidad_medida_id" class="col-md-3 col-form-label">Unidad de Medida:</label>
          <div class="col-md-6">
            <select class="form-control" id="unidad_medida_id" name="unidad_medida_id" required>
              <?php echo $unidadesMedidaOptions; ?>
            </select>
          </div>
          <div class="col-md-3">
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalNuevaUnidadMedida" id="btnOpenModalUnidadMedida">Insertar Unidad de Medida</button>

          </div>
        </div>
        <div class="form-group">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
          <label for="contenido">Contenido:</label>
          <input type="text" class="form-control" id="contenido" name="contenido" required>
        </div>
        <div class="form-group">
          <label for="descripcion">Descripción:</label>
          <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Ingresar Producto</button>
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>



    <button id="btnOpenModalImagenProducto">Añadir Imagen de Producto</button>

    <!-- La ventana modal para Imágenes de Productos -->
    <div id="modalImagenProducto" class="modal">
      <div class="modal-content">
        <span class="close" data-modal="modalImagenProducto">&times;</span>
        <form action="insertar_imagen_producto.php" method="post" enctype="multipart/form-data">
          <label for="producto_id">ID del Producto:</label><br>
          <input type="number" id="producto_id" name="producto_id" required><br>

          <label for="imagen">Imagen del Producto:</label><br>
          <input type="file" id="imagen" name="imagen" required><br>

          <label for="descripcion_imagen">Descripción de la Imagen:</label><br>
          <input type="text" id="descripcion_imagen" name="descripcion_imagen"><br>

          <input type="submit" value="Añadir Imagen">
        </form>
      </div>
    </div>

    <!-- La ventana modal para Productos -->
    <div id="modalProducto" class="modal">
      <div class="modal-content">
        <span class="close" data-modal="modalProducto">&times;</span>
        <form action="insertar_producto.php" method="post">
          <label for="proveedor_id">ID del Proveedor:</label><br>
          <input type="number" id="proveedor_id" name="proveedor_id" required><br>

          <label for="presentacion_id">ID de la Presentación:</label><br>
          <input type="number" id="presentacion_id" name="presentacion_id" required><br>

          <label for="unidad_medida_id">ID de la Unidad de Medida:</label><br>
          <input type="number" id="unidad_medida_id" name="unidad_medida_id" required><br>

          <label for="nombre">Nombre del Producto:</label><br>
          <input type="text" id="nombre" name="nombre" required><br>

          <label for="contenido">Contenido:</label><br>
          <input type="text" id="contenido" name="contenido" required><br>

          <label for="descripcion">Descripción:</label><br>
          <textarea id="descripcion" name="descripcion" required></textarea><br>

          <input type="submit" value="Insertar Producto">
        </form>
      </div>
    </div>

    <!-- Modal para Insertar Presentación -->
    <div id="modalPresentacion" class="modal">
      <div class="modal-content">
        <span class="close" data-modal="modalPresentacion">&times;</span>
        <form action="insertar_presentacion.php" method="post">
          <label for="tipo">Tipo:</label><br>
          <input type="text" id="tipo" name="tipo" required><br>

          <label for="descripcion">Descripción:</label><br>
          <textarea id="descripcion" name="descripcion" required></textarea><br>

          <input type="submit" value="Insertar Presentación">
        </form>
      </div>
    </div>

    <!-- Modal para Insertar Unidad de Medida -->
    <div id="modalUnidadMedida" class="modal">
      <div class="modal-content">
        <span class="close" data-modal="modalUnidadMedida">&times;</span>
        <form action="insertar_unidad_medida.php" method="post">
          <label for="unidad">Unidad:</label><br>
          <input type="text" id="unidad" name="unidad" required><br>

          <label for="descripcionUnidad">Descripción:</label><br>
          <textarea id="descripcionUnidad" name="descripcion" required></textarea><br>

          <input type="submit" value="Insertar Unidad de Medida">
        </form>
      </div>
    </div>

    <!-- La ventana modal -->
    <div id="myModal" class="modal">

      <!-- Contenido de la ventana modal -->
      <div class="modal-content">
        <span class="close">&times;</span>
        <form action="procesosAdmin/insertar_proveedor.php" method="post">
          <label for="nombre">Nombre:</label><br>
          <input type="text" id="nombre" name="nombre" required><br>

          <label for="direccion">Dirección:</label><br>
          <textarea id="direccion" name="direccion" required></textarea><br>

          <label for="telefono">Teléfono:</label><br>
          <input type="text" id="telefono" name="telefono" pattern="\d{9}" required><br>

          <label for="email">Email:</label><br>
          <input type="email" id="email" name="email" required><br>

          <input type="submit" value="Insertar Proveedor">
        </form>
      </div>

    </div>
    <style>
      /* Estilo de la ventana modal (debe estar oculta por defecto con display: none) */
      .modal {
        display: none;
        /* Ocultar la ventana modal por defecto */
        position: fixed;
        /* Permanecer en lugar fijo en la pantalla */
        z-index: 1;
        /* Situar en la parte superior */
        left: 0;
        top: 0;
        width: 100%;
        /* Anchura completa */
        height: 100%;
        /* Altura completa */
        overflow: auto;
        /* Habilitar el desplazamiento si es necesario */
        background-color: rgb(0, 0, 0);
        /* Color de fondo con opacidad */
        background-color: rgba(0, 0, 0, 0.4);
        /* Negro con opacidad */
      }

      /* Estilo del contenido de la ventana modal */
      .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        /* 15% desde la parte superior y centrado horizontalmente en la página */
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        /* Podrías querer un ancho menor o mayor */
      }

      /* El botón cerrar (x) */
      .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
      }

      .close:hover,
      .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
      }
    </style>
    <script>
      document.addEventListener('DOMContentLoaded', (event) => {
        // Obtener el modal
        var modal = document.getElementById('myModal');

        // Obtener el botón que abre el modal
        var btn = document.getElementById('btnOpenModal');

        // Obtener el elemento <span> que cierra el modal
        var span = document.getElementsByClassName('close')[0];

        // Cuando el usuario haga clic en el botón, abrir el modal 
        btn.onclick = function() {
          modal.style.display = 'block';
        }

        // Cuando el usuario haga clic en <span> (x), cerrar el modal
        span.onclick = function() {
          modal.style.display = 'none';
        }

        // Cuando el usuario haga clic en cualquier lugar fuera del modal, cerrarlo
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = 'none';
          }
        }

      });
    </script>
  </section>

  <section id="buscarUserProduct" class="buscar">
    <div class="buscar-forms">
      <div class="buscar-producto">
        <h2>Buscar producto</h2>
        <form>
          <label for="buscarProducto">Nombre del producto:</label>
          <input type="text" id="buscarProducto" name="buscarProducto">
          <button type="submit" onclick="window.location.href='otra_pagina.html'">Buscar producto</button>
        </form>
      </div>
      <div class="buscar-usuario">
        <h2>Buscar usuario</h2>
        <form>
          <label for="buscarUsuario">Nombre del usuario:</label>
          <input type="text" id="buscarUsuario" name="buscarUsuario">
          <button type="submit" onclick="window.location.href='otra_pagina.html'">Buscar usuario</button>
        </form>
      </div>
    </div>
    <div id="resultados"></div>
  </section>

  <style>
    #buscarUserProduct {
      height: 100vh;
      width: 100%;
      background-color: var(--body-color);
      transition: var(--tran-05);
      padding: 7rem;
    }

    .buscar-forms {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .buscar-producto,
    .buscar-usuario {
      width: 45%;
      background-color: #fff;
      border-radius: 15px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 2rem;
      margin-bottom: 2rem;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .buscar-producto h2,
    .buscar-usuario h2 {
      font-size: 3rem;
      margin-bottom: 2rem;
      text-align: center;
    }

    .buscar-producto form,
    .buscar-usuario form {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 100%;
    }

    .buscar-producto label,
    .buscar-usuario label {
      font-size: 2rem;
      margin-bottom: 1rem;
    }

    .buscar-producto input[type="text"],
    .buscar-producto input[type="number"],
    .buscar-producto select,
    .buscar-usuario input[type="text"] {
      font-size: 1.8rem;
      padding: 1rem;
      border-radius: 5px;
      border: none;
      margin-bottom: 2rem;
      width: 100%;
      max-width: 30rem;
    }

    .buscar-producto button[type="submit"],
    .buscar-usuario button[type="submit"] {
      font-size: 2.5rem;
      padding: 1.5rem 2rem;
      border-radius: 5px;
      border: none;
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
      width: 100%;
      max-width: 30rem;
    }

    .buscar-producto button[type="submit"]:hover,
    .buscar-usuario button[type="submit"]:hover {
      background-color: #0069d9;
    }
  </style>



  <section id="ver-productos" class="verproductos">
    <div>
      <h2>Ver productos o usuarios</h2>
      <button id="verProductosBtn">Ver productos</button>
      <button id="verUsuariosBtn">Ver usuarios</button>
    </div>
    <div id="resultadosdever">
      <!-- Aquí se mostrarán los productos o usuarios -->
    </div>
    <script>
      function cargarProductos() {
        $.ajax({
            type: 'GET',
            url: 'procesosAdmin/verProductos.php',
            dataType: 'html',
            encode: true
          })
          .done(function(data) {
            $('#resultadosdever').html(data);
          });
      }

      $('#verProductosBtn').click(function(event) {
        event.preventDefault();
        cargarProductos();
      });

      function cargarUsuarios() {
        $.ajax({
            type: 'GET',
            url: 'procesosAdmin/verUsuarios.php',
            dataType: 'html',
            encode: true
          })
          .done(function(data) {
            $('#resultadosdever').html(data);
          });
      }

      $('#verUsuariosBtn').click(function(event) {
        event.preventDefault();
        cargarUsuarios();
      });
    </script>
  </section>



  <section class="agregaradmin" id="A-agradmin">
    <h2>Agregar administrador</h2>
    <form action="agregar_administrador.php" method="post" id="agregarAdminForm">
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
      </div>

      <div class="form-group">
        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required>
      </div>

      <div class="form-group">
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>
      </div>

      <button type="submit">Agregar</button>
    </form>
  </section>

  <section class="soporte" id="A-soporte">
    <h2>Soporte técnico</h2>
    <p>¿Tienes algún problema con tu compra? ¿Necesitas ayuda para configurar un producto?</p>
    <p>Nuestro equipo de soporte técnico está aquí para ayudarte. Completa el formulario a continuación y nos pondremos en contacto contigo lo antes posible.</p>
    <form action="" method="post" id="soporteForm">
      <div class="form-group">
        <label for="nombre">Nombre completo:</label>
        <input type="text" id="nombre" name="nombre" required>
      </div>
      <div class="form-group">
        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required>
      </div>
      <div class="form-group">
        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono">
      </div>
      <div class="form-group">
        <label for="mensaje">Mensaje:</label>
        <textarea id="mensaje" name="mensaje" rows="5" required></textarea>
      </div>
      <button type="submit">Enviar mensaje</button>
    </form>
  </section>



  <script>
    const body = document.querySelector("body"),
      sidebar = body.querySelector("nav"),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");

    toggle.addEventListener("click", () => {
      sidebar.classList.toggle("close");
    });

    searchBtn.addEventListener("click", () => {
      sidebar.classList.remove("close");
    });

    modeSwitch.addEventListener("click", () => {
      body.classList.toggle("dark");

      if (body.classList.contains("dark")) {
        modeText.innerText = "Light mode";
      } else {
        modeText.innerText = "Dark mode";
      }
    });
  </script>
</body>
<script>
// Tiempo de inactividad antes de mostrar la advertencia (50 segundos)
var tiempoAdvertencia = 6000; // 50 segundos

// Tiempo después de la advertencia para cerrar sesión (10 segundos)
var tiempoCierre = 5000; // 10 segundos

var tiempoInactividad;

function resetearTiempoInactividad() {
    clearTimeout(tiempoInactividad);
    document.getElementById('modalAdvertencia').style.display = 'none';
    tiempoInactividad = setTimeout(mostrarAdvertencia, tiempoAdvertencia);
}


// Mostrar mensaje de advertencia y programar cierre de sesión
function mostrarAdvertencia() {
    document.getElementById('modalAdvertencia').style.display = 'block';

    // Cierra la sesión automáticamente después de tiempoCierre
    tiempoInactividad = setTimeout(cerrarSesion, tiempoCierre);
}


// Función para cerrar la sesión en el servidor
function cerrarSesion() {
    // Hacer una solicitud AJAX a un script PHP para cerrar la sesión
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'salir.php', true); // Asegúrate de que la ruta a logout.php es correcta
    xhr.send();

    // Redirigir a la página de inicio de sesión
    window.location.href = 'loginAdmin.php'; // Asegúrate de que esta ruta es correcta
}

// Eventos para resetear el tiempo de inactividad
window.onload = resetearTiempoInactividad;
document.onmousemove = resetearTiempoInactividad;
document.onkeypress = resetearTiempoInactividad;
</script>

<!-- Ventana Modal -->
<div id="modalAdvertencia" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); z-index:1000; background-color:white; padding:20px; border:1px solid #000;">
    <p>¿Sigues ahí? Tu sesión se cerrará en 10 segundos si no hay actividad.</p>
</div>


</html>