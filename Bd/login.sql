CREATE DATABASE IF NOT EXISTS login;
USE login;

CREATE TABLE IF NOT EXISTS usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255) NOT NULL,
    pass VARCHAR(50) NOT NULL
);

insert into usuario (usuario,pass)values
('agustin','12345678');


