<?php 
class exchange
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
        if($where) $where = " WHERE $where";//where设定
		if($order) $order = " ORDER BY $order";//排序
		$page = max(intval($page), 1);
        $offset = $pagesize*($page-1);
        $limit = " LIMIT $offset, $pagesize";
		$r = $this->db->get_one("SELECT count(*) as number FROM $this->table".$table." $where");
        $number = $r['number'];
	
        $this->pages = pages($number, $page, $pagesize);//翻页
		
		$array = array();
		$result = $this->db->query("SELECT * FROM $this->table".$table." $where $order $limit");
		$point = $amount = '0';
		while($r = $this->db->fetch_array($result))
		{
			$array['info'][] = $r;
			if($r['type'] == 'point'){$point = $point + $r['number'];}
			if($r['type'] == 'amount'){$amount = $amount + $r['number'];}
		}
		$this->number = $this->db->num_rows($result);
        $this->db->free_result($result);
		$array['point'] = $point;
		$array['amount'] = $amount;
		return $array;
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
	
	/**
	 * 检查用户名
	 */
	function username_is($value)
	{
		if(!isset($value) && empty($value))
		{
			return false;
		}
		
		$result = $this->db->get_one("SELECT * FROM ".$this->table."member WHERE username='$value' $userid");
		if($result)
		{
			$this->msg = 'have_registered';
			return true;
		}
		else
		{
			$this->msg = 'member_no';
			return false;
			}
		return $value;
	}
	
	function msg()
	{
		global $LANG;
		return iconv("GB2312","UTF-8",$LANG[$this->msg]);
	}
}
?>
