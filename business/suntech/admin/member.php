<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require FILE_DIR."/tree.class.php";
$tree = new tree;
$a=new all();

$into=$a->listtable($table="area", $where = '', $order = '');
	    foreach($into as $row)
	    {
		    $array[$id=$row["areaid"]]=array('id'=>$row["areaid"],'parentid'=>$row["parentid"],'name'=>$row["name"]);
		   }
   
	          $str="<option value=\$id \$selected>\$spacer\$name</option>\n";
	          $tree->tree($array);
	          $is_tree = $tree->get_tree(0,$str,$areaid);
			  
			  
switch($action)
{
	case 'setting':
    if($dosubmit)
    {
		$a->edit($table="module",$info,$where="module",$mod);
		
	  $setting = new_stripslashes($setting);
	  $setting = addslashes(var_export($setting, TRUE));
	  
	  $db->query("UPDATE ".DB_PRE."module SET setting='$setting' WHERE module='$mod'");
	  
	  $sql=$db->query("SELECT  `module`,`name`,`path`,`url`,`iscore`,`version`,`publishdate`,`installdate`,`updatedate`,`setting` FROM ".DB_PRE."module WHERE module='$mod'");
	  while($r=$db->fetch_array($sql))
	  {
		 if($r['setting'])
		{
			$setting = $r['setting'];
			eval("\$setting = $setting;"); 
			unset($r['setting']);
			if(is_array($setting)) $r = array_merge($r, $setting);
        }
		cache_write('module_'.$mod.'.php', $r);
	     }
	  
	  showmessage("配置保存成功！", $forward);
         }

	@extract(new_htmlspecialchars($M));
	include tpl("setting_member");
	break;
	
	case'edit':
	if($dosubmit)
	 {
		 if($chk_password!="")
		 {
			 $info["password"]=md5(PASSWORD_KEY.$chk_password);
			 }
	     //is admin
		 if($a->get("admin",$where="userid",$userid))
		 {
			 $infos["username"]=$info["username"];
			 $a->edit($table="admin",$infos,$where="userid",$userid);
			 }
			 
		 $a->edit($table="member",$info,$where="userid",$userid);
		 $in=$a->get($tabel="member_detail",$where="userid='$userid' ");
                 $db->query("UPDATE ".DB_PRE."member_cache SET password='".md5(PASSWORD_KEY.$chk_password)."' WHERE userid='$userid'");

		 if(!$in)
		 {
			 $a->add($table='member_detail',$posuserid);
			 }
		 $a->edit($table="member_detail",$detail,$where="userid",$userid);
		 
		 showmessage('操作成功！', $forward);
	 }
	 else
	 {
	
	$group=$a->listtable($table="member_group", $where = '', $order = '');
	$model=$a->listtable($table="model", $where = 'workflowid=2', $order = '');
	
	$info=$a->get($tabel="member",$where="userid='$userid' ");
	$detail=$a->get($tabel="member_detail",$where="userid='$userid' ");
	include tpl("member_edit");
	 }
	break;
	
	
	
	case'add':
	if($dosubmit)
	 {
		 $info['password']=md5($chk_password);
		 $sql=$a->add($table='member',$info);
		 $member["userid"]=$db->insert_id($sql);
		 $member["regip"]= IP;
		 $member["regtime"]= TIME;
		 $sql=$a->add($table='member_info',$member);
	     showmessage('操作成功！', $forward);
		 }
	else{
			  
		$group=$a->listtable($table="member_group", $where = '', $order = '');
		$model=$a->listtable($table="model", $where = "workflowid=2", $order = '');
	     include tpl("member_add");
		}
	break;
	
	
	case 'manage':
	$adminid=$a->get($tabel='admin',$where=""); 
	$group=$a->listtable($table='member_group',$where='',$order='');
	$model=$a->listtable($table='model',$where='workflowid=2',$order='');
	
	if($modelid)
	{
		$wheres ="modelid='$modelid'";
		}
	if($groupid)
	{
		$wheres ="groupid='$groupid'";
		}
		
	if($search)
	{
		$wheres .=" groupid='$groups'";
		if($disabled!="") $wheres .=" and disabled=$disabled";
		if($username!="") $wheres .=" and username like '%$username%'";
		
		}
		$info=$a->listinfo($tabel='member',$wheres ,$order='',$page,20);
	
	include tpl('member_manage');
	break;
	
	
	case 'check':
	if($dosubmit)
	{
		foreach($userid as $id)
		  {
		   $db->query("UPDATE ".DB_PRE."member SET groupid = '6' WHERE userid='$id'");
	       }
		   showmessage('操作成功！', $forward);
		}
		else
		{
			$info=$a->listinfo($tabel="member a,".DB_PRE."member_info b",$where="a.groupid=5 and a.userid=b.userid" ,$order='',$page,20);
	        include tpl('member_check');
			}
	break;
	
	
	case 'view':
	$model=$a->get($tabel="model",$where="workflowid=2 and modelid=$modelid");
	$group=$a->get($tabel="member_group",$where="groupid=$groupid");
	$detail=$a->get($tabel="member_detail",$where="userid=$userid");
	$member=$a->get($tabel="member a,".DB_PRE."member_info b",$where="a.userid=$userid and a.userid=b.userid");
	include tpl("member_view");
	break;
	
	
	case'note':
	if($dosubmit)
	{
		 $a->edit($table="member_info",$info,$where="userid",$userid);
		 showmessage('操作成功！', $forward);
		}
		else
		{
			$info=$a->get($table="member a,".DB_PRE."member_info b",$where="a.userid=$userid and a.userid=b.userid");
	        include tpl('member_note');
			}
	break;
	
	case 'checkuser':
   if(!$a->is_username($value) || !$a->username_exists($value,$userid))
   {
	   exit($a->msg());
	   }
	   else
		{
			exit('success');
		}
  break;
  
    case 'email':
	if(!$a->username_email($value,$userid))
   {
	   exit($a->msg());
	   }
	   else
		{
			exit('success');
		}
    break;
	
	
	case 'disabled':
	if($disabled2)
	 {
		  foreach($userid as $id)
		  {
		   $db->query("UPDATE ".DB_PRE."member SET disabled = '2' WHERE userid='$id'");
	       }
		   showmessage('操作成功！', $forward);
		 }
		 elseif($disabled1)
		 {
			foreach($userid as $id)
		    {
		     $db->query("UPDATE ".DB_PRE."member SET disabled = '1' WHERE userid='$id'");
	         }
		     showmessage('操作成功！', $forward); 
			 }
		 else
		 {
			$db->query("UPDATE ".DB_PRE."member SET disabled = '$disabled' WHERE userid='$userid'");
			showmessage("操作成功！",$forward); 
			 }
	break;
	
	
	case'delete':
			$a->delete($table="member",$where="userid",$userid);
			$a->delete($table="member_cache",$where="userid",$userid);
			$a->delete($table="member_detail",$where="userid",$userid);
			$a->delete($table="member_info",$where="userid",$userid);
			showmessage('操作成功！', "?file=$file&action=manage");
	break;
  
	
	 default:
	 break;
	}
?>
