<?php
class collect
{
    var $db;
    var $table;
    var $pages;
    var $number;
    var $_userid;
    var $modelid;

	function __construct()
	{
		global $db;
		$this->db = $db;
		$this->table = DB_PRE.'collect';
	}

	function collect()
	{
		$this->__construct();
	}
		function get_collect($page)
		{
			global $_userid;
			$page = max(intval($page), 1);
			$pagesize = 20;
			$num = $this->db->get_one("SELECT COUNT(*) AS n FROM $this->table cc, ".DB_PRE."content c WHERE c.`contentid`=cc.`contentid` AND cc.`userid`='$_userid' AND `status`=99");
			$total = $num['n'];
			$data['pages'] = pages($total, $page, $pagesize);
			$offset = ($page-1)*$pagesize;
			$data['collect'] = $this->db->select("SELECT c.contentid, collectid, c.title, c.catid, url, cc.addtime FROM .".DB_PRE."content c, $this->table cc WHERE c.`contentid`=cc.`contentid` AND cc.`userid`='$_userid' AND `status`=99 ORDER BY collectid DESC LIMIT $offset, $pagesize");

			return $data;
		}
}
?>