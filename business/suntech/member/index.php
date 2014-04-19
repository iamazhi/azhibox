<?php
require "../include/common.inc.php";
if(!$_userid) message('请登陆', $MODULE['member']['url'].'../member/login.php?forward='.urlencode(URL));
require CLASS_PATH."all.class.php";
$a=new all();
$forward = HTTP_REFERER;
			
$head['title'] = "会员中心".'_'.$PHPSIN['meta_title'];
$head['keywords'] = $PHPSIN['meta_keywords'];
$head['description'] = $PHPSIN['meta_description'];
$head['icpno'] = $PHPSIN['icpno'];
$head['copyright'] = $PHPSIN['copyright'];


	
switch($template)
{

	default :
	include template('member',"index");
	break;
	}

?>
