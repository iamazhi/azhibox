<?php 
class place
{
	var $db;
	var $table;
    var $pages;
    var $number;
	var $user_id;
	var $modelid;
    function __construct()
    {
		global $db;
		$this->db = &$db;
		$this->table = DB_PRE;
		$this->stat_table = DB_PRE.'ads_'.date('ym',TIME);
    }
	
    function content()
	{
		$this->__construct();
	}
	 function get($table,$where)
	{
		if($where){$where="WHERE $where";}
		$data = $this->db->get_one("SELECT * FROM $this->table".$table." $where");
		return $data;
	}
	
	function edit($table, $info, $where, $id)
	{
	    if(!$info || !is_array($info)) return false;
		return $this->db->update($this->table.$table, $info, "$where=$id");
	}
	
	
	
	function add($table, $info)
	{
		if(!is_array($info)) return false;
		$this->db->insert($this->table.$table, $info);
		
	}

	function listinfo($table, $where = '', $order = '', $page = 1, $pagesize = 50)
	{
        if($where) $where = " WHERE $where";//whereÉè¶¨
		if($order) $order = " ORDER BY $order";//ÅÅÐò
		$page = max(intval($page), 1);
        $offset = $pagesize*($page-1);
        $limit = " LIMIT $offset, $pagesize";
		$r = $this->db->get_one("SELECT count(*) as number FROM $this->table".$table." $where");
        $number = $r['number'];
	
        $this->pages = pages($number, $page, $pagesize);//·­Ò³
		
		$array = array();
		$result = $this->db->query("SELECT * FROM $this->table".$table." $where $order $limit");
		$point = $amount = '0';
		while($r = $this->db->fetch_array($result))
		{
			$array[] = $r;
		}
		$this->number = $this->db->num_rows($result);
        $this->db->free_result($result);
		return $array;
	    }
		
	function view($placeid, $option)
	{
		$placeid = intval($placeid);
		$option = intval($option);
		$contents = array();
		if($option)
		{
			$adses = $this->db->select("SELECT * FROM ".DB_PRE."ads a, ".DB_PRE."ads_place p WHERE a.placeid=p.placeid AND p.placeid=$placeid AND a.fromdate<=UNIX_TIMESTAMP() AND a.todate>=UNIX_TIMESTAMP() AND a.passed=1 AND a.status=1");
			foreach($adses as $ads)
			{
				$contents[] = ads_content($ads, 1);
			}
			$template = $ads['template'] ? $ads['template'] : 'ads';
		}
		else
		{
			$ads = $this->db->get_one("SELECT * FROM ".DB_PRE."ads a, ".DB_PRE."ads_place p WHERE a.placeid=p.placeid AND p.placeid=$placeid AND a.fromdate<=UNIX_TIMESTAMP() AND a.todate>=UNIX_TIMESTAMP() AND a.passed=1 AND a.status=1 ORDER BY rand() LIMIT 1");
			$contents[] = ads_content($ads);
			$template = $ads['template'] ? $ads['template'] : 'ads';
		}
		include template('ads', $template);
	}
	
	function show($placeid)
	{
		global $username;
		$placeid = intval($placeid);
		if(!$placeid) return FALSE;
		$ip = IP;
		$time = time();

		$adses = $this->db->select("SELECT * FROM ".DB_PRE."ads a, ".DB_PRE."ads_place p WHERE a.placeid=p.placeid AND p.placeid=$placeid AND a.fromdate<=UNIX_TIMESTAMP() AND a.todate>=UNIX_TIMESTAMP() AND a.passed=1 AND a.status=1 AND p.passed=1");
		if($adses[0]['option'])
		{
			foreach($adses as $ads)
			{
				$contents[] = ads_content($ads, 1);
				$this->db->query("INSERT INTO $this->stat_table (`adsid`, `username`, `ip`, `referer`, `clicktime`, `type`) VALUES ('$ads[adsid]', '$_username', '$ip', '$this->referer', '$time', '0')");
				$template = $ads['template'] ? $ads['template'] : 'ads';
			}
		}
		else
		{
			$ads = $this->db->get_one("SELECT * FROM ".DB_PRE."ads a, ".DB_PRE."ads_place p WHERE a.placeid=p.placeid AND p.placeid=$placeid AND a.fromdate<=UNIX_TIMESTAMP() AND a.todate>=UNIX_TIMESTAMP() AND a.passed=1 AND a.status=1 ORDER BY rand() LIMIT 1");
			$contents[] = ads_content($ads, 1);
			$this->db->query("INSERT INTO $this->stat_table (`adsid`, `username`, `ip`, `referer`, `clicktime`, `type`) VALUES ('$ads[adsid]', '$_username', '$ip', '$this->referer', '$time', '0')");
			$template = $ads['template'] ? $ads['template'] : 'ads';
		}
		include template('ads', $template);
	}
	
	function delete($table,$where,$id)
	{
		if(is_array($id))
		{
			foreach($id as $v)
			{
				$data=$this->db->query("DELETE FROM $this->table".$table." WHERE $where=$v");
				}
		}
		else
		{
		$id = intval($id);
		if($id < 1) return false;
		$data=$this->db->query("DELETE FROM $this->table".$table." WHERE $where=$id");
		}
		return $data;
		}
	
}
?>
