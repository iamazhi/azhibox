<?php
require CLASS_PATH."exchange.class.php";
$a=new exchange();
switch($action)
{
	case'add':
	if($dosubmit)
	{
		$row=$a->get($table='member',$where="username='".$info["username"]."'");
		if($row)
		{
			
			if($typeid==1)
			{
				$mony=$row["$info[type]"]+$info["number"];
				if($info["type"]=="amount") {if(!$info["note"]){$info["note"]="�����ʽ�";}}
				if($info["type"]=="point")  {if(!$info["note"]){$info["note"]="���ӵ���";}}
				}
			if($typeid==2)
			{
				$mony=$row["$info[type]"]-$info["number"];
				if($row["$info[type]"] >= $info["number"])
			    {
				$info["number"]="-".$info["number"];
				if($info["type"]=="amount") {if(!$info["note"]){$info["note"]="�����ʽ�";}}
				if($info["type"]=="point")  {if(!$info["note"]){$info["note"]="���ٵ���";}}
				}
		       	else
			       {
				    showmessage('�ʽ����ʧ�ܣ����飡', $forward);
					break;
				      }
					  
				}
			$info["module"]="pay";
			$info["userid"]=$row["userid"];
			$info["inputer"]=$user_id;
			$info["ip"]=IP;
			$info["time"]=date("Y-m-d H:i:s");
			$info["inputid"]=$admin_id;
		
			$db->query("UPDATE ".DB_PRE."member SET ".$info["type"]."='$mony' WHERE username='".$info["username"]."'");
			$sql=$a->add($table='pay_exchange',$info);
			$id=$db->insert_id($sql);
			$rs=$a->get($table='member',$where="username='".$info["username"]."'");
			$db->query("UPDATE ".DB_PRE."pay_exchange SET blance='".$rs["$info[type]"]."' WHERE id='$id'");
			showmessage('�����ɹ���', $forward);
			
			}
			else
			{
				showmessage('�û��������ڣ�', $forward);
				}
		}
		else
		{
			include tpl("pay_exchange_add");
			}
	break;
	
	case'manage':
	if($username)  $where ="username like '%$_GET[username]%'";
	if($module)    $where .=" and module='$module'";
	if($type)      $where .=" and type='$type'";
	if($begindate) $where .=" and `time` >= '$begindate' ";
	if($enddate)   $where .=" and `time` <= '$enddate' " ;
	if($num1)      $where .=" and `number` >= '$num1' " ;
	if($num2)      $where .=" and `number` >= '$num2' " ;
	if($inputer)   $where .=" and `inputer` like '%$inputer%' " ;
	$info=$a->listinfo($table="pay_exchange",$where,$order='time desc',$page,20);
	include tpl("pay_exchange_manage");
	break;
	
	case 'checkuser':
   if(!$a->username_is($value))
   {
	   exit($a->msg());
	   }
	   else
		{
			exit('success');
		}
  break;
  
  case 'delete':
      $a->delete($table="pay_exchange",$where="id",$ids);
	  showmessage('�����ɹ���', $forward);
  break;
	}
?>