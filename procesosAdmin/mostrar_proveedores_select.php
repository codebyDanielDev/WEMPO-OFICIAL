<?php
// Inicia conexión a la base de datos
include "db_conectar/conexion.php";

// Prepara el SQL para llamar al procedimiento almacenado
$stmt = $conexion->prepare("CALL MostrarNombresProveedores()");
$stmt->execute();

// Recupera los resultados
$result = $stmt->get_result();
$proveedoresOptions = '';

// Itera sobre los resultados y construye las opciones del select
while ($row = $result->fetch_assoc()) {
    $proveedoresOptions .= '<option value="'.$row['Nombre_del_proveedor'].'">'.$row['Nombre_del_proveedor'].'</option>';
}

// Cierra la declaración y la conexión
$stmt->close();
$conexion->close();

// Ahora puedes usar $proveedoresOptions en tu HTML
