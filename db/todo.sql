# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.31)
# Database: todo
# Generation Time: 2020-11-24 22:05:29 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tasks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tasks`;

CREATE TABLE `tasks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `task` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `due` date DEFAULT NULL,
  `completed` tinyint(1) DEFAULT '0',
  `archived` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;

INSERT INTO `tasks` (`id`, `user`, `task`, `category`, `due`, `completed`, `archived`)
VALUES
	(5,1,'Task 1','Work','2020-11-25',1,0),
	(6,1,'Task 2','Personal','2020-12-17',1,0),
	(7,1,'Task 3','None','2020-11-30',1,0),
	(8,1,'Task 4','Personal','2020-12-09',0,1),
	(9,1,'Task 5','Work','2020-12-31',0,0),
	(10,1,'Task 6','None','2020-12-10',0,0),
	(31,2,'Task 7','Work','2020-12-31',1,0),
	(32,2,'Task 8','None','2020-12-09',1,0),
	(33,2,'Task 9','Personal','2020-12-31',1,0),
	(34,2,'Task 10','None','2020-12-09',0,0),
	(35,2,'Task 11','Personal','2020-12-10',0,0),
	(36,2,'Task 12','Work','2020-11-30',0,0);

/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `password`)
VALUES
	(1,'user1','$2y$12$zvR391bZsFoWNRCUyyrNkON7C4UdKO9P.1IEdUbcdrPBhHrwyq6d.'),
	(2,'user2','$2y$12$SB4Lle0diVt68hAJEjFVIOIVqWQGj3q0eDbAKtLcYGHoBY9tSnKJC');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
