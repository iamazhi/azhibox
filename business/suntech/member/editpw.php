<?php
require("../include/common.inc.php");
if(!$_userid) message("�������µ�½��", $M['url'].'member/login.php?forward='.urlencode(URL));
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
           message ("�����޸ĳɹ��������µ�½!",$forward);
             }
           else
            {
             message ("ȷ�����벻��ȷ������������!",$forward);
              }
        }
      else
       {
          message ("ԭʼ���벻��ȷ!",$forward);
           }
	}

else
{

   }



include template('member','userpass');

?>