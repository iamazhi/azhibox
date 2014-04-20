<?php
require("../include/common.inc.php");
if(!$_userid) message("请您重新登陆！", $M['url'].'member/login.php?forward='.urlencode(URL));
if(!$forward) $forward = HTTP_REFERER;

require CLASS_PATH."all.class.php";
$a=new all();

if($dosubmit)
{
      $data=$a->get("member","password = '".md5("$old_password")."'");
      if($data)
      {
          if($new_password == $chk_password)
          {
           $password = md5($new_password);
           $arr_password = array('password'=>$password);
           $db->update(DB_PRE."member", $arr_password, "userid='$_userid'");
           $db->update(DB_PRE."member_cache", $arr_password, "userid='$userid'");
           message ("密码修改成功，请重新登陆!",$forward);
             }
           else
            {
             message ("确认密码不正确，请重新输入!",$forward);
              }
        }
      else
       {
          message ("原始密码不正确!",$forward);
           }
	}

else
{

   }



include template('member','userpass');

?>