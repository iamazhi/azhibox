<?php 
class content
{
	var $db;
	var $table;
    var $pages;
    var $number;
	var $_userid;
	var $modelid;
	var $userid_sql = '';
	var $model_table;
	var $ishtml = 0;
    function __construct()
    {
		global $db;
		$this->db = &$db;
		$this->table = DB_PRE.'content';
		$this->table_count = DB_PRE.'content_count';
		$this->url = load('url.class.php');
    }
	
    function content()
	{
		$this->__construct();
	}
	
	function set_catid($catid)
	{
		global $CATEGORY, $content_ishtml, $MODEL;
		$modelid = $CATEGORY[$catid]['modelid'];
		if(!isset($MODEL[$modelid])) return false;
		$this->modelid = $modelid;
		$this->ishtml = isset($content_ishtml) ? $content_ishtml : $MODEL[$modelid]['ishtml'];
		$this->model_table = DB_PRE.'c_'.$MODEL[$modelid]['tablename'];
		return true;
	}
	
	 function get($contentid,$tablecount = 2)
	{
	
		$contentid = intval($contentid);
		$data = $this->db->get_one("SELECT * FROM `$this->table` WHERE `contentid`=$contentid $this->userid_sql");
		if($data)
		{
			if($tablecount >= 2)
			{
				$this->set_catid($data['catid']);
				if(!$this->model_table) return false;
				
				$data2 = $this->db->get_one("SELECT * FROM `$this->model_table` WHERE `contentid`=$contentid");
				if($tablecount == 2 && is_array($data) && is_array($data2)) $data = array_merge($data, $data2);
			}
			if($tablecount == 3)
			{
				$data3 = $this->db->get_one("SELECT * FROM `$this->table_count` WHERE `contentid`=$contentid");
				if(is_array($data) && is_array($data2) && is_array($data3)) $data = array_merge($data, $data2, $data3);
			}
		}
		return $data;
	}
	
	function output($data)
	{ 
		require_once CACHE_MODEL_PATH.'content_output.class.php';
		$output = new content_output();
		return $output->get($data);
	}
	
	function edit($saveedit, $model)
	{
		global $_userid,$_username,$modelid,$attachment;
		
		if($model["catid"]) { $relink_array['catid'] = $model["catid"]; }
		
		$relink_array['modelid'] = $modelid;
		$relink_array['title'] = $model['title'];
		$relink_array['style'] = $model['style'];
		$relink_array['thumb'] = $model['thumb'];
		$relink_array['keywords'] = $model['keywords'];
		$relink_array['description'] = $model['description'];
		if($model['posids']) {$relink_array['posids']=1;}else{$relink_array['posids']=0;}
		$relink_array['status'] = $_POST["status"];
		$relink_array['userid'] = $_userid;
		$relink_array['username'] = $_username;
		$relink_array['updatetime'] = strtotime($model["inputtime"]);
		$relink_array['islink'] = $model['islink'];
		$relink_array['prefix'] = $model['prefix'];
		if($model['islink']==1)
		{
			$relink_array["url"] = $model['linkurl'];
		}
		else
		{
			$info = $this->url->show($saveedit,0,$model['catid'],$relink_array['inputtime'],$relink_array['prefix']);
			$relink_array["url"] = $info[1];
			unset($info);
		}
		$this->db->update($this->table, $relink_array, "contentid=$saveedit");
		$this->log_write($saveedit, '', '', $model['islink']);//生成静态
		
		$tablename=$this->db->get_one("SELECT * FROM ".DB_PRE."model WHERE modelid=".$modelid."");
		$model_table =DB_PRE."c_".$tablename["tablename"];
	
		$reustl=$this->db->get_fields("$model_table");
				foreach($reustl as $v)
				{
					foreach($model as $k=>$val)
		     	    {
					   if($v==$k)
					   {
						$info["$v"]=$val;
						}
				      }  
               }
		/**视频 is_here**/	   
		if($model['video'])
		{
			$serverurl = $model['video']['server'] ? $model['video']['server'] : SITE_URL;		
		    $values = explode("\n",$model['video']['videourl']);
		    foreach($values AS $k=>$v)
		    {
			    $v = explode("|",$v);
			    if(!$v[0]) continue;
			    $name = $v[0];
			    $videourl = $v[1];
			    $str_video .= $name.'|'.$videourl.'\n';
		        }
		      $str_video = str_replace('\n', ';', $str_video);
		      $array['str_video'] = $str_video;
		      $array['player'] = $model['video']['player'];
		      $array['server'] = $serverurl;
		      $str_video = array2string($array);
			  $info['video']=$str_video;
			}	 
		$this->db->update($model_table, $info, "contentid=$saveedit");
		
	    $aid = $attachment->upload('pictureurls',UPLOAD_ALLOWEXT,1024*UPLOAD_MAXSIZE,1);
	    $imgurl = UPLOAD_URL.$attachment->uploadedfiles[0]['filepath'];	
        $f='pictureurls';

        require_once FILE_DIR."/image.class.php";
		$image = new image('');
    if($imgurl)
    {
	if($attachment->attachments['pictureurls'])
	 {
	   foreach($attachment->attachments['pictureurls'] as $aid=>$f)
       {
		if($_POST['thumb_width']!="")
		{
        $img=UPLOAD_ROOT.$f;
        $thumb = $attachment->get_thumb($img);
	    $image->thumb($img,$thumb, $_POST['thumb_width'], $_POST['thumb_height']);	
	    $uploadimg=basename($attachment->get_thumb($f));
		}
		else
		{
			$uploadimg=basename($f);
			}
	$this->db->query("UPDATE ".DB_PRE."attachment SET catid='".$model["catid"]."',contentid='$saveedit', filename='$uploadimg' WHERE aid='$aid'");
	    }
     }
	 }
	  //edit批量上传图片
	  $addmorepic = $GLOBALS['addmore_pictureurls'];
	  if($addmorepic)
	  {
	  foreach($addmorepic as $i => $v)
      {
		  if(in_array($v,$GLOBALS['addmore_pictureurls_delete'])) continue;
		  $v = str_replace(UPLOAD_URL,'',$v);
		  
		   //缩略图
		   if($_POST['thumb_width']!="")
		  {
		  $img = UPLOAD_ROOT.$v;
		  $thumb = $attachment->get_thumb($img);
	      $is_img = $image->thumb($img,$thumb, $_POST['thumb_width'], $_POST['thumb_height']);
		  
		  $filename = basename($is_img);
		  }
		  else
		  {
			$filename = basename($v);  
			  }
		  $this->imageexts = $fileext = fileext($filename);
		  if(!preg_match("/^(jpg|jpeg|gif|bmp|png)$/", $fileext)) continue;

		  
		  $uploadedfile = array('contentid'=>$saveedit,'filename'=>$filename, 'filepath'=>trim($v), 'filetype'=>$fileext, 'filesize'=>'', 'fileext'=>$fileext, 'description'=>$GLOBALS['addmore_pictureurls_description'][$i]);
          $attachment->add($uploadedfile);
	    }
		}
       //批量修改删除
	   
	   if(isset($GLOBALS['pictureurls_delete']))
		{
			foreach($GLOBALS['pictureurls_delete'] as $aid)
			{
				$attachment->delete("aid=".$aid."");
			  }
	  	}
			
	   if(isset($GLOBALS['pictureurls_description']))
		{
		    foreach($GLOBALS['pictureurls_description'] as $aid=>$description)
		    {
				$attachment->description($aid, $description);
		    }
		}
		
	   if(isset($GLOBALS['pictureurls_listorder']))
		{
		    foreach($GLOBALS['pictureurls_listorder'] as $aid=>$listorder)
		    {
				$attachment->listorder($aid, $listorder);
		    }
		}
		

	   if($attachment->error) showmessage($attachment->error());
	   return true;
	}
	
	
	
	function add($data , $cat_selected = 0, $isimport = 0)
	{
		global $_userid,$_username,$modelid,$attachment;
	   //  require CACHE_MODEL_PATH.'content_input.class.php';
		// $content_input = new content_input($this->modelid);
        $tablename=$this->db->get_one("SELECT * FROM ".DB_PRE."model WHERE modelid=".$modelid."");
		$relink_model_table =DB_PRE."c_".$tablename["tablename"];
		
		if($data["catid"]){ $relink_array['catid'] = $data["catid"]; }
		
		$relink_array['modelid'] = $modelid;
		$relink_array['title'] = $data['title'];
		$relink_array['style'] = $data['style'];
		$relink_array['thumb'] = $data['thumb'];
		$relink_array['keywords'] = $data['keywords'];
		$relink_array['description'] = $data['description'];
		
		if($data['posids']) {$relink_array['posids']=1;}
			
		$relink_array['status'] = $_POST["status"];
		$relink_array['userid'] = $_userid;
		$relink_array['username'] = $_username;
	    $relink_array['inputtime'] = strtotime($data["inputtime"]);
		$relink_array['updatetime'] = strtotime($data["inputtime"]);
		
		
		$contentid = $this->db->insert($this->table, $relink_array);
		$relink_contentid = $this->db->insert_id();
		
		
		if($data['islink']==1)
		{
			$url = $data['linkurl'];
		}
		else
		{
			$info = $this->url->show($relink_contentid, 0, $data['catid'], $relink_array['inputtime'],$data['prefix']);
			$url = $info[1];
			unset($info);
		}
		if(!$isimport) $this->log_write($relink_contentid, '', '', $data['islink']);//生成静态
		$this->db->query("UPDATE $this->table SET url='$url' WHERE contentid='$relink_contentid'");
		/**
		统计流量
		**/
		$this->db->query("INSERT INTO `$this->table_count`(`contentid`) VALUES('$relink_contentid')");
				$reustl=$this->db->get_fields("$relink_model_table");
				foreach($reustl as $v)
				{
					foreach($data as $k=>$val)
		     	    {
					   if($v==$k)
					   {
						$info["contentid"] = $relink_contentid;
						$info["$v"]=$val;
						}
				      }
               }
	   /**视频 is_here**/	   
		if($data['video'])
		{
			$serverurl = $data['video']['server'] ? $data['video']['server'] : SITE_URL;		
		    $values = explode("\n",$data['video']['videourl']);
		    foreach($values AS $k=>$v)
		    {
			    $v = explode("|",$v);
			    if(!$v[0]) continue;
			    $name = $v[0];
			    $videourl = $v[1];
			    $str_video .= $name.'|'.$videourl.'\n';
		        }
		      $str_video = str_replace('\n', ';', $str_video);
		      $array['str_video'] = $str_video;
		      $array['player'] = $data['player'];
		      $array['server'] = $serverurl;
		      $str_video = array2string($array);
			  $info['video']=$str_video;
			}	   
		
		$this->db->insert($relink_model_table, $info);	
	
       $aid = $attachment->upload('pictureurls',UPLOAD_ALLOWEXT,1024*UPLOAD_MAXSIZE,1);
	   $imgurl = UPLOAD_URL.$attachment->uploadedfiles[0]['filepath'];	
       $f='pictureurls';

        require_once FILE_DIR."/image.class.php";
		$image = new image();
	
    if($imgurl)
    {
	  if($attachment->attachments['pictureurls'])
	 {
	   foreach($attachment->attachments['pictureurls'] as $aid=>$f)
       {
		if($_POST['thumb_width']!="")
		{
        $img=UPLOAD_ROOT.$f;
        $thumb = $attachment->get_thumb($img);
	    $image->thumb($img,$thumb, $_POST['thumb_width'], $_POST['thumb_height']);	
	    $uploadimg=basename($attachment->get_thumb($f));
		
		}
		else
		{
			$uploadimg=basename($f);
			}
	$this->db->query("UPDATE ".DB_PRE."attachment SET catid='".$data["catid"]."',contentid='$relink_contentid', filename='$uploadimg' WHERE aid='$aid'");
	    }
       }
	 }
	 //批量图片
	  $addmorepic = $GLOBALS['addmore_pictureurls'];
	  if($addmorepic)
	  {
	  foreach($addmorepic as $i => $v)
      {
		  if(in_array($v,$GLOBALS['addmore_pictureurls_delete'])) continue;
	
		  $v = str_replace(UPLOAD_URL,'',$v);
		  
		   //缩略图
		   if($_POST['thumb_width']!="")
		  {
		  $img = UPLOAD_ROOT.$v;
		  $thumb = $attachment->get_thumb($img);
	      $is_img = $image->thumb($img,$thumb, $_POST['thumb_width'], $_POST['thumb_height']);
		  
		  $filename = basename($is_img);
		  }
		  else
		  {
			$filename = basename($v);  
			  }
		  $this->imageexts = $fileext = fileext($filename);
		  if(!preg_match("/^(jpg|jpeg|gif|bmp|png)$/", $fileext)) continue;

		  
		  $uploadedfile = array('contentid'=>$relink_contentid,'filename'=>$filename, 'filepath'=>trim($v), 'filetype'=>$fileext, 'filesize'=>'', 'fileext'=>$fileext, 'description'=>$GLOBALS['addmore_pictureurls_description'][$i]);
		  
          $attachment->add($uploadedfile);
	    }
	}
	if(isset($GLOBALS['pictureurls_listorder']))
		{
		    foreach($GLOBALS['pictureurls_listorder'] as $aid=>$listorder)
		    {
				$attachment->listorder($aid, $listorder);
		    }
		}
		
	if(isset($GLOBALS['pictureurls_description']))
		{
		    foreach($GLOBALS['pictureurls_description'] as $aid=>$description)
		    {
				$attachment->description($aid, $description);
		    }
		}	
		
	   if($attachment->error) showmessage($attachment->error());
		return $relink_contentid;//$contentid;
	}

	function listinfo($where = '', $order = '', $page = 1, $pagesize = 50)
	{
        if($where) $where = " WHERE $where";//where设定
		if($order) $order = " ORDER BY $order";//排序
		$page = max(intval($page), 1);
        $offset = $pagesize*($page-1);
        $limit = " LIMIT $offset, $pagesize";
		$r = $this->db->get_one("SELECT count(*) as number FROM $this->table $where");
        $number = $r['number'];
	
        $this->pages = pages($number, $page, $pagesize);//翻页
		
		$array = array();
		$result = $this->db->query("SELECT * FROM $this->table $where $order $limit");
		while($r = $this->db->fetch_array($result))
		{
			$array[] = $r;
		}
		$this->number = $this->db->num_rows($result);
        $this->db->free_result($result);
		return $array;
	    }
	
	function status($info)//通过
	 {
		if(!is_array($info)) return false;
		foreach($info as $id=>$listorder)
		{
			$id = intval($id);
			$listorder = intval($listorder);
			$this->db->query("UPDATE `$this->table` SET `status`=99 WHERE `contentid`=$id");
		}
		return true;
	} 
   function listorder($info)//排序
	 {
		if(!is_array($info)) return false;
		foreach($info as $id=>$listorder)
		{
			$id = intval($id);
			$listorder = intval($listorder);
			$this->db->query("UPDATE `$this->table` SET `listorder`=$listorder WHERE `contentid`=$id");
		}
		return true;
	}
	function delete($contentid,$modelid)
	{
		if(is_array($contentid))
		{
			array_map(array(&$this, 'delete'), $contentid);
		}
		else
		{    
		     $contentid = intval($contentid);
			 $data=$this->db->get_one("SELECT * FROM `$this->table` WHERE `contentid`=$contentid");
			 if($data)
			 {
				 $this->db->query("DELETE FROM `$this->table` WHERE `contentid`=".$data["contentid"]."");
				 
				 $tablename=$this->db->get_one("SELECT * FROM ".DB_PRE."model WHERE modelid=".$data["modelid"]."");
			     $tabledb =DB_PRE."c_".$tablename["tablename"];
		
			      $this->db->query("DELETE FROM ".$tabledb." WHERE `contentid`=".$data["contentid"]." ");
			 }
		}
		return true;
		}
		
	function log_write($contentid, $handle = '', $is_admin = 0, $islink = 99)
	{
		if(!$is_admin) $this->ishtml = 1;
		if(!isset($islink)) $islink = 99;

		if($this->ishtml && ($handle == '' || $handle == 99))
		{
			if(!is_object($this->html)) $this->html = load('html.class.php');
			if($islink==99) $this->html->show($contentid, $this->is_update_related);
		}
	//	$this->search_api($contentid);
	//	$this->log->set('contentid', $contentid);
		return true;
	}
	
	function get_count($contentid)
	{
		$contentid = intval($contentid);
		return $this->db->get_one("SELECT * FROM `$this->table_count` WHERE `contentid`=$contentid");
	}
	function get_contentid($title)
	{
		$info = $this->db->get_one("SELECT `contentid` FROM `$this->table` WHERE `title`='$title'");
		if($info['contentid']) return TRUE;
		else return FALSE;
	}
	function hits($contentid)
	{
		$contentid = intval($contentid);
		$r = $this->db->get_one("SELECT * FROM `$this->table_count` WHERE `contentid`=$contentid");
		if(!$r) return false;
		$hits = $r['hits'] + 1;
		$hits_day = (date('Ymd', $r['hits_time']) == date('Ymd', TIME)) ? ($r['hits_day'] + 1) : 1;
		$hits_week = (date('YW', $r['hits_time']) == date('YW', TIME)) ? ($r['hits_week'] + 1) : 1;
		$hits_month = (date('Ym', $r['hits_time']) == date('Ym', TIME)) ? ($r['hits_month'] + 1) : 1;
        return $this->db->query("UPDATE `$this->table_count` SET `hits`=$hits,`hits_day`=$hits_day,`hits_week`=$hits_week,`hits_month`=$hits_month,`hits_time`=".TIME." WHERE `contentid`=$contentid");
	}
}
?>
