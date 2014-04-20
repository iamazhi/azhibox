<?php 
class model_db
{
	var $db;
	var $table;
    var $pages;
    var $number;
    function __construct()
    {
		global $db;
		$this->db = &$db;
		$this->table = DB_PRE.'model';
    }
	
    function content()
	{
		$this->__construct();
	}
	 function get($model)
	{
		$model = intval($model);
		if($model < 1) return false;
		return $this->db->get_one("SELECT * FROM $this->table WHERE modelid=$model");
	}
	
	function edit($saveedit, $model)
	{
		$this->db->update($this->table, $model, "modelid=$saveedit");
		return true;
	}
	
	function listinfo($where = '', $order = '', $page = 1, $pagesize = 50)
	{
        if($where) $where = " WHERE $where";//where�趨
		if($order) $order = " ORDER BY $order";//����
		$page = max(intval($page), 1);
        $offset = $pagesize*($page-1);
        $limit = " LIMIT $offset, $pagesize";
		$r = $this->db->get_one("SELECT count(*) as number FROM $this->table $where");
        $number = $r['number'];
	
        $this->pages = pages($number, $page, $pagesize);//��ҳ
		
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
		
   
	
}
?>
