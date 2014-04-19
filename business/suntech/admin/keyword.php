<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require CLASS_PATH.'keyword.class.php';
$keyword = new keyword();

if(!$action) $action = 'manage';
if(!$forward) $forward = '?file='.$file.'&action=manage';

switch($action)
{
    case 'add':
		if($dosubmit)
		{
			$result = $keyword->add($info);
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
			include tpl('keyword_add');
		}
		break;

    case 'edit':
		if($dosubmit)
		{
			$result = $keyword->edit($tagid, $info);
			if($result)
			{
				showmessage('�����ɹ���','?file=keyword&action=manage');
			}
			else
			{
				showmessage('����ʧ�ܣ�');
			}
		}
		else
		{
			$info = $keyword->get($tag);
			//if(!$info) showmessage('ָ���Ĺؼ��ʲ����ڣ�');
			extract($info);
			include tpl('keyword_edit');
		}
		break;

    case 'manage':
        $infos = $keyword->listinfo('', '`listorder` DESC,`usetimes` DESC', $page, 20);
		include tpl('keyword_manage');
		break;

    case 'listorder':
		$keyword->listorder($listorder);
		showmessage($LANG['operation_success'], $forward);
        break;

    case 'delete':
		$result = $keyword->delete($tagid);
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
		$result = $keyword->disable($tagid, $disabled);
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
        $infos = $keyword->listinfo('', 'tagid', $page, 50);
		include tpl('keyword_select');
		break;
}
?>