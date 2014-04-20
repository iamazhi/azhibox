<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require FILE_DIR."/tree.class.php";
$tree = new tree;
$a=new all();
switch($action)
{
	case 'edit':
	if($dosubmit)
	{
		$a->edit($table="area",$info,$where="areaid",$areaid);
		showmessage('操作成功！', $forward);
		}
	else{
	$val=$a->get($tabel='area',$where="areaid=$areaid");
	$info=$a->listtable($table="area", $where = '', $order = '');
	foreach($info as $row)
	{   $selectd =$parentid == $row["areaid"] ? 'selected=selected': ($row['areaid'] == 1 ? '' : '');
		$array[$id=$row["areaid"]]=array('id'=>$row["areaid"],'parentid'=>$row["parentid"],'name'=>$row["name"],'selectd'=>$selectd);
		}

	$str="<option value='\$id\' \$selectd>\$spacer\$name</option>\n";

	$tree->tree($array);
	$is_tree = $tree->get_tree(0,"<option value='\$id\' \$selectd>\$spacer\$name</option>\n",$areaid);
	include tpl("area_edit");
    }
	break;
	case 'add':
	if($dosubmit)
	{  
		    $names = explode("\n", trim($info['name']));
			foreach($names as $name)
			{
			 if(!$name) continue;
			 $info['name'] = $name;
		     $sql=$a->add($table='area',$info);
		     $areaid=$db->insert_id($sql);
			 
			 $arrid=$a->get($table='area',$where="areaid=$info[parentid]");
			 $parentid="".$arrid["arrparentid"].",".$info['parentid']."";
			 $parentids = explode(',', $parentid);
			 foreach($parentids as $parentid)
			 {
				 if($parentid)
				 {
					$arrchildid = $arrid["arrchildid"].",".$areaid;
					$db->query("UPDATE ".DB_PRE."area set child=1,arrchildid='$arrchildid' where areaid='$parentid'"); 
					 }
				 }
		     $db->query("UPDATE ".DB_PRE."area set arrparentid='$parentid',arrchildid='$areaid' where areaid='$areaid'");
			}
		 showmessage('操作成功！', $forward);
		}
		else
		{
	$info=$a->listtable($table="area", $where = '', $order = '');
	foreach($info as $row)
	{
		$array[$id=$row["areaid"]]=array('id'=>$row["areaid"],'parentid'=>$row["parentid"],'name'=>$row["name"]);
		}

	$str="<option value=\$id \$selected>\$spacer\$name</option>\n";

	$tree->tree($array);
	$is_tree = $tree->get_tree(0,$str,$areaid);
	include tpl("area_add");
		}
	break;
	
	
	case'manage':
	$info=$a->listtable($table="area", $where = '', $order = 'listorder');
	foreach($info as $row)
	{
		$name=output::style($row['name'], $row['style']);
	$array[$row["areaid"]]=(array('id'=>$row["areaid"],'parentid'=>$row["parentid"],'name'=>$name,'listorder'=>$row["listorder"]));
		}
		$str="<tr><td class='align_c'><input type='text' size='4' name='listorders[\$id]' value='\$listorder'></td>
		          <td class='align_c'>\$id</td>
				  <td class='align_l'>\$spacer\$name</td>
				  <td class='align_c'><a href='?file=$file&action=add&areaid=\$id'>添加子地区</a> | <a href='?file=$file&action=edit&areaid=\$id&parentid=\$parentid'>修改</a> | <a href=javascript:confirmurl('?file=$file&action=delete&areaid=\$id','确定删除吗？') />删除</a></td>
			  </tr>";
		$tree->tree($array);
		$category = $tree->get_tree(0,$str);//
		include tpl("area_manage");
	break;
	
	case 'delete':
	$info=$a->listtable($table="area", $where = '', $order = '');
	foreach($info as $id => $area)
	{
		if($area['parentid'] && $id != $areaid)
				{
					$arrparentids = explode(',', $area['arrparentid']);
					if(in_array($areaid, $arrparentids)) $arrchildid .= ','.$id;
				}
		}
	
	
	$areaid=$a->get($table='area',$where="areaid=$areaid");
	$arrparentid=$areaid["arrparentid"];
	$arrchildid=$areaid["arrchildid"];
	$db->query("DELETE FROM ".DB_PRE."area WHERE areaid IN ($arrchildid)");
	///////////////////////////////////////////////////////////////////////////
	$areaids = explode(',', $arrchildid);
	foreach($areaids as $id)
		{
            unset($areas[$id]);
		}
	if($arrparentid)
		{
		    $arrparentids = explode(',', $arrparentid);
			foreach($arrparentids as $id)
			{
				if($id == 0) continue;
				
			    $arrchildid = $arrchildid;
			    $child = is_numeric($arrchildid) ? 0 : 1;
			    $db->query("UPDATE ".DB_PRE."area SET arrchildid='$arrchildid',child=$child WHERE areaid='$id'");
			}
		}
		showmessage('操作成功！', "?file=$file&action=manage");
	break;
	
	case 'listorder':
  
     $a->listorder($table='area',$listorders,$where='areaid');
	 showmessage('操作成功！', $forward);
   break;
	}
?>