<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require CLASS_PATH.'model.class.php';
$a = new model_db;

switch($action)
{
	case 'edit':
	
    if($saveedit)
	{
		$query=$db->query("select * from ".DB_PRE."model where modelid='$_GET[saveedit]'");
		$row=$db->fetch_array($query);
		$tables=$row["tablename"];
		
		$result = $a->edit($saveedit, $info);
        $db->query("ALTER TABLE `".DB_PRE."c_".$tables."` RENAME TO `".DB_PRE."c_".$info[tablename]."` ");
		if($result)
		{
			showmessage('�����ɹ���', "?file=model&action=manage");
		}
		else
		{
			showmessage('����ʧ�ܣ�');
		}
		
		}
		else
		{
	$info = $a->get($model);
	if(!$model) showmessage('ָ����ģ�鲻���ڣ�');
	extract($info);
		}
	include tpl('model_edit');
	break;
	
	case 'employ':
	if($_GET["type"]==1)
	{
		$sql=$db->query("update ".DB_PRE."model set employ ='2' where modelid='$_GET[model]'");
		if($sql)
		{
		 showmessage("�����ɹ���","?file=model&action=manage");
			}
			else
			{
				showmessage("����ʧ�ܣ�");
				}
				}
	if($_GET["type"]==2)
	{
		$sqls=$db->query("update ".DB_PRE."model set employ ='1' where modelid='$_GET[model]'");
		if($sqls)
		{
		 showmessage("�����ɹ���","?file=model&action=manage");
			}
			else
			{
				showmessage("����ʧ�ܣ�");
				}
		}
	break;
	
	case 'manage':
	$infos = $a->listinfo($where='workflowid=1', 'modelid', $page, 20);
	include tpl('model');
	break;
	
	case 'add':
    if($_GET["model"]=='add')
	{
     $infos = $a->listinfo('', 'modelid', $page, 20);
     foreach($infos as $vas)
      {
	    if($vas['tablename']==$_POST["tablename"])
     	{
		  showmessage("�����Ѵ��ڣ�");
		    }
             }
	$sql="insert IGNORE into ".DB_PRE."model (name,description,tablename,auditing,workflowid,employ)VALUES('$_POST[name]','$_POST[description]','$_POST[tablename]','$_POST[auditing]','1','1')";

		if($db->query($sql))
		{
		$sql=$db->insert_id($sql);
		$arr_search = array('$tablename','$table_model_field','$modelid');
        $arr_replace = array(DB_PRE.'c_'.$_POST["tablename"],DB_PRE.'model_field',$sql);
		
		$script = file_get_contents(PHP_ROOT."admin/model.sql");
		$script = str_replace($arr_search, $arr_replace, $script);
		
		$ar = split(";",$script);   //�����sqlָ�����   
        foreach($ar as $sqls)   //ѭ��ִ��sqlָ��   
            {
             mysql_query($sqls);
             }
			  showmessage("��ӳɹ���","?file=model&action=manage");
			 }
			 else
			 {
				 showmessage("����ʧ�ܣ�",$forward);
				 }
		}
	include tpl('model_add');
	break;
	
	
	case 'delete':
	$modelid=$_GET['model'];
	//��ȡ���ݱ�
	$s=$db->query("select * from ".DB_PRE."model where modelid='$modelid'");
	$row=$db->fetch_array($s);
    $tables=DB_PRE."c_".$row["tablename"];
	$del=$db->query("DROP TABLE IF EXISTS ".$tables."");
	
	$sql="delete from ".DB_PRE."model_field where modelid='$modelid'";
	
	$query=$db->query("delete from ".DB_PRE."model where modelid='$modelid'")or die(showmessage("����ʧ�ܣ�"));
	
	if($db->query($sql))
	{
		showmessage("�����ɹ���","?file=model&action=manage");
		}
		else
		{
			showmessage("����ʧ�ܣ�");
			}
	break;
	}

?>
