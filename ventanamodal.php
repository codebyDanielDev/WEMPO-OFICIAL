<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ventana Modal Simple</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>

<!-- Botón que activa la modal -->
<button id="btnAbrir">Abrir ventana</button>

<!-- La Modal -->
<div id="miModal" class="modal">
  <!-- Contenido de la modal -->
  <div class="modal-contenido">
    <span class="cerrar">&times;</span>
    <p>¡Hola! Soy una modal.</p>
  </div>
</div>

<script src="scripts.js"></script>
</body>
<style>
    /* Archivo estilos.css */
.modal {
  display: none; /* La modal está oculta por defecto */
  position: fixed; /* Se queda en lugar incluso al desplazarse por la página */
  z-index: 1; /* Sitúa la modal encima */
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto; /* Habilita el scroll si se necesita */
  background-color: rgb(0,0,0); /* Color de fondo */
  background-color: rgba(0,0,0,0.4); /* Oscurece el fondo */
}

/* Contenido de la modal */
.modal-contenido {
  background-color: #fefefe;
  margin: 15% auto; /* 15% desde la parte superior y centrado */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Podrías cambiar esto a tu gusto */
}

/* El botón de cerrar */
.cerrar {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.cerrar:hover,
.cerrar:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

</style>
<script>
    // Archivo scripts.js
// Obtienes la modal
var modal = document.getElementById("miModal");

// Obtienes el botón que abre la modal
var btn = document.getElementById("btnAbrir");

// Obtienes el elemento <span> que cierra la modal
var span = document.getElementsByClassName("cerrar")[0];

// Cuando el usuario hace clic en el botón, abre la modal
btn.onclick = function() {
  modal.style.display = "block";
}

// Cuando el usuario hace clic en <span> (x), cierra la modal
span.onclick = function() {
  modal.style.display = "none";
}

// Cuando el usuario hace clic en cualquier lugar fuera de la modal, la cierra
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
  
</script>
</html>
