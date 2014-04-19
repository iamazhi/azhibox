<?php 
class admin
{
	var $db;
	var $userid;
	var $user_id;


    function __construct($userid = 0)
    {
		global $db,$user_id;
		$this->db = &$db;
		$this->table = DB_PRE;
	    $this->tables = $this->db->tables();
    }

	function admin($userid = 0)
	{
		$this->__construct($userid);
	}
	
    function get($table,$where)
	{
		if($where){$where="WHERE $where";}
		$data = $this->db->get_one("SELECT * FROM $this->table".$table." $where");
		return $data;
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
		
		
   function listtable($table, $where = '', $order = '')
   {
	    if($where) $where = " WHERE $where";
		if($order) $order = " ORDER BY $order";
	    $array = array();
		$result = $this->db->query("SELECT * FROM $this->table".$table." $where $order");
		while($r = $this->db->fetch_array($result))
		{
			$array[] = $r;
		}
		return $array;
	   }
	   
   function count($table, $field = '', $type = 'all', $where = '')
	{
		if($type == 'all')
		{
			return $this->table_rows(DB_PRE.$table);
		}
		elseif($type == 'today')
        {
			$time_start = strtotime(date('Y-m-d', TIME).' 00:00:00');
			return $this->count_by_time(DB_PRE.$table, $field, $time_start, 0, $where);
		}
		elseif($type == 'yesterday')
        {
			$yesterday = date('Y-m-d', TIME-86400);
			$time_start = strtotime($yesterday.' 00:00:00');
			$time_end = strtotime($yesterday.' 23:59:59');
			return $this->count_by_time(DB_PRE.$table, $field, $time_start, $time_end, $where);
		}
		elseif($type == 'week')
        {
			$w = date('w', TIME);
			if($w == 0) $w = 7;
			$w--;
			$time_start = date('Y-m-d', TIME-86400*$w);
			$time_start = strtotime($time_start.' 00:00:00');
			return $this->count_by_time(DB_PRE.$table, $field, $time_start, 0, $where);
		}
		elseif($type == 'month')
        {
			$time_start = date('Y-m-0', TIME);
			$time_start = strtotime($time_start.' 00:00:00');
			return $this->count_by_time(DB_PRE.$table, $field, $time_start, 0, $where);
		}
	}

	function count_content($where)
	{
		return cache_count("SELECT count(*) AS `count` FROM `".DB_PRE."content` WHERE $where");
	}

	function count_member($where)
	{
		return cache_count("SELECT count(*) AS `count` FROM `".DB_PRE."member_cache` WHERE $where");
	}

	function count_by_time($table, $field, $fromtime = 0, $totime = 0, $where = '')
	{
		$sql = '';
		if(is_array($where))
		{
			$array_where = $where;
			$where = $array_where[2];
			if($fromtime) $sql .= " AND a.`$field`>=$fromtime ";
			if($totime) $sql .= " AND a.`$field`<=$totime ";
			$where = $where ? $where.$sql : substr($sql, 3);
			if($where) $where = " WHERE $where ";
			$r=$this->db->get_one("SELECT count(*) AS `count` FROM $table a,$array_where[0] m $where");
			return $r["conut"];
		}
		else
		{
			if($fromtime) $sql .= "AND `$field`>=$fromtime ";
			if($totime) $sql .= "AND `$field`<=$totime ";
			$where = $where ? $where.$sql : substr($sql, 3);
			if($where) $where = " WHERE $where";
			$r=$this->db->get_one("SELECT count(*) AS `count` FROM $table $where");
			return $r["count"];
		}
	}

	function table_rows($table)
	{
		if(!in_array($table, $this->tables)) return false;
		$r = $this->db->table_status($table);
		return $r['Rows'];
	}
}
?>