CREATE TABLE `votes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `date_start` int(11) DEFAULT '0',
  `date_end` int(11) NOT NULL DEFAULT '0',
  `authorId` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `response_type` varchar(255) DEFAULT '',
  `availables_responses` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;