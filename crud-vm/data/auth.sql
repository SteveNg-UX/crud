-- Créer une base de données
CREATE DATABASE IF NOT EXISTS auth;

-- Utiliser la base de données
USE auth;

-- Créer une table pour les utilisateurs
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Insérer un utilisateur de test 
INSERT INTO users (username, password) VALUES ('admin', 'azerty');

-- créer un utilisateur pour la base de données
CREATE USER 'userauth'@'192.168.10.10' IDENTIFIED BY 'azerty';
GRANT ALL PRIVILEGES ON auth.* TO 'userauth'@'192.168.10.10' WITH GRANT OPTION;
FLUSH PRIVILEGES;
