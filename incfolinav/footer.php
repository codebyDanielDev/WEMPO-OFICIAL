<footer class="bg-light mt-auto py-3">
    <div class="container">
        <div class="row">
            <!-- Suscripción -->
            <div class="col-md-4">
                <h5>Suscríbete a nuestro boletin informativo. </h5>
                <p>Ingresa tu correo electrónico para recibir información de nuestro proyecto.</p>
                <form action="subscribe.php" method="post">
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Correo electrónico" required>
                        <div class="input-group-append">
                        <button class="btn btn-primary btn-pixel-art" type="submit">Suscribirse</button>

                        </div>
                    </div>
                </form>
            </div>

            <!-- Contacto -->
            <div class="col-md-4">
                <h5>Contáctanos</h5>
                <p>Chatea con nosotros<br>
                Te atendemos las 24hrs</p>
                <p>Escríbenos:<br>
                Estamos para ayudarte<br>
                senati@senati.pe</p>
                <p>Llámanos<br>
                x931998025<br>
                De lunes a domingo de 8:00Am a 6:00Pm</p>
                <p>Visítanos<br>
                
            </div>

            <!-- Secciones -->
            <div class="col-md-4">
                <div class="row">
                <div class="col-md-4">
    <h5>Secciones</h5>
    <div class="btn-group-vertical">
        <button type="button" class="btn btn-link">Nosotros</button>
        <button type="button" class="btn btn-link">Nuestros servicios</button>
        <button type="button" class="btn btn-link" id="collaborateButton" data-toggle="modal" data-target="#collaborateModal">Colabora con nosotros con nosotros</button>
    </div>
</div>


<div class="modal fade" id="collaborateModal" tabindex="-1" role="dialog" aria-labelledby="collaborateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="collaborateModalLabel">Oe depositame a mi BCP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="imagenes\xd\qrizi.jpg" alt="Imagen de colaboración" class="img-fluid">
            </div>
            <div class="modal-body">
            <audio id="audioElement" src="imagenes\xd\depo.mp3" preload="auto"></audio>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<style>
  #collaborateButton:hover {
    color: #008CBA;  /* Cambia esto al color que desees */
}

</style>
<script>
$(document).ready(function(){
    $('#collaborateModal').on('shown.bs.modal', function () {
        var audioElement = document.getElementById('audioElement');
        audioElement.play();
    });
    
    $('#collaborateModal').on('hidden.bs.modal', function () {
        var audioElement = document.getElementById('audioElement');
        audioElement.pause();
    });
});
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

                    <div class="col-md-4">
                      <h5>Atención al usuario</h5>
                      <div class="dropdown">
                        <p>Atención al usuario</p>
                        <ul>
                          <li><a href='#'>Preguntas frecuentes</a></li>
                          <li><a href='#'>REPORTAR ERRORES</a></li>
                          <li><a href='#'>Términos y condiciones DE USO </a></li>
                          <li><a href='#'>Politica de privacidad</a></li>
                          <li><a href='#'>Contáctanos</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <h5>Otros</h5>
                      <ul>
                        <li>Síguenos en
                        <ul class="redes-sociales vdk">
    <li>
      <a class="mdi mdi-facebook" href="https://www.senati.edu.pe"></a>
    </li>
    <li>
      <a class="mdi mdi-twitter" href="https://www.senati.edu.pe"></a>
    </li>
    <li>
      <a class="mdi mdi-instagram" href="https://www.senati.edu.pe"></a>
    </li>
    <li>
      <a class="mdi mdi-youtube" href="https://www.senati.edu.pe"></a>
    </li>
  </ul>
</li>
</ul>

</div>
</div>
</div>
</div>
<!-- Copyright -->
<div class="row mt-3">
<div class="col-md-12 text-center">
<p>© 2023 - CHOKLOX    . Todos los derechos reservados.</p>
</div>
</div>
</div>
<style>
  .dropdown {
  position: relative;
  display: inline-block;
  cursor: pointer;
}
.dropdown ul {
display: none;
position: absolute;
background-color: #f9f9f9;
min-width: 160px;
box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
padding: 12px 16px;
z-index: 1;
}

.dropdown:hover ul {
display: block;
}
.dropdown p {
margin: 0;
padding: 0;
}

.dropdown ul {
list-style-type: none;
margin: 0;
padding: 0;
border-radius: 4px;
}

.dropdown ul li {
padding: 8px 16px;
transition: background-color 0.2s;
}

.dropdown ul li:hover {
background-color: #f1f1f1;
}

.dropdown ul li a {
text-decoration: none;
color: #333;
display: block;
}

.dropdown ul li a:hover {
color: #007bff;
}

.dropdown ul li.active {
background-color: #007bff;
}

.dropdown ul li.active a {
color: #fff;
}

.btn-link {
text-decoration: none;
color: #007bff;
padding: 0;
}

.btn-link:hover {
color: #0056b3;
text-decoration: underline;
}


</style>
</footer>