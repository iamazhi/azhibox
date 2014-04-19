<?php
function set_config($config)
{
	if(!is_array($config)) return FALSE;
	$configfile = 'include/config.inc.php';
	if(!is_writable($configfile)) showmessage('Please chmod ./include/config.inc.php to 0777 !');
	$pattern = $replacement = array();
	foreach($config as $k=>$v)
	{
		$pattern[$k] = "/define\(\s*['\"]".strtoupper($k)."['\"]\s*,\s*([']?)[^']*([']?)\s*\)/is";
        $replacement[$k] = "define('".$k."', \${1}".$v."\${2})";
	}
	$str = file_get_contents($configfile);
	$str = preg_replace($pattern, $replacement, $str);
	return file_put_contents($configfile, $str);
}

function tpl($file = 'index')  
 {
    return PHP_ROOT.'admin/templates/'.$file.'.tpl.php';  
 }
 
function module_setting($module, $setting)
{
	global $db,$MODULE;
	if(!is_array($setting) || !array_key_exists($module, $MODULE)) return FALSE;
	if(isset($setting['url']))
	{
		$url = $setting['url'];
		if($setting['url'] && substr($url, -1) != '/')
		{
			$url .= '/';
		}
        $db->query("UPDATE ".DB_PRE."module SET url='$url' WHERE module='$module'");
		unset($setting['url']);
	}
	$setting = new_stripslashes($setting);
	$setting = addslashes(var_export($setting, TRUE));
    $db->query("UPDATE ".DB_PRE."module SET setting='$setting' WHERE module='$module'");
	cache_module();
	cache_common();
	return TRUE;
}

function filter_write($filter_word)
{
	$filter_word = array_map('trim', explode("\n", str_replace('*', '.*', $filter_word)));
    return cache_write('filter_word.php', $filter_word);
}

function tag_types()
{
	global $db, $MODULE;
	foreach($MODULE as $mod)
	{
		$r = $db->get_one("SELECT `tagtypes` FROM `".DB_PRE."module` WHERE module='$mod[module]'");
		if(!empty($r['tagtypes']))
		{
			$tag = $r['tagtypes'];
			eval("\$tag=$tag;");
			$tagtypes = empty($tagtypes) ? $tag : array_merge($tagtypes, $tag);;
		}
	}
	return $tagtypes;
}

function admin_menu($menuname, $submenu = array())
{
	global $mod,$file,$action;
    $menu = $s = '';echo $flag;
    foreach($submenu as $m)
	{
		$B1 = $B2 = '';	
		if($m[3] && $m[4] && $m[3]==$m[4]) 
		{
			$B1 = '<b>';
			$B2 = '</b>';
		}
		$title = isset($m[2]) ? "title='".$m[2]."'" : "";
		$menu .= $s."<a href='".$m[1]."' ".$title.">".$B1.$m[0].$B2."</a>";
        $s = ' | ';
	}
	return include PHP_ROOT.'admin/templates/admin_menu.tpl.php';
}

?>