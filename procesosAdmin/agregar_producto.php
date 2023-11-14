<?php
session_start();
include '../db_conectar/conexion.php';
include "../includes/funciones_admin.php";

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: login_admin.php");
    exit;
}

header('Content-Type: application/json');
// Si se envió el formulario, agregar el producto
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario
    $presentacion = $conexion->real_escape_string($_POST['presentacion']);
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $descripcion = $conexion->real_escape_string($_POST['descripcion']);
    $descripcion_larga = $conexion->real_escape_string($_POST['descripcion_larga']);
    $composicion = $conexion->real_escape_string($_POST['composicion']);
    $modo_uso = $conexion->real_escape_string($_POST['modo_uso']);
    $precaucion = $conexion->real_escape_string($_POST['precaucion']);
    $advertencia = $conexion->real_escape_string($_POST['advertencia']);

    // Prepara la consulta SQL
    $sql = "INSERT INTO productos (presentacion, nombre, descripcion, descripcion_larga, composicion, modo_uso, precaucion, advertencia) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Preparar declaración
    $stmt = $conexion->prepare($sql);

    if ($stmt) {
        // Vincula las variables a la declaración preparada como parámetros
        $stmt->bind_param("ssssssss", $presentacion, $nombre, $descripcion, $descripcion_larga, $composicion, $modo_uso, $precaucion, $advertencia);

        // Ejecutar la declaración preparada
        if ($stmt->execute()) {
            echo "Nuevo producto agregado con éxito.";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Cerrar declaración
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: ";
    }

    // Cerrar conexión
    $conexion->close();
}
?>