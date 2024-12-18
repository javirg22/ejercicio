CREATE DATABASE mvc_login;

USE mvc_login;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE USER login IDENTIFIED BY "login";
GRANT ALL ON mvc_login.* TO login;
