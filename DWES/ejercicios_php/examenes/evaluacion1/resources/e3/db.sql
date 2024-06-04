DROP TABLE IF EXISTS Inscripcion;
DROP TABLE IF EXISTS Categoria;

CREATE TABLE Categoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50)
);

INSERT INTO Categoria(nombre) VALUES ('Junior');
INSERT INTO Categoria(nombre) VALUES ('Adolescentes');
INSERT INTO Categoria(nombre) VALUES ('Jóvenes');
INSERT INTO Categoria(nombre) VALUES ('Adultos');
INSERT INTO Categoria(nombre) VALUES ('Menos Adultos');
INSERT INTO Categoria(nombre) VALUES ('Aún menos adultos');
INSERT INTO Categoria(nombre) VALUES ('Mayores');
INSERT INTO Categoria(nombre) VALUES ('Abuelos');
INSERT INTO Categoria(nombre) VALUES ('Jurásico');


CREATE TABLE Inscripcion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255), 
    protesis VARCHAR(1) DEFAULT 'n',
    horario VARCHAR(1) DEFAULT 'm',
    categoria_id INT NOT NULL,
	FOREIGN KEY (categoria_id )
      REFERENCES Categoria(id)
);

INSERT INTO Inscripcion(nombre, protesis, horario, categoria_id) VALUES ('Roberto', 'n', 'm', 3);