<?php
defined('IN_PHPJSJ') or exit('Access Denied');
$a=new all();
$role=$a->listtable($table="role",$where,$order);

switch($action)
{
	case 'add':
	if($dosubmit)
	{
		$u=$a->get($table="member",$where="username='$_POST[username]'");
                if (!$u) showmessage('账号不存在！',$forward);
		foreach($roleids as $k=>$r)
		{
			$db->query("INSERT INTO ".DB_PRE."admin_role (userid,roleid)VALUES('$u[userid]','$r')");
			}
		$db->query("INSERT INTO ".DB_PRE."admin (userid,username,disabled)VALUES('$u[userid]','$u[username]','$disabled')");
		showmessage('操作成功', $forward);
		}
		else
		{
	        include tpl("admin_add");
			}
	break;
	
	case 'edit':
	if($dosubmit)
	{
	  $db->query("DELETE FROM ".DB_PRE."admin_role WHERE userid='$userid'");
	  foreach($roleids as $k=>$r)
		{
			$db->query("INSERT INTO ".DB_PRE."admin_role (userid,roleid)VALUES('$_GET[userid]','$r')");
			}
		$db->query("UPDATE ".DB_PRE."admin SET disabled='$disabled' WHERE userid='$_GET[userid]'");
		showmessage('操作成功', "?file=admin&action=manage");
		}
		else
		{
		$info=$a->get($table="admin",$where="userid='$userid'");
	        $ros=$a->listtable($table="admin_role",$where="userid='$userid'");
	        include tpl("admin_edit");
			}
	break;
	
	case 'manage':
	if($roleid)
	{
		$db_pre=",".DB_PRE."admin_role c";
		$er="AND b.userid=c.userid AND c.roleid='$roleid'";
		}
	$info=$a->listinfo($table="admin a,".DB_PRE."member_info b $db_pre",$where="a.userid=b.userid $er",$order='a.userid',$page,20);
	$ros=$a->listtable($table="admin_role",$wheres,$orders);
	include tpl("admin_manage");
	break;
	
	case 'disabled':
	$db->query("UPDATE ".DB_PRE."admin SET disabled='$_GET[disabled]' WHERE userid='$_GET[userid]'");
	showmessage('操作成功', $forward);
	break;
	
	case 'delete':
	$db->query("DELETE FROM ".DB_PRE."admin WHERE userid='$userid'");
	$db->query("DELETE FROM ".DB_PRE."admin_role WHERE userid='$userid'");
	showmessage('操作成功', "?file=admin&action=manage");
	break;
	
	case 'checkuser':
    if(!$a->admin_is($value))
     {
	   exit($a->msg());
	   }
	   else
		{
			exit('success');
		}
  break;
	}
?>