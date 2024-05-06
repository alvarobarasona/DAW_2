DROP TABLE IF EXISTS pokemon;

CREATE TABLE pokemon (
    pokemon_id INT AUTO_INCREMENT PRIMARY KEY,
    pokemon_name VARCHAR(255) NOT NULL,
    pokemon_description TEXT NOT NULL,
    pokemon_level INT NOT NULL,
    pokemon_type_1 VARCHAR(255) NOT NULL,
    pokemon_type_2 VARCHAR(255),
    pokemon_catch_date DATE NOT NULL,
    pokemon_catch_place VARCHAR(255) NOT NULL,
    pokemon_img VARCHAR(255)
);