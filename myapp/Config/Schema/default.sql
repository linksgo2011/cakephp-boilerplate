

DROP TABLE IF EXISTS `cakephp-boilerplate`.`users`;
CREATE TABLE `cakephp-boilerplate`.`users` (
	`id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT,
	`username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`realname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`sex` tinyint(1) DEFAULT '0' NOT NULL,
	`tel` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`mobile` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`fax` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`createtime` int(10) UNSIGNED DEFAULT 0 NOT NULL,
	`updatetime` int(10) UNSIGNED DEFAULT 0 NOT NULL,
	`lasttime` int(10) UNSIGNED DEFAULT 0 NOT NULL,
	`regip` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`role` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`status` tinyint(1) DEFAULT '1' NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;


DROP TABLE IF EXISTS `cakephp-boilerplate`.`categories`;
CREATE TABLE `categories` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `parent` int(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `keywords` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `thumb` varchar(100) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `color` char(7) NOT NULL DEFAULT '',
  `isdisabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `listorder` tinyint(4) unsigned NOT NULL DEFAULT '99',
  `created` datetime(),
	`modified` datetime(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;