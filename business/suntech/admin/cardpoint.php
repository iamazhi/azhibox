<?php
defined('IN_PHPJSJ') or exit('Access Denied');

$a=new all();

switch($action)
{
	case 'add':
	if($dosubmit)
	{
		$a->add($table="pay_pointcard_type",$info);
		showmessage('操作成功！', $forward);
		}
		else
		{
			include tpl("cardpoint_add");
			}
	break;
	
	case 'edit':
	if($dosubmit)
	{
		$a->edit($table="pay_pointcard_type",$info,$where="ptypeid",$ptypeid);
		showmessage('操作成功！', $forward);
		}
		else
		{
			$info=$a->get($table="pay_pointcard_type",$where="ptypeid='$ptypeid'");
			include tpl("cardpoint_edit");
			}
	break;
	
	case 'manage':
	$info=$a->listtable($table="pay_pointcard_type",$where,$order);
	include tpl("cardpoint_manage");
	break;
	
	case 'delete':
	  $a->delete($table="pay_pointcard_type",$where="ptypeid",$ptypeid);
	  showmessage('操作成功！', $forward);
	break;
	}
?>