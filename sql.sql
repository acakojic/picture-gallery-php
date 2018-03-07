create database picturegallery;


use picturegallery;


CREATE TABLE `users` (
`users_id` int(12) unsigned NOT NULL AUTO_INCREMENT,
`users_username` varchar(30) DEFAULT NULL,
`users_password` varchar(30) DEFAULT NULL,
PRIMARY KEY (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


CREATE TABLE `pictures` (
`pictures_id` int(12) unsigned NOT NULL AUTO_INCREMENT,
`pictures_name` varchar(50) DEFAULT NULL,
`id_users` int(12) unsigned DEFAULT NULL,
PRIMARY KEY (`pictures_id`),
KEY `fk_pictures_users` (`id_users`),
CONSTRAINT `fk_pictures_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

