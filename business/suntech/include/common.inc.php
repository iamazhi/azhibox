<?php
error_reporting(0);
session_start(); 
define('PHP_ROOT', str_replace("\\", '/', substr(dirname(__FILE__), 0, -7)));
define('MICROTIME_START', microtime());
define('IN_PHPJSJ',TRUE); 
define('CLASS_PATH', PHP_ROOT.'include/admin/');//class¼ÓÔØÂ·¾¶
define('CACHE_FORM', PHP_ROOT.'data/formguide/');
define('TIME', time());
set_magic_quotes_runtime(0);


require 'config.inc.php';
require 'global.fun.php';
require 'dir.func.php';
require 'form.class.php';
require 'content_form.class.php';
require 'output.class.php';
require "admin.lang.php";
require 'sql.func.php';
require "version.inc.php";
require "checkcode.class.php";

define('IP', ip());
define('HTTP_REFERER', isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '');
define('SCRIPT_NAME', isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : preg_replace("/(.*)\.php(.*)/i", "\\1.php", $_SERVER['PHP_SELF']));
define('QUERY_STRING', $_SERVER['QUERY_STRING']);
define('PATH_INFO', isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '');
define('DOMAIN', isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : preg_replace("/([^:]*)[:0-9]*/i", "\\1", $_SERVER['HTTP_HOST']));
define('PHPSIN_PATH', '/'); 
define('SCHEME', $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://');
define('SITE_URL', SCHEME.$_SERVER['HTTP_HOST'].PHPSIN_PATH);
define('RELATE_URL', isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : SCRIPT_NAME.(QUERY_STRING ? '?'.QUERY_STRING : PATH_INFO));

define('URL', SCHEME.$_SERVER['HTTP_HOST'].RELATE_URL);
define('RELATE_REFERER',urlencode(RELATE_URL));

if(function_exists('date_default_timezone_set')) date_default_timezone_set(TIMEZONE);
header('Content-type: text/html; charset='.CHARSET);


$dbclass = 'db_'.DB_DATABASE;
require $dbclass.'.php';
$db = new $dbclass;
$db->connect(DB_HOST, DB_USER, DB_PW, DB_NAME, DB_PCONNECT, DB_CHARSET);
$_groupid = 3;


require 'session_'.SESSION_STORAGE.'.class.php';
$session = new session();
session_set_cookie_params(0, COOKIE_PATH, COOKIE_DOMAIN);


if($_REQUEST)
{
	if(MAGIC_QUOTES_GPC)
	{
		$_REQUEST = new_stripslashes($_REQUEST);
		if($_COOKIE) $_COOKIE = new_stripslashes($_COOKIE);
		extract($db->escape($_REQUEST), EXTR_SKIP);
	}
	else
	{
		$_POST = $db->escape($_POST);
		$_GET = $db->escape($_GET);
		$_COOKIE = $db->escape($_COOKIE);
		@extract($_POST,EXTR_SKIP);
		@extract($_GET,EXTR_SKIP);
		@extract($_COOKIE,EXTR_SKIP);
	}
	if(!defined('IN_ADMIN')) $_REQUEST = filter_xss($_REQUEST, ALLOWED_HTMLTAGS);
	if($_COOKIE) $db->escape($_COOKIE);
}


$CACHE = cache_read('common.php');
if(!$CACHE)
{
	require_once 'cache.func.php';
	cache_all();
	$CACHE = cache_read('common.php');
}
extract($CACHE);
unset($CACHE);

$M = $TEMP = array();
if(!isset($mod)) $mod = 'phpsin';
if($mod != 'phpsin')
{
	isset($MODULE[$mod]) or exit($LANG['module_not_exists']);
	//$langfile = defined('IN_ADMIN') ? $mod.'_admin' : $mod;
	//@include PHP_ROOT.'languages/'.LANG.'/'.$langfile.'.lang.php';
	$M = cache_read('module_'.$mod.'.php');
}
 
 $user_id=$_SESSION['user_id'];
if($user_id!="")
{
            $usernames=$_SESSION['username'];
            $_passwords=$_SESSION['password'];
	}
$_userid = 0;
$_username = '';
$_groupid = 3;
$phpweb_auth = get_cookie('auth'); 

if($phpweb_auth)
{
	$auth_key = md5(AUTH_KEY.$_SERVER['HTTP_USER_AGENT']);
	list($_userid, $_password) = explode("\t", phpweb_auth($phpweb_auth, 'DECODE', $auth_key));
	$_userid = intval($_userid);
	$sql_member = "SELECT * FROM `".DB_PRE."member_cache` WHERE `userid`=$_userid";
	$r = $db->get_one($sql_member);
	if(!$r && cache_member())
	{
		$r = $db->get_one($sql_member);
	}
	if($r && $r['password'] === $_password)
	{
	
		@extract($r, EXTR_PREFIX_ALL, '');
	}
	else
	{
		$_userid = 0;
		$_username = '';
		$_groupid = 3;
		
	}
	unset($r, $phpweb_auth, $phpweb_auth_key, $_password, $sql_member);
	
}

if(function_exists('date_default_timezone_set')) date_default_timezone_set(TIMEZONE);
?>
