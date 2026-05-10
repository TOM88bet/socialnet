DROP DATABASE IF EXISTS socialnet;
CREATE DATABASE socialnet;
USE socialnet;

CREATE TABLE account (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    fullname VARCHAR(150) NOT NULL,
    password VARCHAR(255) NOT NULL,
    description TEXT
);

INSERT INTO account (username, fullname, password, description)
VALUES (
    'admin',
    'Admin User',
    '$2b$12$tBtX/zMqgOKtEX1U7MCH7uXOcbBjve1MMYg1nZgpfjlZvb8WCcOUW',
    NULL
);