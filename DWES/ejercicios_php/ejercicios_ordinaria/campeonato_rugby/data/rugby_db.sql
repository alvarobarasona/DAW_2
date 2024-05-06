DROP TABLE IF EXISTS matches;

CREATE TABLE matches(
    id INT PRIMARY KEY AUTO_INCREMENT,
    country VARCHAR(255) NOT NULL,
    result VARCHAR(255) NOT NULL,
    score VARCHAR(255) NOT NULL
);

INSERT INTO matches (country, result, score) VALUES ("Jamaica", "win", "3-0");
INSERT INTO matches (country, result, score) VALUES ("Holanda", "tie", "1-1");
INSERT INTO matches (country, result, score) VALUES ("Alemania", "lose", "2-5");