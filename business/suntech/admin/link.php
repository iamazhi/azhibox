<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require FILE_DIR."/tree.class.php";
$tree = new tree;
$a=new all();

   $tableinfo=$a->listtable($table='category', $where = '', $order = 'listorder ');
   foreach($tableinfo as $v)
   {
   $array[$v["menuid"]]=(array("id"=>$v["menuid"],"parentid"=>$v["pid"],"name"=>$v["name"]));
   }
   $str="<option value=\$id \$selected>\$name</option>";
   $tree->tree($array);
   $link = $tree->get_tree(67,$str,$typeid);
switch($action)
{
   case'manage':
   if($passed) { 
   $where = "passed='$passed'"; 
   if($elite!="")
   {
	   $where .="and elite='$elite' ";
	   }
	   if($name!="")
	   {
		   $where .=" and name='$name'";
		   }
		 if($linktype!="")
	     {
		   $where .=" and linktype='$linktype'";
		   }
		   if($typeid)
            {
	         $where .= "and typeid=$typeid";
	           }
   }
   

   $info=$a->listinfo($table='link', $where, $order = 'listorder,addtime', $page = 1, $pagesize = 50);
   include tpl("link_manage");
   break;
    
   case'edit':
   if($dosubmit)
   {
	   $a->edit($table="link",$info,$where="linkid",$linkid);
	   showmessage('操作成功！', $forward);
	   }
   else{
    $info=$a->get($table='link',$where="linkid=$linkid");
   include tpl("link_edit");
   }
   break;
   
   case'add':
   if($dosubmit)
   {
	   $a->add($table='link',$info);
	   showmessage('操作成功！', $forward);
      }
   else
   {
  
   include tpl("link_add");
   }
   break;
  
   
   case 'listorder':
  
     $a->listorder($table='link',$listorders,$where='linkid');
	 showmessage('操作成功！', $forward);
   break;
   
   case 'delete':
    $a->delete($table="link",$where="linkid",$linkid);
	showmessage('操作成功！', $forward);
   break;
   
   case 'passed'://审核连接
   foreach($linkid as $id)
		{
		$db->query("UPDATE ".DB_PRE."link SET passed = '1' WHERE linkid='$id'");
		}
		showmessage('操作成功！', $forward);
   break;
   
   case 'passed_break'://取消审核
        foreach($linkid as $id)
		{
		$db->query("UPDATE ".DB_PRE."link SET passed = '2' WHERE linkid='$id'");
		}
		showmessage('操作成功！', $forward);
   break;
   
   case 'hotlink'://推荐
        foreach($linkid as $id)
		{
		$db->query("UPDATE ".DB_PRE."link SET elite = '1' WHERE linkid='$id'");
		}
		showmessage('操作成功！', $forward);
   break;
   case 'hotlink_break':
        foreach($linkid as $id)
		{
		$db->query("UPDATE ".DB_PRE."link SET elite = '2' WHERE linkid='$id'");
		}
		showmessage('操作成功！', $forward);
   break;
   case 'hot':
   $db->query("UPDATE ".DB_PRE."link SET elite = $elite WHERE linkid='$linkid'");
   showmessage('操作成功！', $forward);
   break;
   
   case 'type_manage':
   
   include tpl("link_type_manage");
   break;
   case 'type_add':
   if($dosubmit)
   {
	   $insid=$a->add($table='category',$info);
	   $is_id=$db->insert_id($insid);
       $db->query("UPDATE ".DB_PRE."category SET menuid = $is_id WHERE catid='$is_id'");

	   showmessage('操作成功！', $forward);
      }
	  else
	  {
   include tpl("link_type_add");
   }
   break;
   
   case 'type_edit':
   if($dosubmit)
   {
	   $a->edit($table="category",$info,$where="catid",$catid);
	   showmessage('操作成功！', $forward);
	   }
	   else
	   {
   $info=$a->get($table="category",$where="catid=$catid");
   include tpl("link_type_edit");
	   }
   break;
   
   case 'type_del':
   
    $a->delete($table="category",$where="catid",$catid);
	$a->delete($table="link",$where="linkid",$typeid);
	showmessage('操作成功！', $forward);
   break;
   
   case 'type_list':
  
     $a->listorder($table='category',$listorders,$where='catid');
	 showmessage('操作成功！', $forward);
   break;
}
?>