<?php
require("../include/common.inc.php");
if(!$forward) $forward = HTTP_REFERER;
		set_cookie('auth', '');
		set_cookie('username', '');
		unset($_SESSION);
if((!isset($action)) && $action = '')
{
message("退出会员中心！","member/login.php");
}
if($action == 'ajax')
{
	echo 1;
	exit;
}
if(!$forward) $forward = SITE_URL;

		message("退出会员中心！",$forward);
?>
