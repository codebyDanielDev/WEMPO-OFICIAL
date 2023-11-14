<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
 <?php
$servername = "localhost";  
$username = "root";
$password = "";
$database = "DB_WEMPO";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

echo "Conexión exitosa a la base de datos";

// Cerrar la conexión
$conn->close();
?>

</html>
---------------------------------------




ESTOS SON LOS INSERT PARA LAS SIGUIENTES TABLAS categorias,recetas,ingredientes,datos_ingredientes,Usuario_Recetas


---
CATEGORIAS


<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "DB_WEMPO";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

$insertCategoria = "INSERT INTO categorias (descripcion_categoria) VALUES ('Postres')";
$conn->query($insertCategoria);

$conn->close();
?>
---------------------
RECETAS


<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "DB_WEMPO";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

$insertReceta = "INSERT INTO recetas (nombre_receta, preparacion, id_categoria) VALUES ('Tiramisú', 'Instrucciones de preparación del tiramisú...', 1)";
$conn->query($insertReceta);

$idReceta = $conn->insert_id;

$conn->close();
?>



------------------
INGREDIENTES


<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "DB_WEMPO";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

$insertIngrediente1 = "INSERT INTO ingredientes (descripcion_ingrediente) VALUES ('Café')";
$conn->query($insertIngrediente1);

$insertIngrediente2 = "INSERT INTO ingredientes (descripcion_ingrediente) VALUES ('Queso mascarpone')";
$conn->query($insertIngrediente2);

$idIngrediente1 = $conn->insert_id;
$idIngrediente2 = $conn->insert_id;

$conn->close();
?>



----------------
DATOS INGREDIENTES
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "DB_WEMPO";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

$insertDatosIngredientes = "INSERT INTO datos_ingredientes (id_receta, id_ingrediente, cantidad, unidad_medida) VALUES ($idReceta, $idIngrediente1, 200, 'g'), ($idReceta, $idIngrediente2, 250, 'g')";
$conn->query($insertDatosIngredientes);

$conn->close();
?>
------------

USUARIO RECETAS 
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "DB_WEMPO";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

$insertUsuarioRecetas = "INSERT INTO Usuario_Recetas (ID_usuario, id_receta) VALUES (1, $idReceta)";
$conn->query($insertUsuarioRecetas);

$conn->close();
?>



-------------------------------------------------------------------------------



SELECT

Consulta para obtener todas las recetas con sus ingredientes:

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "DB_WEMPO";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Consulta para obtener todas las recetas con sus ingredientes
$selectRecetas = "SELECT r.*, i.descripcion_ingrediente, di.cantidad, di.unidad_medida
                  FROM recetas r
                  JOIN datos_ingredientes di ON r.id_receta = di.id_receta
                  JOIN ingredientes i ON di.id_ingrediente = i.id_ingrediente";

$resultRecetas = $conn->query($selectRecetas);

if ($resultRecetas->num_rows > 0) {
    while ($row = $resultRecetas->fetch_assoc()) {
        echo "Receta: " . $row["nombre_receta"] . "<br>";
        echo "Ingredientes: " . $row["descripcion_ingrediente"] . " - Cantidad: " . $row["cantidad"] . " " . $row["unidad_medida"] . "<br>";
        echo "Preparación: " . $row["preparacion"] . "<br><br>";
    }
} else {
    echo "No se encontraron recetas.";
}

$conn->close();
?>


------------------------------
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "DB_WEMPO";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

$idUsuario = 1; // ID del usuario para el que deseas obtener las recetas favoritas

// Consulta para obtener las recetas favoritas de un usuario específico
$selectRecetasFavoritas = "SELECT r.*
                           FROM recetas r
                           JOIN Usuario_Recetas ur ON r.id_receta = ur.id_receta
                           WHERE ur.ID_usuario = $idUsuario";

$resultRecetasFavoritas = $conn->query($selectRecetasFavoritas);

if ($resultRecetasFavoritas->num_rows > 0) {
    while ($row = $resultRecetasFavoritas->fetch_assoc()) {
        echo "Receta favorita: " . $row["nombre_receta"] . "<br>";
        echo "Preparación: " . $row["preparacion"] . "<br><br>";
    }
} else {
    echo "El usuario no tiene recetas favoritas.";
}

$conn->close();
?>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "DB_WEMPO";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

$idUsuario = 1; // ID del usuario para el que deseas obtener las recetas favoritas

// Consulta para obtener las recetas favoritas de un usuario específico
$selectRecetasFavoritas = "SELECT r.*
                           FROM recetas r
                           JOIN Usuario_Recetas ur ON r.id_receta = ur.id_receta
                           WHERE ur.ID_usuario = $idUsuario";

$resultRecetasFavoritas = $conn->query($selectRecetasFavoritas);

if ($resultRecetasFavoritas->num_rows > 0) {
    while ($row = $resultRecetasFavoritas->fetch_assoc()) {
        echo "Receta favorita: " . $row["nombre_receta"] . "<br>";
        echo "Preparación: " . $row["preparacion"] . "<br><br>";
    }
} else {
    echo "El usuario no tiene recetas favoritas.";
}

$conn->close();
?>






