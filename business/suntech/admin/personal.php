<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
$a=new all();
switch($action)
{
	case 'edit':
	  if($dosubmit)
	  {
		  $a->edit($table="member_detail",$info,$where="userid",$_userid);
		  $a->edit($table="member",$infos,$where="userid",$_userid);
		  showmessage('操作成功！',$forward);
		  }
		  else
		  {
			  $area=$a->listtable($table="area",$where,$order='');
			  $info=$a->get($table="member a,".DB_PRE."member_detail b",$where="a.userid='$_userid' AND b.userid='$_userid'");
		      include tpl("personal_edit");
			  }
		break;
		
		case 'editpwd':
		if($dosubmit)
		{
			if($a->get($table="member",$where="password='".md5(PASSWORD_KEY.$old_password)."'"))
			{
			$db->query("UPDATE ".DB_PRE."member SET password='".md5(PASSWORD_KEY.$chk_password)."' WHERE userid='$_userid'");
                        $db->query("UPDATE ".DB_PRE."member_cache SET password='".md5(PASSWORD_KEY.$chk_password)."' WHERE userid='$_userid'");
			showmessage('操作成功！',$forward);
			}
			else
			{
				showmessage('原始密码不正确！',$forward);
				}
			}
			else
			{
				include tpl('personal_editpwd');
				}
		break;
		
	
	}
?>