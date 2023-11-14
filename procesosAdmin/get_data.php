<?php
session_start();
include '../db_conectar/conexion.php';
include "../includes/funciones_admin.php";

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: login_admin.php");
    exit;
}

header('Content-Type: application/json');
// Función para obtener las opciones de la base de datos
function getOptions($conexion, $procedureName) {
    $options = [];
    $query = "CALL " . $procedureName . "()";
    $result = $conexion->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $options[] = $row;
        }
    }
    return $options;
}

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener opciones y convertirlas a JSON
$proveedores = getOptions($conexion, "GetProveedores");
$presentaciones = getOptions($conexion, "GetPresentaciones");
$unidadesMedida = getOptions($conexion, "GetUnidadesMedida");

// Preparar el array de datos
$data = [
    'proveedores' => $proveedores,
    'presentaciones' => $presentaciones,
    'unidadesMedida' => $unidadesMedida
];

// Cerrar conexión
$conexion->close();

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($data);
