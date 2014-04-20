<?php 
if($catid!="") $C=$db->get_one("SELECT * FROM ".DB_PRE."category where catid='$catid'");
$head['title'] = $C["title"].'_'.$PHPSIN['sitename'];
$head['keywords'] = $C["keywords"];
$head['description'] = $C["description"];
$head['icpno'] = $PHPSIN['icpno'];
$head['copyright'] = $PHPSIN['copyright'];

$D = cache_read('category_'.$catid.'.php');
extract($D);

if($type == 0)
{
	$page = max(intval($page), 1);
	if($child == 1)
	{
		$arrchildid = subcat('phpsin',$catid);
		$template = $template_category;
	}
	else
	{
		$template = $template_list;
	}
}
elseif($type == 1)
{
require CLASS_PATH.'content.class.php';
$c=new content();
$data = $c->get($contentid);
extract($data);
	}
elseif($type == 2)
{
	header('location:'.$url);
}
include template('phpsin',$template);
?>