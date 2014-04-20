<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require CLASS_PATH."/menu.class.php";
require FILE_DIR."/tree.class.php";
$tree = new tree;
$menu=new menu();

require CLASS_PATH."category.class.php";
$alls=new category();

$a=new all();
switch($action)
{
	case 'manage':

	$into=$a->listtable("menu");
	foreach($into as $menuid => $row)
	{
        $disabled=$row["disabled"]==1 ? '<font color=red>�ر�</font>' : '<font color=blue>��ʾ</font>';
	$array[$row["menuid"]]=(array('id'=>$row["menuid"],'parentid'=>$row["pid"],'name'=>$row["name"],'listorder'=>$row["listorder"],'disabled'=>$disabled));
		}
		$str="<tr><td class='align_c'><input type='text' size='4' name='listorder[\$id]' value='\$listorder'></td>
		          <td class='align_c'>\$id</td>
			  <td class='align_l'>\$spacer\$name</td>
			  <td class='align_c'>\$disabled</td>
			  <td class='align_c'><a href='?file=menu&action=add&menuid=\$id'>����Ӳ˵�</a> | <a href='?file=menu&action=edit&menuid=\$id'>�޸�</a> | <a href=javascript:confirmurl('?file=menu&action=delete&menuid=\$id','ȷ��ɾ��{\$name}�˵���')>ɾ��</a></td>
			  </tr>";
		$tree->tree($array);
		$category = $tree->get_tree(0,$str,$parentid);//�涨����Ϊ22��3

	include tpl('menu_list');
	break;
	
	case 'listorder':
		$result = $menu->listorder($listorder);
		if($result)
		{
			showmessage('�����ɹ���', $forward);
		}
		else
		{
			showmessage('����ʧ�ܣ�');
		}
		break;
		
	case 'add':
	if($dosubmit)
	{
		$info['target_line']= $info["url"]=="" ? "" : "right";
		$a->add($table="menu",$info);
		showmessage('�����ɹ���', $forward);
		}
		else
		{
			$info=$a->get($table="menu",$where="menuid='$menuid'");
	        include tpl('menu_add');
			}
	break;
	
	case "edit":
	if($dosubmit)
	{
		$info['target_line']= $info["url"]=="" ? "" : "right";
		$a->edit($table="menu",$info,$where="menuid",$menuid);
		showmessage('�����ɹ���', $forward);
		}
		else
		{
		$info=$a->get($table="menu",$where="menuid='$menuid'");
	        $upchild=$a->get($table="menu",$where="menuid='$info[pid]'");
	        include tpl('menu_edit');
			}
	break;
	
	case 'delete':
	  $db->query("delete from ".DB_PRE."menu where menuid='$menuid'");
	  $db->query("delete from ".DB_PRE."menu where pid='$menuid'");
	  showmessage('�����ɹ���', $forward);
	break;
	}

?>