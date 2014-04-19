<?php
@set_time_limit(600);
require FILE_DIR.'/fields.inc.php';
require CLASS_PATH.'model_field.class.php';
$field = new model_field($modelid);
require CLASS_PATH.'model.class.php';
$model = new model_db();
$modelinfo = $model->get($modelid);
$modelname = $modelinfo['name'];

$tablename = $field->tablename;

$submenu = array(
	array('����ֶ�', '?mod='.$mod.'&file='.$file.'&action=add&modelid='.$modelid),
	array('�����ֶ�', '?mod='.$mod.'&file='.$file.'&action=manage&modelid='.$modelid),
	array('Ԥ��ģ��', '?mod='.$mod.'&file='.$file.'&action=preview&modelid='.$modelid),
);
$menu = admin_menu($modelname.'ģ���ֶι���', $submenu);

if(!$action) $action = 'manage';
switch($action)
{
	case'manage':
	$infos = $field->listinfo("modelid=$modelid", 'listorder,fieldid', 1, 100);
	include tpl("model_field_manage");
	break;
	
	    case 'add':
		if($dosubmit)
		{
			$info['modelid'] = $modelid;
            $info['unsetgroupids'] = isset($unsetgroupids) ? implodeids($unsetgroupids) : '';
            $info['unsetroleids'] = isset($unsetroleids) ? implodeids($unsetroleids) : '';
			$result = $field->add($info, $setting);
			if($result)
			{
				extract($setting);
				extract($info);
				require FILE_DIR.'/fields/'.$formtype.'/field_add.inc.php';

				/*����ֶ���Ϊ������������������*/
				if($issearch) {
					$sql = "SHOW INDEX FROM `$tablename`";
					$query = $db->query($sql);
					while($res = $db->fetch_array($query)) {
						$indexarr[] = $res['Column_name'];
					}
					if(is_array($indexarr) && !in_array($field, $indexarr)) {
						$sql = "ALTER TABLE `$tablename` ADD INDEX `$field` (`$field`)";
						$db->query($sql);
					}
				}

				showmessage('�����ɹ���', $forward);
			}
			else
			{
				showmessage('����ʧ�ܣ�');
			}
		}
		else
		{
			if(!is_ie()) showmessage('������ֻ֧��IE�����������IE������򿪡�');
			$unsetgroups = form::checkbox($GROUP, 'unsetgroupids', 'unsetgroupids', '', 4);
			$unsetroles = form::checkbox($ROLE, 'unsetroleids', 'unsetroleids', '', 4);
		    require FILE_DIR.'/patterns.inc.php';
			include tpl('model_field_add');
		}
		break;
		
	case'edit':
	if($dosubmit)
		{
            $info['unsetgroupids'] = isset($unsetgroupids) ? implodeids($unsetgroupids) : '';
            $info['unsetroleids'] = isset($unsetroleids) ? implodeids($unsetroleids) : '';
			$result = $field->edit($fieldid, $info, $setting);
			if($result)
			{
				extract($setting);
				extract($info);
				if($issystem) $tablename = DB_PRE.'content';
				//require_once 'fields/'.$formtype.'/field_edit.inc.php';

				/*��ϵͳ����Ϊ���������ֶΣ���������*/
				if(!$issystem) {
					$sql = "SHOW INDEX FROM `$tablename`";
					$query = $db->query($sql);
					while($res = $db->fetch_array($query)) {
						$indexarr[] = $res['Column_name'];
					}
					if(is_array($indexarr) && in_array($field, $indexarr)) {
						if(!$issearch) {
							$sql = "ALTER TABLE `$tablename` DROP INDEX `$field`";
							$db->query($sql);
						}
					} else {
						if($issearch) {
							$sql = "ALTER TABLE `$tablename` ADD INDEX `$field` (`$field`)";
							$db->query($sql);
						}
					}
				}

				showmessage('�����ɹ���', $forward);
			}
			else
			{
				showmessage('����ʧ�ܣ�');
			}
		}
		else
		{
	if(!is_ie()) showmessage('������ֻ֧��IE�����������IE������򿪡�');
			$info = $field->get($fieldid);
			if(!$info) showmessage('ָ�����ֶβ����ڣ�');
			extract(new_htmlspecialchars($info));
			$unsetgroups = form::checkbox($GROUP, 'unsetgroupids', 'unsetgroupids', $unsetgroupids, 4);
			$unsetroles = form::checkbox($ROLE, 'unsetroleids', 'unsetroleids', $unsetroleids, 4);
		    require FILE_DIR.'/patterns.inc.php';
	include tpl("model_field_edit");
		}
	break;	
	
	case 'checkfield':
		if(!$field->check($value))
		{
			exit('ֻ����Ӣ����ĸ�����ֺ��»�����ɣ���������ĸ��ͷ');
		}
		elseif($field->exists($value))
		{
			exit('�ֶ����Ѵ���');
		}
		else
		{
			exit('success');
		}
	break;
	
	
	    case 'listorder':
		$result = $field->listorder($info);
		if($result)
		{
			showmessage('�����ɹ���', $forward);
		}
		else
		{
			showmessage('����ʧ�ܣ�');
		}
		break;
		
	    case 'delete':
		$info = $field->get($fieldid);
		$result = $field->delete($fieldid);
		if($result)
		{
			extract($info);
			@extract(unserialize($setting));
			require FILE_DIR.'/fields/'.$formtype.'/field_delete.inc.php';
			showmessage('�����ɹ���', '?&file=model_field&action=manage&modelid='.$modelid);
		}
		else
		{
			showmessage('����ʧ�ܣ�');
		}
		break;
		
    //��ز���
	case 'setting_add':
	require FILE_DIR.'/fields/patterns.inc.php';
    require FILE_DIR.'/fields/'.$formtype.'/field_add_form.inc.php';
	break;
		
	case 'preview':
	require CLASS_PATH.'position.class.php';
	$a = new position();
	$pos=$a->listtable('position','','listorder');
	$content_form = new content_form($modelid);
	$info=$field->listinfo($where = 'modelid="'.$modelid.'" AND iscore!=1','');
	include tpl("content_add");
	break;
	}
?>