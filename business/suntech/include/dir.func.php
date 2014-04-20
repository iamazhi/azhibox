<?php 
function dir_path($path)
{
	$path = str_replace('\\', '/', $path);
	if(substr($path, -1) != '/') $path = $path.'/';
	return $path;
}
function dir_create($path, $mode = 0777)
{
	if(is_dir($path)) return TRUE;
	global $ftp;
	$ftp_enable = 0;
	if(FTP_ENABLE && extension_loaded('ftp') && !is_object($ftp))
	{
		require_once 'ftp.class.php';
		$ftp = new ftp(FTP_HOST, FTP_PORT, FTP_USER, FTP_PW, FTP_PATH);
		if($ftp->error) return false;
		$ftp_enable = 1;
	}
	$path = dir_path($path);
	$temp = explode('/', $path);
	$cur_dir = '';
	$max = count($temp) - 1;
	for($i=0; $i<$max; $i++)
	{
		$cur_dir .= $temp[$i].'/';
		if(is_dir($cur_dir)) continue;
		if(!@mkdir($cur_dir, 0777) && $ftp_enable)
		{
			$dir = str_replace(PHP_ROOT, '', $cur_dir);
            $ftp->mkdir($dir);
			$ftp->chmod($mode, $dir);
		}
		@chmod($cur_dir, 0777);
	}
	return is_dir($path);
}

function dir_delete($dir)
{
	$dir = dir_path($dir);
	if(!is_dir($dir)) return FALSE;
	$systemdirs = array('','../templates/');
	if(substr($dir, 0, 0) == '.' || in_array($dir, $systemdirs)) exit("Cannot remove system dir $dir !");
	$list = glob($dir.'*');
	foreach($list as $v)
	{
		is_dir($v) ? dir_delete($v) : @unlink($v);
	}
    return @rmdir($dir);
}


function dir_list($path, $exts = '', $list= array())
{
	$path = dir_path($path);
	$files = glob($path.'*');
	foreach($files as $v)
	{
		$fileext = fileext($v);
		if(!$exts || preg_match("/\.($exts)/i", $v))
		{
			$list[] = $v;
			if(is_dir($v))
			{
				$list = dir_list($v, $exts, $list);
			}
		}
	}
	return $list;
}

function del_dir($dir) {
   //先删除目录下的文件：
   if($dir)
   {
   $dh=opendir($dir);
   while ($file=readdir($dh)) {
     if($file!="." && $file!="..") {
       $fullpath=$dir."/".$file;
       if(!is_dir($fullpath)) {
           @unlink($fullpath);
       } else {
           del_dir($fullpath);
       }
      }
	 }
   }
  
   closedir($dh);
   //删除当前文件夹：
   if(@rmdir($dir)) {
     return true;
   } else {
     return false;
   }
 }
?>