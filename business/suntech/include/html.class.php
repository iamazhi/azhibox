<?php 
class html
{
	var $url;

    function __construct()
    {
		$this->url = load('url.class.php');
		if(!defined('CREATEHTML')) define('CREATEHTML', 1);
    }

	function html()
	{
		$this->__construct();
	}

	function index()
	{
		global $PHPSIN;
		if(!$PHPSIN['ishtml']) return true;
		extract($GLOBALS, EXTR_SKIP);
		$head['title'] = $PHPSIN['sitename'].'-'.$PHPSIN['meta_title'];
		$head['keywords'] = $PHPSIN['meta_keywords'];
		$head['description'] = $PHPSIN['meta_description'];
		$subcats = subcat('phpsin', 0, 0);
		$catid = 0;
		ob_start();
		include template('phpsin', 'index');
		$file = PHP_ROOT.$this->url->index();
		return createhtml($file);
	}

	function category($catid, $page = 0)
	{
		extract($GLOBALS, EXTR_SKIP);
		$C = cache_read("category_$catid.php", '', 1);
		if(!$C || $C['type'] > 1) return false;
		extract($C);
		if($type == 0 && !isset($ishtml))
		{
			$ishtml = $MODEL[$modelid]['ishtml'];
		}
		if(!$ishtml) return false;
		$catlist = submodelcat($C['modelid']);
		$arrparentid = explode(',', $CATEGORY[$catid]['arrparentid']);
		$parentid = $arrparentid[1];

        $head['title'] = $name.'-'.($title ? $title : $PHPSIN['sitename']);
		$head['keywords'] = $keywords;
		$head['description'] = $description;
		$curpage = $page;
if($type == 0)
  {
   if($page == 0) $page = 1;
   if($child==1)
   {
    $arrchildid = subcat('phpcms',$catid);
    $template = $template_category;
   }
   else
   {
    $template = $template_list;
   }
  }
		
		elseif($type == 1 )//is page
		{
		global $db;
		$a = $db->get_one("select * from ".DB_PRE."content a, ".DB_PRE."c_singlepage b where a.contentid=$contentid AND a.contentid=b.contentid");
		if($a){extract($a);}
			}
		$file_a = $this->url->category($catid, $curpage);
		$file = PHP_ROOT.$file_a[0];
		ob_start();
		include template('phpsin', $template);
		return createhtml($file);
	}

	function show($contentid, $is_update_related = 0)
	{
		global $MODEL,$CATEGORY,$db;
		extract($GLOBALS, EXTR_SKIP);
		if(!is_a($c, 'content'))
		{
			if(!class_exists('content'))
			{
				require CLASS_PATH.'content.class.php';//require 'admin/content.class.php';
			}
			$c = new content();
		}
		$r = $c->get($contentid);
		if(!$r) return false;
		if(isset($r['paginationtype']))
		{
			$paginationtype = $r['paginationtype'];
			$maxcharperpage = $r['maxcharperpage'];
		}
		if($r['catid']) $catid = $r['catid'];
		$CA = cache_read('category_'.$catid.'.php','',1);

		if((!isset($CA['content_ishtml']) && !$MODEL[$CATEGORY[$catid]['modelid']]['ishtml']) || (isset($CA['content_ishtml']) && !$CA['content_ishtml'])) return false;
		
		if($is_update_related)
		{
			$this->index();
			$pages = intval($PHPSIN['autoupdatelist']);
			$catids = explode(',', $CATEGORY[$r['catid']]['arrparentid']);
			$catids[] = $r['catid'];
			foreach($catids as $cid)
			{
				if($cid == 0) continue;
				for($i=0; $i<=$pages; $i++)
				{
					if($CATEGORY[$cid]['child']==1 && $i>0) continue;
					$this->category($cid, $i);
				}
			}
		}
		if($r['status'] != 99) return true;
		$info = $this->url->show($r['contentid'], 0, $r['catid'], $r['inputtime']);//is ther
		$show_url_path = $info[0];
	
		unset($info);
		$show_url_path = str_replace('.'.$PHPSIN['fileext'],'',$show_url_path);
		$GLOBALS['show_url_path'] = $show_url_path;
		
        $C = cache_read('category_'.$r['catid'].'.php', '', 1);
		if($r['template'])
		{
			$GLOBALS['template_show_images'] = $r['template'];
		}
		else
		{
			$GLOBALS['template_show_images'] = $C['template_show'];
		}	
		$data = $c->output($r);   //is ther
		extract($data);
        $template = $GLOBALS['template_show_images'];
		$head['keywords'] = str_replace(' ', ',', $r['keywords']);
		$head['description'] = $r['description'];
		
		$allow_priv = $allow_readpoint = true;
		$pages = $titles = '';
		if($paginationtype==1)
		{
			if(strpos($content, '[/page]')!==false)
			{
				$content = preg_replace("|\[page\](.*)\[/page\]|U", '', $content);
			}
			if(strpos($content, '[page]')!==false)
			{
				$content = str_replace('[page]', '', $content);
			}
			$content = contentpage($content, $maxcharperpage);//
		}
		elseif($paginationtype==0)
		{
			if(strpos($content, '[/page]')!==false)
			{
				$content = preg_replace("|\[page\](.*)\[/page\]|U", '', $content);
			}
			if(strpos($content, '[page]')!==false)
			{
				$content = str_replace('[page]', '', $content);
			}
		}
		
$pre = $db->get_one("SELECT title,url FROM `".DB_PRE."content` WHERE `contentid`<$contentid and `catid`='$catid' order by contentid desc limit 0,1");
if(empty($pre)) {
$pre['title']='没有了';
$pre['url']='';
}

$next = $db->get_one("SELECT title,url FROM `".DB_PRE."content` WHERE `contentid`>$contentid and `catid`='$catid' order by contentid asc limit 0,1");
if(empty($next)) {
$next['title']='没有了';
$next['url']='';
}
		if(strpos($content, '[page]') !== false)
		{
			$contents = array_filter(explode('[page]', $content));
			$pagenumber = count($contents);
			for($i=1; $i<=$pagenumber; $i++)
			{
				$pageurls[$i] = $this->url->show($r['contentid'], $i, $r['catid'], $r['inputtime']);
			}
			if(strpos($content, '[/page]') !== false)
			{
				if(preg_match_all("|\[page\](.*)\[/page\]|U", $content, $m, PREG_PATTERN_ORDER))
				{
					foreach($m[1] as $k=>$v)
					{
						$page = $k+1;
						$titles .= '<a href="'.$pageurls[$page][0].'">'.$page.'、'.strip_tags($v).'</a>';
					}
				}
			}
			$page = $filesize = 0;
			
			foreach($contents as $content)
			{
				$page++;
				$pages = $this->url->show_pages($page, $pagenumber, $pageurls);
				if($titles)
				{
					list($title, $content) = explode('[/page]', $content);
				}
				$title = strip_tags($title);
				$head['title'] = $title.'_'.$C['catname'].'_'.$PHPSIN['sitename'];
				ob_start();
				include template('phpsin', $template);
				$file = PHP_ROOT.$pageurls[$page][0];
				$filesize += createhtml($file);
			}
			return $filesize;
		}
		else
		{
			$page = $page ? $page : 1;
			$images_number = $GLOBALS['images_number'];
			$array_images = $GLOBALS['array_images'];
			$title = strip_tags($title);
			$head['title'] = $title.'_'.$C['catname'].'_'.$PHPSIN['sitename'];
			$ishtml = 1;
			$info = $this->url->show($r['contentid'], 0, $r['catid'], $r['inputtime']);
			$file = PHP_ROOT.$info[0];
			//echo $r['contentid']." ";
			ob_start();
			include template('phpsin', $template);
			return createhtml($file);
			exit;
		}

	}

	function delete($contentid, $table)
	{
		global $db;
		$contentid = intval($contentid);
		if(!$contentid) return FALSE;
		$r = $db->get_one("SELECT * FROM `".DB_PRE."content` c, `$table` b WHERE c.contentid=b.contentid AND c.`contentid`=$contentid");
		if($r['paginationtype']==1)
		{
			$r['content'] = contentpage($r['content'], $r['maxcharperpage']);
		}
		$contents = array_filter(explode('[page]', $r['content']));
		$pagenumber = count($contents);
		for($i=1; $i<=$pagenumber; $i++)
		{
			$info = $this->url->show($contentid, $i, $r['catid'], $r['inputtime']);
			$fileurl = $info[0];
			unset($info);
			@unlink(PHP_ROOT.$fileurl);
		}
		return TRUE;
	}
}
?>