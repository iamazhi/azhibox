<?php
//require './include/common.inc.php';
$action = trim($action) ? $action : '';
if($action != 'ajaxcheckcode')
{
    if(!$M['ischecklogin']) {if(!$_userid) showmessage('���ȵ�½���ڷ���',$MODULE['member']['url'].'login.php?forward='.urlencode(URL));}
}
$head['keywords'] = $PHPSIN['keywords'];
$head['description'] = $PHPSIN['description'];
require_once PHP_ROOT.'/include/form.class.php';
require  $MODULE[comment][path].'comment/comment.class.php';
$comments = new comment();
switch ( $action )
{
	case 'vote':
		if(!preg_match('/([a-z0-9\_\-]+)/',$field)) showmessage('�Ƿ�����');
		if(!preg_match('/([a-z0-9\_\-]+)/',$id)) showmessage('�Ƿ�����');
	
		$count = $comments->ajaxupdate($field, $id);
		echo ' '.$LANG[$field].'('.$count[$field].')';
	break;
	case 'add':
        $url = "?keyid=$keyid&verify=$verify";
		$content = new_htmlspecialchars($contenttext);
        $content = trim($content);
        if(strlen($content) >= 1000) showmessage('����̫�������1000������',$url);
		if(empty($content)) showmessage('���ݲ���Ϊ��',$url);
		$keyid = trim($keyid);
		if($comments->add($commentid, $content, $keyid)) showmessage('�ظ��ɹ�',$url);
	break;
	case 'comment':
		$post = $comments->ajaxpost();
		echo $post;
	break;
	default:
        $keyid = trim($keyid);
        $verify = trim($verify);
        if(empty($keyid) || !keyid_verify($keyid, $verify)) showmessage('�Ƿ�����');
		$setting = cache_read('module_comment.php');
		$content = keyid_get($keyid);
        $url      = $content['url'];
		$head['title'] = $title   = $content['title'];
		$pagesize	= $setting['maxnum'] ? $setting['maxnum'] : 10;
		$page		= isset($page) ? intval($page) : 1;
		$comments = $comments->get_list($keyid,$page, $pagesize);
		$pages = $comments['pages'];
		include template('comment', 'list');//reply
	break;
	case 'addpost':
      //  checkcode($checkcode,$M['enablecheckcode']);
		$content = new_htmlspecialchars($comment);
        $content = trim($content);
        if(strlen($content) >= 1000)
        {
            showmessage('����̫�������1000������');
        }
		if(empty($content)) showmessage('���ݲ���Ϊ��');
        $keyid = trim($keyid);
		if($comments->addpost($content, $keyid))
        showmessage('����ɹ�', HTTP_REFERER);
	break;
    case 'ajaxpost':
        if(empty($keyid) || !keyid_verify($keyid, $verify)) showmessage('�Ƿ�����');
        $content = keyid_get($keyid);
        $title   = $content['title'];
        include template('comment', 'load');
    break;
    case 'ajaxcheckcode':
        if($M['enablecheckcode'])
        {
            $code = form::checkcode('checkcode',5);
            echo $code;
        }
        else
        {
            $code = '';
            echo $code;
        }
    break;
}
?>