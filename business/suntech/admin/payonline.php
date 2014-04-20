<?php
defined('IN_PHPJSJ') or exit('Access Denied');

$a=new all();

switch($action)
{
	case'manage':
	$payment=$a->listtable($table="pay_payment", $wheres='enabled!=0', $order);
	
	$where="type='1'";
	if($_GET["username"])     $where .=" and username like '%$_GET[username]%'";
	if($beginadddate) $where .=" and `addtime` >= '$beginadddate' ";
	if($endadddate)   $where .=" and `addtime` <= '$endadddate' " ;
	if($inputer)      $where .=" and  inputer like '%$_GET[inputer]%'";
	if($begindate)    $where .=" and `paytime` >= '$begindate' ";
	if($enddate)      $where .=" and `paytime` <= '$enddate' " ;
	if($payname)      $where .=" and  payment like '%$payname%'";
	if($ispay)        $where .=" and ispay='$ispay'";
	
	$info=$a->listinfo($table="pay_user_account", $where, $order="addtime",$page, 20);
	include tpl("pay_payonline_manage");
	break;
	
	case 'ispayid':
	$r=$a->get($table="pay_user_account", $where="id='$id'");
	$infos['inputer']=$username;
	$infos['inputerid']=$user_id;
	$infos['paytime']=TIME;
	$infos['ispay']=1;
	
	$a->edit($table="pay_user_account",$infos,$where="id",$id);
	$db->query("UPDATE ".DB_PRE."member SET amount = amount+".$r["quantity"]." WHERE username='".$r["username"]."'");
	
	$add['module']="pay";
	$add['type']="amount";
	$add['number']=$r["amount"];
	
	$m=$a->get($table="member",$where="userid='".$r["userid"]."'");
	
	$add['blance']=$m["amount"];
	$add['userid']=$m['userid'];
	$add['username']=$m['username'];
	$add['inputid']=$user_id;
	$add['inputer']=$username;
	$add['ip']=IP;
	$add['time']=date("Y-m-d H:i:s");
	$add['note']="用户充值";
	
	$a->add($table="pay_exchange",$add);
	
	showmessage("操作成功！","?file=payonline&action=manage"); 
	break;
	
	case'delete':
	   $a->delete($table="pay_user_account",$where="id",$ids);
	   showmessage('操作成功！', $forward);
	break;
	}
?>