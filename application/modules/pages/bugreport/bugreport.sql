DROP TABLE IF EXISTS `bugreport`;

CREATE TABLE `bugreport` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mozo` varchar(100) DEFAULT NULL,
  `report` varchar(100) DEFAULT NULL,
  `olaviat` varchar(20) DEFAULT NULL,
  `noebug` varchar(20) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
