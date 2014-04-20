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
			if(empty($info['username'])) showmessage("�û�������Ϊ��");
			if(empty($info['name'])) showmessage("��������Ϊ��");
			$result = $author->add($info);
			if($result)
			{
				showmessage('�����ɹ���', $forward);
			}
			else
			{
				showmessage('����ʧ�ܣ�');
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
			if(empty($info['username'])) showmessage("�û�������Ϊ��");
			if(empty($info['name'])) showmessage("��������Ϊ��");
			$result = $author->edit($authorid, $info);
			if($result)
			{
				showmessage('�����ɹ���', $forward);
			}
			else
			{
				showmessage('����ʧ�ܣ�');
			}
		}
		else
		{
			$info = $author->get($authorid);
			if(!$info) showmessage('ָ�������߲����ڣ�');
			extract($info);
			include tpl('author_edit');
		}
		break;
		
		
		case 'listorder':
		$result = $author->listorder($info);
		if($result)
		{
			showmessage('�����ɹ���', $forward);
		}
		else
		{
			showmessage('����ʧ�ܣ�');
		}
		break;
		 case 'disable':
		$result = $author->disable($authorid, $disabled);
		if($result)
		{
			showmessage('�����ɹ���', $forward);
		}
		else
		{
			showmessage('����ʧ�ܣ�');
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
			showmessage('�����ɹ���', $forward);
		}
		else
		{
			showmessage('����ʧ�ܣ�');
		}
		break;
    default :
}
?>