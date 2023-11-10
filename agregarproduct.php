<?php include 'procesosAdmin\mostrar_proveedores_select.php'; // Incluye el script de PHP aquí 
?>
<?php //include 'procesosAdmin\mostrarProveedoresxD.php'; // Incluye el script de PHP aquí 
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botones con Ventanas Modales en Bootstrap</title>
    <!-- Enlace al CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>

    <!-- Botones para abrir las ventanas modales -->



    <!-- Ventana Modal 1 - Proveedor, agregar, eliminar y editar -->
    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modalLabel1" aria-hidden="true">

        <div class="modal-dialog" role="document" style="max-width: 90%;">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel1">Gestión de Proveedores</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para agregar un nuevo proveedor -->
                    <form id="formProveedor" action="procesosAdmin\insertar_proveedor.php" method="POST">
                        <div class="form-group">
                            <label for="nombre">Nombre del Proveedor</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección del Proveedor</label>
                            <textarea class="form-control" id="direccion" name="direccion" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono del Proveedor sin el +51</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" required pattern="\d{9}" title="El teléfono debe tener 9 dígitos numéricos sin espacios ni otros caracteres.">

                        </div>
                        <div class="form-group">
                            <label for="email">Email del Proveedor</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <button type="button" class="btn btn-primary" id="btnVerProveedores">Ver proveedores</button>
                        <button type="submit" class="btn btn-primary">Agregar Proveedor</button>
                    </form>
                    <div id="responseMessage" style="display: none;" class="alert"></div>
                    <div id="listaProveedores" style="display: none;">

                        <!-- Aquí se inyectará la tabla de proveedores -->
                    </div>
                    <div id="responseMessage" style="display: none;" class="alert"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>

    <script>
        // Función para cargar los proveedores
        function cargarProveedores() {
            // Realiza una petición AJAX a un archivo PHP que devuelve los proveedores
            fetch('procesosAdmin/mostrarProveedoresxD.php')
                .then(response => response.text())
                .then(html => {
                    // Actualiza el contenedor con el HTML recibido
                    document.getElementById('listaProveedores').innerHTML = html;
                    document.getElementById('listaProveedores').style.display = 'block'; // Muestra la lista
                })
                .catch(error => {
                    console.error('Error al cargar los proveedores:', error);
                });
        }

        // Añadir evento al botón para cargar los proveedores
        document.getElementById('btnVerProveedores').addEventListener('click', cargarProveedores);
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtén el formulario y el div de mensaje de respuesta
            var form = document.getElementById('formProveedor');
            var responseMessage = document.getElementById('responseMessage');

            form.onsubmit = function(event) {
                event.preventDefault(); // Prevenir el envío del formulario
                var formData = new FormData(form);

                // Aquí se haría la petición AJAX a 'procesosAdmin/insertar_proveedor.php'
                fetch('procesosAdmin/insertar_proveedor.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text())
                    .then(data => {
                        // Mostrar el mensaje de respuesta
                        responseMessage.style.display = 'block';
                        if (data.includes('éxito')) {
                            // Si la respuesta incluye la palabra 'éxito', mostrar como alerta de éxito
                            responseMessage.classList.add('alert-success');
                            responseMessage.textContent = 'Proveedor insertado con éxito.';
                        } else {
                            // Si la respuesta no es de éxito, mostrar como alerta de error
                            responseMessage.classList.add('alert-danger');
                            responseMessage.textContent = 'Error al insertar proveedor.';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        responseMessage.style.display = 'block';
                        responseMessage.classList.add('alert-danger');
                        responseMessage.textContent = 'Error al procesar la solicitud.';
                    });
            };
        });
    </script>


    <!-- Ventana Modal 2 -->
    <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel2">Modal 2</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Contenido de la ventana modal 2.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Ventana Modal 3 -->
    <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="modalLabel3" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel3">Modal 3</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Contenido de la ventana modal 3.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Ventana Modal 4 -->
    <div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="modalLabel4" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel3">Modal 4</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Contenido de la ventana modal 4.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Ventana Modal 5 -->
    <div class="modal fade" id="modal5" tabindex="-1" role="dialog" aria-labelledby="modalLabel5" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel3">Modal 5</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Contenido de la ventana modal 5.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Ventana Modal 6 -->
    <div class="modal fade" id="modal6" tabindex="-1" role="dialog" aria-labelledby="modalLabel6" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel3">Modal 6</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Contenido de la ventana modal 66
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>



    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal3">+</button>
                        
<!-- Botón para abrir el modal de nuevo proveedor -->
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal2">+</button>
    
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal2">+</button>
<div class="container mt-5">
    <h2>Formulario de Productos</h2>
    <form>
        <!-- Primera fila -->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="proveedor_id">Proveedor</label>
                <div class="input-group">
                    <select class="form-control" id="proveedor_id" name="proveedor_id" required>
                        <option value="">Seleccione un proveedor</option>
                        <!-- Aquí se generan las opciones del select -->
                        <?php echo $proveedoresOptions; ?>
                    </select>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal1">+</button>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" placeholder="Nombre del producto" required>
            </div>
        </div>
        <!-- Segunda fila -->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="contenido">Descripción del Producto</label>
                <textarea class="form-control" id="contenido" rows="3" placeholder="Descripción del producto"></textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="categoria">Categoría del Producto</label>
                <input type="text" class="form-control" id="categoria" placeholder="Categoría del producto">
            </div>
        </div>
        <!-- Tercera fila -->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="precio">Precio del Producto</label>
                <input type="text" class="form-control" id="precio" placeholder="Precio del producto">
            </div>
            <div class="form-group col-md-6">
                <label for="fotos">Fotos del Producto</label>
                <input type="file" class="form-control-file" id="fotos" multiple>
                <small id="fotosHelp" class="form-text text-muted">Puede seleccionar múltiples imágenes.</small>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Registrar Producto</button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal4">Funciones de productos</button>
 
    </form>
</div>

<div class="container mt-5">
        <h2>Formulario de Productos</h2>
        <form>
            <!-- Primera fila -->
            <div class="form-row">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="proveedor_id">Proveedor</label>
                        <div class="input-group">
                            <!-- Elemento select para elegir proveedor -->
                            <select class="form-control" id="proveedor_id" name="proveedor_id" required>
                                <option value="">Seleccione un proveedor</option>
                                <!-- Aquí se generan las opciones del select -->
                                <?php echo $proveedoresOptions; ?>
                                
                            </select>
                            <div class="input-group-APPEND">
                                <!-- Botón para abrir el modal de nuevo proveedor -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal1">+</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="descripcion">Precio del producto</label>
                    <textarea class="form-control" id="descripcion" rows="3" placeholder="Descripción del producto"></textarea>
                </div>

            </div>
            <!-- Segunda fila -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre del producto" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="contenido">Descripcion del producto</label>
                    <input type="text" class="form-control" id="contenido" placeholder="Contenido del producto">
                </div>
            </div>
            <!-- Tercera fila -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="descripcion">Precio del producto</label>
                    <textarea class="form-control" id="descripcion" rows="3" placeholder="Descripción del producto"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="descripcion">Categoria del producto</label>
                    <textarea class="form-control" id="descripcion" rows="3" placeholder="Descripción del producto"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="fotos">Fotos del Producto</label>
                    <input type="file" class="form-control-file" id="fotos" multiple>
                    <small id="fotosHelp" class="form-text text-muted">Puede seleccionar múltiples imágenes.</small>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Registrar Producto</button>
        </form>
    </div>
           <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal5">Modo de uso</button>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal6">Precauciones</button>













    <!-- Enlace al JavaScript de Bootstrap y sus dependencias -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>