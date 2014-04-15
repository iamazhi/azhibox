CREATE TABLE `ab_note` (
   `id` mediumint(11) unsigned NOT NULL auto_increment,
   `title` tinytext NOT NULL,
   `content` text NOT NULL,
   `tag` varchar(250) NOT NULL,
   `author` varchar(64) NOT NULL default 'azhi',
   `createTime` datetime NOT NULL,
   `views` mediumint(11) unsigned NOT NULL default '0',
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ab_comment` (
  `id` mediumint(11) unsigned NOT NULL auto_increment,
  `targetType` varchar(30) NOT NULL,
  `targetID` mediumint(11) NOT NULL,
  `content` longblob NOT NULL,
  `author` varchar(64) NOT NULL,
  `createTime` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
