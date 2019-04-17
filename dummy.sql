CREATE TABLE `news_institutions` (
  `institution_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`institution_id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tags_seo_data` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `seo_name` varchar(255) NOT NULL DEFAULT '',
  `tag_type` varchar(32) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`tag_id`),
  KEY `seo_name` (`seo_name`),
  KEY `tag_type` (`tag_type`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `news_institutions` (`institution_id`, `name`) VALUES
	(1, 'Alma Kft.'),
    (2, 'Körte Kft.');

INSERT INTO `tags_seo_data` (`tag_id`, `seo_name`, `tag_type`, `item_id`) VALUES
	(1, 'alma-kft', 'institutions', 1),
    (2, 'korte-kft', 'institutions', 2);
