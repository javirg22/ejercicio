CREATE DATABASE tienda;
USE tienda;

-- Tabla de categorías
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

-- Tabla de productos
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10.2) NOT NULL,
    id_categoria INT,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

INSERT INTO categorias (nombre) values("Muebles");
INSERT INTO categorias (nombre) values("Portátiles");
INSERT INTO categorias (nombre) values("Teléfonos");
INSERT INTO categorias (nombre) values("Adornos");
INSERT INTO categorias (nombre) values("Libros");