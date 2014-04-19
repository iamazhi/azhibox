<?php
define('IN_ADMIN', TRUE);
require dirname(__FILE__).'/include/common.inc.php';
require FILE_DIR."/admin/global.func.php";
require FILE_DIR."/priv_role.class.php";
require FILE_DIR.'/cache.func.php';
require FILE_DIR.'/log.class.php';
require CLASS_PATH."/all.class.php";
$priv_role = new priv_role();
$forward = HTTP_REFERER;
require CLASS_PATH."admin.class.php";
$ht_homes=new admin();
$al = new all();
$checkcode=new checkcode();

if($_userid)
{
	$ht_role=$ht_homes->listtable($table="role");
	$ht_admin_role=$ht_homes->listtable($table="admin_role","userid='$_userid'");
        if(!$m && !$file && !$index) {header("Location:?m=login");exti;}
        }
//else{
//showmessage("请重新登陆！",'?login='.urlencode(URL),1,1);
//}


switch($m)
{
  case 'manage':

	  if($_userid)
	  {
	     include ("admin/manage.php");
	     exit;
             }
	    else
	      {
		    header("Location:?m=failed");
		    }

	  break;
	  
  case 'loginout':
    		set_cookie('auth', '');
		set_cookie('username', '');
		unset($_SESSION);
		if($action == 'ajax')
		{
			echo 1;
			exit;
		}
	        showmessage("退出管理中心！",'?login='.urlencode(URL),1,1);
  break;


  case 'login':
  $islogin=$db->get_one("SELECT * FROM ".DB_PRE."admin WHERE username='$_username'");
  if(!$islogin)
  {
	  /*
  if($_SESSION['code'] != $yanzheng)
   { 
      showmessage('验证码不正确,请重新输入! ',$forward);exit;
	  }*/
  $query = $db->query("select * from ".DB_PRE."member "."where username = '$username' and password =  '".md5(PASSWORD_KEY.$password)."'");
  if($row = $db->fetch_array($query))
     {
	$rs=$db->get_one("SELECT * FROM ".DB_PRE."admin WHERE username='".$row["username"]."'");
	if($rs)
	{
 $r=$al->get($table="member_info",$where="userid='$row[userid]'");
	   
	   $info["lastloginip"]=IP;
	   $info["lastlogintime"]=TIME;
	   $info["logintimes"]=$r["logintimes"]+1;
	   
	if(!$cookietime) $get_cookietime = get_cookie('cookietime');
	$_cookietime = $cookietime ? intval($cookietime) : ($get_cookietime ? $get_cookietime : 0);
        $cookietime = $_cookietime ? TIME + $_cookietime : 0;
	$_userid = $row['userid'];
	$md5_password=$row['password'];
	$phpweb_auth_key = md5(AUTH_KEY.$_SERVER['HTTP_USER_AGENT']);
	$phpweb_auth = phpweb_auth($_userid."\t".$md5_password, 'ENCODE', $phpweb_auth_key);
		
	        set_cookie('auth', $phpweb_auth, $cookietime);
		set_cookie('cookietime', $_cookietime, $cookietime);
		set_cookie('username', $username, $cookietime);
		
	   if($cookietime) $jscookiedays = $cookietime/3600/24;
	   $script = "<script language='javascript'>";
	   $script .= "setcookie('username', '".$row["username"]."', '".$jscookiedays."');";
	   $script .= "</script>";		
	   
       $al->edit($table="member_info",$info,$where='userid',$row["userid"]);
       header("Location:?m=manage");exit();
 
         }
		elseif($rs["disabled"]==1)
		 {
			showmessage("帐号锁定，请联系超级管理员！",$forward); 
			}
		
		else
		{
			showmessage("请联系超级管理员！",$forward); 
			}
			
	    }
		else
		{
			 showmessage("账号或密码不正确，请重新登陆！",$forward);
			}
}
else { showmessage("成功登陆管理平台！","?m=manage");exit;}
  break;
  default:

break;
}

        $URL_=$_GET["file"];
	if($index=="manage")
	{    $Here=$db->get_one("SELECT * from ".DB_PRE."member_info WHERE userid='$_userid'");
		   include("admin/manframe.php");exit;
		}

		if($file==="$URL_")
		{
                  if($_userid)
                       {
			include"admin/".($URL_.".php");
                        exit;
                         } 
                         else
                         {
                          header("Location:?m=failed");exit;
                           }
			}




$isimg="<img src='admin/skin/images/banner.jpg' width='597' height='270'/>";

if($api=="code")
{
  $checkcode->doimage();
  $_SESSION['code']=$checkcode->get_code();
}

include tpl("login");
?> 
 