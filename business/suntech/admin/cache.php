<?php
defined('IN_PHPJSJ') or exit('Access Denied');


	$data = array();
	$result = $db->query("SELECT * FROM ".DB_PRE."model_field WHERE modelid=1 AND field!='editor' AND formtype!='author' AND formtype!='copyfrom' AND disabled=0 ");
while($r=$db->fetch_array($result))
{
	if($r['setting'])
		{
			$setting = $r['setting'];
			eval("\$setting = $setting;"); 
			unset($r['setting']);
			if(is_array($setting)) $r = array_merge($r, $setting);
         }
		 
	$data[$r['formtype']]=$r;
		
	}

	cache_write('common_fields.inc.php', $data, PHP_ROOT.'data/cache_model/');
	$db->free_result($result);

showmessage("缓存更新完成!");



$data = array();
$result = $db->query("SELECT * FROM ".DB_PRE."model");
while($r=$db->fetch_array($result))
{
	    $data[]=$r;
		
	}
	foreach($data as $v)
	{
		$data = array();
		$result = $db->query("SELECT * FROM ".DB_PRE."model_field where modelid='$v[modelid]'");
        while($r=$db->fetch_array($result))
		 {
			
			if($r['setting'])
			{
				eval("\$setting = $r[setting];");
				$r = array_merge($r, $setting);
				unset($r['setting'], $setting);
			}
			$data[$r['field']]=$r;
		   cache_write($v['modelid'].'_fields.inc.php', $data, PHP_ROOT.'data/cache_model/');
		   }
		}
	$db->free_result($result);

cache_category();
?>