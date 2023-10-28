<?php
session_start();
include "db_conectar/conexion.php";
include "includes/funciones_usuarios.php";

// Si el usuario ya ha iniciado sesión, redirigirlo a la página de inicio
if (isset($_SESSION['id_usuario'])) {
    header("Location: perfilUser.php");
    exit();
}
?>

  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>INICIAR</title>
      <!--<link rel="stylesheet" type="text/css" href="css/loginstyle.css" />-->
      <link rel="stylesheet" type="text/css" href="css\loginstyle copy.css"/>
      <script
        src="https://kit.fontawesome.com/64d58efce2.js"
        crossorigin="anonymous"
      ></script>
    
    </head>
    <body>
      
      <div class="container">
        <div class="forms-container">
          <div class="signin-signup">
            <form action="procesos/login.php" method="post"class="sign-in-form"id="login-form">
              <h2 class="title">INICIAR SESIÓN</h2>
              <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="email" name="email" placeholder="Correo" />
              </div>
              <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Contraseña" />
              </div>
<!-- Enlace que activa el modal -->
<a href="javascript:void(0);" id="openPasswordModal">¿Te olvidaste tu contraseña?</a>


                  <style>
                    a {
    color: #FFEB3B; /* Color aproximado al maíz */
    text-decoration: none; /* Para quitar el subrayado */
}

a:hover {
    color: #FFC107; /* Color un poco más oscuro para cuando se pasa el ratón por encima */
}

                  </style>
                  <button type="submit" class="btn solid"  id="login-in-btnR">INICIAR </button>  
              <p class="social-text">Regresar a la página principal</p>
              <div class="social-media">
                <a href="./" class="social-icon">
                  <i class="fas fa-arrow-left"></i>
                </a>
              </div>
            </form>
            <form action="procesos/registroUsuario.php" method="post" class="sign-up-form" id="register-form">
              <h2 class="title">REGISTRATE</h2>
              <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" name="dni" id="dni"  placeholder="DNI" pattern="\d{8}" title="Por favor, ingrese un DNI válido de 8 dígitos." maxlength="8"/>
              </div>
              <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" name="nombre" placeholder="Nombre" required/>
              </div>
              <div class="input-field">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Correo" required/>
              </div>
              <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Contraseña" pattern=".{8,}" title="La contraseña debe contener al menos 8 caracteres" required />
              </div>
              <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" name="confirm_password" placeholder="Confirmar contraseña" pattern=".{8,}" title="Las contraseñas deben coincidir" required />
              </div>
              <div>
              <input type="checkbox" name="terms" id="terms" required>
              <style>
                /* Estilos específicos para el checkbox */
input[type="checkbox"] {
  /* Asegurarse de que el checkbox está sobre la capa visual (importante para la interacción del clic) */
  position: relative;
  cursor: pointer;
  
  /* Hacer que el checkbox original sea invisible */
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  
  /* Establecer dimensiones para el cuadro */
  width: 25px;
  height: 25px;
  
  /* Crear un borde y centrarlo (ajustable al diseño deseado) */
  border: 2px solid #dbb40c;
  border-radius: 5px; /* esquinas redondeadas, si se prefiere */
  outline: none; /* Eliminar el contorno que aparece al hacer clic */

  /* Colores y transiciones para el fondo y el borde */
  background: #ffffff;
  transition: background 0.3s, border-color 0.3s, box-shadow 0.2s;
}

/* Estilo para el estado "checked" (seleccionado) del checkbox */
input[type="checkbox"]:checked {
  /* Cambiar el fondo y el color del borde al seleccionar */
  background: #f8eb98;
  border-color: #866202;
  
  /* Opcional: sombra para un efecto ligeramente "elevado" */
  box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.1);
}

/* Animación y estilo para el aspecto del "check" (✔) */
input[type="checkbox"]:checked:after {
  /* Usamos la pseudoclase ":after" para crear el aspecto del "check" */
  content: '';
  position: absolute;
  width: 10px;
  height: 5px;
  background: transparent;
  
  /* Crear la forma del "check" con bordes (es un pequeño rectángulo rotado) */
  border: 2px solid #866202;
  border-top: none;
  border-right: none;

  /* Posicionamiento y rotación del "check" */
  left: 7px;
  top: 5px;
  transform: rotate(-45deg);
  
  /* Asegurar la transición suave de la aparición del "check" */
  transition: border-color 0.3s;
}

/* Mejorar la respuesta visual durante la interacción con el checkbox */
input[type="checkbox"]:active {
  /* Efecto de "presionado" cuando se hace clic */
  box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.2);
}

              </style>
<!-- Enlace que activa el modal -->
<label for="terms">Acepto los <a href="javascript:void(0);" id="openModal" class="terms-link">términos y condiciones.</a></label>

<!-- El Modal -->
<div id="termsModal" class="modal">

  <!-- Contenido del modal -->
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
        <h2>Términos y Condiciones de Uso</h2>
      </div>
      <div class="modal-body">
        <p>Bienvenido a choklitos, una plataforma dedicada a la identificación de la salud de las plantaciones de maíz, permitiéndote tomar medidas proactivas para el cuidado y mantenimiento adecuado de tu cultivo.</p>
        <h2>1. Aceptación de los Términos</h2>
        <p>Al acceder o utilizar nuestro Servicio, usted acuerda estar vinculado legalmente por estos Términos y Condiciones. No continúe usando  si no acepta todos los términos y condiciones establecidos en esta página.</p>
        <h2>2. Descripción del Servicio</h2>
        <p> CHOCLITOS ofrece una herramienta de diagnóstico que utiliza IA  para identificar si las plantas de maíz están saludables o sufren de alguna enfermedad. Los resultados se generan basados en la información delas imágenes que el usuario proporciona sobre su cultivo.</p>
        <h2>3. Registro y Datos del Usuario</h2>
        <p>Para utilizar nuestro servicio, los usuarios pueden necesitar proporcionar ciertos datos personales (como identificación, contacto, etc.) y datos específicos del cultivo. La información recopilada por  CHOCLITOS se utiliza para:

a. Analizar y diagnosticar el estado del maíz presentado.
b. Comunicar resultados, actualizaciones y futuras recomendaciones.
c. [Cualquier otro uso que se le dará a la información]

Consulte nuestra Política de Privacidad para obtener más información sobre cómo protegemos y utilizamos sus datos.</p>
        <h2>4. Uso Adecuado</h2>
        <p>El usuario se compromete a proporcionar información veraz y precisa respecto al estado de su cultivo. El usuario no debe usar esta plataforma con fines que infrinjan la ley, los derechos de terceros, o que de cualquier forma puedan causar daño a personas o entidades, en caso el usuario realice lo contrario,  CHOCLITOS puede betarlo de la aplicación y no hacer ninguna devolución. </p>
        <h2>5. Limitación de Responsabilidad</h2>
        <p> CHOCLITOS realiza un esfuerzo razonable para proporcionar diagnósticos precisos. Sin embargo, los resultados dependen de la información proporcionada por el usuario y pueden no ser 100% precisos o completos.  CHOCLITOS no se hace responsable de decisiones tomadas, daños, pérdidas, entre otros, basadas en los resultados proporcionados por este servicio.</p>
        <h2>6. Comunicaciones</h2>
        <p>Al crear una cuenta en  CHOCLITOS, el usuario acuerda suscribirse a boletines informativos, material de marketing o promocional y otra información que  CHOCLITOS pueda enviar. Sin embargo, el usuario puede optar por no recibir algunas o todas estas comunicaciones.</p>
        <h2>7. Cambios en el Servicio y Términos</h2>
        <p> CHOCLITOS se reserva el derecho de modificar o descontinuar, temporal o permanentemente, el servicio proporcionado (o cualquier parte del mismo) en cualquier momento con o sin previo aviso. Asimismo,  CHOCLITOS puede actualizar estos Términos y Condiciones de Uso. Se notificará a los usuarios de cualquier cambio material y se considerará que han aceptado las modificaciones al continuar utilizando el servicio después de la fecha de los cambios.</p>
        <h2>8. Contacto</h2>
        <p>Para cualquier duda o consulta sobre estos términos, no dude en contactarnos a  CHOCLITOS@choklos.com.</p>
      </div>
      <div class="modal-footer">
        <button id="acceptTerms">Aceptar</button>
      </div>
    </div>

</div>

<style>
  /* Estilos básicos del modal */
.modal {
    display: none;
    position: fixed; 
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;

}

.modal-content {
    position: relative;
    background-color: #f9f4e8; /* color de fondo cremoso */
    margin: 10% auto;
    padding: 0;
    border: 2px solid #f2dc6d; /* borde amarillo maíz */
    width: 60%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

/* Encabezado del modal */
.modal-header {
    padding: 15px;
    background-color: #f2dc6d; /* color de cabecera amarillo maíz */
    color: white;
    border-bottom: 2px solid #e2c45a; /* borde más oscuro para profundidad */
}

/* Botón de cerrar */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

/* Cuerpo del modal */
.modal-body {
    padding: 20px;
    color: #4d4d4d; /* color de texto suave */
}

/* Pie de página del modal */
.modal-footer {
    padding: 15px;
    background-color: #f2dc6d; /* color de pie de página amarillo maíz */
    color: white;
    text-align: right;
    border-top: 2px solid #e2c45a; /* borde más oscuro para profundidad */
}

/* Botón de aceptar en el modal */
#acceptTerms {
    background-color: #4da36e; /* color verde maíz */
    color: white;
    padding: 10px 24px;
    border: none;
    border-radius: 4px; /* bordes redondeados */
    cursor: pointer;
    font-weight: bold;
}

#acceptTerms:hover {
    background-color: #3d8a5e; /* verde más oscuro al pasar el ratón */
}

/* Enlace para abrir el modal */
.terms-link {
    color: #4da36e; /* color verde maíz */
    cursor: pointer;
    text-decoration: underline;
}

.terms-link:hover {
    color: #3d8a5e; /* verde más oscuro al pasar el ratón */
}

</style>


 <script>
  // Obtén el modal
var modal = document.getElementById("termsModal");

// Obtén el enlace que abre el modal
var btn = document.getElementById("openModal");

// Obtén el elemento <span> que cierra el modal
var span = document.getElementsByClassName("close")[0];

// Cuando el usuario hace clic en el enlace, abre el modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// Cuando el usuario hace clic en <span> (x), cierra el modal
span.onclick = function() {
    modal.style.display = "none";
}

// Cuando el usuario hace clic en cualquier lugar fuera del modal, ciérralo
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Acción cuando se presiona el botón "Aceptar"
document.getElementById("acceptTerms").onclick = function() {
    // Aquí puedes colocar otras acciones que quieras que sucedan cuando se acepten los términos
    // Por ejemplo, podrías cerrar el modal:
    modal.style.display = "none";
    // Y/O otras acciones, como enviar un formulario, etc.
}

</script> 

                <style>
                  /* Estilos para el contenedor de la etiqueta */
label[for="terms"] {
  font-size: 22px; /* Hace el texto un poco más grande; ajusta según tus preferencias */
  cursor: pointer; /* Cambia el cursor a una 'mano' cuando se pasa sobre el texto para indicar que es clickeable */
}

/* Estilos específicos para el enlace dentro de la etiqueta */
label[for="terms"] a {
  color: #FFEB3B; /* Generalmente, el azul es reconocido como un color estándar para los enlaces, pero esto se puede cambiar */
  text-decoration: underline; /* Subraya el texto para indicar que es un enlace */
  font-weight: bold; /* Hace que el texto sea negrita. Esto es opcional, según tu diseño preferido */
  transition: color 0.3s ease; /* Una transición suave para el color del enlace al pasar el mouse */
}

/* Cambia el color del enlace al pasar el cursor sobre él para una retroalimentación visual */
label[for="terms"] a:hover,
label[for="terms"] a:focus { /* No olvides los estilos para cuando el enlace está activo o en foco */
  color: #002266; /* Un color diferente para cuando se pasa el mouse sobre el enlace; elige el color que prefieras */
}

                </style>
            </div>
            <button type="submit" class="btn solid"  id="sign-in-btnR">REGISTRAR </button>
              
              <p class="social-text">Regresar a la página principal</p>
              <div class="social-media">
                <a href="./" class="social-icon">
                  <i class="fas fa-arrow-left"></i>
                </a>
              </div>
            </form>
            <script>
document.getElementById("login-form").addEventListener("submit", function (event) {
    event.preventDefault();
    const formData = new FormData(event.target);

    fetch("procesos/login.php", {
        method: "POST",
        body: formData,
    })
    .then((response) => response.json())
    .then((data) => {
        if (data.status === "success") {
            alert(data.message);
            // También puedes reiniciar el formulario aquí si es necesario
            window.location.href = "perfilUser.php";
        } else {
            alert(data.message);
        }
    })
    .catch((error) => {
        console.error("Error:", error);
        alert("Ocurrió un error inesperado.");
    });
}); 

document.getElementById("register-form").addEventListener("submit", function (event) {
    event.preventDefault();
    const formData = new FormData(event.target);

    fetch("procesos/registroUsuario.php", {
        method: "POST",
        body: formData,
    })
    .then((response) => response.json())
    .then((data) => {
        if (data.status === "success") {
            alert(data.message);
            const sign_in_btn = document.querySelector("#sign-in-btnR");
            const container = document.querySelector(".container");
            container.classList.remove("sign-up-mode");
            // También puedes reiniciar el formulario aquí si es necesario
        } else {
            alert(data.message);
        }
    })
    .catch((error) => {
        console.error("Error:", error);
        alert("Ocurrió un error inesperado. Puede que el usuario ya este registrado, cambie el dni o el correo.");
    });
});
</script>
          </div>
        </div>
        <div class="panels-container">

          <div class="panel left-panel">
              <div class="content"> 
                  <h3>¿No tienes una cuenta?</h3>
                  <p>Dale click, y create una.</p>
                  <button class="btn transparent" id="sign-up-btn">CREAR</button>
              </div>
              <img src="imagenes\choklitos\crearcuentachoclo.png" class="image" alt="">
          </div>

          <div class="panel right-panel">
              <div class="content">
                  <h3>¿Quieres iniciar sesión?</h3>
                  <p>INICIAR SESIÓN</p>
                  <button class="btn transparent" id="sign-in-btn">INICIAR</button>
                  
              </div>
              <img src="imagenes\choklitos\inicarchoclo.png" class="image" alt="">
          </div>
        </div>
      </div>
      <?php //include 'incfolinav/footer.php'?>
      <script src="js/loginstyle.js"></script>
    </body>
  </html>