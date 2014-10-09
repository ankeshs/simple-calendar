CREATE TABLE `booking` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `slot_id` int(10) NOT NULL,
  `start` datetime NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ;

CREATE TABLE `slots` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(10) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `guid` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ;

CREATE TABLE `teacher` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ;