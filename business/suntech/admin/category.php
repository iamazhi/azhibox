<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require FILE_DIR."/tree.class.php";
require CLASS_PATH."category.class.php";
$tree = new tree;
$a=new category();

$all=new all();
switch($action)
{
	case 'manage':
	$into=$a->listtable("module!='0'",'listorder');
	foreach($into as $catid => $row)
	{
	$type=$row["type"] == 0 ? '�ڲ���Ŀ': ($row['type'] == 1 ? '<font color="blue">����ҳ</font>' : '<font color="red">�ⲿ����</font>');
	$contentid=$row["contentid"] == 0 ? '' : "contentid=".$row["contentid"]."";
	$add=$row["type"] == 0 ? '<a href="?file=category&action=add&modelid='.$row["modelid"].'&catid='.$row["catid"].'">�������Ŀ</a>': ($row['type'] == 1 ? '<font color="#C0C0C0">�������Ŀ</font>' : '<font color="#C0C0C0">�������Ŀ</font>');
	$ismenu=$row["ismenu"]==0 ? '&nbsp;<font color=red>[����]</font>' : "";

	$array[$row["catid"]]=(array('id'=>$row["catid"],'contentid'=>$contentid,'parentid'=>$row["parentid"],'modelname'=>$row["modelname"],'name'=>$row["name"],'types'=>$row["type"],'type'=>$type,'add'=>$add,'ismenu'=>$ismenu,'listorder'=>$row["listorder"]));
		}
		$str="<tr><td class='align_c'><input type='text' size='4' name='listorder[\$id]' value='\$listorder'></td>
		          <td class='align_c'>\$id</td>
				  <td class='align_l'>\$spacer\$name\$ismenu</td>
				  <td class='align_c'>\$type</td>
				  <td class='align_c'>\$modelname</td>
				  <td class='align_c'>����</td>
				  <td class='align_c'>\$add | <a href='?file=category&action=edit&catid=\$id&type=\$types&\$contentid'>�޸�</a> | <a href=javascript:confirmurl('?file=category&action=delete&catid=\$id','ȷ��ɾ����Ŀ��')>ɾ��</a></td>
			  </tr>";
		$tree->tree($array);
		$category = $tree->get_tree(0,$str,$parentid);//�涨����Ϊ22��3
	include tpl('category');
	break;
	
	case 'listorder':
       //         $all->listorder("menu",$listorder,"menuid");
		$a->listorder($listorder);
		showmessage('�����ɹ�', $forward);
        break;
	
	case 'add':
	 if($gory=="add")
	 {   
	 //�������
	 $targets     = "right";
	 $pid = $a->get('',"where catid='$catid'");
	 $menuid = $pid ? $pid["menuid"] : 22 ;
	/**  **/
	 $me['pid']   = $menuid;
	 $me['name']  = trim($info['name']);
	 $me['title'] = "";
	 $menu=$a->add('menu',$me);
	 $menu=$db->insert_id($menu);
	 $info['module']="phpsin";
	 $info['menuid'] = $menu;
	 $info['pid']    = $menuid;
	 $info['parentid']=$_POST['catid'];
	 //���Ŀ¼�ո�
	 $dir=str_replace(" ","",$dir);
	 //$dirs=explode("/",$dir);
	 $info['catdir']=$dir;
	// $info['dir']=$dir;
	 $category=$a->add('category',$info);  
	 
		      //���·����ַ 
		      $menuID=$db->get_one("select * from ".DB_PRE."menu where menuid='$menu'");
		      $cat=$db->insert_id($category);
			  $parid=$a->get('',$where="where catid='$_POST[catid]'");
			  /** 
			  �������������
			  **/
			 if($parid)
			 {
			      //$parentdir =  $CATEGORY[$_POST['catid']]['parentdir'].$CATEGORY[$_POST['catid']]['catdir'].'/';
				  $parentdir=$dir; 
			      $arrparentid= $CATEGORY[$_POST['catid']]['arrparentid'].','.$_POST['catid'];
	              $parentids = explode(',', $arrparentid);
			  foreach($parentids as $parentid)
			  {
				 if($parentid)
				 {
					$arrchildid = $CATEGORY[$parentid]['arrchildid'].','.$cat;
					$db->query("UPDATE ".DB_PRE."category set child=1,arrchildid='$arrchildid' where catid='$parentid'");
					 }
				 }
			 }
			 else
			 {
				 $arrparentid = '0';
			     $parentdir='';
				 }
				 //�����̬
				 if($setting["ishtml"])
			     {
				  $caturl=$parentdir.$dir."/";
				  $httpurl="?file=category&action=g_catid&catid=$cat";
				  }
				  else
				  {
					  $caturl=$info["type"]==2 ? $info["url"] : "index.php?file=list&catid=$cat";
					  $httpurl="?file=category&action=manage";
					  }

	                $db->query("UPDATE ".DB_PRE."category set arrparentid='$arrparentid',arrchildid='$cat',url='$caturl' where catid='$cat'");//new id
	          /** ����ҳ**/
			  if($info["type"]==1)
			  {
				  $row['catid'] = $cat;
				  $row['modelid']= $info['modelid'];
				  $row['title'] = $info['title'];
				  $c_id=$a->add('content',$row);
				  $contentid=$db->insert_id($c_id);
				  $singlepage['contentid']=$contentid;
				  $singlepage['template']=$setting["template"];
				  $model=$db->get_one("select * from ".DB_PRE."model where modelid='$info[modelid]'");
				  $a->add("c_".$model['tablename'],$singlepage);
				  $updataid="?file=content&action=edit&modelid=$info[modelid]&catid=$cat&contentid=$contentid";
				  $db->query("UPDATE ".DB_PRE."category SET contentid='$contentid' WHERE catid='$cat'");//����lia
				  }
				  elseif($info["type"]==2)//�ⲿ����
				  {
					  $updataid=""; 
					  }
				  else
				  {
					  $updataid="?file=content&action=manage&modelid=$info[modelid]&catid=$cat"; 
					   }
		              $db->query("update ".DB_PRE."menu SET url='$updataid',target_line='$targets' WHERE menuid='$menu'");
		

				 /**
				 ��ӻ���
				**/
				 $setting = new_stripslashes($setting);
	             $setting = addslashes(var_export($setting, TRUE));
				 $db->query("UPDATE ".DB_PRE."category SET setting='$setting' WHERE catid='$cat'");

				 cache_category();
				 cache_common();
		         showmessage('�����ɹ���',$httpurl); 
		    }
		 else
		 {
          //���ѡ������ 
	    $into=$a->listtable("module!='0'",'listorder');
	    foreach($into as $catids => $row)
	    {
			$sta[$row["catid"]]=(array('id'=>$row["catid"],'parentid'=>$row["parentid"],'name'=>$row["name"],'catid'=>$row['catid']));
		    }
			 $tree->tree($sta);
		     $data= $tree->get_tree(0,"<option value=\$id \$selected>\$spacer\$name</option>\n",$catid);
			 
		$array=$all->listtable($table='model','workflowid=1');
			
		//��ȡ���
		$modelname=$db->get_one("SELECT * FROM ".DB_PRE."model WHERE modelid='$modelid'");
		//�������ֵ
		$rs=$a->get('',"where catid='$_GET[catid]'");
		$dir=$rs["parentdir"].$rs["catdir"];
		
		if($_GET['catid']=="0")
		{$catename="��";}
		else
		{$catename=$rs["name"];$pid=$rs["pid"];}	
		
		
		if($type==0){
		$ishtml = $MODEL[$modelid]['ishtml'];
	    include tpl('category_add');
		}
		/////////����
		elseif($type==1)
		{
			include tpl('category_web');
		}
		elseif($type==2)
		{
			include tpl('category_exterior');
			}	
	 }
	break;
	
	case 'g_catid':
	//���¾�̬
	$html = load('html.class.php');
	$html->category($catid);
	showmessage('���³ɹ���',"?file=category&action=manage");
	break;

	case "edit":
	if($_GET['category']=='edit')
	{
		          //����ո�
		         $dirfile=str_replace(" ","",$dir);
		         // $info["parentdir"] = $info["parentid"]== 0 ? "" : $CATEGORY["$info[parentid]"]["catdir"]."/";
				// $dirs=explode("/",$dirfile);
				// $info["parentdir"]=$dirs[0] ? $dirs[1]."/" : $dirs[1] ;
			
				 $info["parentdir"]=$dirfile; 
				 $info["catdir"]=$dirs[0] ? $dirs[1] : $dirs[0];

				// $info["catdir"]    = $info["parentid"]== 0 ? "".$dir : $dir;
		      if($setting["ishtml"])
			  {
				  $info["url"]       = $info["parentdir"].$info["catdir"]."/";
				  //Ŀ¼��ַ
				  $httpurl="?file=category&action=g_catid&catid=$catid";
				  }
				  else
				  {
					 $info["url"]=$type==2 ? $info["url"] : "index.php?file=list&catid=$catid";
					 $httpurl="?file=category&action=manage";
					  }
		$r = $a->get('',"where catid=$catid");
		$a->edit('category',$info,$catid);   
                $parid = $a->get('',"where catid=$info[parentid]");
			
		/**
		����MENU����
		**/	  
		$menu_url=$all->get("menu","menuid='$r[menuid]'");	
		if($menu_url["url"])
	        {
		$catID=$db->get_one("SELECT * FROM ".DB_PRE."category WHERE menuid='$r[menuid]'");
		$conID=$db->get_one("SELECT * FROM ".DB_PRE."content WHERE catid='$catID[catid]'");
		$contentid=$conID['contentid'];
		/**����ҳ**/
		if($catID['type']==1)
		{
			if(!$conID)
			{
				$row['catid'] = $catID['catid'];
				$row['modelid']= 9;
				$row['title'] = $catID['title'];
				$c_id  = $a->add('content',$row);
				$contentid = $db->insert_id($c_id);
				$singlepage['contentid']=$contentid;
				$singlepage['template']=$setting["template"];
				$model=$db->get_one("select * from ".DB_PRE."model where modelid='9'");
				$a->add("c_".$model['tablename'],$singlepage);
				}
				else
				{
				$singlepage['contentid']=$contentid;
				$singlepage['template']=$setting["template"];
				$model=$db->get_one("select * from ".DB_PRE."model where modelid='9'");
				$all->edit("c_".$model['tablename'],$singlepage,"contentid","$contentid");
					}
			$url="?file=content&action=edit&modelid=9&catid=".$catID["catid"]."&contentid=".$contentid."";
			$targets="right";	
			}
		/**�ⲿ����**/
			elseif($catID['type']==2)
			{
				$targets='right';
				$url="$info[url]";
				}
			else
			{
				$url="?file=content&action=manage&modelid=".$info["modelid"]."&catid=".$catID["catid"]."";
	            $targets="right";	
				}
		}
		/** 
		����CATEGORY_MENU
		**/
		if($r["menuid"]!=$parid["menuid"])
		{
			$pid=$parid["menuid"]=="" ? 22 : $parid["menuid"];
			$db->query("UPDATE ".DB_PRE."category set pid='$pid' where menuid='$r[menuid]'");
			}
			/** 
		    ����url    ���������Ŀ ��ȡ����Ŀ URL=""
		    **/
			if($pid==$parid["menuid"])
			  {
			//   $db->query("UPDATE ".DB_PRE."menu SET url='',target_line='$targets' WHERE menuid='".$parid["menuid"]."'");
			    }
				else
				{
				   /**�����ϴ� URL ��ȡ�ϴ�ID**/
				   $u = $a->get('',"where catid='$r[parentid]'");
				   if(!is_array($u["arrchildid"]))
				   {
					   $urls="?file=content&action=manage&modelid=".$u["modelid"]."&catid=".$u["catid"]."";
					   $db->query("UPDATE ".DB_PRE."menu SET url='$urls',target_line='$targets' WHERE menuid='".$u["menuid"]."'");
					   /**�����Ƿ� CHIDL ID **/
					  // $db->query("UPDATE ".DB_PRE."category set child='0' where catid='".$u["catid"]."'");
					   }
					}
				
		$infos['pid']  = $parid["menuid"]=="" ? 22 : $parid["menuid"];
		$infos['name'] = $info['name'];
		$infos['url']  = $url;
		$infos['target_line']=$targets;
		$all->edit('menu',$infos,"menuid","$r[menuid]");
		         /**
				 ���»���
				 **/
				 $setting = new_stripslashes($setting);
	             $setting = addslashes(var_export($setting, TRUE));
				 $db->query("UPDATE ".DB_PRE."category SET setting='$setting' WHERE catid='$catid'");
				 
				  cache_category();
				  cache_common();
	    showmessage('�����ɹ���',$httpurl);
	}
	else
	{
	  //����

			
	    $numtable=count($all->get("content","contentid='".$_GET["catid"]."'"));
	    $into=$a->listtable("module!='0'",'listorder');
	    foreach($into as $catids => $row)
	    {
		 $selectd=$row["parentid"] == $catid ? $row["parentid"] : $row["catid"];
	     $sta[$row["catid"]]=(array('id'=>$row["catid"],'parentid'=>$row["parentid"],'name'=>$row["name"],'catid'=>$row['catid'],'selectd'=>$selectd));
		 }
			 $listshow=$a->get('',"where catid='$_GET[catid]'");
			 $tree->tree($sta);
		     $data= $tree->get_tree(0,"<option value=\$id \$selected>\$spacer\$name</option>\n",$listshow["parentid"]);
	           //����
	          $rs=$a->get('',"where catid='$_GET[catid]'");
	           //���
	          $model=$all->listtable('model');
			  $CA = cache_read('category_'.$catid.'.php', '', 1);
			  @extract(new_htmlspecialchars($CA));
			  
			  $catdir=$rs["parentdir"] ? $rs["parentdir"].$rs["catdir"] : $rs["catdir"];
			
			 }
	 include tpl('category_edit');
	 break;
	
	case 'delete':
	$r = $a->get("","where catid='$_GET[catid]'");
	$parent    = $a->get(""," where menuid='".$r["menuid"]."'");
	$subclass  = $a->get("","where pid='".$parent["menuid"]."'");
	$tablename = $db->get_one("select * from ".DB_PRE."model where modelid='".$parent["modelid"]."'");
	$tabledb   = DB_PRE."c_".$tablename["tablename"];
	
	$arrparentid= $CATEGORY[$catid]['arrparentid'];
	$arrchildid = $CATEGORY[$catid]['arrchildid'];

	$db->query("DELETE FROM ".DB_PRE."category WHERE `catid` IN($arrchildid)");
	if($arrparentid)
		{
			$arrparentids = explode(',', $arrparentid);
			foreach($arrparentids as $id)
			{
				if($id == 0) continue;
				$arrchildid = $a->get_arrchildid($id);
				$child = is_numeric($arrchildid) ? 0 : 1;
				$db->query("UPDATE ".DB_PRE."category SET `arrchildid`='$arrchildid', `child`='$child' WHERE `catid`='$id'");
				//if($this->MODLUE == 'phpsin' && $CATEGORY[$id]['type'] < 2) $this->menu->update('catid_'.$id, array('isfolder'=>$child));

			}
		}
	//ɾ���ļ���
	if(is_dir($r["url"]))
	  {
	   del_dir($r["url"]);
	    }
	if($subclass)
	{
	$reuslt_z=$db->query("select * from ".DB_PRE."content where catid='".$subclass["catid"]."'");
	while($rs=$db->fetch_array($reuslt_z))
	{
		$contentid=$rs["contentid"];
		$db->query("delete from ".DB_PRE."content where contentid='$contentid'");
		$db->query("delete from $tabledb where contentid='$contentid'");
		}
	 }
	 else
	 {  //���µ�ַ
	  if($parent["pid"]!=22)
	  {
		 $catid=$a->get("","where menuid='".$parent["pid"]."'");
		 $updataid="?file=content&action=manage&modelid=".$parent["modelid"]."&catid=".$catid["catid"]."";
		 $db->query("update ".DB_PRE."menu SET url='$updataid',target_line='right' WHERE menuid=".$parent["pid"].""); 
		  }
	    }
	
	if($parent)
	{
		
	$reuslt_f=$db->query("select * from ".DB_PRE."content where catid='".$parent["catid"]."'");
	while($rs=$db->fetch_array($reuslt_f))
	{
		$contentid=$rs["contentid"];
		$db->query("delete from ".DB_PRE."content where contentid='$contentid'");
		$db->query("delete from $tabledb where contentid='$contentid'");
		}
	}

        $db->query("delete from ".DB_PRE."menu where menuid='$r[menuid]'");
	$db->query("delete from ".DB_PRE."menu where pid='$r[menuid]'");
	//$db->query("delete from ".DB_PRE."category where menuid='$r[menuid]'");
	//$db->query("delete from ".DB_PRE."category where pid='$r[menuid]'");
	

	$a->cache();
	showmessage('�����ɹ���',"?file=category&action=manage");
	break;
	
	
	    case 'urlrule':
		$ishtml = intval($ishtml);
		$category_urlruleid = intval($category_urlruleid);
		echo form::select_urlrule('phpsin', 'category', $ishtml, 'setting[category_urlruleid]', 'category_urlruleid', $category_urlruleid);
		break;
		
        case 'show_urlrule':
		$ishtml = intval($ishtml);
		$show_urlruleid = intval($show_urlruleid);
		echo form::select_urlrule('phpsin', 'show', $ishtml, 'setting[show_urlruleid]', 'show_urlruleid', $show_urlruleid);
		break;
		
		case 'checkdir':
		if(!preg_match("/[a-zA-Z0-9_-]+\w+$/i",$value)) exit('��ĿĿ¼����ֻ��Ϊ��ĸ�����֡��»��ߣ��л���');
		if($catdir == trim($value)) exit('success');
		$value = $parentid == 0 ? "".$value : $value;
		foreach($CATEGORY AS $k=>$v)
		{
			if($v['parentid'] == $parentid && $v['catdir'] == trim($value)) exit('��ĿĿ¼���Ʋ����ظ�');
		}
		if($parentid == 0 && isset($MODULE[$value])) exit('��ĿĿ¼���Ʋ����ظ�');
		exit('success');
		break;
	}

?>
