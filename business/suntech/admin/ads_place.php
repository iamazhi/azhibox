<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require PHP_ROOT."ads/include/global.func.php";
require CLASS_PATH."ads_place.class.php";
$a=new place();
 switch($action)
 {
	 case'add':
	 if($dosubmit)
	 {
		 $a->add($table='ads_place',$info);
	     showmessage('操作成功！', $forward);
		 }
		 else
		 {
			include tpl("ads_place_add"); 
			 }
	 break;
	 case'edit':
	 if($dosubmit)
	 {
		 $a->edit($table="ads_place",$info,$where="placeid",$placeid);
	      showmessage('操作成功！', $forward);
		 }
	 else
	 {
		  $info=$a->get($table='ads_place',$where="placeid=$placeid");
		  include tpl("ads_place_edit");
		 }
	 break;
	 
	 case'manage':
	 if($passed)
	 {
		 $where="passed=$passed";
		 if($select)
		 {
			 $where .=" and $select like '%$name%'";
			 }
		 }
		 
	 $info=$a->listinfo($table="ads_place", $where, $order = '');
	 include tpl("ads_place_manage");
	 break;
	 
	 case 'passed':
	 if($passed2)
	 {
		  foreach($placeid as $id)
		  {
		   $db->query("UPDATE ".DB_PRE."ads_place SET passed = '2' WHERE placeid='$id'");
	       }
		   showmessage('操作成功！', $forward);
		 }
		 elseif($passed1)
		 {
			 foreach($placeid as $id)
		    {
			 $db->query("UPDATE ".DB_PRE."ads_place SET passed = '1' WHERE placeid='$id'");
			}
			 showmessage('操作成功！', $forward);
			 }
	 break;
	 
	 case 'loadjs':
	    $placeid = intval($placeid);
        if(!$placeid) showmessage($LANG['incorrect_parameters'], 'goback');
        $loadadsplace = $db->get_one("SELECT * FROM ".DB_PRE."ads_place WHERE placeid=$placeid");
        if(!$loadadsplace) showmessage($LANG['incorrect_parameters']);
        $referer = urlencode($referer);
	 include tpl("ads_place_loadjs");
	 break;
	 
	 case 'view':
          $placeid = intval($placeid);
        if(!$placeid) showmessage($LANG['incorrect_parameters'], 'goback');
        $place = $db->get_one("SELECT * FROM ".DB_PRE."ads_place WHERE placeid=$placeid");
        echo "<SCRIPT LANGUAGE=\"JavaScript\">";
        $a->view($placeid, $place['option']);
        echo "</script>";
		
		
	 break;
	 
	 case 'delete':
	  $a->delete($table="ads_place",$where="placeid",$placeid);
	  showmessage('操作成功！', $forward);
	 break;
	 }
?>