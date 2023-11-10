<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: loginadmin.php");
    exit;
}
include "../db_conectar/conexion.php";
include "../includes/funciones_admin.php";

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $id_proveedor = $_POST['proveedor_id'];
    $categoria = $_POST['categoria'];

    // Preparar la consulta SQL
    $stmt = $conn->prepare("CALL InsertarProducto(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdiss", $nombre, $descripcion, $precio, $id_proveedor, $categoria, $existencias);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Producto insertado con éxito";
    } else {
        echo "Error al insertar producto: " . $stmt->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
}
?>
