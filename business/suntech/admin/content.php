<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require CLASS_PATH.'content.class.php';
require CLASS_PATH.'model_field.class.php';
require CLASS_PATH.'category.class.php';
require FILE_DIR."/attachment.class.php";
require CLASS_PATH.'position.class.php';
$attachment = new attachment($mod, $catid);

$a = new position();
$category=new category();
$cateid=$category->listinfo('','');

$content_form = new content_form($modelid);

$model_field=new model_field();
$c=new content();

$data = $c->get($contentid);

if($modelid!=9)
{
if($action=="manage" or $action=="edit" or $action=="add" or $action=="search" )
{
$into=$category->get("","WHERE catid=$catid");
$menu .="<table align=\"center\" cellpadding=\"0\" cellspacing=\"1\" class=\"table_list\">\n
       <caption class=\"align_c\">[$into[name]]��Ŀ����</caption>\n
	   <tr>\n
	   <td class=\"align_l\"><a href=\"?file=content&action=add&catid=$into[catid]&modelid=$modelid\"><font color=\"#FF0000\">������Ϣ</font></a> | \n
	   <a href=\"?file=".$file."&action=manage&catid=".$into["catid"]."&modelid=".$modelid." \">����ͨ����Ϣ</a> | \n"; 
	  if($action!="add") 
	  {
$menu .="<a href=\"?file=".$file."&action=search&search=".$action."&catid=".$into["catid"]."&modelid=".$modelid." \">����</a></td>\n";}
$menu .="</tr>\n
		</table>";
}
}
elseif($modelid==9)
{
	$into=$category->get("","WHERE catid=$catid");
$menu .="<table align=\"center\" cellpadding=\"0\" cellspacing=\"1\" class=\"table_list\">\n
       <caption class=\"align_c\">[$into[name]]��Ŀ����</caption>\n
	   <td> <a href=\"?file=".$file."&action=search&search=".$action."&catid=".$into["catid"]."&modelid=".$modelid." \">����</a></td>\n
	   </table>";	
	}
switch($action)
{
	case 'manage':
	$where = "`status`=99  ".get_sql_catid($catid)." ";
	if($dosubmit)
	{
		if($inputdate_start) $where .= " AND `inputtime`>='".strtotime($inputdate_start.' 00:00:00')."'"; else $inputdate_start = date('Y-m-01');
	    if($inputdate_end) $where .= " AND `inputtime`<='".strtotime($inputdate_end.' 23:59:59')."'"; else $inputdate_end = date('Y-m-d');
		if($field && $q != "")
		{
			$where .= "AND $field LIKE '%$q%'";
			}
		}
	
	$info=$c->listinfo($where,$order = 'listorder,updatetime desc',$page, 20);
	include tpl('content_manage');
	break;
	
	case 'edit':
	if($dosubmit)
		{
			//echo $info["video"]=addslashes(var_export($info["video"], TRUE));
			$a->delete($table="content_position","contentid",$contentid);
			$infos["contentid"]=$contentid;
			if($info["posids"])
			{
			foreach($info["posids"] as $v => $k)
			{
				$infos["posid"]=$k;
				$a->add("content_position",$infos);
				}
				}
				
			$contentid = $c->edit($contentid,$info);
			if($contentid) showmessage('�޸ĳɹ���', $forward);
		}
		
	else
	{
	$pos=$a->listtable('position','','listorder');
	$con=$a->listtable('content_position',"contentid='$contentid'");
	$forminfos = $content_form->get($data,$modelid = "$modelid");
	$template_shows = $modelid == 9 ? "single" : "show";
	include tpl('content_edit');
	}
	break;
	
	case 'add':
	if($dosubmit)
		{
			
			$contentid = $c->add($info,$cat_selected);
			$infos["contentid"]=$contentid;
			/**
			�Ƽ�λ��
			**/
			if($info['posids'])
			{
			foreach($info['posids'] as $k)
			{
				$infos["posid"]=$k;
				$a->add("content_position",$infos);
				}
				}
			if($contentid) showmessage('�����ɹ���',$forward);
		}
	else
	{
	$pos=$a->listtable('position','','listorder');
    $info=$model_field->listinfo($where = 'modelid="'.$modelid.'" AND iscore!=1','modelid,listorder');
	include tpl('content_add');
    }
	break;
	
	case 'view':
	  $info=$c->get($contentid);
	  $g=$model_field->listinfo($where="modelid=".$_GET["modelid"]." AND iscore!=1 ",'');
	include tpl('content_view');
	break;
	
	case 'listorder':
		$result = $c->listorder($listorders);
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
		$result = $c->delete($contentid,$modelid);
		if($result)
		{
			showmessage('�����ɹ���', $forward);
		}
		else
		{
			showmessage('����ʧ�ܣ�');
		}
		break;
		
	case 'search':
	include tpl("content_search");      
	break;
	
	case 'contentall':
	$projects=require ('data/status.php');
	
	
	$where = "`status`=99 ";
	if($dosubmit)
	{
		if($inputdate_start) $where .= " AND `inputtime`>='".strtotime($inputdate_start.' 00:00:00')."'"; else $inputdate_start = date('Y-m-01');
	    if($inputdate_end) $where .= " AND `inputtime`<='".strtotime($inputdate_end.' 23:59:59')."'"; else $inputdate_end = date('Y-m-d');
		if($catid != 0)
		{
			//$menuid=$category->get("","WHERE catid = $catid");
			$where .=" AND catid=".$catid."";
			}
			elseif($catid == 0)
			{
				$where .="";
				}
		if($field && $q != "")
		{
			$where .= " AND $field LIKE '%$q%'";
			}
		}
	$info=$c->listinfo($where ,$order = 'updatetime,listorder ',$page, 20);
	
	include tpl('content_all');
	break;
	
    case 'inspect':
	$projects = require ('data/status.php');
	
	$where = "`status`!= 99 ";
	if($dosubmit)
	{
		if($inputdate_start) $where .= " AND `inputtime`>='".strtotime($inputdate_start.' 00:00:00')."'"; else $inputdate_start = date('Y-m-01');
	    if($inputdate_end) $where .= " AND `inputtime`<='".strtotime($inputdate_end.' 23:59:59')."'"; else $inputdate_end = date('Y-m-d');
		if($catid != 0)
		{
			//$menuid=$category->get("","WHERE catid = $catid");
			$where .=" AND catid=".$catid."";
			}
			elseif($catid == 0)
			{
				$where .="";
				}
		if($field && $q != "")
		{
			$where .= " AND $field LIKE '%$q%'";
			}
		}
	$info=$c->listinfo($where ,$order = 'updatetime,listorder ',$page, 20);
	
	include tpl('content_all');
	break;
	/**ͨ��**/
	case 'bystatus':
	$result = $c->status($listorders);
		if($result)
		{
			showmessage('�����ɹ���', $forward);
		}
		else
		{
			showmessage('����ʧ�ܣ�');
		}
		break;
		
	break;
		case 'check_title':
		if(CHARSET=='gbk') $c_title = iconv('utf-8', 'gbk', $c_title);
		if($c->get_contentid($c_title))
		{	
			echo '�˱����Ѵ��ڣ�';
		}
		else
		{
			echo '���ⲻ���ڣ�';
		}
		break;
    default:
	}
?>
