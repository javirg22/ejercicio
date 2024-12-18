create database futbol;
use futbol;
-- tabla de equipos 
create table equipos(
  id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);
-- tabla de jugadores
create table futbolistas(
        id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    dorsal integer(2) NOT NULL,
    id_equipos INT,
    posicion VARCHAR(100) NOT NULL,
    FOREIGN KEY (id_equipos) REFERENCES equipos(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);
INSERT INTO equipos (nombre) values("Atletico de madrid");
INSERT INTO equipos (nombre) values("Girona");
INSERT INTO equipos (nombre) values("Real madrid");
INSERT INTO equipos (nombre) values("Barcelona");
INSERT INTO equipos (nombre) values("Betis");
INSERT INTO equipos (nombre) values("Sevilla");
INSERT INTO equipos (nombre) values("Cadiz");
INSERT INTO equipos (nombre) values("Valencia");
INSERT INTO equipos (nombre) values("Leganes");
INSERT INTO equipos (nombre) values("Celta de vigo");
