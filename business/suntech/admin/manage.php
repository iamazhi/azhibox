<?php
defined('IN_PHPJSJ') or exit('Access Denied');
$a = new all();
//╣╪╨╫
$query=$db->query("select * from ".DB_PRE."menu where pid='0' AND disabled=0 order by menuid");
while($row=$db->fetch_array($query))
{
	$array[]=(array("menuid"=>$row["menuid"],"pid"=>$row["pid"],"name"=>$row["name"]));
	}
//йВпн
$menu=$db->query("select * from ".DB_PRE."menu where pid!='0' AND disabled=0 order by menuid,listorder");
while($row=$db->fetch_array($menu))
{
	$menus[]=(array("menuid"=>$row["menuid"],"pid"=>$row["pid"],"name"=>$row["name"],"url"=>$row["url"],"title"=>$row["title"],"target_line"=>$row["target_line"],"target"=>$row["icon"],"iconOpen"=>$row["iconOpen"],"suffix"=>$suffix));
	}
$info=$a->listtable("category");
include tpl("index");
?>