create database 3c2_bd_jogos;
use 3c2_bd_jogos;
CREATE TABLE jogos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    plataforma VARCHAR(35) NOT NULL,
    preco FLOAT(10) NOT NULL
);