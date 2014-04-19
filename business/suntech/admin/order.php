<?php
defined('IN_PHPJSJ') or exit('Access Denied');

$status=require PHP_ROOT."data/order/status.inc.php";
$a=new all();
switch($action)
{
	case'manage':
	if(isset($_GET["status"]))
	{
		$where="status='$_GET[status]'";
		}
	if($minamount) $where .= "AND `amount`>='$minamount' ";
	if($maxamount) $where .= "AND `amount`<='$maxamount' ";
	if($startdate) $where .= "AND `date`>='$startdate' ";
	if($enddate) $where .= "AND `date`<='$enddate' ";
	if($q)
	    {
			if($field == 'orderid') $where .= "AND `$field`='$q' ";
			elseif($field == 'userid') $where .= "AND `$field`='$q' ";
			elseif($field == 'username') $where .= "AND `userid`='$q' ";
			elseif($field == 'goodsname') $where .= "AND `$field` LIKE '%$q%' ";
		}
	if(!isset($orderby)) $orderby = '`orderid` DESC';
	$info=$a->listinfo($table='order', $where, $orderby,$page,20);
	include tpl("order_manage");
	break;
	
	case 'status':
	//log
		$infos["orderid"]=$orderid;
		$infos["laststatus"]=1;
		$infos["status"]=2;
		$infos["note"]="确认发货";
		$infos["userid"]=$user_id;
		$infos["username"]=$username;
		$infos["ip"]=IP;
		$infos["time"]=TIME;
		$a->add($table="order_log",$infos);
		
	$db->query("UPDATE ".DB_PRE."order SET status='$_GET[status]' WHERE orderid='$orderid'");
	showmessage('操作成功！', $forward);
	break;
	
	case 'edit':
	if($dosubmit)
	{
		$a->edit($table="order",$info,$where="orderid",$orderid);
		showmessage('操作成功！', $forward);
		}
		else
		{
			$info=$a->get($table="order",$where="orderid='$orderid'");
	        include tpl("order_edit");
			}
	break;
	
	case 'view':
	$info=$a->get($table="order",$where="orderid='$orderid'");
	$infos=$a->listtable($table="order_log",$where="orderid='$orderid'");
	$user=$a->get($table="member",$where="userid='$info[userid]'");
	
	include tpl("order_view");
	break;
	
	case 'delete':
	  $a->delete($table="order",$where="orderid",$orderid);
	  showmessage('操作成功！', $forward);
	break;
	}
?>