<?php
session_start();
include "db_conectar/conexion.php";
include "includes/funciones_usuarios.php";

// Definimos la variable para controlar si el usuario está autenticado
$usuario_autenticado = false;

if (isset($_SESSION['id_usuario'])) {
    $usuario = obtenerUsuarioPorId($_SESSION['id_usuario']);

    if (is_array($usuario)) {
        // El usuario está autenticado y existe
        $usuario_autenticado = true;
    } else {
        echo "Error: usuario no encontrado";
        exit();
    }
}
// Si el usuario no está autenticado, imprimimos el script de JavaScript para la redirección
if (!$usuario_autenticado):
    ?>
    <script>
        // Se espera durante 15 segundos antes de realizar la redirección
        setTimeout(function() {
            window.location.href = 'loginregis.php';
        }, 15000); // 15000 milisegundos equivalen a 15 segundos
    </script>
    <?php endif; ?>




<!-- Si el usuario no está autenticado, se ejecutará el siguiente código JavaScript -->
<?php if (!$usuario_autenticado): ?>

<?php endif; ?>

<!-- Resto del código HTML de tu página aquí -->

<?php
// Si el usuario está autenticado, se puede continuar con el resto del código PHP normalmente
if ($usuario_autenticado) {
    // ... el resto de tu lógica de negocio ...
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IA Diagnóstico de Salud del Maíz</title>
    <link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/logo.ico" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <style>
        /* Paleta de colores del maíz */
        :root {
            --maiz-claro: #FFEB77;
            --maiz-oscuro: #DAA520;
            --fondo: #2A2A2A;
        }

        body {
            background-color: var(--fondo);
            color: var(--maiz-claro);
        }

        .container {
            margin-top: 2rem;
        }

        .btn-custom {
            background-color: var(--maiz-oscuro);
            border: none;
            color: white;
        }

        .btn-custom:hover {
            background-color: var(--maiz-claro);
            color: var(--fondo);
        }

        #resultado {
            width: 100%;
            text-align: center;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
<?php include 'incfolinav/navbar.php'?>

<!-- Este HTML debería ir en la parte del body de tu documento HTML donde quieres que aparezca la ventana modal -->
<div class="modal" tabindex="-1" role="dialog" id="loginModal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Iniciar sesión requerido</h5>
    </div>
    <div class="modal-body">
        <p>Debes iniciar sesión para acceder a esta página. De no hacerlo, serás redirigido a la página de inicio de sesión en <span id="countdown">15</span> segundos.</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="location.href='loginregis.php'">Iniciar sesión</button>
    </div>
</div>
<script type="text/javascript">
    // Encuentra el elemento del DOM en el que queremos mostrar el conteo regresivo
    var countdownElement = document.getElementById('countdown');
    var secondsRemaining = 15; // El número inicial de segundos

    // Actualiza el cronómetro cada segundo
    var countdownTimer = setInterval(function() {
        secondsRemaining--; // Disminuir el tiempo restante
        countdownElement.innerText = secondsRemaining; // Actualizar el DOM

        if (secondsRemaining <= 0) {
            clearInterval(countdownTimer); // Detener el cronómetro
            //window.location.href = 'loginregis.php'; // Redirigir al usuario
        }
    }, 1000); // Ejecutar esta función cada 1000 milisegundos (es decir, cada segundo)
</script>

  </div>
</div>

<script>
    // Luego, usarías JavaScript para verificar si el usuario está autenticado y, si no, mostrar la ventana modal.
    document.addEventListener("DOMContentLoaded", function() {
        var usuarioAutenticado = <?php echo $usuario_autenticado ? 'true' : 'false'; ?>;
        if (!usuarioAutenticado) {
            $('#loginModal').modal('show');
        }
    });
</script>

<div class="container">
        <h2 class="text-center">Diagnóstico de Salud del Maíz</h2>
        <div class="row">
            <div class="col-md-6">
                <form id="formUpload" enctype="multipart/form-data" class="my-3">
                    <div class="mb-3">
                        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                    </div>
                    <button type="button" class="btn btn-custom" onclick="subirImagen()">Predecir</button>
                </form>
            </div>
            <div class="col-md-6">
                <img id="imagenSubida" class="img-fluid mb-3" style="max-width: 100%; display: none;">
                <div id="resultado" class="mb-3"></div>
                <img id="resultadoGif" class="img-fluid" style="max-width: 100%; display: none;">
            </div>
        </div>
    </div>
    
<!-- Incluye los estilos de Bootstrap -->

<!-- Sección de navegación -->
<section id="section2" class="bg-white">
    <div class="container">
        <nav class="nav justify-content-center">
            <a class="nav-link active" href="#section4">Características</a>
            <a class="nav-link" href="#section7">Éxito del cliente</a>
            <a class="nav-link" href="#section9">Recursos</a>
            <a class="nav-link" href="#section11">Productos relacionados</a>
            <a class="nav-link" href="#section12">Más información</a>
        </nav>
    </div>
</section>

<!-- Sección de descripción -->
<section id="section3" class="bg-white">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h5 class="mb-4">OpenText™ AI Image Analytics le brinda acceso a análisis de imágenes en tiempo real y extremadamente precisos para usos que van desde la optimización del tráfico hasta la seguridad física. Detecte e identifique las clasificaciones de objetos como personas, bicicletas, paquetes, autobuses y automóviles en sus imágenes.</h5>
                <a class="btn btn-primary mb-2" target="_blank" rel="noopener" href="https://www.microfocus.com/pnx/media/brochure/idol_mmap_brochure.pdf">Leer el folleto</a>
            </div>
        </div>
    </div>
</section>

<!-- Incluye los scripts de Bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
async function subirImagen() {
    const formData = new FormData(document.getElementById('formUpload'));
    try {
        const response = await fetch('http://localhost:5000/predecir', {
            method: 'POST',
            body: formData,
        });
        if (response.ok) {
            const jsonResponse = await response.json();
            const resultadoDiv = document.getElementById('resultado');
            resultadoDiv.innerText = 'Prediccion: ' + jsonResponse.predictions;

            // Visualizar la imagen subida
            const imagenElement = document.getElementById('imagenSubida');
            const fileInput = document.getElementById('imagen');
            const file = fileInput.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                imagenElement.src = e.target.result;
                imagenElement.style.display = 'block';
            }
            reader.readAsDataURL(file);

            // Cambiar el color del recuadro según la predicción
            if (jsonResponse.predictions !== "Maiz Saludable :D") {
                resultadoDiv.style.backgroundColor = 'red';
                resultadoDiv.style.color = 'white';
            } else {
                resultadoDiv.style.backgroundColor = 'green';
                resultadoDiv.style.color = 'white';
            }

            // Mostrar el GIF según la predicción
            const gifElement = document.getElementById('resultadoGif');
            if (jsonResponse.predictions === "Maiz Saludable :D") {
                gifElement.src = '/dashboard/PROYECTOCOMDIA/imagenes/maiz_saludable.gif';
            } else {
                gifElement.src = '/dashboard/PROYECTOCOMDIA/imagenes/maiz_enfermo.gif';
            }
            gifElement.style.display = 'block';

        } else {
            throw new Error('Error en la llamada a la API.');
        }
    } catch (error) {
        console.error('Error:', error);
    }
}
</script>
<?php include 'incfolinav/footer.php'?>
</body>
</html>

