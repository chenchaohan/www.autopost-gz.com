DROP TABLE IF EXISTS `phpcms_form`;
CREATE TABLE IF NOT EXISTS `phpcms_form` (
  `qid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company` varchar(30) NOT NULL,
  `exhibition` varchar(15) NOT NULL,
  `booth` varchar(15) NOT NULL,
  `area` varchar(30) NOT NULL,
  `name` varchar(15) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`qid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `phpcms_form_list`;
CREATE TABLE IF NOT EXISTS `phpcms_form_list` (
  `lid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `qid` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;