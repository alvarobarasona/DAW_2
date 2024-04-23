DROP TABLE IF EXISTS acciones;

CREATE TABLE acciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    lugar VARCHAR(255) NOT NULL,
    nombre VARCHAR(255),
    descripcion TEXT,
    foto VARCHAR(255) NOT NULL
);

INSERT INTO acciones (fecha, lugar, nombre, descripcion, foto) VALUES ('2024-04-23', 'Madrid', 'Pancracio', 'flor bonita', 'subidas/rosas.jpg');

-- CREATE DATABASE acciones;
-- CREATE USER 'acciones'@'localhost' IDENTIFIED BY 'acciones';
--GRANT ALL ON acciones.* TO 'acciones'@'localhost';
--FLUSH PRIVILEGES;

--mysql -u acciones -p acciones < db.sql

