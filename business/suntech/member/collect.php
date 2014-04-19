<?php
require("../include/common.inc.php");
if(!$_userid) message('请登陆', $MODULE['member']['url'].'../member/login.php?forward='.urlencode(URL));
if(!$forward) $forward = HTTP_REFERER;

require CLASS_PATH."all.class.php";
$a=new all();
$table="collect";

switch($action)
  {
        case 'add':
		$contentid = intval($contentid);
		if(!$contentid) message('缺少信息id，请重新选择要收藏的信息！', HTTP_REFERER);
		$c = $db->get_one("SELECT collectid FROM ".DB_PRE."collect WHERE `contentid`='$contentid' AND `userid`='$_userid'");
		if($c['collectid']) message('此信息您已经收藏！', $forward);
		$info = array('contentid'=>$contentid, 'userid'=>$_userid, 'addtime'=>TIME);
		$a->add($table,$info);
		message('收藏成功！', $forward);
        break;

        case 'delete':
        $a->delete($table,$where="collectid",$collectid);
	message('操作成功！', $forward);
        break;

	default:
                require CLASS_PATH."collect.class.php";
                $collect = new collect();

		$data = $a->listinfo("$table a,".DB_PRE."content b",$where="a.contentid=b.contentid AND a.userid=$_userid");
//		foreach($data['collect'] as $c)
//		{
//		echo $c["contentid"];
//		}

                include template('member','collect');
	break;

  }



?>