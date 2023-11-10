-- Crear la base de datos:
-- 
drop database DB_WEMPO;
CREATE DATABASE DB_WEMPO;
USE DB_WEMPO;


CREATE TABLE administradores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(255) NOT NULL UNIQUE,
    contraseña VARCHAR(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL
);
-- insertar datos para la tabla `administradores`
--

INSERT INTO administradores (
    correo, contraseña, nombre
) VALUES (
    'tardidaw@gmail.com', 'admin1234', 'Carlos'
);

--
-- Estructura de tabla para la tabla usuarios
--

CREATE TABLE Usuarios (
    ID_usuario INT AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(255) NOT NULL UNIQUE,
    contraseña VARCHAR(255) NOT NULL,
    dni CHAR(8) UNIQUE NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    apellido_paterno VARCHAR(255),
    apellido_materno VARCHAR(255),
    fecha_nacimiento DATE,
    direccion VARCHAR(255),
    ciudad VARCHAR(255),
    imagen TEXT,
    Informacion_perfil TEXT,
    Direccion_envio_predeterminada TEXT
);

--
-- 
--
/*
CREATE TABLE Usuarios (
    ID_usuario INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_usuario VARCHAR(255) NOT NULL,
    Correo_electronico VARCHAR(255) NOT NULL UNIQUE,
    Contrasena VARCHAR(255) NOT NULL,
    Informacion_perfil TEXT,
    Direccion_envio_predeterminada TEXT
);

-- Proveedores table
CREATE TABLE Proveedores (
    ID_proveedor INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_del_proveedor VARCHAR(255) NOT NULL UNIQUE,
    Informacion_de_contacto TEXT
);*/
CREATE TABLE Proveedores (
  ID_proveedor INT AUTO_INCREMENT PRIMARY KEY,
  Nombre_del_proveedor VARCHAR(255) NOT NULL UNIQUE,
  direccion TEXT,
  telefono VARCHAR(9),
  email VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Procesos almacenarios para proveedores
--
-- MOstrar nombre de proveedor
DELIMITER //

CREATE PROCEDURE MostrarNombresProveedores()
BEGIN
    SELECT Nombre_del_proveedor FROM Proveedores;
END //
DELIMITER ;
--
-- Procesos almacenarios para proveedores
--
-- Insertar nombre de proveedor
DELIMITER //

CREATE PROCEDURE INSERTAR_PROVEEDOR(
    IN nombre VARCHAR(255),
    IN direccion TEXT,
    IN telefono VARCHAR(9),
    IN email VARCHAR(255)
)
BEGIN
    INSERT INTO Proveedores (Nombre_del_proveedor, direccion, telefono, email)
    VALUES (nombre, direccion, telefono, email);
END //

DELIMITER ;
--
-- Mostar todos los provedores
--
DELIMITER //

CREATE PROCEDURE MostrarProveedores()
BEGIN
  SELECT * FROM Proveedores;
END //

DELIMITER ;
--
--  Acá poner el de editar proveedores
--



--
--  Acá poner el de eliminar proveedores
--


-- Productos table
CREATE TABLE Productos (
    ID_producto INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_producto VARCHAR(255) NOT NULL,
    Descripcion_producto TEXT,
    Precio DECIMAL(10, 2) NOT NULL,
    ID_proveedor INT,
    Categoria_producto VARCHAR(255),
    Existencias INT NOT NULL,
    FOREIGN KEY (ID_proveedor) REFERENCES Proveedores(ID_proveedor),
    INDEX cat_idx (Categoria_producto)
);

--
--  Insertar Productos
--

--
--  Acá poner el de eliminar proveedores
--

--
--  Acá poner el de eliminar proveedores
--

--
--  Acá poner el de eliminar proveedores
--


-- imagenes
CREATE TABLE imagenes_productos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  ID_producto INT,
  ruta_imagen VARCHAR(255) NOT NULL, -- Almacena la ruta del archivo de la imagen
  descripcion_imagen VARCHAR(255),
  FOREIGN KEY (ID_producto) REFERENCES Productos(ID_producto)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Pedidos table
CREATE TABLE Pedidos (
    ID_pedido INT AUTO_INCREMENT PRIMARY KEY,
    ID_usuario INT NOT NULL,
    Fecha_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Estado_pedido VARCHAR(255) NOT NULL,
    Total DECIMAL(10, 2) NOT NULL,
    INDEX usr_idx (ID_usuario),
    FOREIGN KEY (ID_usuario) REFERENCES Usuarios(ID_usuario)
);

-- Detalles de pedidos table
CREATE TABLE Detalles_de_pedidos (
    ID_detalle_de_pedido INT AUTO_INCREMENT PRIMARY KEY,
    ID_pedido INT NOT NULL,
    ID_producto INT NOT NULL,
    Cantidad INT NOT NULL,
    Precio_unitario DECIMAL(10, 2) NOT NULL,
    INDEX ped_idx (ID_pedido),
    INDEX pro_idx (ID_producto),
    FOREIGN KEY (ID_pedido) REFERENCES Pedidos(ID_pedido),
    FOREIGN KEY (ID_producto) REFERENCES Productos(ID_producto)
);

-- Comentarios table
CREATE TABLE Comentarios (
    ID_comentario INT AUTO_INCREMENT PRIMARY KEY,
    ID_usuario INT NOT NULL,
    ID_producto INT NOT NULL,
    Comentario TEXT,
    Calificacion INT,
    INDEX usr_idx (ID_usuario),
    INDEX pro_idx (ID_producto),
    FOREIGN KEY (ID_usuario) REFERENCES Usuarios(ID_usuario),
    FOREIGN KEY (ID_producto) REFERENCES Productos(ID_producto)
);

-- Categorias de productos table
CREATE TABLE Categorias_de_productos (
    ID_categoria INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_categoria VARCHAR(255) NOT NULL UNIQUE
);

-- Direcciones de envio table
CREATE TABLE Direcciones_de_envio (
    ID_direccion INT AUTO_INCREMENT PRIMARY KEY,
    ID_usuario INT NOT NULL,
    Nombre_completo VARCHAR(255) NOT NULL,
    Calle_y_numero VARCHAR(255) NOT NULL,
    Ciudad VARCHAR(255) NOT NULL,
    Estado VARCHAR(255) NOT NULL,
    Codigo_postal VARCHAR(20) NOT NULL,
    Pais VARCHAR(255) NOT NULL,
    INDEX usr_idx (ID_usuario),
    FOREIGN KEY (ID_usuario) REFERENCES Usuarios(ID_usuario)
);

-- Metodos de pago table
CREATE TABLE Metodos_de_pago (
    ID_metodo_de_pago INT AUTO_INCREMENT PRIMARY KEY,
    ID_usuario INT NOT NULL,
    Tipo_de_metodo_de_pago VARCHAR(255) NOT NULL,
    Detalles_de_tarjeta_de_credito TEXT,
    INDEX usr_idx (ID_usuario),
    FOREIGN KEY (ID_usuario) REFERENCES Usuarios(ID_usuario)
);

-- Carrito de compras table
CREATE TABLE Carrito_de_compras (
    ID_carrito INT AUTO_INCREMENT PRIMARY KEY,
    ID_usuario INT NOT NULL,
    Productos_en_el_carrito TEXT,
    Cantidad_de_productos INT NOT NULL,
    INDEX usr_idx (ID_usuario),
    FOREIGN KEY (ID_usuario) REFERENCES Usuarios(ID_usuario)
);

-- Facturas table
CREATE TABLE Facturas (
    ID_factura INT AUTO_INCREMENT PRIMARY KEY,
    ID_pedido INT NOT NULL,
    Fecha_de_emision TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Detalles_de_pago TEXT,
    INDEX ped_idx (ID_pedido),
    FOREIGN KEY (ID_pedido) REFERENCES Pedidos(ID_pedido)
);

-- Inventario table
CREATE TABLE Inventario (
    ID_inventario INT AUTO_INCREMENT PRIMARY KEY,
    ID_producto INT NOT NULL,
    Cantidad_en_stock INT NOT NULL,
    Ubicacion_en_almacen VARCHAR(255),
    INDEX pro_idx (ID_producto),
    FOREIGN KEY (ID_producto) REFERENCES Productos(ID_producto)
);

-- Promociones table
CREATE TABLE Promociones (
    ID_promocion INT AUTO_INCREMENT PRIMARY KEY,
    Codigo_de_promocion VARCHAR(255) NOT NULL UNIQUE,
    Tipo_de_descuento VARCHAR(255) NOT NULL,
    Fecha_de_inicio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Fecha_de_finalizacion TIMESTAMP,
    INDEX pro_idx (Codigo_de_promocion)
);

-- Historial de transacciones table
CREATE TABLE Historial_de_transacciones (
    ID_transaccion INT AUTO_INCREMENT PRIMARY KEY,
    ID_usuario INT NOT NULL,
    Fecha_de_transaccion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Tipo_de_transaccion VARCHAR(255) NOT NULL,
    Monto_de_transaccion DECIMAL(10, 2) NOT NULL,
    INDEX usr_idx (ID_usuario),
    FOREIGN KEY (ID_usuario) REFERENCES Usuarios(ID_usuario)
);