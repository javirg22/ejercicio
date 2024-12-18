CREATE DATABASE bdempleados;
USE bdempleados;

CREATE TABLE empleados (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  telefono VARCHAR(50) NOT NULL UNIQUE
);

CREATE USER emple IDENTIFIED BY "exam";
GRANT ALL ON bdempleados.* TO emple;