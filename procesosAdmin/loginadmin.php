<?php
session_start();

include "../db_conectar/conexion.php"; // Asegúrate de que la ruta de conexión es correcta
// Definir el tiempo de inactividad permitido en segundos (ejemplo: 60 segundos)
// Función para iniciar sesión de administrador
function loginadmin($email, $password) {
    global $conexion;

    // Preparar la llamada al procedimiento almacenado
    $query = "CALL LoginAdminProcedure(?)";

    if ($stmt = mysqli_prepare($conexion, $query)) {
        // Vincular parámetros
        mysqli_stmt_bind_param($stmt, "s", $email);

        // Ejecutar la declaración preparada
        mysqli_stmt_execute($stmt);

        // Vincular resultado
        $resultado = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($resultado) > 0) {
            $usuario = mysqli_fetch_assoc($resultado);
            $stored_password = $usuario['Contraseña_administradores'];

            if ($password == $stored_password) {
                $_SESSION['id_usuario'] = $usuario['ID_administradores'];
                $_SESSION['admin_logged_in'] = true;
                mysqli_stmt_close($stmt); // Cerrar declaración aquí
                return true;
            } else {
                mysqli_stmt_close($stmt); // Cerrar declaración aquí
                return false;
            }
        } else {
            mysqli_stmt_close($stmt); // Cerrar declaración aquí
            return false;
        }
    }
    return false;
}


// Manejo de la solicitud POST para el inicio de sesión
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (loginadmin($email, $password)) {
        echo json_encode(['status' => 'success', 'message' => 'Inicio de sesión exitoso. Volver a la pagina principal. ADMIN']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Contraseña o usuario incorrecta.']);
        exit;     
    }
}
?>

