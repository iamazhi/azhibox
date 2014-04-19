<?php
defined('IN_PHPJSJ') or exit('Access Denied');

switch($action)
{
	case 'save':
	if($button)
	{
		//cache_write('common.php', $info,PHP_ROOT."data/cache/");
		filter_write($setting['filter_word']);
		module_setting($mod, $setting);
		set_config($setconfig);
	
	    showmessage('ÍøÕ¾ÅäÖÃ±£´æ³É¹¦£¡',$forward);
		}
		
	break;
	
	case 'update':
	break;
	
	default :
	
	     @extract(new_htmlspecialchars($PHPSIN));
	 	include tpl("setting_manage");	
	break;
}
?>