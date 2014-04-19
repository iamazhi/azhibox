<?php
defined('IN_PHPJSJ') or exit('Access Denied');

$submenu = array(
	array($LANG['all_comment'],'?mod=phpcms&file=setting&tab=5'),
	);

require CLASS_PATH."comment.class.php";
$comment= new comment();
switch($action)
{
	case'manage':
	$condition = array();
        if (!empty($userid))         {$userid = intval($userid);$condition[] = " `userid` = '$userid' ";}
		if (isset($keyid))  		$condition[] = " `keyid` = '$keyid' ";
		if ($status == '0' || $status == '1')  		$condition[] = " `status` = '$status' ";
		if(isset($ip)) 				$condition[] = " `ip` = '$ip'";
        if($srchfrom)               {$time = TIME; $timeid = TIME - $timeid*24*60*60; $condition[] = " `addtime` >= '$timeid' AND `addtime` <= '$time'";}
		if(!empty($keywords)) 		{$keywords = trim($keywords);$condition [] = " `username` LIKE '%$keywords%' OR `content` LIKE '%$keywords%' " ;}
		$pagesize	= $PHPSIN['pagesize'] ? $PHPSIN['pagesize'] : 20;
		$page		= isset($page) ? intval($page) : '1' ;
		$comments = $comment->get_list($condition, $page, $pagesize);
		$pages = $comments['pages'];
        include tpl('comment_manage');
	break;
	case 'pass':
		if( empty( $cid ) ){
			showmessage('请选择要删除的评论','?file=comment&action=manage&status=0');
		}
		if ( isset($cid) && $comment->pass( $cid, $status) ) {
			showmessage($LANG['operation_success'], '?file=comment&action=manage');
		}
		showmessage($LANG['operation_failure']);
	break;
	case 'delete':
		if( empty( $cid ) )
        {
			showmessage('请选择要删除的评论');
		}
		if ( $comment->drop($cid) )
        {
			showmessage($LANG['operation_success'], '?file=comment&action=manage');
		}
        else
        {
			showmessage($LANG['operation_failure']);
		}
	break;

	case 'setting':
	if($dosubmit)
	{
		$setting['enabledkey'] = ',';
		foreach($enabledkeys as $key)
		{
		$setting['enabledkey'] .= $key.",";
		}
   	        $data = json_encode($setting);
  	        $check = "var setting = $data;";
  	        $filename = PHP_ROOT.'data/js/comment_setting.js';
		file_put_contents($filename, $check);
   	        @chmod($filename, 0777);
		module_setting('comment', $setting);
		showmessage("配置保存成功！", HTTP_REFERER);
	}
	else
	{
	@extract(new_htmlspecialchars(cache_read('module_comment.php')));
	$enabledkey = explode(",",$enabledkey);
	$enabledkey = array_filter($enabledkey);

	$link = '';
	$i = 1;
	foreach ($MODULE as $module => $m ) {
		++$i;
		if($module == 'phpsin' || $module == 'comment') continue;

		$link .= "<input type=\"checkbox\" name=\"enabledkeys[]\" value=\"$module\" ";
		if(in_array($module,$enabledkey)) $link .= " checked ";
		$link .= " > ".$m['name'];
		if($i%7==0) $link .='<br/>'; else $link .='&nbsp; ';
	       }
         include tpl('comment_setting');
        }
	
	break;
}
?>