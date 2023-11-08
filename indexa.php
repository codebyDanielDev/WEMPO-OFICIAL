<?php include 'db_conectar/conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Tus metadatos, links a CSS aquí -->
</head>
<body>
    <div class="productos">
        <?php
        $stmt = $pdo->query('SELECT * FROM productos');
        while ($producto = $stmt->fetch()) {
            echo "<div class='producto'>";
            echo "<h2>{$producto['nombre']}</h2>";
            echo "<img src='imagenes/productos/{$producto['imagen_url']}' alt='{$producto['nombre']}'>";
            // Genera el enlace a la página del producto
            echo "<a href='producto.php?id={$producto['id']}'>Ver producto</a>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
