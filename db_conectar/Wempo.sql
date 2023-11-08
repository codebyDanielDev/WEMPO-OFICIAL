-- Crear la base de datos:
-- 
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

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(255) NOT NULL UNIQUE,
    contraseña VARCHAR(255) NOT NULL,
    dni CHAR(8) UNIQUE NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    apellido_paterno VARCHAR(255),
    apellido_materno VARCHAR(255),
    fecha_nacimiento DATE,
    direccion VARCHAR(255),
    ciudad VARCHAR(255),
    imagen TEXT
);

CREATE TABLE proveedores (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255) NOT NULL,
  direccion TEXT,
  telefono VARCHAR(9),
  email VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DELIMITER //

CREATE PROCEDURE InsertarProveedor(IN _nombre VARCHAR(255), IN _direccion TEXT, IN _telefono VARCHAR(9), IN _email VARCHAR(255))
BEGIN
  INSERT INTO proveedores (nombre, direccion, telefono, email) 
  VALUES (_nombre, _direccion, _telefono, _email);
END //

DELIMITER ;

CALL InsertarProveedor('Nombre del Proveedor', 'Dirección del Proveedor', '123456789', 'email@proveedor.com');

DELIMITER //
CREATE PROCEDURE GetProveedores()
BEGIN
    SELECT id, nombre FROM proveedores;
END //
DELIMITER ;

CREATE TABLE presentaciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  tipo VARCHAR(255) NOT NULL, -- Ejemplo: Tubo, Bolsa, Caja, etc.
  descripcion TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DELIMITER //

CREATE PROCEDURE InsertarPresentacion(IN _tipo VARCHAR(255), IN _descripcion TEXT)
BEGIN
  INSERT INTO presentaciones (tipo, descripcion) 
  VALUES (_tipo, _descripcion);
END //

DELIMITER ;

CALL InsertarPresentacion('Tubo', 'Descripción del tipo de presentación Tubo.');

DELIMITER //
CREATE PROCEDURE GetPresentaciones()
BEGIN
    SELECT id, tipo AS nombre FROM presentaciones;
END //
DELIMITER ;


-- Tabla de Unidades de Medida (como kilos, litros, ml, etc.)
CREATE TABLE unidades_medida (
  id INT AUTO_INCREMENT PRIMARY KEY,
  unidad VARCHAR(50) NOT NULL, -- Ejemplo: kg, l, ml, etc.
  descripcion TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DELIMITER //

CREATE PROCEDURE InsertarUnidadMedida(IN _unidad VARCHAR(50), IN _descripcion TEXT)
BEGIN
  INSERT INTO unidades_medida (unidad, descripcion) 
  VALUES (_unidad, _descripcion);
END //

DELIMITER ;

CALL InsertarUnidadMedida('kg', 'Kilogramos');

DELIMITER //
CREATE PROCEDURE GetUnidadesMedida()
BEGIN
    SELECT id, unidad AS nombre FROM unidades_medida;
END //
DELIMITER ;

CREATE TABLE productos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  proveedor_id INT,
  presentacion_id INT,
  unidad_medida_id INT,
  nombre VARCHAR(255) NOT NULL,
  contenido DECIMAL(10,2), -- Cantidad numérica que indica el tamaño/volumen/peso del producto
  descripcion VARCHAR(500),
  FOREIGN KEY (proveedor_id) REFERENCES proveedores(id),
  FOREIGN KEY (presentacion_id) REFERENCES presentaciones(id),
  FOREIGN KEY (unidad_medida_id) REFERENCES unidades_medida(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DELIMITER //

CREATE PROCEDURE InsertarProducto(
    IN _proveedor_id INT, 
    IN _presentacion_id INT, 
    IN _unidad_medida_id INT, 
    IN _nombre VARCHAR(255), 
    IN _contenido DECIMAL(10,2), 
    IN _descripcion VARCHAR(500)
)
BEGIN
  INSERT INTO productos (proveedor_id, presentacion_id, unidad_medida_id, nombre, contenido, descripcion) 
  VALUES (_proveedor_id, _presentacion_id, _unidad_medida_id, _nombre, _contenido, _descripcion);
END //

DELIMITER ;

CALL InsertarProducto(1, 2, 3, 'Producto Ejemplo', 100.00, 'Descripción del producto ejemplo.');

CREATE TABLE imagenes_productos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  producto_id INT,
  ruta_imagen VARCHAR(255) NOT NULL, -- Almacena la ruta del archivo de la imagen
  descripcion_imagen VARCHAR(255),
  FOREIGN KEY (producto_id) REFERENCES productos(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DELIMITER //

CREATE PROCEDURE InsertarImagenProducto(
    IN _producto_id INT,
    IN _ruta_imagen VARCHAR(255),
    IN _descripcion_imagen VARCHAR(255)
)
BEGIN
  INSERT INTO imagenes_productos (producto_id, ruta_imagen, descripcion_imagen) 
  VALUES (_producto_id, _ruta_imagen, _descripcion_imagen);
END //

DELIMITER ;
CALL InsertarImagenProducto(1, '/ruta/a/la/imagen.jpg', 'Descripción de la imagen');



CREATE TABLE descripciones_largas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  producto_id INT,
  descripcion_larga TEXT NOT NULL,
  ruta_imagen VARCHAR(255), -- Almacena la ruta del archivo de la imagen (opcional)
  descripcion_imagen VARCHAR(255), -- Descripción de la imagen (opcional)
  FOREIGN KEY (producto_id) REFERENCES productos(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE composiciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  producto_id INT,
  composicion TEXT NOT NULL,
  ruta_imagen VARCHAR(255), -- Almacena la ruta del archivo de la imagen (opcional)
  descripcion_imagen VARCHAR(255), -- Descripción de la imagen (opcional)
  FOREIGN KEY (producto_id) REFERENCES productos(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE modos_uso (
  id INT AUTO_INCREMENT PRIMARY KEY,
  producto_id INT,
  modo_uso TEXT NOT NULL,
  ruta_imagen VARCHAR(255), -- Almacena la ruta del archivo de la imagen (opcional)
  descripcion_imagen VARCHAR(255), -- Descripción de la imagen (opcional)
  FOREIGN KEY (producto_id) REFERENCES productos(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE precauciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  producto_id INT,
  precaucion TEXT NOT NULL,
  ruta_imagen VARCHAR(255), -- Almacena la ruta del archivo de la imagen (opcional)
  descripcion_imagen VARCHAR(255), -- Descripción de la imagen (opcional)
  FOREIGN KEY (producto_id) REFERENCES productos(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla de Advertencias
CREATE TABLE advertencias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  producto_id INT,
  advertencia TEXT NOT NULL,
  ruta_imagen VARCHAR(255), -- Almacena la ruta del archivo de la imagen (opcional)
  descripcion_imagen VARCHAR(255), -- Descripción de la imagen (opcional)
  FOREIGN KEY (producto_id) REFERENCES productos(id)
) E
-- Tabla de Métodos de Pago
CREATE TABLE metodos_pago (
  id INT AUTO_INCREMENT PRIMARY KEY,
  metodo VARCHAR(255) NOT NULL, -- Ejemplo: Efectivo, Tarjeta, Yape, etc.
  descripcion TEXT,
  icono VARCHAR(255) -- Almacena la ruta del archivo del icono del método de pago
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla de Precios de los Productos mejorada
CREATE TABLE precios_productos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  producto_id INT,
  metodo_pago_id INT,
  precio DECIMAL(10,2) NOT NULL,
  fecha_inicio DATE NOT NULL,
  fecha_fin DATE, -- Puede ser NULL si el precio es indefinido
  FOREIGN KEY (producto_id) REFERENCES productos(id),
  FOREIGN KEY (metodo_pago_id) REFERENCES metodos_pago(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE inventario (
  id INT AUTO_INCREMENT PRIMARY KEY,
  producto_id INT,
  cantidad INT NOT NULL,
  fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (producto_id) REFERENCES productos(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE transacciones_inventario (
  id INT AUTO_INCREMENT PRIMARY KEY,
  producto_id INT,
  cantidad INT NOT NULL, -- Una cantidad positiva para añadir al stock, negativa para restar
  tipo VARCHAR(50) NOT NULL, -- Ejemplo: 'entrada', 'salida', 'ajuste', 'venta', etc.
  fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  usuario_responsable INT, -- Opcional: referencia a una tabla de usuarios si es necesario
  nota TEXT,
  FOREIGN KEY (producto_id) REFERENCES productos(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
