<?php
require("../include/common.inc.php");
if(!$_userid) message('���½', $MODULE['member']['url'].'../member/login.php?forward='.urlencode(URL));
if(!$forward) $forward = HTTP_REFERER;

require CLASS_PATH."all.class.php";
$a=new all();
$table="collect";

switch($action)
  {
        case 'add':
		$contentid = intval($contentid);
		if(!$contentid) message('ȱ����Ϣid��������ѡ��Ҫ�ղص���Ϣ��', HTTP_REFERER);
		$c = $db->get_one("SELECT collectid FROM ".DB_PRE."collect WHERE `contentid`='$contentid' AND `userid`='$_userid'");
		if($c['collectid']) message('����Ϣ���Ѿ��ղأ�', $forward);
		$info = array('contentid'=>$contentid, 'userid'=>$_userid, 'addtime'=>TIME);
		$a->add($table,$info);
		message('�ղسɹ���', $forward);
        break;

        case 'delete':
        $a->delete($table,$where="collectid",$collectid);
	message('�����ɹ���', $forward);
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