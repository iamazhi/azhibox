<?php
defined('IN_PHPJSJ') or exit('Access Denied');
@set_time_limit(600);
$html = load('html.class.php');

switch($action)
{
    case 'index':
        $filesize = $html->index();
	    showmessage('��վ��ҳ���³ɹ���<br />��С��'.sizecount($filesize));
		break;
		
	case 'category':
		if($dosubmit)
		{
			if(!isset($count))
			{
				
				$cids = array();
				if(!isset($catids) || $catids[0] == 0) 
				{
					foreach($CATEGORY as $cid=>$v)
					{
						if($v['type'] <= 1 && $v['module']=='phpsin') $catids[] = $cid;
					}
				}
                foreach($catids as $k=>$id)
                {
					if($CATEGORY[$id]['type'] == 0)
					{
						$cids[] = $id;
					}
					elseif($CATEGORY[$id]['type'] == 1)
					{
						$html->category($id);
					}
                }
				if($cids)
				{
					cache_write('html_category_'.$_userid.'.php', $cids);
					$count = count($cids);
					$forward = urlencode($forward);
					showmessage('��ʼ������Ŀҳ...', "?file=$file&action=$action&forward=$forward&pagesize=$pagesize&dosubmit=1&count=$count");
				}
				else
				{
					showmessage('������ɣ�', "?file=$file&action=$action");
				}
            }
			else
			{
				
				$catids = cache_read('html_category_'.$_userid.'.php');
				$page = max(intval($page), 1);
				if($page == 1)
				{
				    $catid = array_shift($catids);
					cache_write('html_category_'.$_userid.'.php', $catids);
                }
				$catname = $CATEGORY[$catid]['name'];

					$offset = $pagesize*($page-1);
					if($page == 1)
					{
						$condition=get_sql_catid($catid);

						$r = $db->get_one("SELECT COUNT(*) AS `count` FROM `".DB_PRE."content` WHERE status=99 $condition");
						$contents = $r['count'];
						$total = ceil($contents/$PHPSIN['pagesize']);//is here
						$pages = ceil($total/$pagesize);
					}
					$max = min($offset+$pagesize, $total);
					for($i=$offset; $i<=$max; $i++)
					{
						$html->category($catid, $i);
					}

				if($pages > $page)
				{
					$page++;
					$percent = round($max/$total, 2)*100;
					$message = "���ڸ��� <font color='blue'>$catname</font> ��Ŀ��������� <font color='red'>$total</font> ����ҳ<br />�Ѹ��� <font color='red'>{$max}</font> ����ҳ��<font color='red'>{$percent}%</font>��";
					$forward = url_par("catid=$catid&page=$page&pages=$pages&total=$total");
					
				}
				elseif($catids)
				{
					$message = "<font color='blue'>$catname</font> ��Ŀ������ɣ�";
					$forward = url_par("catid=0&page=0&pages=0&total=0");
				}
				else
				{
					cache_delete('html_category_'.$_userid.'.php');
					$message = "������ɣ�";
					$forward = '?file=html&action=category';
				}
				showmessage($message, $forward);
			}
		}
		else
		{
			include tpl('html_category');
        }
		break;
		
		case 'show':
		if($dosubmit)
		{//FILE_DIR
			require  FILE_DIR.'/attachment.class.php';
			require CACHE_MODEL_PATH.'content_output.class.php';
			require CLASS_PATH.'content.class.php';

			$attachment = new attachment("phpsin", $catid);
			$c = new content();
			$coutput = new content_output();
			if($type == 'lastinput')
			{
				$offset = 0;
			}
			else
			{
				$currentpage = max(intval($currentpage), 1);
				$offset = $pagesize*($currentpage-1);
			}
		    $where = ' WHERE status=99 ';
			$order = 'DESC';
			
			if(!isset($first) && is_array($catids) && $catids[0] > 0) 
			{
				cache_write('html_show_'.$_userid.'.php', $catids);
				$catids = implodeids($catids);
				$where .= " AND catid IN($catids) ";
				$first = 1;
			}
			elseif($first)
			{
				$catids = cache_read('html_show_'.$_userid.'.php');
				$catids = implodeids($catids);
				$where .= " AND catid IN($catids) ";
			}
			else
			{
				$first = 0;
			}

			if($type == 'lastinput' && $number)
			{
				$offset = 0;
				$pagesize = $number;
				$order = 'DESC';
			}
			elseif($type == 'date')
			{
				if($fromdate)
				{
					$fromtime = strtotime($fromdate.' 00:00:00');
					$where .= " AND `inputtime`>=$fromtime ";
				}
				if($todate)
				{
					$totime = strtotime($todate.' 23:59:59');
					$where .= " AND `inputtime`<=$totime ";
				}
			}
			elseif($type == 'id')
			{
				$fromid = intval($fromid);
				$toid = intval($toid);
				if($fromid) $where .= " AND `contentid`>=$fromid ";
				if($toid) $where .= " AND `contentid`<=$toid ";
			}
			if(!isset($total) && $type != 'lastinput')
			{
				$cr = $db->get_one("SELECT COUNT(*) AS `count` FROM `".DB_PRE."content` $where");
				$total = $cr["count"];
				$pages = ceil($total/$pagesize);
				$start = 1;
			}
			$data = $db->select("SELECT `contentid` FROM `".DB_PRE."content` $where ORDER BY `contentid` $order LIMIT $offset,$pagesize");
			foreach($data as $r)
			{
				$html->show($r['contentid']);
			}
			if($pages > $currentpage)
			{
				$currentpage++;
				$creatednum = $offset + count($data);
				$percent = round($creatednum/$total, 2)*100;
				$message = "������� <font color='red'>$total</font> ����Ϣ<br />����� <font color='red'>{$creatednum}</font> ����<font color='red'>{$percent}%</font>��";
				$forward = $start ? "?file=html&type=$type&dosubmit=1&first=$first&action=$action&fromid=$fromid&toid=$toid&fromdate=$fromdate&todate=$todate&pagesize=$pagesize&currentpage=$currentpage&pages=$pages&total=$total" : preg_replace("/&currentpage=([0-9]+)&pages=([0-9]+)&total=([0-9]+)/", "&currentpage=$currentpage&pages=$pages&total=$total", URL);;
			}
			else
			{
				cache_delete('html_show_'.$_userid.'.php');
				$message = "������ɣ�";
				$forward = '?file=html&action=show';
			}
			showmessage($message, $forward);
		}
		else
		{
			include tpl('html_show');
        }
		break;

    default :
}
?>