<?php
defined('IN_PHPJSJ') or exit('Access Denied');
$a=new all();
  
switch($action)
{
  
	case 'group_add':
	if($dosubmit)
	 {
		 $a->add($table='member_group',$info);
	     showmessage('操作成功！', $forward);
		 }
		 else
		 {
	     include tpl("member_group_add");
		 }
	break;
	
	case 'group_edit':
	if($dosubmit)
	 {
		  $a->edit($table="member_group",$info,$where="groupid",$groupid);
	      showmessage('操作成功！', $forward);
		 }
	 else
	 {
	 $info=$a->get($table='member_group',$where="groupid=$groupid");
	 include tpl("member_group_edit");
	 }
	break;
	
	case 'group_manage':
	$info=$a->listtable($table="member_group", $where = '', $order = '');
	include tpl("member_group_manage");
	break;
	
	case 'group_listorder':
	 $a->listorder($table='member_group',$listorders,$where='groupid');
	 showmessage('操作成功！', $forward);
	break;
	
	case 'group_delete':
	  $in=$a->delete($table="member_group","groupid",$groupid);
	  if($in){showmessage('操作成功！', $forward);}
	 break;
	 
	 case'group_disabled':
	 $db->query("UPDATE ".DB_PRE."member_group SET disabled = '$disabled' WHERE groupid='$groupid'");
	 showmessage('操作成功！', $forward);
	 break;
	 
	 
	 default:
	 break;
	}
?>