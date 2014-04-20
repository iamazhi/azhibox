<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require FILE_DIR."/template.func.php";


$forward = HTTP_REFERER;
$projectdir = TPL_ROOT;
$projects=require ("templates/name.inc.php"); //默认
$filedir =require ("templates/".$dirname."/name.inc.php");
$dir = TPL_ROOT.$dirname."/"; //子类文夹子
switch($action)
{

	case'style':
	if($type)
	{
	   set_config(array('TPL_STATUS'=> TPL_STATUS.$template.","));
	   showmessage('操作成功！',$forward);
	}
	else
	{
		$template=$template.",";
		set_config(array('TPL_STATUS'=> strtr(TPL_STATUS,array("$template"=>""))));
	    showmessage('操作成功！',$forward);
		}
	break;
	
	case 'add'://新建文件夹
	if($dosubmit)
		{
			if(!preg_match("/^[0-9a-z_-]+$/",$template)) showmessage('文件名不符合要求！');
			$filename = $template;
			$filepath = $dir.$filename;
         	if(file_exists($filepath)) showmessage("文件夹 $filepath 已存在！");
			@chmod($filepath, 0777);//改变文件可写配置
			@mkdir($filepath);
			//template_compile($dirname, $template);
			$filedir[$dirname][$filename] = $templatename;
		    cache_write('name.inc.php', $filedir, $dir);
			showmessage("操作成功！<script language='javascript'>opener.location.reload();window.close();</script>");
		}
	else{
		 include tpl("templateproject_add");
		}
	break;
	//清空目录
	case 'deldir':
	  $files=$dir.$filename."/";
      $dh=opendir($files);
      while ($file=readdir($dh))
	  {
         $fullpath=$files.$file;
         @unlink($fullpath);
	}
	showmessage("操作成功！","?file=templateproject&action=dir&dirname=$dirname");
	break;
	
	case 'delete':
		if(!$filename) showmessage('非法参数！');
		$filepath = $dir.$filename;
		dir_delete($filepath);
		
		unset($filedir[$dirname][$filename]);
		cache_write('name.inc.php', $filedir, $dir);
		
		unset($filedir[$filename]);
		cache_write('name.inc.php', $filedir, $dir);
		
	    showmessage('操作成功！',"?file=templateproject&action=dir&dirname=$dirname");
		break;
		
	case 'manage':
    $list = glob($projectdir.'*');
    $files = glob($projectdir."*.*");
    $dirs = array_diff($list, $files);
	$templateprojects = array();
	 $status=explode(",",TPL_STATUS);
    foreach ($dirs as $file)
           {
			   $basenames['dir']=basename($file);
			   foreach($status as $v)
			   {
				   if($basenames['dir']==$v)
				   {
					   $basenames['status']=$v;
					   }
				   }
               
	           $basenames['isdefault'] = TPL_NAME == $basenames['dir'] ? 1 : 0;
	           $basenames['name'] = isset($projects[$basenames['dir']]) ? $projects[$basenames['dir']] : '';
               $templateprojects[$basenames['dir']] = $basenames;
	        }
			
	 
      include tpl('templateproject');
	  break;
	  
	  case 'update': 
	   cache_write('name.inc.php', $tempname, TPL_ROOT);
	   showmessage('方案名称保存成功！',$forward);
	  break;
	  
	  case 'setdefault':
		if(!$project) showmessage('参数错误！',$forward);
	    set_config(array('TPL_NAME'=>$project));
		showmessage('操作成功！','?mod=phpsin&file=templates&action=cache&forward='.urlencode($forward));
		break;
	 
	  
	  case 'dir':
	  $list = glob($dir.'*');
      $files = glob($dir."*.*");
      $dirs = array_diff($list, $files);
   	  $templateprojects = array();
      foreach ($dirs as $file)
       {
        $basenames['dir']=basename($file);
	    $basenames['name'] = isset($filedir[$basenames['dir']]) ? $filedir[$basenames['dir']] : '';
        $templateprojects[$basenames['dir']] = $basenames;
	   }
	  include tpl("templateproject_dir");
	  break;
	  
	  case 'updatefile'://子类文件夹名称
	        $filedir[$dirname] = $tempname;
		    cache_write('name.inc.php', $filedir, $dir);
	        showmessage('模板名称更新成功！', $forward);
	  break;
	
}
?>

