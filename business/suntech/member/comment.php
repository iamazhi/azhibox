<?php
require("../include/common.inc.php");
if(!$_userid) message('���½', $MODULE['member']['url'].'../member/login.php?forward='.urlencode(URL));
if(!$forward) $forward = HTTP_REFERER;

require CLASS_PATH."all.class.php";
$a=new all();
$table="comment";
switch($action)
  {
        case 'delete':
        $a->delete($table,$where="commentid",$commentid);
	message('�����ɹ���', $forward);
        break;
  }
include template('member','comment');

?>