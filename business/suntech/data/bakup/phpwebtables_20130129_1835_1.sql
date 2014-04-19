# phpweb bakfile
# version:2011 sp3
# time:2013-01-29 00:27:28
# type:phpweb
# phpweb:http://www.phpweb.com
# --------------------------------------------------------


DROP TABLE IF EXISTS `phpjsj_admin`;
CREATE TABLE `phpjsj_admin` (
  `userid` mediumint(10) unsigned NOT NULL default '0',
  `username` varchar(100) NOT NULL default '',
  `allowmultilogin` tinyint(1) unsigned NOT NULL default '0',
  `alloweditpassword` tinyint(1) unsigned NOT NULL default '0',
  `editpasswordnextlogin` tinyint(1) unsigned NOT NULL default '0',
  `disabled` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phpjsj_admin` VALUES('1','admin','0','0','0','0');
INSERT INTO `phpjsj_admin` VALUES('2','88ctw','0','0','0','0');

DROP TABLE IF EXISTS `phpjsj_admin_role`;
CREATE TABLE `phpjsj_admin_role` (
  `userid` mediumint(8) unsigned NOT NULL default '0',
  `roleid` tinyint(3) unsigned NOT NULL default '0',
  KEY `roleid` (`roleid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phpjsj_admin_role` VALUES('1','1');

DROP TABLE IF EXISTS `phpjsj_admin_role_priv`;
CREATE TABLE `phpjsj_admin_role_priv` (
  `roleid` tinyint(3) unsigned NOT NULL default '0',
  `field` char(15) NOT NULL default '',
  `value` char(15) NOT NULL default '',
  `priv` char(15) NOT NULL default '',
  PRIMARY KEY  (`roleid`,`field`,`priv`,`value`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_ads`;
CREATE TABLE `phpjsj_ads` (
  `adsid` mediumint(8) NOT NULL auto_increment,
  `adsname` varchar(40) NOT NULL default '',
  `introduce` varchar(255) NOT NULL default '',
  `placeid` mediumint(8) NOT NULL default '0',
  `type` varchar(10) NOT NULL default '',
  `linkurl` varchar(100) NOT NULL default '',
  `imageurl` varchar(100) NOT NULL default '',
  `s_imageurl` varchar(100) NOT NULL default '',
  `alt` varchar(20) NOT NULL default '',
  `flashurl` varchar(100) NOT NULL default '',
  `wmode` varchar(20) NOT NULL default '',
  `text` text NOT NULL,
  `texturl` varchar(100) NOT NULL default '',
  `code` text NOT NULL,
  `fromdate` int(10) NOT NULL default '0',
  `todate` int(10) NOT NULL default '0',
  `username` varchar(20) NOT NULL default '',
  `addtime` int(10) NOT NULL default '0',
  `views` int(10) NOT NULL default '0',
  `clicks` mediumint(8) NOT NULL default '0',
  `passed` tinyint(1) NOT NULL default '0',
  `status` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`adsid`),
  KEY `placeid` (`placeid`),
  KEY `username` (`username`),
  KEY `fromdate` (`fromdate`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_ads_1203`;
CREATE TABLE `phpjsj_ads_1203` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `adsid` mediumint(8) unsigned NOT NULL default '0',
  `username` char(20) NOT NULL default '',
  `area` char(40) NOT NULL default '',
  `ip` char(15) NOT NULL default '',
  `referer` char(120) NOT NULL default '',
  `clicktime` int(10) unsigned NOT NULL default '0',
  `type` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `adsid` (`adsid`,`type`,`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_ads_place`;
CREATE TABLE `phpjsj_ads_place` (
  `placeid` mediumint(9) NOT NULL auto_increment,
  `placename` char(50) NOT NULL default '',
  `template` char(30) NOT NULL default '',
  `introduce` char(100) NOT NULL default '',
  `price` mediumint(8) NOT NULL default '0',
  `items` smallint(4) NOT NULL default '0',
  `width` smallint(4) NOT NULL default '0',
  `height` smallint(4) NOT NULL default '0',
  `passed` tinyint(1) NOT NULL default '0',
  `option` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`placeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_area`;
CREATE TABLE `phpjsj_area` (
  `areaid` smallint(6) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL default '',
  `style` varchar(35) NOT NULL default '',
  `parentid` smallint(5) NOT NULL default '0',
  `arrparentid` varchar(255) NOT NULL default '',
  `child` tinyint(1) NOT NULL default '0',
  `arrchildid` mediumtext NOT NULL,
  `template` varchar(50) NOT NULL default '',
  `listorder` smallint(5) unsigned NOT NULL default '0',
  `hits` int(10) NOT NULL default '0',
  PRIMARY KEY  (`areaid`),
  KEY `parentid` (`parentid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_attachment`;
CREATE TABLE `phpjsj_attachment` (
  `aid` int(10) unsigned NOT NULL auto_increment,
  `module` varchar(100) NOT NULL default '',
  `catid` varchar(100) NOT NULL default '',
  `contentid` varchar(100) NOT NULL default '',
  `field` varchar(100) NOT NULL default '',
  `filename` varchar(100) NOT NULL default '',
  `filepath` varchar(100) NOT NULL default '',
  `filetype` varchar(100) NOT NULL default '',
  `filesize` varchar(100) NOT NULL default '',
  `fileext` varchar(100) NOT NULL default '',
  `description` varchar(100) NOT NULL default '',
  `isimage` varchar(100) NOT NULL default '',
  `isthumb` tinyint(4) NOT NULL default '0',
  `downloads` varchar(100) NOT NULL default '',
  `listorder` tinyint(3) NOT NULL default '0',
  `userid` varchar(100) NOT NULL default '',
  `uploadtime` varchar(100) NOT NULL default '',
  `uploadip` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_author`;
CREATE TABLE `phpjsj_author` (
  `authorid` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(20) NOT NULL default '',
  `name` varchar(30) NOT NULL default '',
  `gender` tinyint(1) unsigned NOT NULL default '0',
  `birthday` date NOT NULL default '0000-00-00',
  `email` varchar(40) NOT NULL default '',
  `qq` varchar(15) NOT NULL default '',
  `msn` varchar(40) NOT NULL default '',
  `homepage` varchar(100) NOT NULL default '',
  `telephone` varchar(100) NOT NULL default '',
  `address` varchar(100) NOT NULL default '',
  `postcode` varchar(100) NOT NULL default '',
  `photo` varchar(100) NOT NULL default '',
  `introduce` mediumtext NOT NULL,
  `updatetime` int(11) NOT NULL default '0',
  `listorder` tinyint(3) unsigned NOT NULL default '0',
  `elite` tinyint(1) unsigned NOT NULL default '0',
  `disabled` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`authorid`),
  UNIQUE KEY `name` (`name`),
  KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_c_down`;
CREATE TABLE `phpjsj_c_down` (
  `contentid` mediumint(8) unsigned NOT NULL default '0',
  `template` varchar(30) NOT NULL default '',
  `content` mediumtext NOT NULL,
  `version` varchar(100) NOT NULL default '',
  `classtype` varchar(100) NOT NULL default '',
  `language` varchar(100) NOT NULL default '',
  `copytype` varchar(100) NOT NULL default '',
  `systems` varchar(100) NOT NULL default '',
  `stars` varchar(100) NOT NULL default '',
  `filesize` varchar(100) NOT NULL default '',
  `downurl` varchar(255) NOT NULL default '',
  `downurls` text NOT NULL,
  `down1` varchar(20) NOT NULL default '',
  `down2` varchar(20) NOT NULL default '',
  `copyrights` varchar(255) NOT NULL default '',
  `moneys` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`contentid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_c_focus`;
CREATE TABLE `phpjsj_c_focus` (
  `contentid` mediumint(8) unsigned NOT NULL default '0',
  `template` varchar(30) NOT NULL default '',
  `content` mediumtext NOT NULL,
  `foucs` varchar(255) NOT NULL default '',
  `links` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`contentid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_c_news`;
CREATE TABLE `phpjsj_c_news` (
  `contentid` mediumint(8) unsigned NOT NULL default '0',
  `template` varchar(30) NOT NULL default '',
  `titleintact` varchar(100) NOT NULL default '',
  `content` mediumtext NOT NULL,
  `groupids_view` varchar(100) NOT NULL default '',
  `readpoint` varchar(100) NOT NULL default '',
  `author` varchar(100) NOT NULL default '',
  `copyfrom` varchar(100) NOT NULL default '',
  `paginationtype` varchar(100) NOT NULL default '',
  `maxcharperpage` mediumtext NOT NULL,
  PRIMARY KEY  (`contentid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_c_picture`;
CREATE TABLE `phpjsj_c_picture` (
  `contentid` mediumint(8) unsigned NOT NULL default '0',
  `template` varchar(30) NOT NULL default '',
  `author` varchar(100) NOT NULL default '',
  `pictureurls` tinyint(1) unsigned NOT NULL default '0',
  `content` mediumtext NOT NULL,
  PRIMARY KEY  (`contentid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_c_product`;
CREATE TABLE `phpjsj_c_product` (
  `contentid` mediumint(8) unsigned NOT NULL default '0',
  `template` varchar(30) NOT NULL default '',
  `content` mediumtext NOT NULL,
  `price` varchar(100) NOT NULL default '',
  `market` varchar(100) NOT NULL default '',
  `wholesale` varchar(100) NOT NULL default '',
  `size` varchar(100) NOT NULL default '',
  `pictureurls` varchar(100) NOT NULL default '',
  `unit` varchar(100) NOT NULL default '',
  `stock` varchar(100) NOT NULL default '',
  `stars` varchar(100) NOT NULL default '',
  `sizes` varchar(100) NOT NULL default '',
  `material` varchar(100) NOT NULL default '',
  `sales` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`contentid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_c_singlepage`;
CREATE TABLE `phpjsj_c_singlepage` (
  `contentid` int(10) unsigned NOT NULL default '0',
  `template` varchar(100) NOT NULL default '',
  `content` mediumtext NOT NULL,
  PRIMARY KEY  (`contentid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_category`;
CREATE TABLE `phpjsj_category` (
  `catid` int(10) unsigned NOT NULL auto_increment,
  `module` varchar(100) NOT NULL default '',
  `modelid` tinyint(1) unsigned NOT NULL default '0',
  `type` varchar(100) NOT NULL default '',
  `contentid` smallint(5) unsigned NOT NULL default '0',
  `parentid` smallint(5) unsigned NOT NULL default '0',
  `arrparentid` varchar(255) NOT NULL default '',
  `child` tinyint(1) unsigned NOT NULL default '0',
  `arrchildid` mediumtext NOT NULL,
  `menuid` varchar(100) NOT NULL default '',
  `pid` varchar(100) NOT NULL default '',
  `modelname` varchar(100) NOT NULL default '',
  `style` varchar(50) NOT NULL default '',
  `name` varchar(100) NOT NULL default '',
  `parentdir` varchar(100) NOT NULL default '',
  `catdir` varchar(30) NOT NULL default '',
  `url` varchar(100) NOT NULL default '',
  `img` varchar(100) NOT NULL default '',
  `setting` mediumtext NOT NULL,
  `title` varchar(100) NOT NULL default '',
  `keywords` varchar(100) NOT NULL default '',
  `description` varchar(100) NOT NULL default '',
  `ismenu` tinyint(1) unsigned NOT NULL default '0',
  `hits` int(10) unsigned NOT NULL default '0',
  `listorder` smallint(11) NOT NULL default '0',
  PRIMARY KEY  (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phpjsj_category` VALUES('1','0','0','','0','0','','0','','1','67','','','默认分类','','','','','','','','','0','0','0');
INSERT INTO `phpjsj_category` VALUES('2','0','0','','0','0','','0','','2','114','','','首页焦点','','','','','','','','首页焦点的图片，外网连接调用！','0','0','0');

DROP TABLE IF EXISTS `phpjsj_content`;
CREATE TABLE `phpjsj_content` (
  `contentid` int(10) unsigned NOT NULL auto_increment,
  `catid` int(10) NOT NULL default '0',
  `modelid` varchar(100) NOT NULL default '',
  `title` varchar(100) NOT NULL default '',
  `style` varchar(100) NOT NULL default '',
  `thumb` varchar(100) NOT NULL default '',
  `keywords` varchar(100) NOT NULL default '',
  `description` mediumtext NOT NULL,
  `posids` tinyint(1) unsigned NOT NULL default '0',
  `url` varchar(100) NOT NULL default '',
  `listorder` smallint(6) NOT NULL default '0',
  `status` varchar(100) NOT NULL default '',
  `userid` varchar(100) NOT NULL default '',
  `username` varchar(100) NOT NULL default '',
  `inputtime` varchar(100) NOT NULL default '',
  `updatetime` varchar(100) NOT NULL default '',
  `searchid` varchar(100) NOT NULL default '',
  `islink` varchar(100) NOT NULL default '',
  `prefix` varchar(100) NOT NULL default '',
  `listorder11` smallint(10) NOT NULL default '0',
  PRIMARY KEY  (`contentid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_content_count`;
CREATE TABLE `phpjsj_content_count` (
  `contentid` mediumint(8) unsigned NOT NULL default '0',
  `hits` mediumint(9) NOT NULL default '0',
  `hits_day` mediumint(9) NOT NULL default '0',
  `hits_week` mediumint(9) NOT NULL default '0',
  `hits_month` mediumint(9) NOT NULL default '0',
  `hits_time` varchar(100) NOT NULL default '',
  `comments` int(11) NOT NULL default '0',
  `comments_checked` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`contentid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_content_position`;
CREATE TABLE `phpjsj_content_position` (
  `contentid` mediumint(8) unsigned NOT NULL default '0',
  `posid` smallint(8) unsigned NOT NULL default '0',
  KEY `posid` (`posid`),
  KEY `contentid` (`contentid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phpjsj_content_position` VALUES('18','1');
INSERT INTO `phpjsj_content_position` VALUES('20','1');
INSERT INTO `phpjsj_content_position` VALUES('21','1');
INSERT INTO `phpjsj_content_position` VALUES('22','1');
INSERT INTO `phpjsj_content_position` VALUES('39','1');
INSERT INTO `phpjsj_content_position` VALUES('39','2');
INSERT INTO `phpjsj_content_position` VALUES('40','1');
INSERT INTO `phpjsj_content_position` VALUES('46','2');
INSERT INTO `phpjsj_content_position` VALUES('47','2');
INSERT INTO `phpjsj_content_position` VALUES('48','2');

DROP TABLE IF EXISTS `phpjsj_content_tag`;
CREATE TABLE `phpjsj_content_tag` (
  `tag` char(20) NOT NULL default '',
  `contentid` mediumint(8) unsigned NOT NULL default '0',
  KEY `contentid` (`contentid`),
  KEY `tag` (`tag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_focus`;
CREATE TABLE `phpjsj_focus` (
  `focusid` smallint(5) unsigned NOT NULL auto_increment,
  `typeid` smallint(5) NOT NULL default '0',
  `style` varchar(50) NOT NULL default '',
  `name` varchar(50) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `thumb` varchar(255) NOT NULL default '',
  `username` varchar(30) NOT NULL default '',
  `elite` tinyint(4) NOT NULL default '0',
  `passed` tinyint(4) NOT NULL default '0',
  `introduce` text NOT NULL,
  `addtime` int(10) NOT NULL default '0',
  `listorder` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`focusid`),
  KEY `typeid` (`typeid`,`focusid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_guestbook`;
CREATE TABLE `phpjsj_guestbook` (
  `gid` smallint(6) NOT NULL auto_increment,
  `title` varchar(80) NOT NULL default '',
  `content` text NOT NULL,
  `reply` text NOT NULL,
  `userid` mediumint(8) unsigned NOT NULL default '0',
  `username` varchar(20) NOT NULL default '',
  `gender` tinyint(1) NOT NULL default '0',
  `head` tinyint(3) unsigned NOT NULL default '0',
  `email` varchar(40) NOT NULL default '',
  `qq` varchar(15) NOT NULL default '',
  `homepage` varchar(25) NOT NULL default '',
  `hidden` tinyint(1) unsigned NOT NULL default '0',
  `passed` tinyint(1) unsigned NOT NULL default '0',
  `ip` varchar(15) NOT NULL default '',
  `addtime` int(10) unsigned NOT NULL default '0',
  `replyer` varchar(20) NOT NULL default '',
  `replytime` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`gid`),
  KEY `hidden` (`hidden`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phpjsj_guestbook` VALUES('2','','','123213','0','','0','0','','','','0','0','','0','admin','1330163319');

DROP TABLE IF EXISTS `phpjsj_hits`;
CREATE TABLE `phpjsj_hits` (
  `field` char(10) NOT NULL default '',
  `value` mediumint(8) unsigned NOT NULL default '0',
  `date` date NOT NULL default '0000-00-00',
  `hits` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`field`,`value`,`date`,`hits`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phpjsj_hits` VALUES('catid','26','2012-03-30','2369');

DROP TABLE IF EXISTS `phpjsj_keyword`;
CREATE TABLE `phpjsj_keyword` (
  `tagid` int(10) unsigned NOT NULL auto_increment,
  `style` varchar(100) NOT NULL default '',
  `tag` varchar(100) NOT NULL default '',
  `usetimes` varchar(100) NOT NULL default '',
  `lastusetime` smallint(6) NOT NULL default '0',
  `hits` varchar(100) NOT NULL default '',
  `lasthittime` varchar(100) NOT NULL default '',
  `listorder` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`tagid`),
  UNIQUE KEY `tag` (`tag`),
  KEY `lastusetime` (`lastusetime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phpjsj_keyword` VALUES('2','','最新的网站制作平台','','0','','','0');
INSERT INTO `phpjsj_keyword` VALUES('4','','最好的网站程序','','0','','','0');

DROP TABLE IF EXISTS `phpjsj_link`;
CREATE TABLE `phpjsj_link` (
  `linkid` smallint(5) unsigned NOT NULL auto_increment,
  `typeid` smallint(5) NOT NULL default '0',
  `linktype` tinyint(1) NOT NULL default '0',
  `style` varchar(50) NOT NULL default '0',
  `name` varchar(50) NOT NULL default '0',
  `url` varchar(255) NOT NULL default '0',
  `logo` varchar(255) NOT NULL default '0',
  `introduce` text NOT NULL,
  `username` varchar(30) NOT NULL default '',
  `listorder` smallint(5) NOT NULL default '0',
  `elite` tinyint(4) NOT NULL default '0',
  `passed` tinyint(4) NOT NULL default '0',
  `addtime` int(10) NOT NULL default '0',
  `hits` int(10) NOT NULL default '0',
  PRIMARY KEY  (`linkid`),
  KEY `typeid` (`typeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phpjsj_link` VALUES('4','198','2','c1 b','8888','http://www.www.com','uploadfile/2011/1226/20111226025016794.gif','dsf','f','1','2','1','0','0');
INSERT INTO `phpjsj_link` VALUES('3','198','1','c3 b','d','http://www.sdf.com','uploadfile/2011/1226/20111226025016794.gif','','','2','1','1','0','0');
INSERT INTO `phpjsj_link` VALUES('5','198','2','c15 b','d','http://www.s.com','uploadfile/2011/1226/20111226025016794.gif','sdf','','2','2','1','0','0');

DROP TABLE IF EXISTS `phpjsj_log`;
CREATE TABLE `phpjsj_log` (
  `logid` int(10) unsigned NOT NULL auto_increment,
  `field` varchar(15) NOT NULL default '',
  `value` int(10) unsigned NOT NULL default '0',
  `module` varchar(15) NOT NULL default '',
  `file` varchar(20) NOT NULL default '',
  `action` varchar(20) NOT NULL default '',
  `querystring` varchar(255) NOT NULL default '',
  `data` mediumtext NOT NULL,
  `userid` mediumint(8) unsigned NOT NULL default '0',
  `username` varchar(100) NOT NULL default '',
  `ip` varchar(15) NOT NULL default '',
  `time` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`logid`),
  KEY `userid` (`userid`),
  KEY `module` (`module`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_member`;
CREATE TABLE `phpjsj_member` (
  `userid` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(20) NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  `touseid` mediumint(8) NOT NULL default '0',
  `email` varchar(40) NOT NULL default '',
  `groupid` tinyint(3) NOT NULL default '0',
  `areaid` mediumint(5) NOT NULL default '0',
  `amount` float(6,2) NOT NULL default '0.00',
  `point` smallint(5) NOT NULL default '0',
  `modelid` tinyint(3) NOT NULL default '0',
  `message` tinyint(1) NOT NULL default '0',
  `disabled` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`userid`),
  KEY `groupid` (`groupid`),
  KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phpjsj_member` VALUES('1','admin','e10adc3949ba59abbe56e057f20f883e','0','cassddf@163.com','6','1','544.00','40','8','0','1');

DROP TABLE IF EXISTS `phpjsj_member_cache`;
CREATE TABLE `phpjsj_member_cache` (
  `userid` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(20) NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  `touseid` mediumint(8) NOT NULL default '0',
  `email` varchar(40) NOT NULL default '',
  `groupid` tinyint(3) unsigned NOT NULL default '0',
  `areaid` mediumint(5) NOT NULL default '0',
  `amount` float(6,2) unsigned NOT NULL default '0.00',
  `point` smallint(5) NOT NULL default '0',
  `modelid` tinyint(3) unsigned NOT NULL default '0',
  `message` tinyint(1) unsigned NOT NULL default '0',
  `disabled` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`userid`),
  KEY `groupid` (`groupid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_member_company`;
CREATE TABLE `phpjsj_member_company` (
  `userid` int(10) unsigned NOT NULL default '0',
  `sitedomain` varchar(30) NOT NULL default '',
  `tplname` varchar(30) NOT NULL default '',
  `producls` mediumtext NOT NULL,
  `companyname` varchar(150) NOT NULL default '',
  `catids` varchar(200) NOT NULL default '',
  `genre` varchar(30) NOT NULL default '',
  `areaname` varchar(15) NOT NULL default '',
  `establishtime` date NOT NULL default '0000-00-00',
  `linkman` varchar(20) NOT NULL default '',
  `telephone` varchar(40) NOT NULL default '',
  `address` varchar(150) NOT NULL default '',
  `grade` tinyint(1) unsigned NOT NULL default '0',
  `endtime` int(10) unsigned NOT NULL default '0',
  `status` tinyint(1) unsigned NOT NULL default '0',
  `diy` tinyint(1) unsigned NOT NULL default '0',
  `map` varchar(50) NOT NULL default '',
  `menu` text NOT NULL,
  `introduce` text NOT NULL,
  `logo` varchar(100) NOT NULL default '',
  `banner` varchar(100) NOT NULL default '',
  `pattern` varchar(30) NOT NULL default '',
  `employnum` varchar(12) NOT NULL default '',
  `turnover` varchar(20) NOT NULL default '',
  `elite` tinyint(1) NOT NULL default '0',
  `fax` varchar(18) NOT NULL default '',
  `zip` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`userid`),
  KEY `sitedomain` (`sitedomain`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_member_detail`;
CREATE TABLE `phpjsj_member_detail` (
  `userid` mediumint(9) NOT NULL default '0',
  `truename` varchar(50) NOT NULL default '',
  `gender` tinyint(1) NOT NULL default '0',
  `msn` varchar(20) NOT NULL default '',
  `telephone` varchar(20) NOT NULL default '',
  `address` varchar(100) NOT NULL default '',
  `qq` varchar(15) NOT NULL default '',
  `birthday` datetime NOT NULL default '0000-00-00 00:00:00',
  `postcode` varchar(15) NOT NULL default '',
  `mobile` varchar(15) NOT NULL default '0',
  PRIMARY KEY  (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phpjsj_member_detail` VALUES('1','sdf','1','smn@qq.com','0311-84898706','河北省石家庄市大街35号','0511111','2011-12-21 00:00:00','050000','13588878912');

DROP TABLE IF EXISTS `phpjsj_member_group`;
CREATE TABLE `phpjsj_member_group` (
  `groupid` tinyint(3) NOT NULL auto_increment,
  `name` varchar(20) NOT NULL default '',
  `issystem` tinyint(1) NOT NULL default '0',
  `allowmessage` smallint(5) NOT NULL default '0',
  `allowvisit` tinyint(1) NOT NULL default '0',
  `allowpost` tinyint(1) NOT NULL default '0',
  `allowsearch` tinyint(1) NOT NULL default '0',
  `allowupgrade` tinyint(1) NOT NULL default '0',
  `price_y` decimal(8,2) NOT NULL default '0.00',
  `price_m` decimal(8,2) NOT NULL default '0.00',
  `price_d` decimal(8,2) NOT NULL default '0.00',
  `description` mediumtext NOT NULL,
  `listorder` tinyint(3) NOT NULL default '0',
  `disabled` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`groupid`),
  KEY `disabled` (`disabled`),
  KEY `listorder` (`listorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phpjsj_member_group` VALUES('1','管理员','1','1000','1','1','1','1','0.00','0.00','0.00','管理员','1','1');
INSERT INTO `phpjsj_member_group` VALUES('2','禁用','1','1000','1','2','1','1','0.00','0.00','0.00','','0','2');
INSERT INTO `phpjsj_member_group` VALUES('3','游客','1','1000','1','1','1','1','0.00','0.00','0.00','','0','1');
INSERT INTO `phpjsj_member_group` VALUES('4','待邮件验证','1','1000','1','1','1','1','0.00','0.00','0.00','','0','1');
INSERT INTO `phpjsj_member_group` VALUES('5','待审核','1','1000','1','1','1','1','0.00','0.00','0.00','','0','1');
INSERT INTO `phpjsj_member_group` VALUES('6','注册会员','1','1000','1','1','1','1','0.00','0.00','0.00','','0','1');
INSERT INTO `phpjsj_member_group` VALUES('7','888','2','1000','2','2','2','2','0.00','0.00','0.00','321','0','1');

DROP TABLE IF EXISTS `phpjsj_member_info`;
CREATE TABLE `phpjsj_member_info` (
  `userid` mediumint(8) NOT NULL auto_increment,
  `question` char(50) NOT NULL default '',
  `answer` char(32) NOT NULL default '',
  `avatar` int(10) NOT NULL default '0',
  `regip` char(15) NOT NULL default '',
  `regtime` int(10) NOT NULL default '0',
  `lastloginip` char(15) NOT NULL default '',
  `lastlogintime` int(10) NOT NULL default '0',
  `logintimes` smallint(5) NOT NULL default '0',
  `note` char(255) NOT NULL default '',
  `actortype` tinyint(3) NOT NULL default '0',
  `answercount` mediumint(8) NOT NULL default '0',
  `acceptcount` smallint(5) NOT NULL default '0',
  PRIMARY KEY  (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phpjsj_member_info` VALUES('1','','','0','127.0.0.1','1324659089','110.240.117.160','1359390442','182','','0','0','0');
INSERT INTO `phpjsj_member_info` VALUES('2','','','0','','0','127.0.0.1','1327631525','24','','0','0','0');
INSERT INTO `phpjsj_member_info` VALUES('13','','','0','127.0.0.1','1324661904','','0','0','sdf','0','0','0');
INSERT INTO `phpjsj_member_info` VALUES('15','','','0','127.0.0.1','1324715941','','0','0','asd','0','0','0');
INSERT INTO `phpjsj_member_info` VALUES('32','','','0','127.0.0.1','1325061415','127.0.0.1','1325061456','1','','0','0','0');
INSERT INTO `phpjsj_member_info` VALUES('33','','','0','127.0.0.1','1325061848','','0','0','','0','0','0');
INSERT INTO `phpjsj_member_info` VALUES('34','','','0','','0','','0','0','','0','0','0');

DROP TABLE IF EXISTS `phpjsj_menu`;
CREATE TABLE `phpjsj_menu` (
  `menuid` int(10) unsigned NOT NULL auto_increment,
  `pid` varchar(100) NOT NULL default '',
  `name` varchar(100) NOT NULL default '',
  `url` varchar(100) NOT NULL default '',
  `title` varchar(100) NOT NULL default '',
  `target_line` varchar(100) NOT NULL default '',
  `icon` varchar(100) NOT NULL default '',
  `iconOpen` varchar(100) NOT NULL default '',
  `disabled` tinyint(4) NOT NULL default '0',
  `listorder` int(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phpjsj_menu` VALUES('1','0','管理首页','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('2','0','系统管理','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('3','0','内容管理','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('4','0','功能管理','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('5','0','会员管理','','','','','','1','0');
INSERT INTO `phpjsj_menu` VALUES('6','0','模板管理','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('7','1','常用操作','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('8','7','管理常用菜单','?file=menu&action=manage&pid=7','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('9','7','添加常用菜单','?file=menu&action=add&menuid=7','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('10','7','网站配置','?file=setting&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('11','7','添加管理员','?file=admin&action=add','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('12','7','更新缓存','?file=cache','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('13','7','更新首页','?file=html&action=index','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('14','7','添加地区','?file=area&action=add','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('15','1','个人信息','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('16','3','全部内容','?file=content&action=contentall','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('17','3','内容审核','?file=content&action=inspect','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('18','2','栏目管理','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('19','2','分类管理','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('20','2','网站配置','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('21','2','相关设置','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('22','3','内容管理','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('23','15','修改资料','?file=personal&action=edit','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('24','15','修改密码','?file=personal&action=editpwd','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('25','19','添加分类','?file=model&action=add','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('26','19','管理分类','?file=model&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('27','20','基础配置','?file=setting&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('28','20','基础配置','?file=setting&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('29','18','添加栏目','?file=category&action=add','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('30','18','管理栏目','?file=category&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('31','21','来源管理','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('32','21','作者管理','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('33','21','地区管理','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('34','21','推荐位管理','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('35','21','关键词管理','','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('36','32','添加作者','?file=author&action=add','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('37','32','管理作者','?file=author&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('38','35','添加关键词','?file=keyword&action=add','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('39','35','管理关键词','?file=keyword&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('40','31','添加来源','?file=source&action=add','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('41','31','管理来源','?file=source&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('42','33','添加地区','?file=area&action=add','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('43','33','管理地区','?file=area&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('44','34','添加推荐位','?file=position&action=add','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('45','34','管理推荐位','?file=position&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('46','1','数据库管理','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('47','46','数据库备份','?file=database&action=export','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('48','46','数据库恢复','?file=database&action=import','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('49','46','数据库修复','?file=database&action=repair','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('50','4','财务','','','','','','1','0');
INSERT INTO `phpjsj_menu` VALUES('51','50','添加财务','?file=exchange&action=add','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('52','50','管理交易记录','?file=exchange&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('53','50','管理支付记录','?file=payonline&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('54','50','管理汇款记录','?file=useramount&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('55','50','生成点卡','?file=card&action=add','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('56','50','管理点卡','?file=card&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('57','50','管理点卡类型','?file=cardpoint&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('58','50','添加点卡类型','?file=cardpoint&action=add','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('59','50','支付配置','?file=payment&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('60','4','订单','','','','','','1','0');
INSERT INTO `phpjsj_menu` VALUES('61','60','订单管理','?file=order&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('62','4','广告管理','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('63','62','添加广告位','?file=ads_place&action=add','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('64','62','管理广告位','?file=ads_place&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('65','62','添加广告','?file=ads&action=add','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('66','62','管理广告','?file=ads&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('67','4','友情连接','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('68','67','添加友情连接','?file=link&action=add','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('69','67','管理友情连接','?file=link&action=manage&passed=1','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('70','67','添加分类','?file=link&action=type_add&menuid=71&pid=67','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('71','67','管理分类','?file=link&action=type_manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('72','5','会员管理','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('73','72','添加会员','?file=member&action=add','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('74','72','审核会员','?file=member&action=check','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('75','72','管理会员','?file=member&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('76','72','模块配置','?mod=member&file=member&action=setting','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('77','5','会员组管理','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('78','77','添加会员组','?file=member_group&action=group_add','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('79','77','管理会员组','?file=member_group&action=group_manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('80','5','会员模型管理','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('81','80','添加会员模型','?file=member_model&action=add','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('82','80','管理会员模型','?file=member_model&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('83','6','模板管理','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('84','83','风格管理','?file=templateproject&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('85','83','更新缓存','?file=templates&action=cache','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('86','83','添加标签','?file=tag&action=add&module=phpsin&type=content','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('87','83','管理标签','?file=tag&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('88','3','生成html','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('90','88','更新栏目页','?file=html&action=category','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('89','88','更新首页','?file=html&action=index','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('92','88','更新内容页','?file=html&action=show','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('93','4','留言板','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('94','93','管理留言板','?file=guestbook&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('95','93','模块配置','?file=guestbook&action=setting','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('108','21','单位管理','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('109','108','管理单位','?file=unit&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('111','6','自定义变量','','','','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('112','111','添加变量','?file=variable&action=add','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('113','111','管理变量','?file=variable&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('114','4','焦点管理','','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('115','114','添加焦点','?file=focus&action=add','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('116','114','焦点管理','?file=focus&action=manage','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('117','114','添加焦点分类','?file=focus&action=type_add&menuid=118&pid=114','','right','','','0','0');
INSERT INTO `phpjsj_menu` VALUES('118','114','管理焦点分类','?file=focus&action=type_manage','','right','','','0','0');

DROP TABLE IF EXISTS `phpjsj_model`;
CREATE TABLE `phpjsj_model` (
  `modelid` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `description` varchar(100) NOT NULL default '',
  `tablename` varchar(100) NOT NULL default '',
  `auditing` varchar(100) NOT NULL default '',
  `workflowid` tinyint(3) NOT NULL default '0',
  `template_category` varchar(100) NOT NULL default '',
  `template_list` varchar(30) NOT NULL default '',
  `template_show` varchar(30) NOT NULL default '',
  `template_print` varchar(30) NOT NULL default '',
  `category_urlruleid` tinyint(1) unsigned NOT NULL default '0',
  `show_urlruleid` tinyint(1) unsigned NOT NULL default '0',
  `enablesarch` tinyint(1) unsigned NOT NULL default '0',
  `employ` varchar(100) NOT NULL default '',
  `disabled` tinyint(3) NOT NULL default '0',
  `modeltype` tinyint(3) unsigned NOT NULL default '0',
  `ishtml` tinyint(1) unsigned NOT NULL default '0',
  `itemname` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`modelid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phpjsj_model` VALUES('1','新闻','','news','2','1','category','list','show','','7','0','1','1','0','0','1','');
INSERT INTO `phpjsj_model` VALUES('2','图片','','picture','2','1','category_picture','list_picture','show_picture','','7','0','1','1','0','0','1','');
INSERT INTO `phpjsj_model` VALUES('3','下载','','down','2','1','category_down','list_down','show_down','','7','0','1','1','0','0','1','');
INSERT INTO `phpjsj_model` VALUES('4','产品','','product','2','1','category_product','list_product','show_product','','7','0','1','1','0','0','1','');
INSERT INTO `phpjsj_model` VALUES('5','普通会员','','detail','0','2','','','','','0','0','1','0','0','2','0','');
INSERT INTO `phpjsj_model` VALUES('6','企业会员','','company','0','2','','','','','0','0','1','0','0','2','0','');
INSERT INTO `phpjsj_model` VALUES('9','单网页','','singlepage','2','3','','','single','','7','0','1','1','0','2','0','');

DROP TABLE IF EXISTS `phpjsj_model_field`;
CREATE TABLE `phpjsj_model_field` (
  `fieldid` mediumint(8) unsigned NOT NULL auto_increment,
  `modelid` tinyint(3) unsigned NOT NULL default '0',
  `field` varchar(20) NOT NULL default '',
  `name` varchar(100) NOT NULL default '',
  `tips` text NOT NULL,
  `css` varchar(100) NOT NULL default '',
  `minlength` varchar(100) NOT NULL default '',
  `maxlength` varchar(100) NOT NULL default '',
  `pattern` varchar(100) NOT NULL default '',
  `errortips` varchar(100) NOT NULL default '',
  `formtype` varchar(100) NOT NULL default '',
  `setting` mediumtext NOT NULL,
  `formattribute` varchar(100) NOT NULL default '',
  `unsetgroupids` varchar(100) NOT NULL default '',
  `unsetroleids` varchar(100) NOT NULL default '',
  `iscore` tinyint(4) unsigned NOT NULL default '0',
  `issystem` tinyint(4) unsigned NOT NULL default '0',
  `isunique` tinyint(4) unsigned NOT NULL default '0',
  `isbase` tinyint(4) unsigned NOT NULL default '0',
  `issearch` tinyint(4) unsigned NOT NULL default '0',
  `isselect` tinyint(4) NOT NULL default '0',
  `iswhere` tinyint(4) NOT NULL default '0',
  `isorder` tinyint(1) unsigned NOT NULL default '0',
  `islist` tinyint(1) unsigned NOT NULL default '0',
  `isshow` tinyint(1) unsigned NOT NULL default '0',
  `isadd` tinyint(4) unsigned NOT NULL default '0',
  `isfulltext` tinyint(1) unsigned NOT NULL default '0',
  `listorder` tinyint(8) unsigned NOT NULL default '0',
  `disabled` tinyint(1) unsigned NOT NULL default '0',
  `names` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`fieldid`),
  KEY `modelid` (`modelid`),
  KEY `field` (`field`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phpjsj_model_field` VALUES('1','1','contentid','ID','','','0','0','','','contentid','','','','','1','1','0','0','1','1','0','1','1','1','1','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('2','1','catid','栏目','','','','','','','catid','','','','','0','0','0','0','0','1','1','1','0','0','0','1','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('3','1','title','标题','','','1','80','','','title','','','','','0','0','0','0','0','1','1','1','0','0','0','1','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('4','1','style','颜色和字形','','','','','','','style','','','','','0','0','0','0','0','1','0','0','0','0','0','1','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('5','1','thumb','缩略图','','','0','50','','','image','','','','','0','0','0','0','0','1','0','0','0','0','0','1','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('6','1','keywords','关键字','','','0','30','','','keywords','','','','','0','0','0','0','0','1','0','0','0','0','0','1','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('7','1','author','作者','','','0','30','','','author','','','','','0','0','0','0','0','1','0','0','0','0','0','1','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('8','1','copyfrom','来源','','','0','30','','','source','','','','','0','0','0','0','0','1','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('9','1','description','摘要','','','5','80','','','textarea','','','','','0','0','0','0','0','1','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('10','1','posids','推荐位','','','','','','','posids','','','','','1','0','0','0','0','1','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('11','1','url','URL','','','','','','','url','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('12','1','content','内容','','','303','100%','','','editor','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('13','1','userid','发布人','','','','','','','userid','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('14','1','inputime','发布时间','','','','','','','inputtime','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('15','1','updatetime','更新时间','','','','','','','updatetime','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('16','1','groupids_view','阅读权限','','','','','','','groupids_view','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','1','');
INSERT INTO `phpjsj_model_field` VALUES('17','1','readpoint','阅读所需点数','','','','','','','readpoint','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','1','');
INSERT INTO `phpjsj_model_field` VALUES('18','1','islink','转向链接','','','','','','','islink','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('19','1','prefix','html文件名','','','','','','','prefix','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('20','4','contentid','ID','','','','','','','contentid','','','','','1','0','0','0','0','0','0','1','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('27','4','catid','栏目','','','','','','','catid','','','','','0','0','0','0','0','0','1','1','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('28','4','title','产品名称','','','1','80','','','title','','','','','0','0','0','0','0','0','0','1','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('29','4','style','颜色和字形','','','','','','','style','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('30','4','thumb','缩略图','','','1','50','','','image','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('31','4','keywords','关键字','','','1','50','','','keywords','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('21','4','unit','产品单位','','','','','','','box','array (\n  \'options\' => \'个|个\n件|件\n台|台\n条|条\n张|张\n本|本\n只|只\n箱|箱\n瓶|瓶\n吨|吨\nKg|Kg\nm|m\',\n  \'boxtype\' => \'select\',\n  \'fieldtype\' => \'CHAR\',\n  \'cols\' => \'\',\n  \'width\' => \'\',\n  \'size\' => \'\',\n  \'defaultvalue\' => \'个\',\n)\n','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('33','4','price','会员价格(元)','','','1','10','','','text','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('34','4','market','市场价格(元)','','','1','10','','','text','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('35','4','wholesale','批发价格(元)','','','1','10','','','text','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('36','4','size','产品型号','','','0','30','','','text','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('37','4','stock','库存','','','0','10','','','text','','','','','0','0','0','0','0','0','0','0','0','1','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('38','4','sizes','尺寸规格','','','','','','','text','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('39','4','material','材质用料','','','','','','','text','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('40','4','description','产品描述','','','5','100%','','','textarea','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('41','4','pictureurls','组图','','','','','','','images','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('42','4','posids','推荐位','','','','','','','text','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('43','4','url','URL','','','','','','','text','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('44','4','content','产品介绍','','','303','100%','','','editor','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('45','4','userid','发布人','','','','','','','text','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('46','4','inputime','发布时间','','','','','','','datetime','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('47','4','updatetime','更新时间','','','','','','','datetime','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('48','4','groupids_view','阅读权限','','','','','','','groupids_view','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','1','');
INSERT INTO `phpjsj_model_field` VALUES('49','4','readpoint','阅读所需点数','','','','','','','readpoint','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','1','');
INSERT INTO `phpjsj_model_field` VALUES('50','4','islink','转向链接','','','','','','','prefix','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('51','4','prefix','html文件名','','','','','','','url','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('52','5','truename','姓名','','','','','','','text','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('53','5','gender','性别','','','','','','','box','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('54','5','birthday','生日','','','','','','','datetime','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('55','5','mobile','手机','','','','','','','text','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('56','5','telephone','电话','','','','','','','text','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('57','5','qq','QQ','','','','','','','text','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('58','5','msn','MSN','','','','','','','text','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('59','5','address','地址','','','','','','','text','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('60','5','postcode','邮编','','','','','','','text','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('61','9','contentid','ID','','','','','','','contentid','','','','','1','1','0','0','0','0','0','1','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('62','9','catid','栏目','','','','','','','catid','','','','','0','0','0','0','0','1','1','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('63','9','title','标题','','','1','80','','','title','','','','','0','0','0','0','0','0','0','1','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('64','9','style','颜色和字形','','','','','','','style','','','','','0','0','0','0','0','0','0','1','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('65','9','keywords','关键字','','','1','30','','','keywords','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('66','9','description','摘要','','','5','100%','','','textarea','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('67','9','content','内容','','','303','100%','','','editor','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('68','3','contentid','ID','','','','','','','contentid','','','','','1','0','0','0','0','1','1','1','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('69','3','catid','栏目','','','','','','','catid','','','','','0','0','0','0','0','1','1','1','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('70','3','title','名称','','','1','80','','','title','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('71','2','contentid','ID','','','','','','','contentid','','','','','1','1','0','0','1','1','1','1','1','1','1','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('72','2','catid','栏目','','','','','','','catid','','','','','0','0','0','0','0','1','1','1','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('73','2','title','标题','','','1','80','','','title','','','','','0','0','0','0','0','1','1','1','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('74','2','style','颜色和字型','','','','','','','style','','','','','0','0','0','0','0','1','0','0','0','0','0','1','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('75','2','thumb','缩略图','','','0','50','','','image','','','','','0','0','0','0','0','1','1','1','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('76','2','keywords','关键词','','','0','30','','','keywords','','','','','0','0','0','0','0','1','0','0','0','0','0','1','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('77','2','author','作者','','','0','30','','','author','','','','','0','0','0','0','0','1','0','0','0','0','0','1','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('78','2','description','摘要','','','5','80','','','textarea','','','','','0','0','0','0','0','1','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('79','2','pictureurls','组图','','','','','','','images','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('80','2','posids','推荐位','','','','','','','posids','','','','','1','0','0','0','0','1','1','1','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('81','2','url','URL','','','','','','','url','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('82','2','userid','发布人','','','','','','','userid','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('83','2','inputime','发布时间','','','','','','','inputtime','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('84','2','updatetime','更新时间','','','','','','','updatetime','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('85','2','prefix','html文件名','','','','','','','prefix','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('86','3','style','颜色和字型','','','','','','','style','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('87','3','thumb','缩略图','','','','','','','image','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('88','3','keywords','关键词','','','0','50','','','keywords','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('89','3','description','摘要','','','5','80','','','textarea','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('90','3','content','介绍','','','303','100%','','','editor','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('91','3','downurl','下载地址','','','','','','','downfile','array (\n  \'mode\' => \'1\',\n  \'servers\' => \'电信下载|http://tel.xxx.com/\n网通下载|http://cnc.xxx.com/\',\n  \'size\' => \'60\',\n  \'downloadtype\' => \'1\',\n)\n\n\n\n\n\n\n','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('92','3','downurls','下载列表','名称|下载地址','','','','','','downfiles','array (\n  \'size\' => \'30\',\n  \'downloadtype\' => \'1\',\n)\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('93','3','filesize','文件大小','','','0','20','','','text','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('94','3','classtype','软件类型','','','','','','','box','array (\n  \'options\' => \'国产软件|国产软件\n国外软件|国外软件\n汉化补丁|汉化补丁\n程序源码|程序源码\n其他|其他\',\n  \'boxtype\' => \'select\',\n  \'fieldtype\' => \'CHAR\',\n  \'cols\' => \'5\',\n  \'width\' => \'80\',\n  \'size\' => \'1\',\n  \'defaultvalue\' => \'国产软件\',\n)\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('95','3','language','软件语言','','','','','','','box','array (\n  \'options\' => \'英文|英文\n简体中文|简体中文\n繁体中文|繁体中文\n简繁中文|简繁中文\n多国语言|多国语言\n其他语言|其他语言\',\n  \'boxtype\' => \'select\',\n  \'fieldtype\' => \'CHAR\',\n  \'cols\' => \'5\',\n  \'width\' => \'80\',\n  \'size\' => \'1\',\n  \'defaultvalue\' => \'简体中文\',\n)\n\n\n','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('96','3','systems','软件平台','<select name=\'selectSystem\' onchange=\"ChangeInput(this,document.myform.systems,\'/\')\">\n	<option value=\'WinXP\'>WinXP</option>\n	<option value=\'Vista\'>Vista</option>\n	<option value=\'Win2000\'>Win2000</option>\n	<option value=\'Win2003\'>Win2003</option>\n	<option value=\'Unix\'>Unix</option>\n	<option value=\'Linux\'>Linux</option>\n	<option value=\'MacOS\'>MacOS</option>\n</select>\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n','','0','30','','','text','array (\n  \'size\' => \'50\',\n  \'defaultvalue\' => \'Win2000/WinXP/Win2003\',\n  \'ispassword\' => \'0\',\n)\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('98','3','url','URL','','','','','','','url','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('99','3','userid','发布人','','','','','','','userid','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('100','3','inputime','发布时间','','','','','','','inputtime','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('101','3','updatetime','更新时间','','','','','','','updatetime','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('102','3','prefix','html文件名','','','','','','','prefix','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('103','3','posids','推荐位','','','','','','','posids','','','','','1','1','0','0','0','1','1','1','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('104','3','pictureurls','组图','','','','','','','images','','','','','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('105','3','down1','下载地址1','','','0','20','','','text','','','','','0','0','0','1','0','0','0','0','0','0','0','0','1','0','');
INSERT INTO `phpjsj_model_field` VALUES('106','3','down2','下载地址2','','','0','20','','','text','','','','','0','0','0','1','0','0','0','0','0','0','1','1','2','0','');
INSERT INTO `phpjsj_model_field` VALUES('107','3','copyrights','软件版本','','','0','','','','text','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO `phpjsj_model_field` VALUES('108','3','moneys','价格','','','0','20','','','text','','','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');

DROP TABLE IF EXISTS `phpjsj_module`;
CREATE TABLE `phpjsj_module` (
  `module` varchar(100) NOT NULL default '',
  `name` varchar(20) NOT NULL default '',
  `path` varchar(50) NOT NULL default '',
  `url` varchar(50) NOT NULL default '',
  `iscore` tinyint(1) unsigned NOT NULL default '0',
  `version` varchar(50) NOT NULL default '',
  `author` varchar(50) NOT NULL default '',
  `site` varchar(100) NOT NULL default '',
  `email` varchar(50) NOT NULL default '',
  `description` mediumtext NOT NULL,
  `license` mediumtext NOT NULL,
  `faq` mediumtext NOT NULL,
  `tagtypes` mediumtext NOT NULL,
  `setting` mediumtext NOT NULL,
  `listorder` tinyint(3) unsigned NOT NULL default '0',
  `disabled` tinyint(1) unsigned NOT NULL default '0',
  `publishdate` date NOT NULL default '0000-00-00',
  `installdate` date NOT NULL default '0000-00-00',
  `updatedate` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`module`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phpjsj_module` VALUES('phpsin','内容','','','1','','','','','','','','array (\r\n \'phpsin-content\'=>\'phpsin\',\r\n \'phpsin-category\'=>\'栏目标签\',\r\n)','array (\n  \'sitename\' => \'meiray.com\',\n  \'siteurl\' => \'http://127.0.0.1:84/\',\n  \'ishtml\' => \'1\',\n  \'fileext\' => \'html\',\n  \'logo\' => \'\',\n  \'meta_title\' => \'美睿网络\',\n  \'meta_keywords\' => \'\',\n  \'meta_description\' => \'meiray.com 网站内容管理系统\',\n  \'copyright\' => \'公司地址： 石家庄市金领大厦2座3号楼11层1105&nbsp;&nbsp;&nbsp; All Rights Reserved.石家庄市美睿网络有限责任公司<br />\r\n沪ICP备05048769号&nbsp;&nbsp; 技术支持：美睿网络\',\n  \'icpno\' => \'冀ICP备12017832\',\n  \'pagemode\' => \'0\',\n  \'pageshtml\' => \'总数：<b>{$total}</b>\r\n<a href=\"{$firstpage}\">首页</a><a href=\"{$prepage}\">上一页</a><a href=\"{$nextpage}\">下一页</a><a href=\"{$lastpage}\">尾页</a>\r\n页次：<b><font color=\"red\">{$page}</font>/{$pages}</b>\r\n<input type=\"text\" name=\"page\" id=\"page\" size=\"2\" onKeyDown=\"if(event.keyCode==13) {redirect(\\\'{$urlpre}\\\'+this.value); return false;}\"> \r\n<input type=\"button\" value=\"GO\" class=\"gotopage\" onclick=\"redirect(\\\'{$urlpre}\\\'+$(\\\'#page\\\').val())\">\',\n  \'category_count\' => \'1\',\n  \'maxpage\' => \'100\',\n  \'pagesize\' => \'12\',\n  \'enabletm\' => \'0\',\n  \'qq\' => \'\',\n  \'msn\' => \'\',\n  \'skype\' => \'\',\n  \'taobao\' => \'\',\n  \'alibaba\' => \'\',\n  \'allowtourist\' => \'0\',\n  \'thumb_enable\' => \'0\',\n  \'thumb_width\' => \'1200\',\n  \'thumb_height\' => \'1200\',\n  \'watermark_minwidth\' => \'100\',\n  \'watermark_minheight\' => \'100\',\n  \'watermark_img\' => \'\',\n  \'watermark_pct\' => \'\',\n  \'watermark_quality\' => \'\',\n  \'watermark_pos\' => \'5\',\n)','0','0','0000-00-00','0000-00-00','0000-00-00');
INSERT INTO `phpjsj_module` VALUES('member','会员','member/','member/','1','1.0.0.0','Phpweb Team','','','','','','','array (\n  \'allowregister\' => \'1\',\n  \'choosemodel\' => \'0\',\n  \'enablemailcheck\' => \'0\',\n  \'enableshowlist\' => \'1\',\n  \'enableadmincheck\' => \'0\',\n  \'enablecheckcodeofreg\' => \'1\',\n  \'enableQchk\' => \'0\',\n  \'paytype\' => \'amount\',\n  \'defualtpoint\' => \'0\',\n  \'defualtamount\' => \'0.00\',\n  \'reglicense\' => \' 3211323231231212312312132132asdasdsad\',\n  \'preserve\' => \'\',\n  \'url\' => \'member/\',\n)','0','0','0000-00-00','0000-00-00','0000-00-00');
INSERT INTO `phpjsj_module` VALUES('guestbook','留言板','guestbook/','guestbook/','0','','','','','','','','','array (\n  \'seo_keywords\' => \'留言板\',\n  \'seo_description\' => \'留言板\',\n  \'pagesize\' => \'20\',\n  \'maxcontent\' => \'1000\',\n  \'enablecheckcode\' => \'1\',\n  \'show\' => \'1\',\n  \'enableTourist\' => \'1\',\n  \'checkpass\' => \'1\',\n)','0','0','0000-00-00','0000-00-00','0000-00-00');

DROP TABLE IF EXISTS `phpjsj_order`;
CREATE TABLE `phpjsj_order` (
  `orderid` int(10) unsigned NOT NULL auto_increment,
  `contentid` varchar(100) NOT NULL default '',
  `goodsid` varchar(32) NOT NULL default '',
  `goodsname` varchar(80) NOT NULL default '',
  `goodsurl` varchar(100) NOT NULL default '',
  `unit` varchar(10) NOT NULL default '',
  `price` decimal(8,2) unsigned NOT NULL default '0.00',
  `number` smallint(5) unsigned NOT NULL default '0',
  `carriage` decimal(8,2) unsigned NOT NULL default '0.00',
  `amount` decimal(8,2) unsigned default '0.00',
  `consignee` varchar(40) NOT NULL default '',
  `areaid` smallint(5) unsigned NOT NULL default '0',
  `telephone` varchar(40) NOT NULL default '',
  `mobile` varchar(15) NOT NULL default '',
  `address` varchar(200) NOT NULL default '',
  `postcode` varchar(6) NOT NULL default '',
  `note` varchar(255) NOT NULL default '',
  `memo` varchar(255) NOT NULL default '',
  `userid` mediumint(8) unsigned NOT NULL default '0',
  `username` varchar(20) NOT NULL default '',
  `ip` varchar(15) NOT NULL default '',
  `time` int(10) unsigned NOT NULL default '0',
  `date` date NOT NULL default '0000-00-00',
  `status` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`orderid`),
  KEY `goodsid` (`goodsid`),
  KEY `userid` (`userid`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_order_deliver`;
CREATE TABLE `phpjsj_order_deliver` (
  `deliverid` int(10) unsigned NOT NULL auto_increment,
  `userid` mediumint(8) unsigned NOT NULL default '0',
  `username` char(20) NOT NULL default '',
  `consignee` char(40) NOT NULL default '',
  `areaid` smallint(5) unsigned NOT NULL default '0',
  `address` char(200) NOT NULL default '',
  `postcode` char(6) NOT NULL default '',
  `telephone` char(20) NOT NULL default '',
  `mobile` char(15) NOT NULL default '',
  PRIMARY KEY  (`deliverid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phpjsj_order_deliver` VALUES('9','2','88ctw','321dfsf','1','河北石家庄市','050000','0311-84898706','135888789');
INSERT INTO `phpjsj_order_deliver` VALUES('10','1','admin','sdf','1','河北省石家庄市大街35号','050000','0311-84898706','13588878912');

DROP TABLE IF EXISTS `phpjsj_order_log`;
CREATE TABLE `phpjsj_order_log` (
  `logid` int(10) unsigned NOT NULL auto_increment,
  `orderid` int(10) unsigned NOT NULL default '0',
  `laststatus` tinyint(1) unsigned NOT NULL default '0',
  `status` tinyint(1) unsigned NOT NULL default '0',
  `note` char(255) NOT NULL default '',
  `userid` mediumint(8) unsigned NOT NULL default '0',
  `username` char(20) NOT NULL default '',
  `ip` char(15) NOT NULL default '',
  `time` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`logid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_pay_card`;
CREATE TABLE `phpjsj_pay_card` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `userid` mediumint(8) unsigned NOT NULL default '0',
  `username` char(20) NOT NULL default '',
  `ptypeid` smallint(5) unsigned NOT NULL default '0',
  `cardid` char(25) NOT NULL default '',
  `inputerid` mediumint(8) unsigned NOT NULL default '0',
  `inputer` char(20) NOT NULL default '',
  `mtime` datetime NOT NULL default '0000-00-00 00:00:00',
  `regtime` datetime NOT NULL default '0000-00-00 00:00:00',
  `endtime` int(10) unsigned NOT NULL default '0',
  `regip` char(15) NOT NULL default '',
  `point` smallint(5) unsigned NOT NULL default '0',
  `amount` smallint(5) unsigned NOT NULL default '0',
  `status` tinyint(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `cardid` (`cardid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_pay_exchange`;
CREATE TABLE `phpjsj_pay_exchange` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `module` char(15) NOT NULL default '',
  `type` enum('amount','point') NOT NULL default 'amount',
  `number` decimal(8,2) NOT NULL default '0.00',
  `blance` decimal(8,2) unsigned NOT NULL default '0.00',
  `userid` mediumint(8) unsigned NOT NULL default '0',
  `username` char(20) NOT NULL default '',
  `inputid` mediumint(8) unsigned NOT NULL default '0',
  `inputer` char(20) NOT NULL default '',
  `ip` char(15) NOT NULL default '',
  `time` datetime NOT NULL default '0000-00-00 00:00:00',
  `note` char(100) NOT NULL default '',
  `authid` char(32) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `userid` (`userid`),
  KEY `inputid` (`inputid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_pay_payment`;
CREATE TABLE `phpjsj_pay_payment` (
  `pay_id` tinyint(3) unsigned NOT NULL auto_increment,
  `pay_code` varchar(20) NOT NULL default '',
  `pay_name` varchar(120) NOT NULL default '',
  `pay_desc` text NOT NULL,
  `pay_fee` varchar(10) NOT NULL default '',
  `config` text NOT NULL,
  `is_cod` tinyint(1) unsigned NOT NULL default '0',
  `is_online` tinyint(1) unsigned NOT NULL default '0',
  `pay_order` tinyint(3) NOT NULL default '0',
  `enabled` tinyint(1) NOT NULL default '0',
  `author` varchar(100) NOT NULL default '',
  `website` varchar(100) NOT NULL default '',
  `version` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`pay_id`),
  KEY `pay_code` (`pay_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phpjsj_pay_payment` VALUES('1','alipay','支付宝','支付宝，是支付宝公司针对网上交易而特别推出的安全付款服务，其运作的实质是以支付宝为信用中介，在买家确认收到','1','array (\n  \'alipay_account\' => \n  array (\n    \'name\' => \'支付宝帐户\',\n    \'type\' => \'text\',\n    \'value\' => \'支付宝账户@163.com\',\n  ),\n  \'alipay_key\' => \n  array (\n    \'name\' => \'交易安全校验码\',\n    \'type\' => \'text\',\n    \'value\' => \'sdfsdfsdfsdfsdf213s1d3f1sd3f\',\n  ),\n  \'alipay_partner\' => \n  array (\n    \'name\' => \'合作者身份ID\',\n    \'type\' => \'text\',\n    \'value\' => \'idididididididid\',\n  ),\n  \'service_type\' => \n  array (\n    \'name\' => \'支付接口类型\',\n    \'type\' => \'select\',\n    \'value\' => \'1\',\n    \'range\' => \n    array (\n      0 => \'纯担保交易接口\',\n      1 => \'标准实物双接口\',\n      2 => \'即时到账接口\',\n    ),\n  ),\n)','0','0','0','1','PHPWEB TEAM','','1.0.0');
INSERT INTO `phpjsj_pay_payment` VALUES('2','bank','银行汇款/转帐','银行名称\r\n收款人信息：全称 31212313231 ；\r\n帐号或地址 河北省 ；\r\n开户行 工商银行\r\n注意','1','','0','0','0','1','PHPWEB TEAM','','1.0.0');

DROP TABLE IF EXISTS `phpjsj_pay_pointcard_type`;
CREATE TABLE `phpjsj_pay_pointcard_type` (
  `ptypeid` tinyint(3) unsigned NOT NULL auto_increment,
  `name` char(20) NOT NULL default '',
  `point` smallint(5) unsigned NOT NULL default '0',
  `amount` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`ptypeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phpjsj_pay_pointcard_type` VALUES('1','金卡','10','100');
INSERT INTO `phpjsj_pay_pointcard_type` VALUES('2','银卡','10','80');

DROP TABLE IF EXISTS `phpjsj_pay_user_account`;
CREATE TABLE `phpjsj_pay_user_account` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `userid` mediumint(8) unsigned NOT NULL default '0',
  `username` varchar(20) NOT NULL default '',
  `email` varchar(40) NOT NULL default '',
  `contactname` varchar(50) NOT NULL default '',
  `telephone` varchar(20) NOT NULL default '',
  `sn` varchar(50) NOT NULL default '',
  `inputer` varchar(20) NOT NULL default '',
  `inputerid` mediumint(8) unsigned NOT NULL default '0',
  `amount` decimal(8,2) unsigned NOT NULL default '0.00',
  `quantity` decimal(8,2) unsigned NOT NULL default '0.00',
  `addtime` int(10) NOT NULL default '0',
  `paytime` int(10) NOT NULL default '0',
  `adminnote` varchar(255) NOT NULL default '',
  `usernote` varchar(255) NOT NULL default '',
  `type` tinyint(1) unsigned NOT NULL default '0',
  `payment` varchar(50) NOT NULL default '',
  `ip` varchar(15) NOT NULL default '',
  `ispay` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `userid` (`userid`),
  KEY `ispay` (`ispay`),
  KEY `inputer` (`inputer`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_position`;
CREATE TABLE `phpjsj_position` (
  `posid` smallint(5) unsigned NOT NULL auto_increment,
  `name` varchar(30) NOT NULL default '',
  `listorder` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`posid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phpjsj_position` VALUES('1','首页焦点','0');
INSERT INTO `phpjsj_position` VALUES('2','推荐','0');

DROP TABLE IF EXISTS `phpjsj_role`;
CREATE TABLE `phpjsj_role` (
  `roleid` smallint(5) unsigned NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `description` text NOT NULL,
  `ipaccess` text NOT NULL,
  `listorder` smallint(5) unsigned NOT NULL default '0',
  `disabled` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`roleid`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phpjsj_role` VALUES('1','超级管理员','超级管理员','','0','0');
INSERT INTO `phpjsj_role` VALUES('2','总编','拥有所有栏目和所有专题的所有权限，并且可以添加栏目和专题','','0','0');
INSERT INTO `phpjsj_role` VALUES('3','栏目编辑','拥有某些栏目的信息录入、审核及管理权限，需要进一步详细设置。','','0','0');
INSERT INTO `phpjsj_role` VALUES('4','设计师','拥有模板与标签管理权限','','0','0');
INSERT INTO `phpjsj_role` VALUES('5','财务人员','拥有订单查看、录入银行汇款、开发票等权限。','','0','0');

CREATE TABLE IF NOT EXISTS `phpjsj_session` (
  `sessionid` char(32) NOT NULL default '',
  `userid` mediumint(8) unsigned NOT NULL default '0',
  `ip` char(15) NOT NULL default '',
  `lastvisit` int(10) unsigned NOT NULL default '0',
  `groupid` tinyint(3) unsigned NOT NULL default '0',
  `module` char(15) NOT NULL default '',
  `catid` smallint(5) unsigned NOT NULL default '0',
  `contentid` mediumint(8) unsigned NOT NULL default '0',
  `data` char(255) NOT NULL default '',
  PRIMARY KEY  (`sessionid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_source`;
CREATE TABLE `phpjsj_source` (
  `sourceid` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `url` varchar(100) NOT NULL default '',
  `usetimes` varchar(100) NOT NULL default '',
  `listorder` varchar(100) NOT NULL default '',
  `updatetime` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`sourceid`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phpjsj_source` VALUES('3','asdasd','http://','','0','');

DROP TABLE IF EXISTS `phpjsj_tag`;
CREATE TABLE `phpjsj_tag` (
  `tagid` int(10) unsigned NOT NULL auto_increment,
  `tagname` varchar(100) NOT NULL default '',
  `introduce` varchar(100) NOT NULL default '',
  `tag` mediumtext NOT NULL,
  `sql` mediumtext NOT NULL,
  `modelid` smallint(8) unsigned NOT NULL default '0',
  `type` varchar(100) NOT NULL default '',
  `iscustom` tinyint(1) unsigned NOT NULL default '0',
  `module` varchar(100) NOT NULL default '',
  `page` varchar(100) NOT NULL default '',
  `number` int(10) unsigned NOT NULL default '0',
  `orderby` varchar(100) NOT NULL default '',
  `selectfields` mediumtext NOT NULL,
  `where` mediumtext NOT NULL,
  `tagcode` text NOT NULL,
  `listorder` smallint(6) unsigned NOT NULL default '0',
  PRIMARY KEY  (`tagid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `phpjsj_unit`;
CREATE TABLE `phpjsj_unit` (
  `unitid` int(10) unsigned NOT NULL auto_increment,
  `name` mediumtext NOT NULL,
  `listorder` smallint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`unitid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phpjsj_unit` VALUES('1','个|个\n个|个\n个|','0');

DROP TABLE IF EXISTS `phpjsj_urlrule`;
CREATE TABLE `phpjsj_urlrule` (
  `urlruleid` smallint(5) unsigned NOT NULL auto_increment,
  `module` varchar(15) NOT NULL default '',
  `file` varchar(20) NOT NULL default '',
  `ishtml` tinyint(1) unsigned NOT NULL default '0',
  `urlrule` varchar(255) NOT NULL default '',
  `example` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`urlruleid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phpjsj_urlrule` VALUES('1','phpsin','category','1','{$categorydir}/index.{$fileext}|{$categorydir}/{$page}.{$fileext}','it/product/2.html');
INSERT INTO `phpjsj_urlrule` VALUES('2','phpsin','category','1','category/{$catid}.{$fileext}|category/{$catid}_{$page}.{$fileext}','category/2_1.html');
INSERT INTO `phpjsj_urlrule` VALUES('3','phpsin','category','1','{$catdir}/index.{$fileext}|{$catdir}/{$page}.{$fileext}','news/2_1.html');
INSERT INTO `phpjsj_urlrule` VALUES('4','phpsin','category','0','list.php?catid={$catid}|list.php?catid={$catid}&page={$page}','list.php?catid=1&page=2');
INSERT INTO `phpjsj_urlrule` VALUES('5','phpsin','category','0','list.php?catid-{$catid}.html|list.php?catid-{$catid}/page-{$page}.html','list.php?catid-1/page-2.html');
INSERT INTO `phpjsj_urlrule` VALUES('6','phpsin','category','0','list-{$catid}-{$page}.html','list-1-2.html');
INSERT INTO `phpjsj_urlrule` VALUES('7','phpsin','show','1','{$year}/{$month}{$day}/{$contentid}.{$fileext}|{$year}/{$month}{$day}/{$contentid}_{$page}.{$fileext}','2006/1010/1_2.html');
INSERT INTO `phpjsj_urlrule` VALUES('8','phpsin','show','1','{$categorydir}/{$year}/{$month}{$day}/{$contentid}.{$fileext}|{$categorydir}/{$year}/{$month}{$day}/{$contentid}_{$page}.{$fileext}','it/product/2006/1010/1_2.html');
INSERT INTO `phpjsj_urlrule` VALUES('9','phpsin','show','1','show/{$contentid}.{$fileext}|show/{$contentid}_{$page}.{$fileext}','show/1_2.html');
INSERT INTO `phpjsj_urlrule` VALUES('10','phpsin','show','0','show.php?contentid={$contentid}|show.php?contentid={$contentid}&page={$page}','show.php?contentid=1&page=2');
INSERT INTO `phpjsj_urlrule` VALUES('11','phpsin','show','0','show.php?contentid-{$contentid}.html|show.php?contentid-{$contentid}/page-{$page}.html','show.php?contentid-1/page-2.html');
INSERT INTO `phpjsj_urlrule` VALUES('12','phpsin','show','0','show-{$contentid}-1.html|show-{$contentid}-{$page}.html','show-1-2.html');
INSERT INTO `phpjsj_urlrule` VALUES('25','ask','htmlshow','0','show-{$id}.html','show-1.html');
INSERT INTO `phpjsj_urlrule` VALUES('26','ask','htmlcategory','0','ask/list-{$catid}-{$action}-1.html|ask/list-{$catid}-{$action}-{$page}.html','list-16-solve-1.html');
INSERT INTO `phpjsj_urlrule` VALUES('27','ask','htmlshow','0','{$id}.html','1234.html');
INSERT INTO `phpjsj_urlrule` VALUES('28','ask','show','0','show.php?id={$id}','show.php?id=1');
INSERT INTO `phpjsj_urlrule` VALUES('29','ask','category','0','ask/list.php?catid={$catid}&action={$action}|ask/list.php?catid={$catid}&action={$action}&page={$page}','list.php?catid=1&action=solve');
INSERT INTO `phpjsj_urlrule` VALUES('13','special','type','1','{$typedir}/index.{$fileext}|{$typedir}/{$page}.{$fileext}','news/10.html');
INSERT INTO `phpjsj_urlrule` VALUES('14','special','type','1','{$typedir}.{$fileext}|{$typedir}_{$page}.{$fileext}','news_10.html');
INSERT INTO `phpjsj_urlrule` VALUES('15','special','type','1','{$typeid}.{$fileext}|{$typeid}_{$page}.{$fileext}','10_1.html');
INSERT INTO `phpjsj_urlrule` VALUES('16','special','type','0','list.php?typeid={$typeid}|list.php?typeid={$typeid}&page={$page}','list.php?typeid=10&page=1');
INSERT INTO `phpjsj_urlrule` VALUES('17','special','type','0','list.php?typeid-{typeid}.html|list.php?typeid-{typeid}/page-{$page}.html','list.php?typeid-10/page-1.html');
INSERT INTO `phpjsj_urlrule` VALUES('18','special','type','0','list-{$typeid}-{$page}.html','list-10-1.html');
INSERT INTO `phpjsj_urlrule` VALUES('19','special','show','1','{$typedir}/{$filename}.{$fileext}','news/beijing2008.html');
INSERT INTO `phpjsj_urlrule` VALUES('20','special','show','1','{$typedir}_{$filename}.{$fileext}','news_beijing2008.html');
INSERT INTO `phpjsj_urlrule` VALUES('21','special','show','1','{$filename}.{$fileext}','beijing2008.html');
INSERT INTO `phpjsj_urlrule` VALUES('22','special','show','0','show.php?specialid={$specialid}','show.php?specialid=1');
INSERT INTO `phpjsj_urlrule` VALUES('23','special','show','0','show.php?specialid-{$specialid}.html','show.php?specialid-1.html');
INSERT INTO `phpjsj_urlrule` VALUES('24','special','show','0','show-{$specialid}.html','show-1.html');
INSERT INTO `phpjsj_urlrule` VALUES('30','video','show','0','show.php?vid={$vid}|show.php?vid={$vid}&page={$page}','show.php?vid=1&page=2');
INSERT INTO `phpjsj_urlrule` VALUES('31','video','category','0','list.php?catid={$catid}|list.php?catid={$catid}&page={$page}','list.php?catid=1&page=2');
INSERT INTO `phpjsj_urlrule` VALUES('32','video','special','0','special.php?specialid={$specialid}|special.php?specialid={$specialid}&page={$page}','special.php?special=1');
INSERT INTO `phpjsj_urlrule` VALUES('33','video','specialpage','0','special.php','special.php?page=1');
INSERT INTO `phpjsj_urlrule` VALUES('34','video','specialshow','0','specialvideo-{$vid}-{$specialid}.html','show.php?vid=1&specialid=1');
INSERT INTO `phpjsj_urlrule` VALUES('35','video','special','0','specialid-{$specialid}-{$page}.html','specialid-1-1.html');
INSERT INTO `phpjsj_urlrule` VALUES('36','video','show','0','video-{$vid}.html','video-1.html');
INSERT INTO `phpjsj_urlrule` VALUES('37','video','category','0','video-list-{$catid}-{$page}.html','video-list-1-1.html');
INSERT INTO `phpjsj_urlrule` VALUES('38','video','specialshow','0','specialvideo-{$vid}-{$specialid}.html','specialvideo-1-1.html');
INSERT INTO `phpjsj_urlrule` VALUES('39','video','specialpage','0','specialid--{$page}.html','specialid--1.html');

DROP TABLE IF EXISTS `phpjsj_variable`;
CREATE TABLE `phpjsj_variable` (
  `varid` int(10) unsigned NOT NULL auto_increment,
  `type` tinyint(3) unsigned NOT NULL default '0',
  `varname` varchar(100) NOT NULL default '',
  `showvar` mediumtext NOT NULL,
  `showtag` mediumtext NOT NULL,
  `listorder` smallint(8) unsigned NOT NULL default '0',
  `updatetime` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`varid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `phpjsj_variable` VALUES('1','0','页面标题','{$head[\"title\"]}','','1','1330696216');
INSERT INTO `phpjsj_variable` VALUES('2','0','描述','{$head[\"description\"]}','','2','1330696224');
INSERT INTO `phpjsj_variable` VALUES('3','0','关键词','{$head[\"keywords\"]}','','3','1330696229');
INSERT INTO `phpjsj_variable` VALUES('4','0','当前位置','{catpos($catid)}','','0','1330696198');
INSERT INTO `phpjsj_variable` VALUES('5','0','版权','{$PHPSIN[\"copyright\"]}','','0','1330696204');
INSERT INTO `phpjsj_variable` VALUES('8','0','颜色标题','{output::style($value[\"title\"], $value[\"style\"])}','','0','1330691300');
INSERT INTO `phpjsj_variable` VALUES('9','0','网站域名','SITE_URL','','0','1333043464');
INSERT INTO `phpjsj_variable` VALUES('10','1','友情连接文字','','{get sql=\"SELECT * FROM `phpjsj_link` WHERE linktype=2 AND passed=1\" rows=\"20\" }\r\n<a href=\"{$r[url]}\" target=\"_blank\">{$r[name]}</a>\r\n{/get}','0','1345966074');
INSERT INTO `phpjsj_variable` VALUES('11','1','友情连接图片','','{get sql=\"SELECT * FROM `phpjsj_link` WHERE linktype=1 AND passed=1\" rows=\"20\" }\r\n<a href=\"{$r[url]}\" target=\"_blank\"><img src=\"{$r[logo]}\" /></a>\r\n{/get}','0','1345966085');
INSERT INTO `phpjsj_variable` VALUES('12','1','加入收藏','','<a onClick=\"window.external.AddFavorite(location.href,document.title)\" style=\"cursor:hand;\">加入收藏</a>','0','1345966222');
INSERT INTO `phpjsj_variable` VALUES('13','1','设为首页','','<a  style=\"cursor:hand\" onclick=this.style.behavior=\"url(#default#homepage)\";this.setHomePage(\"{$PHPSIN[\"siteurl\"]}\");>设为首页</a>\r\n','0','1345966244');
INSERT INTO `phpjsj_variable` VALUES('14','1','焦点','','{get sql=\"SELECT * FROM `phpjsj_focus` WHERE passed=1\" rows=\"20\" }\r\n{if $r[elite]==1}<a href=\"{$r[url]}\" target=\"_blank\"><img src=\"{$r[thumb]}\"></a>{else $r[elite]==2}<a href=\"{$r[url]}\" target=\"_blank\"><img src=\"{$r[thumb]}\"></a>{/if}\r\n{/get}','0','1345989554');
INSERT INTO `phpjsj_variable` VALUES('15','1','浏览次数','','<span id=\"hits\">0</span>\r\n<script language=\"JavaScript\" src=\"count.php?contentid={$contentid}\"></script>','0','1350998770');

