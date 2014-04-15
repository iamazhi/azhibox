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
