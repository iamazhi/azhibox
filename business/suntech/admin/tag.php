<?php
defined('IN_PHPJSJ') or exit('Access Denied');
$types = array('content'=>'����','category'=>'��Ŀ','special'=>'ר��','type'=>'���','area'=>'����','member'=>'��Ա','sql'=>'�Զ���');

require 'include/admin/tag.class.php';
if(!isset($module)) $module = $mod;
$t = new tag($module);

$a = new all();
switch($action)
{
    case 'add':

	if($type == 'content')
	    {
			require CACHE_MODEL_PATH.'content_tag_form.class.php';
			$content_tag_form = new content_tag_form($modelid);
			$forminfos = $content_tag_form->get();
			$fields = $orderfields = $selectfields = array();
			
			foreach($content_tag_form->fields as $field=>$v)
			{
				
				$fields[$field] = $v['name'];
				if($v['isselect']) $selectfields[] = $field;
				if($v['isorder'])
				{
					$orderfields[$field.' ASC'] = $v['name'].' ����';
					$orderfields[$field.' DESC'] = $v['name'].' ����';
				}
			}
			$selectfields = implode(',', $selectfields);
		}
		
	if($type=='member')
	{
	    require CACHE_MODEL_PATH.'member_tag_form.class.php';
		$member_tag_form = new member_tag_form($modelid);
		$forminfos = $member_tag_form->get();
		$defalut_fields = $member_tag_form->default_fields;
		foreach($member_tag_form->fields as $field=>$v)
		{
			$fields[$field] = $v['name'];
			if($v['isselect']) $selectfields[] = $field;
			if($v['isorder'])
			{		
				if(in_array($field, array_keys($member_tag_form->common_fields)))
				{
					$orderfields['a.'.$field.' ASC'] = $v['name'].' ����';
					$orderfields['a.'.$field.' DESC'] = $v['name'].' ����';
				}
				else
				{
					$orderfields['b.'.$field.' ASC'] = $v['name'].' ����';
					$orderfields['b.'.$field.' DESC'] = $v['name'].' ����';
				}	
			}
		}
		}
	
		if(isset($tag_config)) extract($tag_config, EXTR_SKIP);
		header("Cache-control: private");
		include tpl('tag_add');
	break;

	case 'edit':

	    $tag=$t->tags("tagid=$tagid");
		$tagwhere=$tag["where"];
		eval("\$tagwhere = $tagwhere;"); 
		$modelid = $modelid=="" ? $tag["modelid"] : $modelid;
	    if($type == 'content')
	      {
			if($modelid) $tag_config['modelid'] = $modelid;
			require CACHE_MODEL_PATH.'content_tag_form.class.php';
			$content_tag_form = new content_tag_form($modelid);
			$forminfos = $content_tag_form->get($tagwhere);
			$fields = $orderfields = array();
			foreach($content_tag_form->fields as $field=>$v)
			{
				$fields[$field] = $v['name'];
				if($v['isorder'])
				{
					$orderfields[$field.' ASC'] = $v['name'].' ����';
					$orderfields[$field.' DESC'] = $v['name'].' ����';
				}
			}
			$setting=$tag["selectfields"];
			eval("\$setting = $setting;"); 
			$selectfields = implode(',',$setting); 
		   }
		   include tpl('tag_edit');
		break;
		
		case 'delete':
		$tagname = preg_replace("/^[^{]*[{]?tag_([^}]+)[}]?.*/", "\\1", $tagname);
		$t->delete($tagname);
		showmessage("ɾ���ɹ���",'?file=tag&action=manage'); 
		break;
		
		case 'update':
		$tag_config['type'] = $type;
		if($isadd && isset($t->TAG[$tagname])) showmessage('�ñ�ǩ�Ѿ�����');
		$tagname = trim($tagname);
		if(preg_match('/([\'"${}\(\)\\/,;])/',$tagname)) showmessage('��ǩ���ܺ��������ַ�\' " $ { } ( ) \ / , ;');
		if($type == 'content')
	    {
			if(!$tag_config['mode'])
			{
				$tag_config['where'] = $info;
				require CACHE_MODEL_PATH.'content_tag.class.php';
				$content_tag = new content_tag($modelid);
				$tag_config['sql'] = $content_tag->get($tag_config['selectfields'], $info, $tag_config['orderby']);//
			}
			$tag_config['modelid'] = $modelid;		
			//echo $tag_config['sql'];
			$t->update($tagname, $tag_config);
		}
		
		elseif($type=='member')
		{
			if($tag_config['mode'])//����
			{
				$tag_config['where'] = $info;
			    require CACHE_MODEL_PATH.'member_tag.class.php';
			    $member_tag = new member_tag($modelid);
		    	$tag_config['sql'] = $member_tag->get($tag_config['selectfields'], $info, $tag_config['orderby']);
			}
			$tag_config['modelid'] = $modelid;		
			$t->update($tagname, $tag_config);
			}
			
		elseif($type == 'sql')
	    {
			if($tag_config['mode'])
			{
				$tag_config['where'] = $info;
				require CACHE_MODEL_PATH.'content_tag.class.php';
				$content_tag = new content_tag($modelid);
				$tag_config['sql'] = $content_tag->get($tag_config['selectfields'], $info, $tag_config['orderby']);
			}
			$tag_config['modelid'] = $modelid;			
			$t->update($tagname, $tag_config);
		}
		
		elseif($type == 'category')
	    {
			if($tag_config['catid']) $where="WHERE catid=".$tag_config['catid']."";
			$tag_config['sql'] = "SELECT * FROM ".DB_PRE."category $where";
			$tag_config['page'] = 0;
			if(!$tag_config['number']) $tag_config['number'] = 0;
			$t->update($tagname, $tag_config, array('module'=>$tag_config['module'], 'catid'=>$tag_config['catid']));
		}
		elseif($type == 'special')
	    {
			extract($tag_config);
			$where = '';
			if($typeid) $where .= "AND `typeid`='$typeid' ";
			if($elite) $where .= "AND `elite`='$elite' ";
			if($where) $where = 'WHERE '.substr($where, 3);
			$tag_config['sql'] = "SELECT * FROM `".DB_PRE."special` $where ORDER BY $orderby";
			$t->update($tagname, $tag_config);
		}
		if($ajax)
		{
			if($template_data) file_put_contents(TPL_ROOT.TPL_NAME.'/'.$module.'/'.$tag_config['template'].'.html', stripslashes($template_data));
			if(strpos($tag_config, '$') !== false)
			{
				echo '<script language="JavaScript">top.right.location.reload();</script>';
			}
			else
			{
				$tagcode = $t->TAG[$tagname];
				eval($tagcode.';');
				$data = ob_get_contents();
				ob_clean();
				echo '<script language="JavaScript">top.right.tag_save("'.$tagname.'", "'.format_js($data, 0).'");</script>';
			}
		}
		else
		{
			showmessage('�����ɹ���');
		}
		break;
		
		case 'listtag':
		if($dosubmit)
	    {
			$arr_tag = include PHP_ROOT.'templates/tag.inc.php';
			$content = stripslashes($content);
			preg_match_all("/[{]tag_([^}]+)[}]/", $content, $m);
			foreach ($m[1] as $k=>$v)
			{
				$tag = $arr_tag[$v];
				if(preg_match("/^(tag\(')?([a-z0-9]+)/i", $tag, $t))
				{
					$r['tagname'] = $v;
					$r['module'] = $t[2];
					$array[] = $r;
				}
				else
				{
					$r['tagname'] = $v;
					$un_tag[] = $r;
				}
			}
		    include tpl('tag_list','phpcms');
		}
		else
	    {
			$message = '<form name="myform" method="post" action="?file=tag&action=listtag&module='.$module.'&template='.$template.'&templatename='.$templatename.'&dosubmit=1"><input type="hidden" name="content"></form><script type="text/javascript">myform.content.value=window.opener.document.myform.content.value;myform.submit();</script>';
			showmessage($message);
		}
	break;
	
	case 'listorder':
		$result = $t->listorder($listorders);
		if($result)
		{
			showmessage('�����ɹ���', $forward);
		}
		else
		{
			showmessage('����ʧ�ܣ�');
		}
		break;
		
	case 'manage':
		$page = max(intval($page), 1);
        $tags = $t->listinfo($where='','listorder,tagid desc' , $page, 20);
		include tpl('tag_manage');
		break;
		
	case 'ajax_category':
		$parentid = max(intval($parentid), 0);
		echo form::select_category($module, $parentid, 'category[parentid]', 'parentid', '����', $catid, 'onchange="myform.categoryid.value=this.value;"');
		break;
}


?>