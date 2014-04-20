<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require CLASS_PATH."position.class.php";
$pos = new position();
switch($action)
{
	case'add':
	if($dosubmit)
	{
		$posid = $pos->add('position',$info);
		$posid = $db->insert_id($posid);
		if($posid)
		{
			$priv_role->update('posid', $posid, $roleids);
			showmessage('操作成功！', '?file=position&action=manage');
			}
		}
		else
		{
		   $info=$pos->listtable('role');
		   include tpl("position_add");
			}
	break;
	
	case'edit':
	if($dosubmit)
	{
		    $result = $pos->edit('position', $info ,$where='posid',$posid);
			if($result)
			{
				$priv_role->update('posid', $posid, $roleids);
				showmessage('操作成功！', $forward);
			}
		}
		else
		{
			$roles=$pos->listtable('admin_role_priv',$where="value='$posid'");
			$infos=$pos->listtable('role');
			$info=$pos->get('position',$where="posid='$posid'");
			include tpl("position_edit");
			}
	break;
	
	case'manage':
	$info=$pos->listinfo('position',$where,'listorder',$page,20);
	include tpl("position_manage");
	break;
	
	 case 'listorder':
		$pos->listorder($table='position',$listorders,$where='posid');
	    showmessage('操作成功！', $forward);
        break;
		
		
	 case 'delete':
		$result = $pos->delete($table="position","posid",$posid);
		$pos->delete($table="admin_role_priv","value",$posid);
		if($result)
		{
			showmessage('操作成功！', "?file=position&action=manage");
		}
		else
		{
			showmessage('操作失败！');
		}
		break;
	}
?>