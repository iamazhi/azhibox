<?php
define('PC_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR);
//网站路径配置
if(!defined('PHPSIN_PATH')) define('PHPSIN_PATH', PC_PATH.'..'.DIRECTORY_SEPARATOR);
@set_time_limit(1000);
error_reporting(0);
if(phpversion() < '5.3.0') set_magic_quotes_runtime(0);
if(phpversion() < '5.2.0') exit('您的php版本过低，不能安装本软件，请升级到5.2.0或更高版本再安装，谢谢！');

include '../include/config.inc.php';
require '../include/global.fun.php';
//define('INSTALL_MODULE',true);
//defined('IN_PHPJSJ') or exit('No permission resources.');
if(file_exists('install.lock')) exit('您已经安装过PHPSIN,如果需要重新安装，请删除 ./install/install.lock 文件！');
//pc_base::load_sys_class('param','','','0');
//pc_base::load_sys_func('global');
//pc_base::load_sys_func('dir');
//$steps = include PHPCMS_PATH.'install/step.inc.php';
$step = trim($_REQUEST['step']) ? trim($_REQUEST['step']) : 1;
//$pos = strpos(get_url(),'install/install.php');
//$siteurl = substr(get_url(),0,$pos);
if(strrpos(strtolower(PHP_OS),"win") === FALSE) {
	define('ISUNIX', TRUE);
} else {
	define('ISUNIX', FALSE);
}

$mode = 0777;

switch($step)
{
    case '1': //安装许可协议
		//param::set_cookie('reg_sso_succ','');
		$license = file_get_contents(PHPSIN_PATH."install/license.txt");
		include PHPSIN_PATH."install/step/step".$step.".tpl.php";

		break;
		
	case '2':  //环境检测 (FTP帐号设置）
        $PHP_GD  = '';
		if(extension_loaded('gd')) {
			if(function_exists('imagepng')) $PHP_GD .= 'png';
			if(function_exists('imagejpeg')) $PHP_GD .= ' jpg';
			if(function_exists('imagegif')) $PHP_GD .= ' gif';
		}
		$PHP_JSON = '0';
		if(extension_loaded('json')) {
			if(function_exists('json_decode') && function_exists('json_encode')) $PHP_JSON = '1';
		}
		//新加fsockopen 函数判断,此函数影响安装后会员注册及登录操作。
		if(function_exists('fsockopen')) {
			$PHP_FSOCKOPEN = '1';
		}
        $PHP_DNS = preg_match("/^[0-9.]{7,15}$/", @gethostbyname('www.phpcms.cn')) ? 1 : 0;
		//是否满足phpcms安装需求
		$is_right = (phpversion() >= '5.2.0' && extension_loaded('mysql') && $PHP_JSON && $PHP_GD && $PHP_FSOCKOPEN) ? 1 : 0;		
		include PHPSIN_PATH."install/step/step".$step.".tpl.php";
		break;
		
		case '3'://选择安装模块
		require PHPSIN_PATH.'install/modules.inc.php';
		include PHPSIN_PATH."install/step/step".$step.".tpl.php";
		break;
		case '4': //检测目录属性
		$selectmod = $_POST['selectmod'];
		$testdata = $_POST['testdata'];
		$selectmod = isset($selectmod) ? ','.implode(',', $selectmod) : '';
		$install_phpsin = (isset($_POST['install_phpsin']) && !empty($_POST['install_phpsin'])) ? intval($_POST['install_phpsin']) : showmessage('请选择安装类型');
		$needmod = 'admin,phpsin';
		$reg_sso_status = '';
	//	$reg_sso_succ = param::get_cookie('reg_sso_succ');

		
		$chmod_file = ($install_phpsin == 1) ? 'chmod.txt' : 'chmod_unsso.txt';
		$selectmod = $needmod.$selectmod;
		$selectmods = explode(',',$selectmod);
		$files = file(PHPSIN_PATH."install/".$chmod_file);		
		foreach($files as $_k => $file) {
			$file = str_replace('*','',$file);
			$file = trim($file);
			if(is_dir(PHPSIN_PATH.$file)) {
				$is_dir = '1';
				$cname = '目录';
				//继续检查子目录权限，新加函数
				$write_able = writable_check(PHPSIN_PATH.$file);
			} else {
				$is_dir = '0';
				$cname = '文件';
			}
			//新的判断
			if($is_dir =='0' && is_writable(PHPSIN_PATH.$file)) {
				$is_writable = 1;
			} elseif($is_dir =='1' && dir_writeable(PHPSIN_PATH.$file)){
				$is_writable = $write_able;
				if($is_writable=='0'){
					$no_writablefile = 1;
				}
			}else{
				$is_writable = 0;
 				$no_writablefile = 1;
  			}
							
			$filesmod[$_k]['file'] = $file;
			$filesmod[$_k]['is_dir'] = $is_dir;
			$filesmod[$_k]['cname'] = $cname;			
			$filesmod[$_k]['is_writable'] = $is_writable;
		}
		if(dir_writeable(PHPSIN_PATH)) {
			$is_writable = 1;
		} else {
			$is_writable = 0;
		}
		$filesmod[$_k+1]['file'] = '网站根目录';
		$filesmod[$_k+1]['is_dir'] = '1';
		$filesmod[$_k+1]['cname'] = '目录';			
		$filesmod[$_k+1]['is_writable'] = $is_writable;						
		include PHPSIN_PATH."install/step/step".$step.".tpl.php";
		break;
		
		case '5': //配置帐号 （MYSQL帐号、管理员帐号、）
		//$database = pc_base::load_config('database');
		$testdata = $_POST['testdata'];
		extract($database['default']);
		$selectmod = $_POST['selectmod'];
		$install_phpsin = $_POST['install_phpsin'];
		include PHPSIN_PATH."install/step/step".$step.".tpl.php";
		break;
		
		case '6': //安装详细过程
		extract($_POST);
		$testdata = $_POST['testdata'];
		include PHPSIN_PATH."install/step/step".$step.".tpl.php";
		break;
		
		case '7': //完成安装
		//$pos = strpos(get_url(),'install/install.php');
		//$url = substr(get_url(),0,$pos);
		//设置cms与sso 报错信息
		//set_config(array('errorlog'=>'1'),'system');			
		file_put_contents('install.lock','');
		include PHPSIN_PATH."install/step/step".$step.".tpl.php";
		//删除安装目录
		//delete_install(PHPSIN_PATH.'install/');
		break;
		
		case 'installmodule': //执行SQL
		
		    extract($_POST);
		//echo $dbcharset;
		    if($module == 'admin') { 
			$cookie_pre = random(10, 'abcdefghigklmnopqrstuvwxyzABCDEFGHIGKLMNOPQRSTUVWXYZ');
			$auth_key = random(20, 'abcdefghigklmnopqrstuvwxyzABCDEFGHIGKLMNOPQRSTUVWXYZ');
			$PHP_SELF = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : (isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : $_SERVER['ORIG_PATH_INFO']);
			$rootpath = str_replace("\\","/",dirname($PHP_SELF));
			$rootpath = strlen($rootpath)>1 ? $rootpath."/" : "/";
			$config = array('DB_HOST'=>$dbhost,
						'DB_USER'=>$dbuser,
						'DB_PW'=>$dbpw,
						'DB_NAME'=>$dbname,
						'DB_PRE'=>$tablepre,
						'PHPCMS_PATH'=>$rootpath,
						'DB_PCONNECT'=>$pconnect,
						'DB_CHARSET'=>$dbcharset,
						'COOKIE_PRE'=>$cookie_pre,
						'PHPSIN_PATH'=>$rootpath,
						'AUTH_KEY'=>$auth_key,
						'ADMIN_EMAIL'=>$email,
						'PASSWORD_KEY'=>$password_key,
						);
			}	
		
		set_config($config);
		$config_js = "var phpweb_path = '$rootpath';\nvar cookie_pre = '".COOKIE_PRE."';\nvar cookie_domain = '';\nvar cookie_path = '/';";
		
		file_put_contents(PHPSIN_PATH.'data/config.js', $config_js);
		@chmod(PHPSIN_PATH.'data/config.js', 0777);

		$lnk = mysql_connect($dbhost, $dbuser, $dbpw) or die ('Not connected : ' . mysql_error());
		$version = mysql_get_server_info();

			if($version > '4.1' && $dbcharset) {
				mysql_query("SET NAMES '$dbcharset'");
			}
			
			if($version > '5.0') {
				mysql_query("SET sql_mode=''");
			}
												
			if(!@mysql_select_db($dbname)){
				@mysql_query("CREATE DATABASE $dbname");
				if(@mysql_error()) {
					echo 1;exit;
				} else {
					mysql_select_db($dbname);
				}
			}
			
			$dbfile =  'phpsin_db.sql';	
			if(file_exists(PHPSIN_PATH."install/main/".$dbfile)) {
				$sql = file_get_contents(PHPSIN_PATH."install/main/".$dbfile);
				_sql_execute($sql);				
			}
			//创建sso管理员信息
			if(CHARSET=='gbk') $username = iconv('UTF-8','GBK',$username);
			$password = md5(PASSWORD_KEY.$password);
			_sql_execute("INSERT INTO ".$tablepre."admin (`userid`,`username`,`allowmultilogin`,`alloweditpassword`,`editpasswordnextlogin`,`disabled`) VALUES ('1','$username',1,1,0,0)");
			_sql_execute("INSERT INTO ".$tablepre."admin_role (`userid`, `roleid`) VALUES(1, 1)");				
			_sql_execute("INSERT INTO ".$tablepre."member_info (`userid`,`regip`,`regtime`) VALUES ('1','".IP."','".TIME."')");
			_sql_execute("INSERT INTO ".$tablepre."member (`userid`,`username`,`password`,`email`,`groupid`,`modelid`) VALUES ('1','$username','$password','$email',1,10)");
							

		break;
		
		case 'dbtest':
		extract($_GET);
		if(!@mysql_connect($dbhost, $dbuser, $dbpw)) {
			exit('2');
		}
		$server_info = mysql_get_server_info();
		if($server_info < '4.0') exit('6');
		if(!mysql_select_db($dbname)) {
			if(!@mysql_query("CREATE DATABASE `$dbname`")) exit('3');
			mysql_select_db($dbname);
		}
		$tables = array();
		$query = mysql_query("SHOW TABLES FROM `$dbname`");
		while($r = mysql_fetch_row($query)) {
			$tables[] = $r[0];
		}
		if($tables && in_array($tablepre.'module', $tables)) {
			exit('0');
		}
		else {
			exit('1');
		}
		break;
}
/*
function format_textarea($string) {
	return nl2br(str_replace(' ', '&nbsp;', htmlspecialchars($string)));
}*/

function _sql_execute($sql,$r_tablepre = '',$s_tablepre = 'phpsin_') {
    $sqls = _sql_split($sql,$r_tablepre,$s_tablepre);
	if(is_array($sqls))
    {
		foreach($sqls as $sql)
		{
			if(trim($sql) != '')
			{
				mysql_query($sql);
			}
		}
	}
	else
	{
		mysql_query($sqls);
	}
	return true;
}

function _sql_split($sql,$r_tablepre = '',$s_tablepre='phpsin_') {
	global $dbcharset,$tablepre;
	$r_tablepre = $r_tablepre ? $r_tablepre : $tablepre;
	if(mysql_get_server_info > '4.1' && $dbcharset)
	{
		$sql = preg_replace("/TYPE=(InnoDB|MyISAM|MEMORY)( DEFAULT CHARSET=[^; ]+)?/", "ENGINE=\\1 DEFAULT CHARSET=".$dbcharset,$sql);
	}
	
	if($r_tablepre != $s_tablepre) $sql = str_replace($s_tablepre, $r_tablepre, $sql);
	$sql = str_replace("\r", "\n", $sql);
	$ret = array();
	$num = 0;
	$queriesarray = explode(";\n", trim($sql));
	unset($sql);
	foreach($queriesarray as $query)
	{
		$ret[$num] = '';
		$queries = explode("\n", trim($query));
		$queries = array_filter($queries);
		foreach($queries as $query)
		{
			$str1 = substr($query, 0, 1);
			if($str1 != '#' && $str1 != '-') $ret[$num] .= $query;
		}
		$num++;
	}
	return $ret;
}

function dir_writeable($dir) {
	$writeable = 0;
	if(is_dir($dir)) {  
        if($fp = @fopen("$dir/chkdir.test", 'w')) {
            @fclose($fp);      
            @unlink("$dir/chkdir.test"); 
            $writeable = 1;
        } else {
            $writeable = 0; 
        } 
	}
	return $writeable;
}

function writable_check($path){
	$dir = '';
	$is_writable = '1';
	if(!is_dir($path)){return '0';}
	$dir = opendir($path);
 	while (($file = readdir($dir)) !== false){
		if($file!='.' && $file!='..'){
			if(is_file($path.'/'.$file)){
				//是文件判断是否可写，不可写直接返回0，不向下继续
				if(!is_writable($path.'/'.$file)){
 					return '0';
				}
			}else{
				//目录，循环此函数,先判断此目录是否可写，不可写直接返回0 ，可写再判断子目录是否可写 
				$dir_wrt = dir_writeable($path.'/'.$file);
				if($dir_wrt=='0'){
					return '0';
				}
   				$is_writable = writable_check($path.'/'.$file);
 			}
		}
 	}
	return $is_writable;
}

function set_config($config) {
	if(!is_array($config)) return FALSE;
	$configfile = PHPSIN_PATH.'include/config.inc.php';
	if(!is_writable($configfile)) showmessage('Please chmod ./include/config.inc.php to 0777 !');
	$pattern = $replacement = array();
	foreach($config as $k=>$v)
	{
		if(in_array($k,array('UPLOAD_MAXSIZE','UPLOAD_MAXUPLOADS','SESSION_TTL','CACHE_PAGE_TTL','CACHE_PAGE_INDEX_TTL','CACHE_PAGE_CATEGORY_TTL','CACHE_PAGE_LIST_TTL','CACHE_PAGE_CONTENT_TTL'))) $v = intval($v);
		$pattern[$k] = "/define\(\s*['\"]".strtoupper($k)."['\"]\s*,\s*([']?)[^']*([']?)\s*\)/is";
        $replacement[$k] = "define('".$k."', \${1}".$v."\${2})";
	}
	$str = file_get_contents($configfile);
	$str = preg_replace($pattern, $replacement, $str);
	return file_put_contents($configfile, $str);		
}

function set_sin_config($config,$cfgfile) {
	if(!$config || !$cfgfile) return false;
	$configfile = PHPSIN_PATH.'phpsin_server'.DIRECTORY_SEPARATOR.'caches'.DIRECTORY_SEPARATOR.'configs'.DIRECTORY_SEPARATOR.$cfgfile.'.php';
	if(!is_writable($configfile)) showmessage('Please chmod '.$configfile.' to 0777 !');
	$pattern = $replacement = array();
	foreach($config as $k=>$v) {
			$v = trim($v);
			$configs[$k] = $v;
			$pattern[$k] = "/'".$k."'\s*=>\s*([']?)[^']*([']?)(\s*),/is";
        	$replacement[$k] = "'".$k."' => \${1}".$v."\${2}\${3},";							
	}
	$str = file_get_contents($configfile);
	$str = preg_replace($pattern, $replacement, $str);
	return file_put_contents($configfile, $str);		
}

function remote_file_exists($url_file){
	$headers = get_headers($url_file);
	if (!preg_match("/200/", $headers[0])){
		return false;
	}
	return true;
}
function delete_install($dir) {
	$dir = dir_path($dir);
	if (!is_dir($dir)) return FALSE;
	$list = glob($dir.'*');
	foreach($list as $v) {
		is_dir($v) ? delete_install($v) : @unlink($v);
	}
    return @rmdir($dir);
}