DROP TABLE IF EXISTS `joinArena`;

CREATE TABLE `joinArena` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `hero` varchar(100) DEFAULT NULL,
  `hero2` varchar(100) DEFAULT NULL,
  `noeevent` varchar(20) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
