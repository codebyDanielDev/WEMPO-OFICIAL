<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: loginadmin.php");
    exit;
}
include "../db_conectar/conexion.php";
include "../includes/funciones_admin.php";

// Recoger los valores del formulario
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];

// Llamar al procedimiento almacenado
$stmt = $conexion->prepare("CALL InsertarProveedor(?, ?, ?, ?)");
$stmt->bind_param("ssss", $nombre, $direccion, $telefono, $email);

if ($stmt->execute()) {
  echo "Proveedor insertado con éxito.";
} else {
  echo "Error al insertar proveedor: " . $stmt->error;
}

// Cerrar la declaración y la conexión
$stmt->close();
$conexion->close();
?>
