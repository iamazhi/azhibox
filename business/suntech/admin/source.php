<?php 
defined('IN_PHPJSJ') or exit('Access Denied');

require CLASS_PATH.'source.class.php';
$source = new source();


switch($action)
{
    case 'add':
		if($dosubmit)
		{
			$result = $source->add($info);
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
			include tpl('source_add');
		}
		break;
    case 'edit':
		if($dosubmit)
		{
			$result = $source->edit($sourceid, $info);
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
			$info = $source->get($sourceid);
			if(!$info) showmessage('指定的来源不存在！');
			extract($info);
			include tpl('source_edit');
		}
		break;
    case 'manage':
        $infos = $source->listinfo('', 'sourceid', $page, 20);
		include tpl('source_manage');
		break;
    case 'select':
        $infos = $source->listinfo('', 'sourceid', 1, 50);
		include tpl('source_select');
		break;
    case 'delete':
		$result = $source->delete($sourceid);
		if($result)
		{
			showmessage('操作成功！', $forward);
		}
		else
		{
			showmessage('操作失败！');
		}
		break;
    case 'listorder':
		$result = $source->listorder($info);
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
		$result = $source->disable($sourceid, $disabled);
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