DROP TABLE IF EXISTS tweets;
DROP TABLE IF EXISTS tokens;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL UNIQUE,
  user_password VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  foto VARCHAR(255)
);

CREATE TABLE tweets (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  tweet VARCHAR(255) NOT NULL,
  fecha DATETIME NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE tokens (
  token VARCHAR(255) PRIMARY KEY,
  user_id INT NOT NULL,
  fecha DATETIME NOT NULL,
  consumido BOOLEAN NOT NULL DEFAULT FALSE,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, user_password, email, foto) VALUES ('admin', '$2y$10$6EwZm4QoVNZpC3Mv4qY3Q.ttJ9sHvgcIkDeIt902CBIoSL/79Lcx.', 'admin@gmail.com', 'admin.jpg'),
('pulaman', '$2y$10$0RpPoozo.8kcqfi1sxAXheYZG9JedWKCA9zwXMFFsuk0TutFj6kZC', 'pula@gmail.com', 'pula.jpg');

INSERT INTO tweets (user_id, tweet, fecha) VALUES (1, 'Soy el fucking admin', '2021-06-01 12:00:00'),
(2, 'Yo soy el fantástico pulaman', '2022-04-03 10:30:00')
;

/*
Comando de base de datos para terminal

Crear base de datos:
 CREATE DATABASE nombre_de_la_base_de_datos;

Crear usuario:
 CREATE USER 'nombre_usuario'@'localhost' IDENTIFIED BY 'contraseña';
 CREATE USER 'TWITTER'@'localhost' IDENTIFIED BY 'TWITTER';

Otorgar permisos al usuario para la base de datos:
 GRANT ALL PRIVILEGES ON nombre_de_la_base_de_datos.* TO 'nombre_usuario'@'localhost';
 FLUSH PRIVILEGES;
Nota: Siempre ejecutar FLUSH PRIVILEGES; después de hacer cambios significativos en los permisos para asegurar que los cambios tomen efecto inmediatamente.

Comando para conectarse desde terminal:

 mysql -u nombre_usuario -p contraseña_bbdd -D nombre_de_la_base_de_datos
             -u : usuario
             -p : contraseña de la bbdd
             -D : base de datos

si queremos conectarnos a la base de datos para redireccionar el archivo con las tablas:
 mysql -u nombre_usuario -p contraseña_bbdd < nombre_de_la_base_de_datos.sql

Comando para desconectarse:
 QUIT;

Comando para salir de la terminal:
 EXIT;

Comandos adicionales:

Ver las distintas base de datos:
 SHOW DATABASES;

Seleccionar una base de datos para usar:
 USE nombre_de_la_base_de_datos;

Mostrar tablas en la base de datos actual:
 SHOW TABLES;

Mostrar la estructura de una tabla:
 DESCRIBE nombre_de_la_tabla;
 o
 DESC nombre_de_la_tabla;

Eliminar la base de datos:
 DROP DATABASE nombre_de_la_base_de_datos;

Eliminar la tabla:
 DROP TABLE nombre_de_la_tabla;

Eliminar el usuario:
 DROP USER 'nombre_usuario'@'localhost';

Ver los usuarios existentes:
 SELECT user, host FROM mysql.user;

Ver los permisos de un usuario:
SHOW GRANTS FOR 'nombre_usuario'@'localhost';
o
SELECT * FROM mysql.user WHERE user = 'nombre_usuario';

Eliminar los permisos de un usuario:
REVOKE ALL PRIVILEGES ON nombre_de_la_base_de_datos.* FROM 'nombre_usuario'@'localhost';

FLUSH PRIVILEGES;
----------RESPALDO BACKUP------------------------

Para hacer un respaldo de la base de datos:
mysqldump > db_bseDe_datos.sql

Para restaurar la base de datos:
mysql -u acciones -p acciones < db_baseDe_datos.sql

Para asegurarnos que estamos usando la base de datos correcta:
SELECT database();
*/