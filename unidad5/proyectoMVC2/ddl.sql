-- Borrar la base de datos si existe
DROP DATABASE IF EXISTS biblioteca;

-- Crear la base de datos
CREATE DATABASE biblioteca;

-- Usar la base de datos
USE biblioteca;

-- Crear la tabla de autores con COLLATE y CHARACTER SET
CREATE TABLE autores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Crear la tabla de libros con COLLATE y CHARACTER SET
CREATE TABLE libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    autor_id INT,
    FOREIGN KEY (autor_id) REFERENCES autores(id) ON DELETE SET NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE USER biblioteca IDENTIFIED BY "biblio";
GRANT ALL ON biblioteca.* to biblioteca;

-- Insertar datos de ejemplo en autores
INSERT INTO autores (nombre) VALUES ('Gabriel García Márquez');
INSERT INTO autores (nombre) VALUES ('Isabel Allende');
INSERT INTO autores (nombre) VALUES ('Jorge Luis Borges');
INSERT INTO autores (nombre) VALUES ('Noah Gordon');

-- Insertar datos de ejemplo en libros
INSERT INTO libros (titulo, autor_id) VALUES ('Cien años de soledad', 1);
INSERT INTO libros (titulo, autor_id) VALUES ('La casa de los espíritus', 2);
INSERT INTO libros (titulo, autor_id) VALUES ('Ficciones', 3);
