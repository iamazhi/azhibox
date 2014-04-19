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
   $link = $tree->get_tree(114,$str,$typeid);
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
   

   $info=$a->listinfo($table='focus', $where, $order = 'listorder,addtime', $page = 1, $pagesize = 50);
   include tpl("focus_manage");
   break;
    
   case'edit':
   if($dosubmit)
   {
	   $a->edit($table="focus",$info,$where="focusid",$focusid);
	   showmessage('�����ɹ���', $forward);
	   }
   else{
    $info=$a->get($table='focus',$where="focusid=$focusid");
   include tpl("focus_edit");
   }
   break;
   
   case'add':
   if($dosubmit)
   {
	   $a->add($table='focus',$info);
	   showmessage('�����ɹ���', $forward);
      }
   else
   {
  
   include tpl("focus_add");
   }
   break;
  
   
   case 'listorder':
  
     $a->listorder($table='focus',$listorders,$where='focusid');
	 showmessage('�����ɹ���', $forward);
   break;
   
   case 'delete':
    $a->delete($table="focus",$where="focusid",$focusid);
	showmessage('�����ɹ���', $forward);
   break;
   
   case 'passed'://�������
   foreach($linkid as $id)
		{
		$db->query("UPDATE ".DB_PRE."focus SET passed = '1' WHERE focusid='$id'");
		}
		showmessage('�����ɹ���', $forward);
   break;
   
   case 'passed_break'://ȡ�����
        foreach($linkid as $id)
		{
		$db->query("UPDATE ".DB_PRE."focus SET passed = '2' WHERE focusid='$id'");
		}
		showmessage('�����ɹ���', $forward);
   break;
   
   case 'hotlink'://�Ƽ�
        foreach($linkid as $id)
		{
		$db->query("UPDATE ".DB_PRE."focus SET elite = '1' WHERE focusid='$id'");
		}
		showmessage('�����ɹ���', $forward);
   break;
   case 'hotlink_break':
        foreach($linkid as $id)
		{
		$db->query("UPDATE ".DB_PRE."focus SET elite = '2' WHERE focusid='$id'");
		}
		showmessage('�����ɹ���', $forward);
   break;
   case 'hot':
   $db->query("UPDATE ".DB_PRE."focus SET elite = $elite WHERE focusid='$focusid'");
   showmessage('�����ɹ���', $forward);
   break;
   
   case 'type_manage':
   
   include tpl("focus_type_manage");
   break;
   
   case 'type_add':
   if($dosubmit)
   {
	   $insid=$a->add($table='category',$info);
	   $is_id=$db->insert_id($insid);
       $db->query("UPDATE ".DB_PRE."category SET menuid = $is_id WHERE catid='$is_id'");

	   showmessage('�����ɹ���', $forward);
      }
	  else
	  {
   include tpl("focus_type_add");
   }
   break;
   
   case 'type_edit':
   if($dosubmit)
   {
	   $a->edit($table="category",$info,$where="catid",$catid);
	   showmessage('�����ɹ���', $forward);
	   }
	   else
	   {
   $info=$a->get($table="category",$where="catid=$catid");
   include tpl("focus_type_edit");
	   }
   break;
   
   case 'type_del':
   
    $a->delete($table="category",$where="catid",$catid);
	$a->delete($table="focus",$where="focusid",$typeid);
	showmessage('�����ɹ���', $forward);
   break;
   
   case 'type_list':
  
     $a->listorder($table='category',$listorders,$where='catid');
	 showmessage('�����ɹ���', $forward);
   break;
}
?>