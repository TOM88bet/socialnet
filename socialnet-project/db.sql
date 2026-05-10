CREATE DATABASE socialnet;
USE socialnet;

CREATE TABLE account (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    fullname VARCHAR(150) NOT NULL,
    password VARCHAR(255) NOT NULL,
    description TEXT
);
