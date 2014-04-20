<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require CLASS_PATH.'model.class.php';
$a =new all();
$s = new model_db;
switch($action)
{
	case 'add':
	if($dosubmit)
	{
	
     $infos = $a->listinfo($tabel='model','', 'modelid', $page, 20);
     foreach($infos as $vas)
      {
	    if($vas['tablename']==$model['tablename'])
     	{
		  showmessage("表名已存在！");
		   }
             }
	    $sqld=$db->insert(DB_PRE.'model', $model);
	
		$modelid=$db->insert_id($sqld);
		$arr_search = array('$tablename','$table_model_field','$modelid');
        $arr_replace = array(DB_PRE.'member_'.$model['tablename'],DB_PRE.'model_field',$modelid);
		
		$sql = file_get_contents(PHP_ROOT."admin/member_model.sql");
		$sql = str_replace($arr_search, $arr_replace, $sql);
		$ar = split(";",$sql); 
		foreach($ar as $sqls)   //循环执行sql指令   
            {
             mysql_query($sqls);
             }
			  showmessage("添加成功！",$forward);
		}
	    
	else
	{
		include tpl("member_model_add");
		}
	break;
	
	case'edit':
	if($dosubmit)
	{
	    $row = $a->get($tabel="model",$where="modelid=$modelid");
		$tables=$row["tablename"];
		
				 $result =$a->edit($table="model",$model,$where="modelid",$modelid);
		         $db->query("ALTER TABLE `".DB_PRE."member_".$tables."` RENAME TO `".DB_PRE."member_".$model[tablename]."` ");
		         showmessage("操作成功！",$forward);
		
		}
		else
		{
			$info = $a->get($tabel="model",$where="modelid=$modelid");
	        include tpl("member_model_edit");
			}
	break;
	
	case 'disabled':
	$db->query("UPDATE ".DB_PRE."model SET disabled = '$disabled' WHERE modelid='$modelid'");
	showmessage("操作成功！",$forward);
	break;
	case 'manage':
	
	$info=$a->listinfo($table="model", $where='workflowid=2', $order = '');
	include tpl("member_model_manage");
	break;
	
	case'delete':
	$info = $a->get($tabel="model",$where="modelid=$modelid");
	$tables=DB_PRE."member_".$info["tablename"];
	$del=$db->query("DROP TABLE IF EXISTS ".$tables."");
	$sql=$db->query("delete from ".DB_PRE."model where modelid='$modelid'");
	showmessage("操作成功！",$forward);
	
	break;
	}
?>
