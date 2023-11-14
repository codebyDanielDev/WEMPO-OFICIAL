<?php
// Incluye el archivo de conexión
include '../db_conectar/conexion.php';
// Verificar si se está enviando una solicitud de eliminación

// Llamar al procedimiento almacenado para obtener los proveedores
$stmt = $conexion->prepare("CALL MostrarProveedores()");
$stmt->execute();
$result = $stmt->get_result();

// Empieza la tabla
echo '<table class="table">';
echo '<thead><tr><th>Nombre</th><th>Dirección</th><th>Teléfono</th><th>Email</th><th>Acciones</th></tr></thead>';
echo '<tbody>';

// Iterar sobre los proveedores y agregarlos a la tabla
while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($row['Nombre_del_proveedor']) . '</td>';
    echo '<td>' . htmlspecialchars($row['direccion']) . '</td>';
    echo '<td>' . htmlspecialchars($row['telefono']) . '</td>';
    echo '<td>' . htmlspecialchars($row['email']) . '</td>';
    echo '<td>
            <button class="btn btn-primary" onclick="editarProveedor(' . $row['ID_proveedor'] . ')">Editar</button>
            <button class="btn btn-danger" onclick="eliminarProveedor(' . $row['ID_proveedor'] . ')">Eliminar</button>
          </td>';
    echo '</tr>';
}

// Cierra la tabla
echo '</tbody></table>';

// Cerrar la declaración y la conexión
$stmt->close();
$conexion->close();
?>
