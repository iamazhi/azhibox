<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require FILE_DIR."/template.func.php";


$forward = HTTP_REFERER;
$projectdir = TPL_ROOT;
$projects=require ("templates/name.inc.php"); //Ĭ��
$filedir =require ("templates/".$dirname."/name.inc.php");
$dir = TPL_ROOT.$dirname."/"; //�����ļ���
switch($action)
{

	case'style':
	if($type)
	{
	   set_config(array('TPL_STATUS'=> TPL_STATUS.$template.","));
	   showmessage('�����ɹ���',$forward);
	}
	else
	{
		$template=$template.",";
		set_config(array('TPL_STATUS'=> strtr(TPL_STATUS,array("$template"=>""))));
	    showmessage('�����ɹ���',$forward);
		}
	break;
	
	case 'add'://�½��ļ���
	if($dosubmit)
		{
			if(!preg_match("/^[0-9a-z_-]+$/",$template)) showmessage('�ļ���������Ҫ��');
			$filename = $template;
			$filepath = $dir.$filename;
         	if(file_exists($filepath)) showmessage("�ļ��� $filepath �Ѵ��ڣ�");
			@chmod($filepath, 0777);//�ı��ļ���д����
			@mkdir($filepath);
			//template_compile($dirname, $template);
			$filedir[$dirname][$filename] = $templatename;
		    cache_write('name.inc.php', $filedir, $dir);
			showmessage("�����ɹ���<script language='javascript'>opener.location.reload();window.close();</script>");
		}
	else{
		 include tpl("templateproject_add");
		}
	break;
	//���Ŀ¼
	case 'deldir':
	  $files=$dir.$filename."/";
      $dh=opendir($files);
      while ($file=readdir($dh))
	  {
         $fullpath=$files.$file;
         @unlink($fullpath);
	}
	showmessage("�����ɹ���","?file=templateproject&action=dir&dirname=$dirname");
	break;
	
	case 'delete':
		if(!$filename) showmessage('�Ƿ�������');
		$filepath = $dir.$filename;
		dir_delete($filepath);
		
		unset($filedir[$dirname][$filename]);
		cache_write('name.inc.php', $filedir, $dir);
		
		unset($filedir[$filename]);
		cache_write('name.inc.php', $filedir, $dir);
		
	    showmessage('�����ɹ���',"?file=templateproject&action=dir&dirname=$dirname");
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
	   showmessage('�������Ʊ���ɹ���',$forward);
	  break;
	  
	  case 'setdefault':
		if(!$project) showmessage('��������',$forward);
	    set_config(array('TPL_NAME'=>$project));
		showmessage('�����ɹ���','?mod=phpsin&file=templates&action=cache&forward='.urlencode($forward));
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
	  
	  case 'updatefile'://�����ļ�������
	        $filedir[$dirname] = $tempname;
		    cache_write('name.inc.php', $filedir, $dir);
	        showmessage('ģ�����Ƹ��³ɹ���', $forward);
	  break;
	
}
?>

