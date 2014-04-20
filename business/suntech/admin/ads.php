<?php
defined('IN_PHPJSJ') or exit('Access Denied');
$a=new all();
 switch($action)
 {
	 case 'edit':
	 if($dosubmit)
	 {
		 $info['fromdate']=strtotime($info['fromdate']);
		 $info['todate']=strtotime($info['todate']);
		
		  $a->edit($table="ads",$info,$where="adsid",$adsid);
	      showmessage('操作成功！', $forward);
		 }
	 else
	 {
	 $into=$a->listtable($table="ads_place", $where = '', $order = '');
	 $info=$a->get($table='ads',$where="adsid=$adsid");
	 include tpl("ads_edit");
	 }
	 break;
	 case'add':
	 if($dosubmit)
	 {
		 $info['fromdate']=strtotime($info['fromdate']);
		 $info['todate']=strtotime($info['todate']);
	
		 $a->add($table='ads',$info);
	     showmessage('操作成功！', $forward);
		 }
		 else
		 {
			 $info=$a->listtable($table="ads_place", $where = '', $order = '');
			include tpl("ads_add"); 
			 }
	 break;
	 
	 case'manage':
	 $into=$a->listtable($table="ads_place", $where = '', $order = '');
	 
	 if(!$expired or $expired==1)
	 {
        $where="todate > ".TIME."";		 
		 }
	if($expired==2)
	{
		$where="todate < ".TIME."";	
		}
	if($expired==3)
	{
		$where="fromdate >".TIME." and todate > ".TIME."";	
		}
	if($placeid)
	{
		$where .=" and placeid=$placeid";
		}
	if($name)
	{
		$where .=" and adsname like '%$name%'";
		}
	if($passed==1)
	{
		$where .=" and passed=1";
		}
	elseif($passed==2)
	{
		$where .=" and passed=2";
		}
	 $info=$a->listinfo($table="ads", $where, $order = '');
	 include tpl("ads_manage");
	 break;
	 
	 case 'passed':
	 if($passed2)
	 {
		  foreach($adsid as $id)
		  {
		   $db->query("UPDATE ".DB_PRE."ads SET passed = '2' WHERE adsid='$id'");
	       }
		   showmessage('操作成功！', $forward);
		 }
		 elseif($passed1)
		 {
			 foreach($adsid as $id)
		    {
			 $db->query("UPDATE ".DB_PRE."ads SET passed = '1' WHERE adsid='$id'");
			}
			 showmessage('操作成功！', $forward);
			 }
	 break;
	 
	 case 'delete':
	  $in=$a->delete($table="ads","adsid",$adsid);
	  if($in){showmessage('操作成功！', $forward);}
	 break;
	 }
?>