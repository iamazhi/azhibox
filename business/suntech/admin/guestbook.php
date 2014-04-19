<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require CLASS_PATH."guestbook.class.php";
$g = new guestbook;

$pagesize  = $M['pagesize'] && $M['pagesize']<500 ? $M['pagesize'] : 20 ;
$page      = $page ? $page : 1;
$action    = $action ? $action : 'manage';
$keyword   = $keyword ? $keyword : '';
$passed    = isset($passed) ? $passed : 1;
$ip		   = isset($ip) ? $condition = " and ip='$ip' " : '';
$srchtype  = $srchtype ? $srchtype : 0;
$condition .= " and passed='$passed' ";

if($keyword)
{
	$keyword=str_replace(' ','%',$keyword);
	$keyword=str_replace('*','%',$keyword);
	switch($srchtype)
	{
		case '0':
			$condition .=" AND title like '%$keyword%' ";
			break;
		case '1':
			$condition .=" AND content like '%$keyword%' ";
			break;
		case '2':
			$condition .=" AND username like '%$keyword%' ";
			break;
		default :
			$condition .=" AND title like '%$keyword%' ";
	}
}

switch($action)
{	
	case 'manage':
		$guestbooks = $g->listinfo($condition,$page,$pagesize);
		include tpl('guestbook_manage');
	break;

	case 'delete':
		if(empty($gid)) showmessage($LANG['illegal_parameters'],$forward);
		if($g->delete($gid)) 
		{	
			showmessage($LANG['operation_success'],"?mod=$mod&file=$file&action=manage");
		}
	break;

	case 'pass':
		if(empty($gid)) showmessage($LANG['illegal_parameters'],$forward);
		if($g->pass($gid,$passed)) 
		{
			showmessage($LANG['operation_success'],"?file=$file&action=manage&passed=$passed");
		}
	break;

	case 'reply':
		if(isset($submit))	
		{
			if($g->reply($gid,$reply,$passed,$hidden,$username)) 
			{	
				showmessage($LANG['operation_success'],"?mod=$mod&file=$file&action=manage");
			}
		}
		else
		{
			$guestbook = $g->getone($gid);
			include tpl('guestbook_reply');
		}
	break;
	
	case 'setting':
	  if($dosubmit)
      {
	   module_setting('guestbook', $setting);
	   showmessage('231',"?file=guestbook&action=manage");
      }
       else
        {	
		 $d=require PHP_ROOT."data/cache/module_guestbook.php";
	     @extract(new_htmlspecialchars($d));	
          include tpl('guestbook_setting');
        }
	break;

}
?>