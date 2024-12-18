CREATE DATABASE empleados;
USE empleados;

-- Tabla de categorías
CREATE TABLE departamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

-- Tabla de productos
CREATE TABLE empleados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    telefono VARCHAR(10) NOT NULL,
    id_departamento INT,
    FOREIGN KEY (id_departamento) REFERENCES departamentos(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

INSERT INTO departamentos (nombre) values("Informatica");
INSERT INTO departamentos (nombre) values("Electricidad");
INSERT INTO departamentos (nombre) values("Automoción");
INSERT INTO departamentos (nombre) values("Matematicas");
INSERT INTO departamentos (nombre) values("Religion");
