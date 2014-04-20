<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require CLASS_PATH.'urlrule.class.php';
if(!$action) $action = 'manage';
$urlrule = new urlrule();
switch($action)
{
    case 'add':
		if($dosubmit)
		{
			$result = $urlrule->add($data);
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
			include tpl('urlrule_add');
		}
		break;
    case 'edit':
		if($dosubmit)
		{
			$result = $urlrule->edit($urlruleid, $data);
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
			$data = $urlrule->get($urlruleid);
			if(!$data) showmessage('���򲻴��ڣ�');
			//$data = new_htmlspecialchars($data);
            extract($data);
			include tpl('urlrule_edit');
		}
		break;
    case 'manage':
        $page = max(intval($page), 1);
		$pagesize = max(intval($pagesize), 30);
        $data = $urlrule->listinfo($condition, $page, $pagesize);
		include tpl('urlrule_manage');
		break;
    case 'delete':
		$result = $urlrule->delete($urlruleid);
		if($result)
		{
			showmessage('�����ɹ���','?mod=phpcms&file=urlrule&action=manage');
		}
		else
		{
			showmessage('����ʧ�ܣ�');
		}
		break;
}
?>