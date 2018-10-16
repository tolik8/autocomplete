CREATE TABLE `skills` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `skill` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

insert  into `skills`(`id`,`skill`,`status`) values 
(1,'PHP','1'),
(2,'HTML','1'),
(3,'CSS','1'),
(4,'Java','1'),
(5,'JavaScript','1'),
(6,'MySQL','1'),
(7,'Oracle','1'),
(8,'Bootstrap','1'),
(9,'Emmet','1'),
(10,'Sass','1'),
(11,'Git','1'),
(12,'Vagrant','1'),
(13,'RegEx','1'),
(14,'Composer','1'),
(15,'Laravel','1'),
(16,'Yii','1');
