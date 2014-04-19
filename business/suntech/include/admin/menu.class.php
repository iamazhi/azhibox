<?php 
class menu
{
	var $db;
	var $table;
    var $pages;
    var $number;
    function __construct()
    {
		global $db;
		$this->db = &$db;
		$this->table = DB_PRE.'menu';
    }
	
    function content()
	{
		$this->__construct();
	}
	 function get($model)
	{
		$model = intval($model);
		if($model < 1) return false;
		return $this->db->get_one("SELECT * FROM $this->table WHERE pid=$pid");
	}
	
	function edit($saveedit, $model)
	{
		$this->db->update($this->table, $model, "modelid=$saveedit");
		return true;
	}
	
	function listinfo($where = '', $order = '', $page = 1, $pagesize = 50)
	{
        if($where) $where = " WHERE $where";//whereÉè¶¨
		if($order) $order = " ORDER BY $order";//ÅÅÐò
		$page = max(intval($page), 1);
        $offset = $pagesize*($page-1);
        $limit = " LIMIT $offset, $pagesize";
		$r = $this->db->get_one("SELECT count(*) as number FROM $this->table $where");
        $number = $r['number'];
	
        $this->pages = pages($number, $page, $pagesize);//·­Ò³
		
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
   function listorder($info)//ÅÅÐò
	 {
		if(!is_array($info)) return false;
		foreach($info as $id=>$listorder)
		{
			$id = intval($id);
			$listorder = intval($listorder);
			$this->db->query("UPDATE `$this->table` SET `listorder`=$listorder WHERE `menuid`=$id");
		}
		return true;
	}
}
?>
