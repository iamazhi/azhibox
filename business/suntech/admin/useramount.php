<?php
defined('IN_PHPJSJ') or exit('Access Denied');
$a=new all();

switch($action)
{
	case'manage':
	$payment=$a->listtable($table="pay_payment", $wheres='enabled!=1', $order);
	
	$where="type='0'";
	if($_GET["username"])     $where .=" and username like '%$_GET[username]%'";
	if($beginadddate) $where .=" and `addtime` >= '$beginadddate' ";
	if($endadddate)   $where .=" and `addtime` <= '$endadddate' " ;
	if($inputer)      $where .=" and  inputer like '%$_GET[inputer]%'";
	if($begindate)    $where .=" and `paytime` >= '$begindate' ";
	if($enddate)      $where .=" and `paytime` <= '$enddate' " ;
	if($payname)      $where .=" and  payment like '%$payname%'";
	if($ispay)        $where .=" and ispay='$ispay'";
	
	$info=$a->listinfo($table="pay_user_account", $where, $order="addtime",$page, 20);
	include tpl("pay_useramount_manage");
	break;
	
	
	
	case 'check':
	if($confirms)
	{
		$r=$a->get($table="pay_user_account", $where="id='$id'");
		$infos['inputer']=$username;
	    $infos['inputerid']=$user_id;
	    $infos['paytime']=TIME;

		$a->edit($table="pay_user_account",$infos,$where="id",$id);
		$db->query("UPDATE ".DB_PRE."member SET amount = amount+".$r["amount"]." WHERE username='".$r["username"]."'");
		showmessage("操作成功！","?file=useramount&action=manage"); 
		}
		else
		{
			$info=$a->get($table="pay_user_account",$where="id='$id'");
	        include tpl("pay_useramount_check");
			}
	break;
	
	case 'view':
	$info=$a->get($table="pay_user_account",$where="id='$id'");
	include tpl("pay_useramount_view");
	break;
	
	case'delete':
	   $a->delete($table="pay_user_account",$where="id",$ids);
	   showmessage('操作成功！', $forward);
	break;
	}
?>