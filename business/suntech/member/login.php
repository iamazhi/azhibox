<?php
require("../include/common.inc.php");
$head['title'] = '用户登陆'.'_'.($get["title"] ? $get["title"] : $PHPSIN['sitename']);
if($_userid) message("您已经登陆，转至会员中心！", "member/");
require CLASS_PATH."all.class.php";
$a=new all();
$head['keywords'] = $get["keywords"];
$head['description'] = $get["description"];
$head['icpno'] = $PHPWEB['icpno'];
$head['copyright'] = $PHPWEB['copyright'];



switch($action)
{case 'ajax':
		$username = iconv('utf-8', CHARSET, $username);
		$password = iconv('utf-8', CHARSET, $password);
        if($_username && $_password)
		{
			echo 1;
			exit;
			}
			else
			{
				echo '0';
				exit;
				}

	
		break;
	case 'login':
	$query = $db->query("select * from ".DB_PRE."member "."where username = '$username' and password = '".md5(PASSWORD_KEY.$password)."'")or die("SQL语句执行失败");
  	if($row = $db->fetch_array($query))
        {
	
   /*    session_start(); 
       $_SESSION['user_id'] = $row['userid'];
       $_SESSION['username'] = $row['username'];
       $_SESSION['password'] = $row['password'];*/
	   
	   $r=$a->get($table="member_info",$where="userid='$row[userid]'");
	   
	   $info["lastloginip"]=IP;
	   $info["lastlogintime"]=TIME;
	   $info["logintimes"]=$r["logintimes"]+1;
	   
	 //   setcookie('username',$row["username"],time() + 14400);//7天后过期


	
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
	   
	   $a->edit($table="member_info",$info,$where='userid',$row["userid"]);
           message("登陆成功！,跳转会员中心".$script,"../member/");

	    }
		else
		{
			 message("账号或密码不正确，请重新登陆！","../member/login.php");
			}
	break;
	
	
	

	default:
	include template('member','login');
	break;
	}

//echo get_cookie('auth');
?>
