<?php
defined('IN_PHPJSJ') or exit('Access Denied');

$projects=require ('templates/name.inc.php');
if($action != 'tag' && $action != 'preview') require FILE_DIR.'/template.func.php';
$module = isset($module) ? $module : 'phpsin';
$forward = HTTP_REFERER;
$projectdir = TPL_ROOT;
$project = isset($project) ? $project : TPL_NAME;
$templatedir = TPL_ROOT.$dirname.'/'.$module.'/'; 
$names = cache_read('name.inc.php', $templatedir);

$projectname = $projects[$project] ? $projects[$project] : $project;

$templatenamedir = TPL_ROOT.$dirname.'/'; 
$names = cache_read('name.inc.php', $templatenamedir);

$log = new log();
$template = trim($template);


require CLASS_PATH."database.class.php";
$database = new database();
switch($action)
{
	
	  case 'add':
	  if($dosubmit)
		{
			if(!preg_match("/^[0-9a-z_-]+$/",$template)) showmessage('模板文件名不符合要求！');
			$filename = $template.'.html';
			$filepath = $templatedir.$filename;
         	if(file_exists($filepath)) showmessage("模板 $filepath 已存在！");

		    if($createtype)
			{
				require_once 'upload.class.php';
				$temp = 'data/temp/';
			    $upload = new upload('uploadfile', $temp, '', 'html', '4096000', 1);
				$files = $upload->up();
				if($files)
				{
					$content = file_get_contents($files[0]['saveto']);
				    @unlink($files[0]['saveto']);
					@chmod($filepath, 0777);
				}
				else
				{
					showmessage($upload->error());
				}
			}
			file_put_contents($filepath, new_stripslashes($content));
			template_compile($module, $template);
			$names[$module][$filename] = $templatename;
		    cache_write('name.inc.php', $names, $templatenamedir);
			//$data = addslashes($content);
			//$log->set($filename);
			//$log->add($data);
			//$arr_log = array('data'=>$data);
			//$log->add($arr_log);
	        showmessage("操作成功！<script language='javascript'>opener.location.reload();window.close();</script>");
		}
		else
	    {
		
	     include tpl("template_add");
	    	}
			
	  break;
	  
	  case 'edit':
		if(!isset($template) || empty($template)) showmessage('请选择模板！');
		
		$filename = $template.'.html';
		$filepath = $templatedir.$filename;
		if(!is_writeable($filepath)) showmessage('模板目录 '.$filepath.' 不可写！请先通过FTP设置为 777，再进行在线编辑。');
		if($dosubmit)
		{
			file_put_contents($filepath, new_stripslashes($content));
			template_compile($module, $template);
			$names[$module][$filename] = $templatename;
		    cache_write('name.inc.php', $names, $templatenamedir);
			$data = addslashes($content);
			$arr_log = array('data'=>$data); 
			$log->set($filename);
			$log->add($arr_log);
	        showmessage('模板修改成功！', $forward);
		}
		else
	    {
	    	$tagtype = tag_types();
	    	$content = file_get_contents($filepath);
		    $filename = basename($filepath);
		    $templatename = $names[$module][$filename];
			
			$filemtime = date('Y-m-d H:i:s', filemtime($filepath));
			
		
	    	$a = new all();
		    $info=$a->listtable('tag');
			$var=$a->listtable('variable');
	    	include tpl('template_edit');
		}
		break;
		
	case 'showtags':
		require CLASS_PATH."all.class.php";
		$a = new all();
		$info=$a->listtable('tag');
		foreach($info as $n=>$r)
		{
			$arr_tagname .=$r["name"].',';
			
			}
			if(empty($arr_tagname)) exit('null');
			echo $arr_tagname;
		break;
		
		
		
		
		
	  case 'manage':
	   $files = glob($templatedir.'*.html');
        $templates = array();
		foreach($files as $tpl)
	    {
			$template['file'] = basename($tpl);
            $template['name'] = isset($names[$module][$template['file']]) ? $names[$module][$template['file']] : '';
			if($keyword)
			{
				if(($searchtype == 'templatename' && strpos($template['name'], $keyword) === false) || ($searchtype == 'filename' && strpos($template['file'], $keyword) === false) || ($searchtype == 'data' && strpos(file_get_contents($template['file']), $keyword) === false)) continue;
			}
			if(isset($istag))
			{
				if(($istag && strpos($template['file'], 'tag_') !== 0) || (!$istag && strpos($template['file'], 'tag_') === 0)) continue;
			}
			$template['template'] = substr($template['file'], 0, -5);
			$pos = strpos($template['template'],'-');
			if($pos)
			{
				$template['type'] = substr($template['file'],0,$pos);
			}
			else
			{
				$template['type'] = $template['template'];
			}
			$template['isdefault'] = $template['type'] == $template['template'] ? 1 : 0;
			$template['mtime'] = filemtime($tpl);
			$templates[$template['template']] = $template;
		}
		ksort($templates);
	  include tpl('template');
	  break;
	  
	  
	  /**
	  更新风格 名称编辑
	  
	  case 'update':
		$names = cache_read('name.inc.php', $templatedir);
		$templatename = array_merge($names, $templatename);
		cache_write('name.inc.php', $templatename, $templatedir);
	    showmessage('模板名称更新成功！', $forward);
		break;**/
	  /**
	  更新文件 名称
	  **/
	  case 'updatefile':
	        $names[$module] = $templatename;
		    cache_write('name.inc.php', $names, $templatenamedir);
	        showmessage('模板名称更新成功！', $forward);
	  break;
	  
	 
	  case 'get_db_source':
		$alltables=$database->status();
		echo json_encode($alltables);
		break;
		
	  /**
	  调用数据库表
	  **/
	  case 'get_ajax_db_table':
      header('Content-type: text/html; charset=utf-8');
		if ($name == 'MM_LOCALHOST')
		{
	        $r = $db->tables();
			foreach ($r as $key=>$val)
			{
				$db_table[$val]['tablename'] = $val;
			 
			}
			echo json_encode($db_table);
		}
		break;
	/**
	读取字段
	**/
	case 'get_fields':
	header('Content-type: text/html; charset=utf-8');
	require CLASS_PATH."datasource.class.php";
    $datasource = new datasource();
	$r = $db->query("SHOW COLUMNS FROM $tables");
	while($s = $db->fetch_array($r))
			{
			$d = $datasource->format_fields($s);
			$fields[$d['field']] = $d;
			}
			echo json_encode($fields);
	break;
	
	
	  case 'cache':
	    template_cache();
		showmessage('模板缓存更新完成','goback');
	  break;
	  
	  case 'delete':
		if(!$template) showmessage('非法参数！');
		$filename=$template.".html";
		$filepath = $templatedir.$filename;
		@unlink($filepath);
		unset($names[$module][$filename]);
		cache_write('name.inc.php', $names, $templatenamedir);
	    showmessage("操作成功！", $forward);
		break;
		
		case 'down':
		if(!$filename) showmessage('非法参数！');
		$filepath = $templatedir.$filename;
        file_down($filepath);
		break;
		
		case'view':
		if($module && $template)
		{
		include template($module,$template);
		 }
		else
		{
			 showmessage('非法参数！');
			}
		break;
}
?>

