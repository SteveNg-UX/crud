-- Créer une base de données
CREATE DATABASE IF NOT EXISTS crud;

-- Utiliser la base de données
USE crud;

-- Créer une table pour les employees
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `salary` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- créer un utilisateur pour la base de données
CREATE USER 'usercrud'@'web01.test.lan' IDENTIFIED BY 'azerty ';
GRANT ALL PRIVILEGES ON crud.* TO 'usercrud'@'web01.test.lan' WITH GRANT OPTION;
FLUSH PRIVILEGES;
