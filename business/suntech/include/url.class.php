<?php 
class url
{
	var $db;
	var $URLRULE;
	var $PHPSIN;
	var $CATEGORY;

	function url()
	{
		global $db, $CATEGORY, $MODEL, $URLRULE, $PHPSIN;
		$this->db = &$db;
		$this->URLRULE = $URLRULE;
		$this->PHPSIN = $PHPSIN;
		$this->CATEGORY = $CATEGORY;
		$this->MODEL = $MODEL;
	}

	function index()
	{
		return 'index.'.$this->PHPSIN['fileext'];
	}

	function category($catid, $page = 0, $isurls = 0, $type = 3)
	{
		if(!isset($this->CATEGORY[$catid])) return false;
        $C = cache_read('category_'.$catid.'.php', '', 1);
		if($C['type'] == 0)
		{
			$modelid = $C['modelid'];
			$urlruleid = isset($C['ishtml']) ? $C['category_urlruleid'] : $this->MODEL[$modelid]['category_urlruleid'];
		}
		elseif($C['type'] == 1)
		{
			$urlruleid = $C['category_urlruleid'];
		}
		elseif($C['type'] == 2)
		{
			return $C['url'];
		}
		if(is_numeric($pages)) $page = intval($page);
		$arrparentids = explode(',',$C['arrparentid']);
		$domain_dir = $domain_url = '';
		if(preg_match('/:\/\//', $C['url']) && (substr_count($C['url'], '/')<4))
		{
			$url_a[0] = $C['parentdir'].$C['catdir'].'/index.'.$this->PHPSIN['fileext'];
			$url_a[1] = $C['url'];
			return $type<3 ? $url_a[$type] : $url_a;
		}
		else
		{
			$count = count($arrparentids)-1;
			for($i=$count; $i>=0; $i--)
			{
				if(preg_match('/:\/\//', $this->CATEGORY[$arrparentids[$i]]['url']) && (substr_count($this->CATEGORY[$arrparentids[$i]]['url'], '/')<4))
				{
					$domain_dir = $this->CATEGORY[$arrparentids[$i]]['parentdir'].$this->CATEGORY[$arrparentids[$i]]['catdir'].'/';
					$domain_url = $this->CATEGORY[$arrparentids[$i]]['url'];
					break;
				}
			}
		}
		$categorydir = $C['parentdir'].$C['catdir']; //更新地址
		$catdir = $C['catdir'];
		$fileext = $this->PHPSIN['fileext'];//更新名html
		$urlrules = explode('|', $this->URLRULE[$urlruleid]);
		$urlrule = $page === 0 ? $urlrules[0] : $urlrules[1];
		eval("\$url = \"$urlrule\";");	
		if(($C['type']==0 && $C['ishtml']==1 && $domain_dir) || ($C['type']==0 && $this->MODEL[$modelid]['ishtml'] && $domain_dir))
		{
			if(strpos($url, $domain_dir)===false)
			{
				$url_a[0] = $domain_dir.$url;
			}
			else
			{
				$url_a[0] = $url;
			}
			$url_a[1] = str_replace($domain_dir, $domain_url.'/', $url_a[0]);
		}
		else
		{
			$url_a[0] = $url_a[1] = $url;
		}
		return $type<3 ? $url_a[$type] : $url_a;
	}

	function show($contentid, $page = 0, $catid = 0, $time = 0, $prefix = '')
	{	
		global $PHPSIN;
		if($catid == 0 || $time == 0 || $prefix == '')
		{
			$r = $this->db->get_one("SELECT * FROM `".DB_PRE."content` WHERE `contentid`='$contentid'");
			if($r['isupgrade'] && !empty($r['url']))
			{
				if($page>1)
				{
					$base_name = basename($r['url']);
					$fileext = fileext($base_name);
					$url_a[0] = $url_a[1] = preg_replace('/.'.$fileext.'$/','_'.$page.'.'.$fileext,$r['url']);
					return $url_a;
				}
				else
				{
					$url_a[0] = $url_a[1] = $r['url'];
					return $url_a;
				}
			}
			$catid = $r['catid'];
			$time = $r['inputtime'];
			if(!$prefix) $prefix = $r['prefix'];
		}
		
		if(!isset($this->CATEGORY[$catid])) return false;
        $C = cache_read('category_'.$catid.'.php', '', 1);
		$tag = 0;
		if(preg_match('/:\/\//',$C['url']))
		{
			$tag = 1;
			$arr_url = preg_split('/\//', $C['url']);
			$domain = 'http://'.$arr_url[2];
			$domain1 = 'http://'.$arr_url[2].'/';
			$info = $this->db->get_one("SELECT * FROM `".DB_PRE."category` WHERE `url` IN ('$domain', '$domain1') LIMIT 1");
			$crootdir = $info['parentdir'].$info['catdir'].'/';
		}
		/**
		$categorydir = $C['parentdir'].$C['catdir'];
		$catdir = $C['catdir'];
		$fileext = $this->PHPSIN['fileext'];
		**/
		
		$categorydir = $C['parentdir'].$C['catdir'];
		$catdir = $C['catdir'];
		$fileext = $this->PHPSIN['fileext'];
		$year = date('Y', $time);
		$month = date('m', $time);
		$day = date('d', $time);
		$modelid = $C['modelid'];
		$urlruleid = $C['show_urlruleid'] ? $C['show_urlruleid'] : $this->MODEL[$modelid]['show_urlruleid'];
		$urlrules = explode('|', $this->URLRULE[$urlruleid]);
		$urlrule = $page < 2 ? $urlrules[0] : $urlrules[1];
		
		if(isset($C['ishtml']) && $C['ishtml']==1 || $this->MODEL[$modelid]['ishtml'])
		{
			if($prefix)
			{
				$contentid = $prefix;
			}
			elseif($PHPSIN['enable_urlencode'])
			{
				$contentid = hash_string($contentid);
			}
		}
		eval("\$url = \"$urlrule\";");
		if($tag)
		{
			if(!(strpos($url, $crootdir)===0))
			{
				$url = $crootdir.$url;
			}
			$url_a[0] = $url;
			$url_a[1] = $domain1.str_replace($crootdir, '', $url);
		}
		else
		{
			$url_a[0] = $url_a[1] = $url;
		}
		return $url_a;
	}

	function show_pages($curr_page, $num, $pageurls)
	{		
		$multipage = '';
		$page = 11;
		$offset = 4;
		$pages = $num;
		$from = $curr_page - $offset;
		$to = $curr_page + $offset;
		$more = 0;
		if($page >= $pages)
		{
			$from = 2;
			$to = $pages-1;
		}
		else
		{
			if($from <= 1)
			{
				$to = $page-1;
				$from = 2;
			}
			elseif($to >= $pages)
			{
				$from = $pages-($page-2);
				$to = $pages-1;
			}
			$more = 1;
		}

		if($curr_page>0)
		{
			$perpage = $curr_page == 1 ? 1 : $curr_page-1;
			$multipage .= '<a href="'.$pageurls[$perpage][1].'">上一页</a>';
			if($curr_page==1)
			{
				$multipage .= '<u><b>1</b></u> ';
			}
			elseif($curr_page>6 && $more)
			{
				$multipage .= '<a href="'.$pageurls[1][1].'">1</a>..';
			}
			else
			{
				$multipage .= '<a href="'.$pageurls[1][1].'">1</a>';
			}
		}
		for($i = $from; $i <= $to; $i++)
		{
			if($i != $curr_page)
			{
				$multipage .= '<a href="'.$pageurls[$i][1].'">'.$i.'</a>';
			}
			else
			{
				$multipage .= ' <u><b>'.$i.'</b></u> ';
			}
		}
		if($curr_page<$pages)
		{
			if($curr_page<$pages-5 && $more)
			{
				$multipage .= '..<a href="'.$pageurls[$pages][1].'">'.$pages.'</a> <a href="'.$pageurls[$curr_page+1][1].'">下一页</a>';
			}
			else
			{
				$multipage .= '<a href="'.$pageurls[$pages][1].'">'.$pages.'</a> <a href="'.$pageurls[$curr_page+1][1].'">下一页</a>';
			}
		}
		elseif($curr_page==$pages)
		{
			$multipage .= ' <u><b>'.$pages.'</b></u><a href="'.$pageurls[$curr_page][1].'">下一页</a>';
		}
		return $multipage;
	}

	function update($contentid,$url)
	{

		if(!$this->db->get_one("SELECT contentid FROM `".DB_PRE."content` WHERE `contentid`='$contentid' AND `url`='$url'"))
		{
			return $this->db->query("UPDATE `".DB_PRE."content` SET url='$url' WHERE `contentid`='$contentid'");
		}
		return true;
	}
}
?>