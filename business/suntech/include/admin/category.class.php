<?php 
class category
{
	var $db;
	var $table;
    var $pages;
    var $number;
	var $category;
	
    function __construct()
    {
		global $db, $CATEGORY;;
		$this->db = &$db;
		$this->table = DB_PRE.'category';
		$this->table_db= DB_PRE;
		$this->category = $CATEGORY;
    }
	
    function category()
	{
		$this->__construct();
	}
	
	 function get($model,$where)
	{
		if($model)
		{
		$model = intval($model);
		if($model < 1) return false;
		return $this->db->get_one("SELECT * FROM $this->table WHERE pid=$pid");
		}
		if($where)
		{
		return $this->db->get_one("SELECT * FROM $this->table $where");	
			}
	}
	
	function add($table,$info)
	{
		if(!is_array($info)) return false;
		$this->db->insert($this->table_db.$table, $info);
	}
	
	function edit($table, $model, $catid)
	{
		$parentid = $model['parentid'];
		$oldparentid = $this->category[$catid]['parentid'];
		if($parentid != $oldparentid)
		{
			$this->move($catid, $parentid, $oldparentid);
		}
		$this->db->update($this->table_db.$table, $model, "catid=$catid");
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
		
   function listtable($where = '', $order = '')
   {
	    if($where) $where = " WHERE $where";
		if($order) $order = " ORDER BY $order";
	    $array = array();
		$result = $this->db->query("SELECT * FROM $this->table $where $order");
		while($r = $this->db->fetch_array($result))
		{
			$array[] = $r;
		}
		return $array;
	   }
	   
	function get_arrparentid($catid, $arrparentid = '', $n = 1)
	{
		if($n > 5 || !is_array($this->category) || !isset($this->category[$catid])) return false;
		$parentid = $this->category[$catid]['parentid'];
		$arrparentid = $arrparentid ? $parentid.','.$arrparentid : $parentid;
		if($parentid)
		{
			$arrparentid = $this->get_arrparentid($parentid, $arrparentid, ++$n);
		}
		else
		{
			$this->category[$catid]['arrparentid'] = $arrparentid;
		}
		return $arrparentid;
	}

	function get_arrchildid($catid)
	{
		$arrchildid = $catid;
		if(is_array($this->category))
		{
			foreach($this->category as $id => $cat)
			{
				if($cat['parentid'] && $id != $catid)
				{
					$arrparentids = explode(',', $cat['arrparentid']);
					if(in_array($catid, $arrparentids)) $arrchildid .= ','.$id;
				}
			}
		}
		return $arrchildid;
	}

	function get_parentdir($catid)
	{
		if($this->category[$catid]['parentid']==0) return '';
		$arrparentid = $this->category[$catid]['arrparentid'];
		$arrparentid = explode(',', $arrparentid);
		$arrcatdir = array();
		foreach($arrparentid as $id)
		{
			if($id==0) continue;
			$arrcatdir[] = $this->category[$id]['catdir'];
		}
		return implode('/', $arrcatdir).'/';
	}
	
	function move($catid, $parentid, $oldparentid)
	{
		$arrchildid = $this->category[$catid]['arrchildid'];
		$oldarrparentid = $this->category[$catid]['arrparentid'];
		$oldparentdir = $this->category[$catid]['parentdir'];
		$child = $this->category[$catid]['child'];
		$oldarrparentids = explode(',', $this->category[$catid]['arrparentid']);
		$arrchildids = explode(',', $this->category[$catid]['arrchildid']);
		if(in_array($parentid, $arrchildids)) return FALSE;
		$this->category[$catid]['parentid'] = $parentid;
		if($child)
		{
			foreach($arrchildids as $cid)
			{
				if($cid==$catid) continue;
				$newarrparentid = $this->get_arrparentid($cid);
				$this->category[$cid]['arrparentid'] = $newarrparentid;
				$newparentdir = $this->get_parentdir($cid);
				$this->db->query("UPDATE `$this->table` SET arrparentid='$newarrparentid',parentdir='$newparentdir' WHERE catid='$cid'");
			}
		}
		if($parentid)
		{
			$arrparentid = $this->category[$parentid]['arrparentid'].",".$parentid;
			$this->category[$catid]['arrparentid'] = $arrparentid;
			$parentdir = $this->category[$parentid]['parentdir'].$r['catdir']."/";
			$arrparentids = explode(",", $arrparentid);
			foreach($arrparentids as $pid)
			{
				if($pid==0) continue;
				$newarrchildid = $this->get_arrchildid($pid);
				$this->db->query("UPDATE `$this->table` SET arrchildid='$newarrchildid',child=1 WHERE catid=$pid");
			}
		}
		else
		{
			$arrparentid = 0;
			$parentdir = '/';
			$this->category[$catid]['arrparentid'] = $arrparentid;
		}
		$this->db->query("UPDATE `$this->table` SET arrparentid='$arrparentid',parentdir='$parentdir' WHERE catid=$catid");
		if($oldparentid)
		{
			foreach($oldarrparentids as $pid)
			{
				if($pid==0) continue;
				$oldarrchildid = $this->get_arrchildid($pid);
				$child = is_numeric($oldarrchildid) ? 0 : 1;
				$this->db->query("UPDATE `$this->table` SET arrchildid='$oldarrchildid' ,child=$child WHERE catid=$pid");
			}
		}
		return TRUE;
	}
	
   function listorder($info)//ÅÅÐò
	 {
		if(!is_array($info)) return false;
		foreach($info as $id=>$listorder)
		{
			$id = intval($id);
			$listorder = intval($listorder);
			$this->db->query("UPDATE `$this->table` SET `listorder`=$listorder WHERE `catid`=$id");
		}
		return true;
	}

	function cache()
	{
		@set_time_limit(600);
		cache_category();
		cache_common();
	}
}
?>
