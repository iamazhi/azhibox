<?php 
class position
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
		register_shutdown_function(array(&$this, 'cache'));
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
   function listorder($table,$info,$where)//ÅÅÐò
	 {
		if(!is_array($info)) return false;
		foreach($info as $id=>$listorder)
		{
			$id = intval($id);
			$listorder = intval($listorder);
			$this->db->query("UPDATE $this->table".$table." SET `listorder`=$listorder WHERE $where=$id");
		}
		return true;
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
		
	function count($posid)
	{
		$posid = intval($posid);
		$r=$this->db->get_one("SELECT COUNT(*) AS `count` FROM ".$this->table."content_position WHERE `posid`=$posid");
		return $r["count"];
	}
	function cache($where = '', $order = 'listorder,posid')
	{
		cache_table(DB_PRE.'position', '*', 'name', '', 'listorder,posid', 0);
	}
}

?>
