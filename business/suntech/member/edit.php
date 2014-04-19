<?php
require("../include/common.inc.php");
if(!$_userid) message('ÇëµÇÂ½', $MODULE['member']['url'].'../member/login.php?forward='.urlencode(URL));
if(!$forward) $forward = HTTP_REFERER;
require CLASS_PATH."all.class.php";

$a=new all();


$tablename = DB_PRE.'member_'.$MODEL[$_modelid]['tablename'];

//echo $MODEL['$_modelid']['tablename'];


if(!class_exists('member_form'))
{
	require CACHE_MODEL_PATH.'member_form.class.php';
}
$member_form = new member_form($_modelid);

if(!class_exists('member_input'))
{
	require CACHE_MODEL_PATH.'member_input.class.php';
}
$member_input = new member_input($_modelid);


if(!class_exists('member_update'))
{
	require CACHE_MODEL_PATH.'member_update.class.php';
}
$member_update = new member_update($_modelid, $_userid);



$userid = empty($userid) ? $_userid : intval($userid);
if($dosubmit)
{
	
$memberinfo=$info;	
$inputinfo = $member_input->get($info);

	if(isset($info) && is_array($info))
	{
		$member_fields = array('username', 'email', 'message', 'areaid');
		$member_info_fields = array('question','answer','avatar', 'actortype');
		
		foreach ($memberinfo as $k=>$value)
		{
			if (in_array($k, $member_fields))
			{
				$info[$k] = $value;
			}
			elseif(in_array($k, $member_info_fields))
			{
				$moreinfo[$k] = $value;
			}
		}
		unset($memberinfo);
		
		//	$db->update(DB_PRE."member", $info, "userid='$userid'");
		//	$db->update(DB_PRE."member_cache", $info, "userid='$userid'");
	   }
	   
if(is_array($moreinfo))
		{
		//	$db->update(DB_PRE."member_info", $moreinfo, "userid='$userid'");
		}
		
		
$modelinfo = $inputinfo['model'];
	if($modelinfo)
	{
		$modelinfo['userid'] = $_userid;
		$member_update->update($modelinfo);
		$r = $a->get("member a,".DB_PRE."member_info b","a.userid=b.userid AND a.userid='$userid'");
		$tablename = DB_PRE.'member_'.$MODEL[$r["modelid"]]['tablename'];
		echo $tablename.$r["modelid"];
		$db->update($tablename, $modelinfo);
	}

/*
$member_fields = array('username', 'email', 'groupid', 'amount', 'message', 'point', 'areaid', 'modelid');
$member_info_fields = $db->get_fields(DB_PRE."member_info");
foreach ($memberinfo as $k=>$value)
		{
			if (in_array($k, $member_fields))
			{
				$info[$k] = $value;
			}
			elseif(in_array($k, $member_info_fields))
			{
				$moreinfo[$k] = $value;
			}
		}
		$member_update->update($modelinfo);
if(is_array($moreinfo))
{
$db->update(DB_PRE."member_info", $moreinfo, "userid='$_userid'");
}
*/
message("²Ù×÷³É¹¦!",$forward);
}
else
{

$r = $a->get("model a","a.workflowid=2");
$data = $a->get("member a,".DB_PRE."member_info b","a.userid=b.userid AND a.userid='$_userid'");
extract($data);


if($modelid)
		{
			$modelid = intval($modelid);
		}
		else
		{
			$model_info = $db->get_one("SELECT modelid FROM ".DB_PRE."member_cache WHERE userid='$userid'");
			$modelid = $model_info['modelid'];
		}
		//if($modelid < 1) return false;
		$modelfields = cache_read($modelid.'_fields.inc.php', CACHE_MODEL_PATH);
		$tablename = DB_PRE.'member_'.$MODEL[$modelid]['tablename'];
		//if(empty($tablename)) return false;
		
		$datas = $db->get_one("SELECT * FROM $tablename WHERE userid='$userid'");
		$info = array();
		foreach($modelfields as $key=>$value)
		{
			$info[$key] = $datas[$key];
		}
		$forminfos=$member_form->get($info);
		

include template('member','useredit');
}
?>