<?php
class source
{
	var $db;
	var $pages;
	var $number;
	var $table;

    function __construct()
    {
		global $db;
		$this->db = &$db;
		$this->table = DB_PRE.'source';
		//register_shutdown_function(array(&$this, 'cache'));
    }

	function source()
	{
		$this->__construct();
	}

	function get($sourceid)
	{
		$sourceid = intval($sourceid);
		if($sourceid < 1) return false;
		return $this->db->get_one("SELECT * FROM $this->table WHERE sourceid=$sourceid");
	}

	function add($source)
	{
		if(!is_array($source) || empty($source['name'])) return false;
		if($this->checksource($source['name'])) return false;
        if (!empty($source['url']))
        {
            if (strpos($source['url'], 'http://') === false && strpos($source['url'], 'https://') === false)
            {
                $source['url'] = 'http://' .trim($source['url']);
            }
            else
            {
                $source['url'] = trim($source['url']);
            }
        }
		return $this->db->insert($this->table, $source);
	}

	function edit($sourceid, $source)
	{
		if(!$sourceid || !is_array($source) || empty($source['name'])) return false;
		if($this->checksource($source['name'], $sourceid)) return false;
        if (!empty($source['url']))
        {
            if (strpos($source['url'], 'http://') === false && strpos($source['url'], 'https://') === false)
            {
                $source['url'] = 'http://' .trim($source['url']);
            }
            else
            {
                $source['url'] = trim($source['url']);
            }
        }
		return $this->db->update($this->table, $source, "sourceid=$sourceid");
	}

	function checksource($name, $sourceid)
	{
		if ($sourceid)
		{
			$sourceid = intval($sourceid);
			return $this->db->get_one("SELECT sourceid FROM $this->table WHERE `name`='$name' AND `sourceid`!=$sourceid");
		}
		return $this->db->get_one("SELECT sourceid FROM $this->table WHERE `name`='$name'");
	}

	function delete($sourceid)
	{
		$sourceid = intval($sourceid);
		if($sourceid < 1) return false;
		return $this->db->query("DELETE FROM $this->table WHERE sourceid=$sourceid");
	}

	function listinfo($where = '', $order = '', $page = 1, $pagesize = 50)
	{
		if($where) $where = " WHERE $where";
		if($order) $order = " ORDER BY $order";
		$page = max(intval($page), 1);
        $offset = $pagesize*($page-1);
        $limit = " LIMIT $offset, $pagesize";
		$r = $this->db->get_one("SELECT count(*) as number FROM $this->table $where");
        $number = $r['number'];
        $this->pages = pages($number, $page, $pagesize);
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



	function listorder($info)
	{
		if(!is_array($info)) return false;
		foreach($info as $id=>$listorder)
		{
			$id = intval($id);
			$listorder = intval($listorder);
			$this->db->query("UPDATE $this->table SET listorder=$listorder WHERE sourceid=$id");
		}
		return true;
	}

	function disable($sourceid, $disabled)
	{
		$sourceid = intval($sourceid);
		if($sourceid < 1) return false;
		return $this->db->query("UPDATE $this->table SET disabled=$disabled WHERE sourceid=$sourceid");
	}
}
?>