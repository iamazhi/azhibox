<?php
defined('IN_PHPJSJ') or exit('Access Denied');
$a = new all();
switch($action)
{
	case'add':
	if($dosubmit)
	{
		$info["updatetime"]=TIME;
		$a->add("variable",$info);
		showmessage('操作成功！', "?file=$file&action=manage");
		}
		else
		{
			include tpl("variable_add");
			}
	break;
	
	case 'edit':
	if($dosubmit)
	{
		$info["updatetime"]=TIME;
		$a->edit("variable",$info,"varid",$varid);
		showmessage('操作成功！', "?file=$file&action=manage");
		}
		else
		{
			$info=$a->get("variable","varid='$varid'");
			include tpl("variable_edit");
			}
	break;
	
	case'manage':
	if($type) $where="type=".$type."";
	$info=$a->listtable("variable",$where,"listorder,varid");
	include tpl("variable_manage");
	break;
	
	case'listorder':
	    $result = $a->listorder("variable",$listorders,"varid");
		if($result)
		{
			showmessage('操作成功！', $forward);
		}
		else
		{
			showmessage('操作失败！');
		}
	break;
	
	case'varname':
	if(!$a->get("variable","varname='$value'"))
	{
	 exit('success');
	  }
	else
	{
	   exit("变量名称已存在，请修改其他变量名");
		}
	
	break;
	
	case 'delete':
	$result = $a->delete("variable","varid",$ids);
	if($result)  showmessage('操作成功！', "?file=$file&action=manage");  else showmessage('操作失败！');
	break;
	}
?>