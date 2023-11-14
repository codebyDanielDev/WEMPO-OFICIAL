-- Crear la base de datos:

drop database DB_WEMPO;
CREATE DATABASE DB_WEMPO;
USE DB_WEMPO;


CREATE TABLE administradores (
    ID_administradores INT AUTO_INCREMENT PRIMARY KEY,
    Correo_administradores VARCHAR(50) NOT NULL UNIQUE,
    Contraseña_administradores VARCHAR(50) NOT NULL,
    Nombre_administradores VARCHAR(50) NOT NULL
);
-- insertar datos para la tabla `administradores`
-- procedimiento para buscar admin 
DELIMITER $$

CREATE PROCEDURE LoginAdminProcedure(
    IN adminEmail VARCHAR(50)
)
BEGIN
    SELECT * FROM administradores 
    WHERE Correo_administradores = adminEmail;
END$$

DELIMITER ;
-- x


INSERT INTO administradores (
    Correo_administradores, Contraseña_administradores, Nombre_administradores
) VALUES (
    'prueba@gmail.com', 'admin1234', 'Carlos'
);

-- Estructura de tabla para la tabla usuarios


CREATE TABLE Usuarios (
    ID_usuario INT AUTO_INCREMENT PRIMARY KEY,
    ID_direccion INT,
    correo VARCHAR(100) NOT NULL UNIQUE,
    contraseña VARCHAR(100) NOT NULL,
    dni CHAR(8) UNIQUE NOT NULL,
    nombre VARCHAR(30) NOT NULL,
    apellido_paterno VARCHAR(30),
    apellido_materno VARCHAR(30),
    fecha_nacimiento DATE,
    direccion VARCHAR(50),
    imagen TEXT,
    Informacion_perfil TEXT
);

-- estado del carrito como, pago pendiente o cancelado.
CREATE TABLE CarritoEstados(
    ID_CEstado INT AUTO_INCREMENT PRIMARY KEY,
	Descripcion_CEstado VARCHAR(100) NOT NULL UNIQUE
);


CREATE TABLE Carrito(
    ID_carrito INT AUTO_INCREMENT PRIMARY KEY,
    ID_usuario INT NOT NULL,
    ID_CEstado INT NOT NULL,

    FechaPedido_carrito TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Total_carrito DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (ID_usuario) REFERENCES Usuarios(ID_usuario),
    FOREIGN KEY (ID_CEstado) REFERENCES CarritoEstados(ID_CEstado)
);

CREATE TABLE CategoriaProductos(
    ID_categoriaProd INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_categoriaProd VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE Productos(
    ID_producto INT AUTO_INCREMENT PRIMARY KEY,
    ID_categoriaProd INT,
    Nombre_producto VARCHAR(255) NOT NULL,
    Descripcion_producto TEXT,
    PrecioUnitario_producto DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (ID_categoriaProd) REFERENCES CategoriaProductos(ID_categoriaProd)
);
CREATE TABLE Carrito_Detalle(
    ID_detalle INT AUTO_INCREMENT PRIMARY KEY,
    ID_carrito INT NOT NULL,
    ID_producto INT NOT NULL,
    Cantidad_detalle INT NOT NULL,
    PrecioVenta_Cdetalle DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (ID_carrito) REFERENCES Carrito(ID_carrito),
    FOREIGN KEY (ID_producto) REFERENCES Productos(ID_producto)

);

CREATE TABLE Proveedores(
  ID_proveedor INT AUTO_INCREMENT PRIMARY KEY,
  Nombre_proveedor VARCHAR(100) NOT NULL UNIQUE,
  Direccion_proveedor TEXT,
  Telefono_proveedor VARCHAR(12),
  Email_proveedor VARCHAR(100)
);

CREATE TABLE Stock(
    ID_stock INT AUTO_INCREMENT PRIMARY KEY,
    ID_producto INT,
    ID_proveedor INT,
    Cantidad_stock INT,
    fecha_stock date,
    FOREIGN KEY (ID_producto) REFERENCES Productos(ID_producto),
    FOREIGN KEY (ID_proveedor) REFERENCES Proveedores(ID_proveedor)
);

 
CREATE TABLE ProductoImagen(
  ID_productoImg INT AUTO_INCREMENT PRIMARY KEY,
  ID_producto INT,
  ruta_imagen VARCHAR(255) NOT NULL, -- Almacena la ruta del archivo de la imagen
  FOREIGN KEY (ID_producto) REFERENCES Productos(ID_producto)
);


-- Comentarios 
CREATE TABLE Comentarios(
    ID_comentario INT AUTO_INCREMENT PRIMARY KEY,
    ID_usuario INT NOT NULL,
    Descripcion_comentario TEXT,
    Calificacion_comentario INT,
    FOREIGN KEY (ID_usuario) REFERENCES Usuarios(ID_usuario)
);

-- El tipo de  pago
CREATE TABLE TipoPagos(
    ID_tipoPago INT AUTO_INCREMENT PRIMARY KEY,
    Descripcion_tipoPago VARCHAR(100) NOT NULL UNIQUE
);

-- Metodos de pago
CREATE TABLE MetodoPagos(
    ID_metodoPago INT AUTO_INCREMENT PRIMARY KEY,
    ID_usuario INT NOT NULL,
    ID_tipoPago INT,
    NumeroTarjeta_metodoPago VARCHAR(50) NOT NULL,
    Proveedor_metodoPago VARCHAR(50) NOT NULL,
    FOREIGN KEY (ID_usuario) REFERENCES Usuarios(ID_usuario),
    FOREIGN KEY (ID_tipoPago) REFERENCES TipoPagos(ID_tipoPago)
);

-- Recetas


CREATE TABLE categorias(
id_categoria INT AUTO_INCREMENT PRIMARY KEY,
descripcion_categoria VARCHAR(255)
);

CREATE TABLE recetas(
id_receta INT AUTO_INCREMENT PRIMARY KEY,
nombre_receta VARCHAR(255),
preparacion TEXT,
id_categoria INT,
FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria)
);

CREATE TABLE ingredientes(
id_ingrediente INT AUTO_INCREMENT PRIMARY KEY,
descripcion_ingrediente VARCHAR(255)
);
CREATE TABLE datos_ingredientes(
id_dato_ingrediente INT AUTO_INCREMENT PRIMARY KEY,
id_receta INT,
id_ingrediente INT,
cantidad DECIMAL(10,2),
unidad_medida VARCHAR(50),
FOREIGN KEY (id_receta) REFERENCES recetas(id_receta),
FOREIGN KEY (id_ingrediente) REFERENCES ingredientes(id_ingrediente)
);

-- tabla que guardara las recetas favoritas del usuario para mostralas en su perfil: "acorde a ruth"
CREATE TABLE Usuario_Recetas(
    ID_UsuarioReceta INT AUTO_INCREMENT PRIMARY KEY,
    ID_usuario INT,
    id_receta INT,
    FOREIGN KEY (ID_usuario) REFERENCES Usuarios(ID_usuario),
    FOREIGN KEY (id_receta) REFERENCES recetas(id_receta)
);