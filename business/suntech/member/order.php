<?php
require "../include/common.inc.php";
if(!$user_id) message('请登陆', $MODULE['member']['url'].'../member/login.php?login=manage&forward='.urlencode(URL));
$forward = HTTP_REFERER;
			
$head['title'] = "会员中心".'_'.$PHPSIN['meta_title'];
$head['keywords'] = $PHPSIN['meta_keywords'];
$head['description'] = $PHPSIN['meta_description'];
$head['icpno'] = $PHPSIN['icpno'];
$head['copyright'] = $PHPSIN['copyright'];

require CLASS_PATH."all.class.php";
$a=new all();
if($contentid){
    $number=$number=="" ? $number=1 :$number;
	$info=$a->get($table="member_detail",$where="userid='$user_id'");
	include template('member','orders');
	}
switch($action)
{
	case'confirm':
	if($dosubmit)
	{
		
		}
	else
	{
	$contentid = $d["contentid"];
	include template("member","orders_confirm");
	}
	break;
	
	case 'add':
	$r=$a->get($table="member_detail",$where="userid='$user_id'");
	$content=$a->get("content","contentid='$d[contentid]'");
	$info['contentid']=$content["contentid"];
	$info['goodsname']=$content["title"];
	$info['goodsurl']=$content["url"];
	$info['unit']=$get["unit"];
	
	$address=$a->get($table="order_deliver",$where="deliverid='$deliverid'");
	
	$info['consignee']=$d["consignee"];
	$info['areaid']=$d["areaid"];
	$info['telephone']=$d["telephone"];
	$info['mobile']=$d["mobile"];
	$info['address']=$d["address"];
	$info['postcode']=$d["postcode"];

	$info['userid']=$user_id;
	$info['username']=$username;
	$info['ip']=IP;
	$info['time']=TIME;
	$info['date']=date("Y-m-d");
	$info['status']=0;

	$sql=$a->add($table="order",$info);
	//log
	$isid=$db->insert_id($sql);
	$infos["orderid"]=$isid;
	$infos["laststatus"]=0;
	$infos["status"]=0;
	$infos["note"]="下单";
	$infos["userid"]=$user_id;
	$infos["username"]=$username;
	$infos["ip"]=IP;
	$infos["time"]=TIME;
	$a->add($table="order_log",$infos);
	message("订单生成！","member/index.php?template=order");
	break;
	}
?>
