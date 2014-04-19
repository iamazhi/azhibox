<?php

function filter_xss($string, $allowedtags = '', $disabledattributes = array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavaible', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragdrop', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterupdate', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmoveout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload','iframe'))
{
	if(is_array($string))
	{
		foreach($string as $key => $val) $string[$key] = filter_xss($val, ALLOWED_HTMLTAGS);
	}
	else
	{
		$string = preg_replace('/\s('.implode('|', $disabledattributes).').*?([\s\>])/', '\\2', preg_replace('/<(.*?)>/ie', "'<'.preg_replace(array('/javascript:[^\"\']*/i', '/(".implode('|', $disabledattributes).")[ \\t\\n]*=[ \\t\\n]*[\"\'][^\"\']*[\"\']/i', '/\s+/'), array('', '', ' '), stripslashes('\\1')) . '>'", strip_tags($string, $allowedtags)));
	}
	return $string;
}
/**
 * 生成上传附件验证
 * @param $args   参数
 * @param $operation   操作类型(加密解密)

function upload_key($args) {
	$pc_auth_key = $_SERVER['HTTP_USER_AGENT'];
	$authkey = md5($args.$pc_auth_key);
	return $authkey;
} */

function new_htmlspecialchars($string)
{
	return is_array($string) ? array_map('new_htmlspecialchars', $string) : htmlspecialchars($string, ENT_QUOTES);
}

function new_addslashes($string)
{
	if(!is_array($string)) return addslashes($string);
	foreach($string as $key => $val) $string[$key] = new_addslashes($val);
	return $string;
}

function new_stripslashes($string)
{
	if(!is_array($string)) return stripslashes($string);
	foreach($string as $key => $val) $string[$key] = new_stripslashes($val);
	return $string;
}

function safe_replace($string)
{
	$string = str_replace('%20','',$string);
	$string = str_replace('%27','',$string);
	$string = str_replace('*','',$string);
	$string = str_replace('"','&quot;',$string);
	$string = str_replace("'",'',$string);
	$string = str_replace("\"",'',$string);
	$string = str_replace('//','',$string);
	$string = str_replace(';','',$string);
	$string = str_replace('<','&lt;',$string);
	$string = str_replace('>','&gt;',$string);
	$string = str_replace('(','',$string);
	$string = str_replace(')','',$string);
	$string = str_replace("{",'',$string);
	$string = str_replace('}','',$string);
	return $string;
}

function submodelcat($modelid = 1, $parentid = NULL, $type = NULL)
{
	global $CATEGORY;
	$subcat = array();
	foreach($CATEGORY as $id=>$cat)
	{
		if($cat['modelid'] == $modelid && ($pid === NULL || $cat['pid'] == $pid) && $cat['parentid'] !=0 && ($type === NULL || $cat['type'] == $type)) $subcat[$id] = $cat;
	}

	return $subcat;
}

function cache_count($sql)
{
	global $db, $TEMP;
	$id = md5($sql);
	if(!isset($TEMP['count'][$id]))
	{
		if(CACHE_COUNT_TTL)
		{
			$r = $db->get_one("SELECT `count`,`updatetime` FROM `".DB_PRE."cache_count` WHERE `id`='$id'");
			if(!$r || $r['updatetime'] < TIME - CACHE_COUNT_TTL)
			{
				$r = $db->get_one($sql);
				$TEMP['count'][$id] = $r['count'];
				$db->query("REPLACE INTO `".DB_PRE."cache_count`(`id`, `count`, `updatetime`) VALUES('$id', '".$r['count']."', '".TIME."')");
			}
		}
		else
		{
			$r = $db->get_one($sql);
		}
		$TEMP['count'][$id] = $r['count'];
	}
	return $TEMP['count'][$id];
}

function template($module = 'phpsin', $template = 'index', $istag = 0)
{
	$compiledtplfile = TPL_CACHEPATH.$module.'_'.$template.'.tpl.php';
	if(TPL_REFRESH && (!file_exists($compiledtplfile) || @filemtime(TPL_ROOT.TPL_NAME.'/'.$module.'/'.$template.'.html') > @filemtime($compiledtplfile) || @filemtime(TPL_ROOT.TPL_NAME.'/tag.inc.php') > @filemtime($compiledtplfile)))
	{
		require_once PHP_ROOT.'include/template.func.php';
		template_compile($module, $template, $istag);
	}
	return $compiledtplfile;
}


function cache_delete($file, $path = '')
{
	$cachefile = ($path ? $path : CACHE_PATH).$file;
	return @unlink($cachefile);
}
//栏目
function subcat($module = 'phpsin', $parentid = NULL, $type = NULL)
{
	global $CATEGORY;
	$subcat = array();
	foreach($CATEGORY as $id=>$cat)
	{
		if($cat['module'] == $module && ($parentid === NULL || $cat['parentid'] == $parentid) && ($type === NULL || $cat['type'] == $type)) $subcat[$id] = $cat; 
	}
	return $subcat;
}




function tag($module, $template, $sql, $page = 0, $number = 10,$setting = array(), $catid = 0)
{
	global $db, $CATEGORY, $MODULE, $URLRULE, $PHPSIN, $MODEL,$catid;
	if($sql)
	{
		@include_once FILE_DIR.'/include/output.func.php';
		$offset = 0;
		if($page !== 0)
		{  
			$page = max(intval($page), 1);
			$offset = $number*($page-1);
	        $sql_count = $db->get_one(preg_replace("/^SELECT([^(]+)\s*FROM(.+)(ORDER BY.+)$/i", "SELECT COUNT(*) AS `count` FROM\\2", $sql));
			$count = $sql_count["count"]; 
			$urlruleid = isset($setting['urlruleid']) ? intval($setting['urlruleid']) : 0;
			$urlrule = $urlruleid > 0 ? $URLRULE[$urlruleid] : '';
			$pages[1] = pages($count, $page, $number, $urlrule, $setting, $catid);
			$pages[2] = pagesen($count, $page, $number, $urlrule, $setting, $catid);
		 }
		    $i=0;
		    $data = array();
		    $result = $db->query("$sql LIMIT $offset, $number");
		    while($r = $db->fetch_array($result))
		    {
			 $data[++$i] = $r;
		      }
		     $rows = $db->num_rows($result);
		     $db->free_result($result);
			 
		}
		else
		{
			$data = array();
		    $number = $rows = $count = $page = 0;
		    $pages = '';
			}
		if($page)
		{
		return array('data'=>$data, 'pages'=>$pages );
		}
		else
		{
			return $data;
			}
	}

function get($sql, $rows = 0, $page = 0, $dbname = '', $dbsource = '', $urlrule = '', $distinct_field = '', $catid = 0)
{
	if(!$sql) return false;
	if($dbsource)
	{
		$s = cache_read('db_'.$dbsource.'.php', '', 1);
		if(!$s) return false;
		if($s['status'])
		{
            global $db;
			$dbname = $s['dbname'];
		}
		else
		{
			$db = new db_mysql;
			$db->connect($s['dbhost'], $s['dbuser'], $s['dbpw'], $s['dbname'], 0, $s['dbcharset']);
		}
	}
	else
	{
		global $db;
		if(DB_PRE != 'phpjsj_') $sql = str_replace('phpjsj_', DB_PRE, $sql);
	}
	if($dbname) $db->select_db($dbname) or exit("The database $database is not exists!");
	$rows = intval($rows);
	if(!isset($page)) $page = 1;
	$page = max(intval($page), 0);
	$pages = $limit = '';
	if($page)
	{
		global $db;
		$offset = $rows*($page-1);
		$limit = " LIMIT $offset, $rows";
		if($dbname || $dbsource)
		{
			$r = $db->get_one("SELECT COUNT(*) AS `count` ".stristr($sql, 'from'));
			$total = $r['count'];
		}
		elseif($distinct_field)
		{
			$r = $db->get_one("SELECT COUNT(distinct $distinct_field) AS `count` ".stristr($sql, 'from'));
			$total = $r['count'];
		}
		else
		{
			$r = $db->get_one("SELECT COUNT(*) AS `count` ".stristr($sql, 'from'));
			$total = $r['count'];
		}
		$pages[1] = pages($total, $page, $rows, $urlrule, '', $catid);
                $pages[2] = pagesen($total, $page, $rows, $urlrule, '', $catid);
	}
	elseif($rows > 0)
	{
		$limit = " LIMIT $rows";
	}
	//echo $sql.$limit;
	$data = $rows == -1 ? $db->get_one($sql) : $db->select($sql.$limit);
	if($dbname) $db->select_db(DB_NAME);
	if(isset($s['dbcharset']) && $s['dbcharset'] != DB_CHARSET) $data = str_charset($s['dbcharset'], CHARSET, $data);
	if($page)
	{
		$count = count($data);
		if(!isset($total)) $total = $count;
		return array('data'=>$data, 'total'=>$total, 'count'=>count($data), 'pages'=>$pages);
	}
	else
	{
		return $data;
	}
}

function catpos($catid, $urlrule = '')
{
	global $CATEGORY;
	if(!isset($CATEGORY[$catid])) return '';
	$pos = '';
	$arrparentid = array_filter(explode(',', $CATEGORY[$catid]['arrparentid'].','.$catid));
	foreach($arrparentid as $catid)
	{
		if($urlrule) eval("\$url = \"$urlrule\";");
		else $url = $CATEGORY[$catid]['url'];
		$pos .= '<a href="'.$url.'">'.$CATEGORY[$catid]['name'].'</a>';
	}
	return $pos;
}

function get_sql_catid($catid)
{
	global $CATEGORY;
	$catid = intval($catid);
	if(!isset($CATEGORY[$catid])) return false;
	return $CATEGORY[$catid]['child'] ? " AND `catid` IN(".$CATEGORY[$catid]['arrchildid'].") " : " AND `catid`=$catid ";
}

function get_parentid($catid)
{
	global $db,$CATEGORY;
	$catid = intval($catid);
	if(!isset($CATEGORY[$catid])) return false;
        $r=$db->get_one("SELECT catid,parentid FROM ".DB_PRE."category WHERE catid=$catid");
	$arrparentid = explode(',', $CATEGORY[$catid]['arrparentid']);

        $parentid=$CATEGORY[$catid]['child'] ? "`parentid`= $r[catid] " : "`catid`= $r[catid]";
	return $r[parentid] ? " `parentid` IN (".$arrparentid[1].")" : " $parentid " ;
}

function get_sql_contentid($contentid)
{
	global $contentid;
	
	$catid = intval($contentid);
	return " AND `contentid`=$contentid ";
}
function cache_write($file, $array, $path = '')
{//替换模板标签
	if(!is_array($array)) return false;
	$array = "<?php\nreturn ".var_export($array, true).";\n?>";
	$cachefile = ($path ? $path : CACHE_PATH).$file;
	$strlen = file_put_contents($cachefile, $array);
	@chmod($cachefile, 0777);
	return $strlen;
}

function cache_read($file, $path = '', $iscachevar = 0)
{
	if(!$path) $path = CACHE_PATH;
	$cachefile = $path.$file;
	if($iscachevar)
	{
		global $TEMP;
		$key = 'cache_'.substr($file, 0, -4);
		return isset($TEMP[$key]) ? $TEMP[$key] : $TEMP[$key] = @include $cachefile;
	}
	return @include $cachefile;
}

function url($url, $isabs = 0)
{
	if(strpos($url, '://') !== FALSE || $url[0] == '?') return $url;
	if($isabs || defined('SHOWJS'))
	{
		$url = strpos($url, PHPWEB_PATH) === 0 ? SITE_URL.substr($url, strlen(PHPWEB_PATH)) : SITE_URL.$url;
	}
	else
	{
		$url = strpos($url, PHPWEB_PATH) === 0 ? $url : PHPWEB_PATH.$url;
	}
	return $url;
}

function url_par($par, $url = '')
{
	if($url == '') $url = URL;
	$pos = strpos($url, '?');
	if($pos === false)
	{
		$url .= '?'.$par;
	}
	else
	{
		$querystring = substr(strstr($url, '?'), 1);
		parse_str($par, $pars);
		foreach($pars as $k=>$v)
		{
			$querystring = _url_par($k, $v, $querystring);
		}
		$url = substr($url, 0, $pos).'?'.$querystring;
	}
	return $url;
}

function _url_par($var, $value, $querystring)
{
	if($querystring)
	{
		$pattern = "/([&]?)(".preg_quote($var)."\=)([^&]+)([&]?)/";
		$querystring = preg_match($pattern, $querystring) ? preg_replace($pattern, '${1}${2}'.$value.'${4}', $querystring) : $querystring."&$var=$value";
	}
	else
	{
		$querystring = $var.'='.$value;
	}
	return $querystring;
}

function showmessage($msg, $url_forward = 'goback', $ms = 1250, $direct = 0)
{//提示信息

	if($url_forward && $url_forward != 'goback' && $url_forward != 'close') $url_forward = url($url_forward, 1);
    if($direct && $url_forward && $url_forward!='goback')
    {ob_clean();header("location:$url_forward");
        exit("<script>self.location='$url_forward';</script>");
    }
	include PHP_ROOT.'/admin/templates/showmessage.tpl.php' ;
	exit;
}


function message($msg, $url_forward = 'goback', $ms = 1250, $direct = 0)
{//提示信息

    if($url_forward && $url_forward != 'goback' && $url_forward != 'close') $url_forward = url($url_forward, 1);
    if($direct && $url_forward && $url_forward!='goback')
    {
        ob_clean();
        header("location:$url_forward");
        exit("<script>self.location='$url_forward';</script>");
    }
	include PHP_ROOT."plus/message.php";
	exit;
}
//静态
function createhtml($file)
{
	$data = ob_get_contents();
	ob_clean();
	dir_create(dirname($file));
	$strlen = file_put_contents($file, $data);
	@chmod($file,0777);
	return $strlen;
}

function debug()
{
	global $db;
	if(!DEBUG || defined('CREATEHTML')) return false;
	define('DEBUG_TIME', usedtime());
	define('DEBUG_QUERIES', $db->querynum);
	return true;
}

function usedtime()
{
	$stime = explode(' ', MICROTIME_START);
	$etime = explode(' ', microtime());
	return number_format(($etime[1] + $etime[0] - $stime[1] - $stime[0]), 6);
}
//PAGE CODE
//总数 页数 
function pagesen($num, $curr_page, $perpage = 20, $urlrule = '', $array = array(), $catid = 0)
{
	global $PHPSIN;
	if($PHPSIN['pagemode'] && $num > $perpage)
	{
		$url = load('url.class.php');
		$multipage = '';
		if($num > $perpage)
		{
			$page = 11;
			$offset = 4;
			$pages = ceil($num / $perpage);
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
			if($urlrule == '') $urlrule = url_par('page={$page}');

			$multipage .= '总数：<b>'.$num.'</b>&nbsp;&nbsp;';

			if($curr_page>0)
			{
				$multipage .= $catid ? '<a href="'.$url->category($catid, $curr_page-1, 1, 1).'">上一页</a>' : '<a href="'.pageurl($urlrule, $curr_page-1, $array).'">上一页</a>';
				if($curr_page==1)
				{
					$multipage .= '<u><b>1</b></u> ';
				}
				elseif($curr_page>6 && $more)
				{
					$multipage .= $catid ? '<a href="'.$url->category($catid, 1, 1, 1).'">1</a>..' : '<a href="'.pageurl($urlrule, 1, $array).'">1</a>..';
				}
				else
				{
					$multipage .= $catid ? '<a href="'.$url->category($catid, 1, 1, 1).'">1</a>' : '<a href="'.pageurl($urlrule, 1, $array).'">1</a> ';
				}
			}
			for($i = $from; $i <= $to; $i++)
			{
				if($i != $curr_page)
				{
					$multipage .= $catid ? '<a href="'.$url->category($catid, $i, 1, 1).'">'.$i.'</a> ' : '<a href="'.pageurl($urlrule, $i, $array).'">'.$i.'</a> ';
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
					$multipage .= $catid ? '..<a href="'.$url->category($catid, $pages, 1, 1).'">'.$pages.'</a> <a href="'.$url->category($catid, $curr_page+1, 1).'">下一页</a>' : '..<a href="'.pageurl($urlrule, $pages, $array).'">'.$pages.'</a> <a href="'.pageurl($urlrule, $curr_page+1, $array).'">下一页</a>';
				}
				else
				{
					$multipage .= $catid ? '<a href="'.$url->category($catid, $pages, 1, 1).'">'.$pages.'</a> <a href="'.$url->category($catid, $curr_page+1, 1, 1).'">下一页</a>' : '<a href="'.pageurl($urlrule, $pages, $array).'">'.$pages.'</a> <a href="'.pageurl($urlrule, $curr_page+1, $array).'">下一页</a>';
				}
			}
			elseif($curr_page==$pages)
			{
				$multipage .= ' <u><b>'.$pages.'</b></u><a href="'.pageurl($urlrule, $curr_page, $array).'">下一页</a>';
			}
		}
		return $multipage;
	}
	else //更新静态page
	{
		$total = $num;
		$page = $curr_page;
		if($num < 1) return '';
		if($urlrule == '') $urlrule = url_par('page={$page}');
		$pages = ceil($total/$perpage);

		$page = min($pages, $page);
		$prepage = $page - 1;
		$prepage = max($prepage, 1);
		$nextpage = $page+1;
		$nextpage = min($nextpage, $pages);
		if($catid)
		{
			$url = load('url.class.php');
			$firstpage = $url->category($catid, 1, 1, 1);
			$prepage = $url->category($catid, $prepage, 1, 1);
			$nextpage = $url->category($catid, $nextpage, 1, 1);
			$lastpage = $url->category($catid, $pages, 1, 1);
			$urlpre = $url->category($catid, '', 1, 1);
		}
		else
		{
			$firstpage = pageurl($urlrule, 1, $array);
			$prepage = pageurl($urlrule, $prepage, $array);
			$nextpage = pageurl($urlrule, $nextpage, $array);
			$lastpage = pageurl($urlrule, $pages, $array);
			$urlpre = pageurl($urlrule, '', $array);
		}
		$data = str_replace('"', '\"', $PHPSIN['pageshtml_en']);
		eval("\$url = \"$data\";");
		return $url;
	}
}
//PAGE CODE
//总数 页数 
function pages($num, $curr_page, $perpage = 20, $urlrule = '', $array = array(), $catid = 0)
{
	global $PHPSIN;
	if($PHPSIN['pagemode'] && $num > $perpage)
	{
		$url = load('url.class.php');
		$multipage = '';
		if($num > $perpage)
		{
			$page = 11;
			$offset = 4;
			$pages = ceil($num / $perpage);
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
			if($urlrule == '') $urlrule = url_par('page={$page}');

			$multipage .= '总数：<b>'.$num.'</b>&nbsp;&nbsp;';

			if($curr_page>0)
			{
				$multipage .= $catid ? '<a href="'.$url->category($catid, $curr_page-1, 1, 1).'">上一页</a>' : '<a href="'.pageurl($urlrule, $curr_page-1, $array).'">上一页</a>';
				if($curr_page==1)
				{
					$multipage .= '<u><b>1</b></u> ';
				}
				elseif($curr_page>6 && $more)
				{
					$multipage .= $catid ? '<a href="'.$url->category($catid, 1, 1, 1).'">1</a>..' : '<a href="'.pageurl($urlrule, 1, $array).'">1</a>..';
				}
				else
				{
					$multipage .= $catid ? '<a href="'.$url->category($catid, 1, 1, 1).'">1</a>' : '<a href="'.pageurl($urlrule, 1, $array).'">1</a> ';
				}
			}
			for($i = $from; $i <= $to; $i++)
			{
				if($i != $curr_page)
				{
					$multipage .= $catid ? '<a href="'.$url->category($catid, $i, 1, 1).'">'.$i.'</a> ' : '<a href="'.pageurl($urlrule, $i, $array).'">'.$i.'</a> ';
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
					$multipage .= $catid ? '..<a href="'.$url->category($catid, $pages, 1, 1).'">'.$pages.'</a> <a href="'.$url->category($catid, $curr_page+1, 1).'">下一页</a>' : '..<a href="'.pageurl($urlrule, $pages, $array).'">'.$pages.'</a> <a href="'.pageurl($urlrule, $curr_page+1, $array).'">下一页</a>';
				}
				else
				{
					$multipage .= $catid ? '<a href="'.$url->category($catid, $pages, 1, 1).'">'.$pages.'</a> <a href="'.$url->category($catid, $curr_page+1, 1, 1).'">下一页</a>' : '<a href="'.pageurl($urlrule, $pages, $array).'">'.$pages.'</a> <a href="'.pageurl($urlrule, $curr_page+1, $array).'">下一页</a>';
				}
			}
			elseif($curr_page==$pages)
			{
				$multipage .= ' <u><b>'.$pages.'</b></u><a href="'.pageurl($urlrule, $curr_page, $array).'">下一页</a>';
			}
		}
		return $multipage;
	}
	else //更新静态page
	{
		$total = $num;
		$page = $curr_page;
		if($num < 1) return '';
		if($urlrule == '') $urlrule = url_par('page={$page}');
		$pages = ceil($total/$perpage);
		$page = min($pages, $page);
		$prepage = $page - 1;
		$prepage = max($prepage, 1);
		$nextpage = $page+1;
		$nextpage = min($nextpage, $pages);
		if($catid)
		{
			$url = load('url.class.php');
			$firstpage = $url->category($catid, 1, 1, 1);
			$prepage = $url->category($catid, $prepage, 1, 1);
			$nextpage = $url->category($catid, $nextpage, 1, 1);
			$lastpage = $url->category($catid, $pages, 1, 1);
			$urlpre = $url->category($catid, '', 1, 1);
		}
		else
		{
			$firstpage = pageurl($urlrule, 1, $array);
			$prepage = pageurl($urlrule, $prepage, $array);
			$nextpage = pageurl($urlrule, $nextpage, $array);
			$lastpage = pageurl($urlrule, $pages, $array);
			$urlpre = pageurl($urlrule, '', $array);
		}
		$data = str_replace('"', '\"', $PHPSIN['pageshtml']);
		eval("\$url = \"$data\";");
		return $url;
	}
}
function pageurl($urlrule, $page, $array = array())
{
	@extract($array, EXTR_SKIP);
	if(strpos($urlrule, '|'))
	{
		$urlrules = explode('|', $urlrule);
		$urlrule = $page < 2 ? $urlrules[0] : $urlrules[1];
	}
	eval("\$url = \"$urlrule\";");
	return $url;
}

function implodeids($array, $s = ',')
{
	if(empty($array)) return '';
	return is_array($array) ? implode($s, $array) : $array;
}

function set_cookie($var, $value = '', $time = 0)
{
	$time = $time > 0 ? $time : ($value == '' ? PHP_TIME - 3600 : 0);
	$s = $_SERVER['SERVER_PORT'] == '443' ? 1 : 0;
	$var = COOKIE_PRE.$var;
	$_COOKIE[$var] = $value;
	if(is_array($value))
	{
		foreach($value as $k=>$v)
		{setcookie($var.'['.$k.']', $v, $time, COOKIE_PATH, COOKIE_DOMAIN, $s);
		}
	}
	else
	{
		setcookie($var, $value, $time, COOKIE_PATH, COOKIE_DOMAIN, $s);
	}
}


function get_cookie($var)
{
	$var = COOKIE_PRE.$var;
	return isset($_COOKIE[$var]) ? $_COOKIE[$var] : false;
}
function ip()
{
	if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown'))
	{
		$ip = getenv('HTTP_CLIENT_IP');
	}
	elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown'))
	{
		$ip = getenv('HTTP_X_FORWARDED_FOR');
	}
	elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown'))
	{
		$ip = getenv('REMOTE_ADDR');
	}
	elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown'))
	{
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return preg_match("/[\d\.]{7,15}/", $ip, $matches) ? $matches[0] : 'unknown';
}

function sizecount($filesize)//数据库使用空间计算
{
	if($filesize >= 1073741824)
	{
		$filesize = round($filesize / 1073741824 * 100) / 100 . ' GB';
	}
	elseif($filesize >= 1048576)
	{
		$filesize = round($filesize / 1048576 * 100) / 100 . ' MB';
	}
	elseif($filesize >= 1024)
	{
		$filesize = round($filesize / 1024 * 100) / 100 . ' KB';
	}
	else
	{
		$filesize = $filesize . ' Bytes';
	}
	return $filesize;
}

function file_down($filepath, $filename = '')
{
	if(!$filename) $filename = basename($filepath);
	if(is_ie()) $filename = rawurlencode($filename);
	$filetype = fileext($filename);
	$filesize = sprintf("%u", filesize($filepath));
	if(ob_get_length() !== false) @ob_end_clean();
	header('Pragma: public');
	header('Last-Modified: '.gmdate('D, d M Y H:i:s') . ' GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: pre-check=0, post-check=0, max-age=0');
	header('Content-Transfer-Encoding: binary');
	header('Content-Encoding: none');
	header('Content-type: '.$filetype);
	header('Content-Disposition: attachment; filename="'.$filename.'"');
	header('Content-length: '.$filesize);
	readfile($filepath);
	exit;
}

function fileext($filename)
{
	return strtolower(trim(substr(strrchr($filename, '.'), 1, 10)));
}

function is_ie()
{
	$useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
	if((strpos($useragent, 'opera') !== false) || (strpos($useragent, 'konqueror') !== false)) return false;
	if(strpos($useragent, 'msie ') !== false) return true;
	return false;
}

function str_charset($in_charset, $out_charset, $str_or_arr)
{
	if(is_array($str_or_arr))
	{
		foreach($str_or_arr as $k=>$v)
		{
			$str_or_arr[$k] = str_charset($in_charset, $out_charset, $v);
		}
	}
	else
	{
		$str_or_arr = iconv($in_charset, $out_charset, $str_or_arr);
	}
	return $str_or_arr;
}


function format_js($string, $isjs = 1)
{
	$string = addslashes(str_replace(array("\r", "\n"), array('', ''), $string));
	return $isjs ? 'document.write("'.$string.'");' : $string;
}

function pay_fee( $amount, $fee)
{
    $pay_fee = 0;
    if (strpos($fee, '%') !== false)
    {
        /* 支付费用是一个比例 */
        $val     = floatval($fee) / 100;
        $pay_fee = $val > 0 ? $amount * $val : 0;
    }
    else
    {
        $pay_fee = floatval($fee);
    }
    return round($pay_fee, 2);
}
/**
 *	生成一个号码
 *	@params
 *	@return
 */

function create_sn()
{
	mt_srand( ( double )microtime( ) * 1000000 );
	return date( "YmdHis" ).str_pad( mt_rand( 1, 99999 ), 5, "0", STR_PAD_LEFT );
}
/**
 *	字符
 *	
 *	
 */
function string2array($data)
{
	if($data == '') return array();
	eval("\$array = $data;");
	return $array;
}

/**
 * 取得返回信息地址
 * @param   string  $code   支付方式代码
 */
function return_url($code, $is_api = 0)
{
	global $PHPSIN;
	if($is_api)
	{
		return SITE_URL.'pay/api/AutoReceive.'.$code.'.php';
	}
	else
	{
		return SITE_URL.'pay/respond.php?code='.$code;
	}
}
function random($length, $chars = '0123456789')
{
	$hash = '';
	$max = strlen($chars) - 1;
	for($i = 0; $i < $length; $i++)
	{
		$hash .= $chars[mt_rand(0, $max)];
	}
	return $hash;
}

function array2string($data, $isformdata = 1)
{
	if($data == '') return '';
	if($isformdata) $data = new_stripslashes($data);
	return addslashes(var_export($data, TRUE));
}

function str_cut($string, $length, $dot = '...')
{
	$strlen = strlen($string);
	if($strlen <= $length) return $string;
	$string = str_replace(array('&nbsp;', '&amp;', '&quot;', '&#039;', '&ldquo;', '&rdquo;', '&mdash;', '&lt;', '&gt;', '&middot;', '&hellip;'), array(' ', '&', '"', "'", '“', '”', '—', '<', '>', '·', '…'), $string);
	$strcut = '';
	if(strtolower(CHARSET) == 'utf-8')
	{
		$n = $tn = $noc = 0;
		while($n < $strlen)
		{
			$t = ord($string[$n]);
			if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
				$tn = 1; $n++; $noc++;
			} elseif(194 <= $t && $t <= 223) {
				$tn = 2; $n += 2; $noc += 2;
			} elseif(224 <= $t && $t < 239) {
				$tn = 3; $n += 3; $noc += 2;
			} elseif(240 <= $t && $t <= 247) {
				$tn = 4; $n += 4; $noc += 2;
			} elseif(248 <= $t && $t <= 251) {
				$tn = 5; $n += 5; $noc += 2;
			} elseif($t == 252 || $t == 253) {
				$tn = 6; $n += 6; $noc += 2;
			} else {
				$n++;
			}
			if($noc >= $length) break;
		}
		if($noc > $length) $n -= $tn;
		$strcut = substr($string, 0, $n);
	}
	else
	{
		$dotlen = strlen($dot);
		$maxi = $length - $dotlen - 1;
		for($i = 0; $i < $maxi; $i++)
		{
			$strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
		}
	}
	$strcut = str_replace(array('&', '"', "'", '<', '>'), array('&amp;', '&quot;', '&#039;', '&lt;', '&gt;'), $strcut);
	return $strcut.$dot;
}
function load($file, $module = 'phpsin', $dir = '', $isinit = 1)
{
	global $MODULE;
	if(!isset($MODULE[$module])) return false;
	$path = PHP_ROOT.$MODULE[$module]['path'].($dir ? $dir.'/' : 'include/').$file;
	
	if(!(@include_once $path)) return false;
	if($isinit && strpos($file, '.class.php') !== false)
	{
		
		$classname = substr($file, 0, -10);
		if(is_object($classname)) {
			return true;
		} else {
			return new $classname();
		}
	}
	return true;
}

function phpweb_auth($txt, $operation = 'ENCODE', $key = '')
{
	$key	= $key ? $key : $GLOBALS['phpweb_auth_key'];
	$txt	= $operation == 'ENCODE' ? $txt : base64_decode($txt);
	$len	= strlen($key);
	$code	= '';
	for($i=0; $i<strlen($txt); $i++){
		$k		= $i % $len;
		$code  .= $txt[$i] ^ $key[$k];
	}
	$code = $operation == 'DECODE' ? $code : base64_encode($code);
	return $code;
}

function hash_string($str)
{
	$str = str_pad($str, 10, 0, STR_PAD_LEFT);
	$str = base64_encode($str);
	$str = substr($str,-5,-3).substr($str,0,-2);
	return $str;
}


function contentpage($content = '', $maxpage = 10000)
{
	if($content=='') return $content;
	$html = array('div', 'span', 'p', 'a', 'h', 'ul', 'ol', 'li', 'table', 'form', 'script', 'strong', 'dl', 'dt', 'dd');
	$ar_content = explode('<', $content);
	$data = array();
	$i = $show_time = 0;
	if(is_array($ar_content))
	{
		foreach($ar_content as $y => $c)
		{
			if($y == 0)
			{
				$data[$i] = $c;
 				if(strlen(strip_tags($c))>=$maxpage)
				{
					$i++;
				}
				continue;
			}
			$data[$i] .= '<'.$c;
			if($tag=='' && $show_time==0)
			{
				foreach($html as $h)
				{
					if(strpos($c, $h)===0)
					{
						$tag = $h;
						$show_time++;
						break;
					}
				}
			}
			elseif($show_time && $tag)
			{
				if(strpos($c, $tag)===0)
				{
					$show_time++;
				}
				if(strpos($c, '/'.$tag)===0)
				{
					$show_time--;
					if($show_time==0) $tag = '';
				}
			}
			if(strlen(strip_tags($data[$i]))>=$maxpage && $show_time==0)
			{
				$i++;
			}
		}
	}
	$data = implode('[page]', $data);
	return $data;
}

function format_textarea($string)
{
	return nl2br(str_replace(' ', '&nbsp;', htmlspecialchars($string)));
}

function content_get($contentid, $field)
{
	return @file_get_contents(content_file($contentid, $field));
}

function content_file($contentid, $field)
{
	$id = str_pad($contentid, 4, '0', STR_PAD_LEFT);
	return CONTENT_ROOT.$field.'/'.substr($id, 0, 2).'/'.substr($id, 2, 2).'/'.$contentid.'.txt';
}
function keylinks($txt, $replacenum = '')
{
	$search = "/(alt\s*=\s*|title\s*=\s*)[\"|\'](.+?)[\"|\']/ise";
	$replace = "_base64_encode('\\1','\\2')";
	$replace1 = "_base64_decode('\\1','\\2')";
	$txt = preg_replace($search, $replace, $txt);
	$linkdatas = cache_read('keylink.php','',1);
	if($linkdatas)
	{
		$word = $replacement = array();
		foreach($linkdatas as $v)
		{
			$word1[] = '/'.preg_quote($v[0], '/').'/';
			$word2[] = $v[0];
			$replacement[] = '<a href="'.$v[1].'" target="_blank" class="keylink">'.$v[0].'</a>';
		}
		if($replacenum != '')
		{
			$txt = preg_replace($word1, $replacement, $txt, $replacenum);
		}
		else
		{
			$txt = str_replace($word2, $replacement, $txt);
		}
	}
	$txt = preg_replace($search, $replace1, $txt);
	return $txt;
}
function setting_set($tablename, $where, $setting)
{
	global $db;
	if(!is_array($setting)) return false;
	$setting = new_stripslashes($setting);
	$setting = addslashes(var_export($setting, TRUE));
	return $db->query("UPDATE `$tablename` SET `setting`='$setting' WHERE $where");
}

function cache_member()
{
	global $db;
	$status = $db->table_status(DB_PRE.'member_cache');
	if($status['Rows'] == 0)
	{
		@set_time_limit(600);
		$db->query("INSERT INTO `".DB_PRE."member_cache` SELECT * FROM `".DB_PRE."member`");
		return true;
	}
	return false;
}
if(!function_exists('array_intersect_key'))
{
	function array_intersect_key($isec, $keys)
	{
		$argc = func_num_args();
		if ($argc > 2)
		{
			for ($i = 1; !empty($isec) && $i < $argc; $i++)
			{
				$arr = func_get_arg($i);
				foreach (array_keys($isec) as $key)
				{
					if (!isset($arr[$key]))
					{
						unset($isec[$key]);
					}
				}
			}
			return $isec;
		}
		else
		{
			$res = array();
			foreach (array_keys($isec) as $key)
			{
				if (isset($keys[$key]))
				{
					$res[$key] = $isec[$key];
				}
			}
			return $res;
		}
	}
}
function keyid_verify($keyid, $verify)
{
    $keyid = md5($keyid.AUTH_KEY);
	return $verify == $keyid;
}
function keyid_make($module, $tablename, $titlefield, $id)
{
	$keyid = $module.'-'.$tablename.'-'.$titlefield.'-'.$id;

	$verify = md5($keyid.AUTH_KEY);
	return array($keyid, $verify);
}
function keyid_get($keyid)
{
	global $db;
	list($module, $tablename, $titlefield, $id) = explode('-', $keyid);
	if(!$tablename) return false;
	$tablename = DB_PRE.$tablename;
	$keyfield = $db->get_primary($tablename);
	
	if($module=='video')
	{
		$r =$db->get_one("SELECT `vid`,`title`,`url` FROM `$tablename` WHERE `$keyfield`='$id'");
		require_once PHP_ROOT.'video/include/output.func.php';
		$r['url'] = video_show_url($r['vid'],$r['url']);
	}
	else
	{
		$r =$db->get_one("SELECT `$titlefield` AS title,`url` FROM `$tablename` WHERE `$keyfield`='$id'");
	}
	return $r;
}
function typename($catid)
{
	global $CATEGORY;
	if(!isset($CATEGORY[$catid])) return '';
	$pos = '';

        if($urlrule) eval("\$url = \"$urlrule\";");
	else $url = $CATEGORY[$catid]['url'];
	$pos .= '<a href="'.$url.'">'.$CATEGORY[$catid]['name'].'</a>';
	return $pos;
}

function check_in($id, $ids = '', $s = ',')
{
	if(!$ids) return false;
	$ids = explode($s, $ids);
	return is_array($id) ? array_intersect($id, $ids) : in_array($id, $ids);
}
?>