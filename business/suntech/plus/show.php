<?php

require CLASS_PATH.'content.class.php';
require_once CACHE_MODEL_PATH.'content_output.class.php';
$contentid = isset($contentid) ? intval($contentid) : 0;
if($contentid <= 0) message('参数错误！');

$c=new content();
$data = $c->get($contentid);

$out = new content_output();
extract($data);
$C = cache_read('category_'.$catid.'.php');
$t=$db->get_one("SELECT * FROM ".DB_PRE."category where catid='$catid'");

$head['title'] = $title.'_'.$t['title'].'-'.$PHPSIN['sitename'];
$head['keywords'] = $keywords;
$head['description'] = $description;
$head['icpno'] = $PHPSIN['icpno'];
$head['copyright'] = $PHPSIN['copyright'];
$location=$CATEGORY[$catid]['arrparentid'] ?  $CATEGORY[$catid][$t['arrparentid']] : $t["name"];

if(!$template) $template = $C['template_show'];

if($video)
 {
  /** $value = str_replace(array('&amp;', '&quot;', '&#039;', '&lt;', '&gt;'),array('&', '"', "'", '<', '>') ,$video);
   eval("\$value = $value;");
   $playid = $value['player'];
   @extract($value);
      $value['str_video'] = str_replace(';', "n", $value);
      $strvideo=explode('|',$str_video);**/
	  $value = str_replace(array('&amp;', '&quot;', '&#039;', '&lt;', '&gt;'),array('&', '"', "'", '<', '>') ,$video);
			eval("\$value = $value;");
			$playid = $value['player'];
			@extract($value);
			$value['str_video'] = str_replace(';', "\n", $value["str_video"]);
			$strvideo=explode("|",$value['str_video']);
			$video="<a href=play.php?video=".$value["server"].$strvideo[1].">".$strvideo[0]."</a>";
			//echo $strvideo[0];
	//  echo $strvideo[0];


  }


$pre = $db->get_one("SELECT title,url FROM `".DB_PRE."content` WHERE `contentid`<$contentid and `catid`='$catid' order by contentid desc limit 0,1");
if(empty($pre)) {
$pre['title']='没有了';
$pre['url']='';
}

$next = $db->get_one("SELECT title,url FROM `".DB_PRE."content` WHERE `contentid`>$contentid and `catid`='$catid' order by contentid asc limit 0,1");
if(empty($next)) {
$next['title']='没有了';
$next['url']='';
}


include template('phpsin',$template);

?>
