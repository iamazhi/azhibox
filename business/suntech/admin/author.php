<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
require CLASS_PATH.'author.class.php';
$author = new author();


switch($action)
{
    case 'add':
	if($dosubmit)
		{
			$info['username'] = trim($info['username']);
			$info['name'] = trim($info['name']);
			if(empty($info['username'])) showmessage("用户名不能为空");
			if(empty($info['name'])) showmessage("姓名不能为空");
			$result = $author->add($info);
			if($result)
			{
				showmessage('操作成功！', $forward);
			}
			else
			{
				showmessage('操作失败！');
			}
		}
		else
		{

			include tpl('author_add');
		}
		break;
		
		case 'manage':
		    $infos = $author->listinfo('', 'authorid', $page, 20);
			include tpl('author_manage');
		
		break;
		
   case 'edit':
		if($dosubmit)
		{
			$info['username'] = trim($info['username']);
			$info['name'] = trim($info['name']);
			if(empty($info['username'])) showmessage("用户名不能为空");
			if(empty($info['name'])) showmessage("姓名不能为空");
			$result = $author->edit($authorid, $info);
			if($result)
			{
				showmessage('操作成功！', $forward);
			}
			else
			{
				showmessage('操作失败！');
			}
		}
		else
		{
			$info = $author->get($authorid);
			if(!$info) showmessage('指定的作者不存在！');
			extract($info);
			include tpl('author_edit');
		}
		break;
		
		
		case 'listorder':
		$result = $author->listorder($info);
		if($result)
		{
			showmessage('操作成功！', $forward);
		}
		else
		{
			showmessage('操作失败！');
		}
		break;
		 case 'disable':
		$result = $author->disable($authorid, $disabled);
		if($result)
		{
			showmessage('操作成功！', $forward);
		}
		else
		{
			showmessage('操作失败！');
		}
		break;
		
		case 'select':
        $infos = $author->listinfo('', 'authorid', $page, 50);
		include tpl('author_select');
		break;
		
    case 'delete':
		$result = $author->delete($authorid);
		if($result)
		{
			showmessage('操作成功！', $forward);
		}
		else
		{
			showmessage('操作失败！');
		}
		break;
    default :
}
?>