-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.8-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para db_loja
CREATE DATABASE IF NOT EXISTS `db_loja` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_loja`;

-- Copiando estrutura para tabela db_loja.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(200) NOT NULL DEFAULT '',
  `f_email` varchar(200) NOT NULL DEFAULT '',
  `f_tel` varchar(20) NOT NULL DEFAULT '',
  `f_photo` varchar(200) DEFAULT '',
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Exportação de dados foi desmarcado.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
