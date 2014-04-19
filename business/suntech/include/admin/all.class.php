<?php 
class all
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
	
	/**
	  *	更新支付插件
	  *	@params array $data
	  * @params string $where
	  *	@return boolean
	  */
	function update($data = array(),$where)
	{
		return $this->_db->update($this->table_payment,$data,$where);
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
   function listorder($table,$info,$where)//排序
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
	 /**
	 * 检查用户名,是否已经管理员
	 */
	function admin_is($value)
	{
		if(!isset($value) && empty($value))
		{
			return false;
		}
		$admin_role = $this->db->get_one("SELECT * FROM ".$this->table."admin WHERE username='$value'");
		if($admin_role)
		{
			$this->msg = 'admin_no';
			return false;
			}
			
		$result = $this->db->get_one("SELECT * FROM ".$this->table."member WHERE username='$value' $userid");
		if($result)
		{
			return true;
		}
		else
		{
			$this->msg = 'member_no';
			return false;
			}
		return $value;
	}
	/**
	 * 检查邮箱是否存在
	 */
	function username_email($value,$userid)
	{
		if(!isset($value) && empty($value))
		{
			return false;
		}
		if($userid)
		{
			$userid="and userid!=$userid";
			}
		$result = $this->db->get_one("SELECT * FROM ".$this->table."member WHERE email='$value' $userid");
		if($result)
		{
			$this->msg = 'have_used_change_one_email';
			return false;
		}
		else
		{
			$this->msg = 'member_no';
			}
		return $value;
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
	/**
	 * 检查用户名是否存在
	 *
	 * @param STRING $username
	 *
	 * @return $username
	 */
	function username_exists($value,$userid='')
	{
		if(!isset($value) && empty($value))
		{
			return false;
		}
		if($userid)
		{
			$userid="and userid!=$userid";
			}
		$result = $this->db->get_one("SELECT * FROM ".$this->table."member WHERE username='$value' $userid");
		if($result)
		{
			$this->msg = 'have_registered';
			return false;
		}
		else
		{
			$this->msg = 'member_no';
			}
		return $value;
	}

     /**
	 * 检查用户名是否符合规定
	 *
	 * @param STRING $username
	 * @return 	TRUE or FALSE
	 */
	function is_username($value)
	{
		$strlen = strlen($value);
		if($this->is_badword($value) || !preg_match("/^[a-zA-Z0-9_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]+$/", $value))
		{
			$this->msg = 'username_not_accord_with_critizen';
			return false;
		}
		elseif ( 20 <= $strlen || $strlen < 2 )
		{
			$this->msg = 'username_not_less_than_3_longer_than_20';
			return false;
		}
		return true;
	}
	
	/**
	 * 检测输入中是否含有错误字符
	 *
	 * @param char $string
	 * @return TRUE or FALSE
	 */
	function is_badword($string)
	{
		$badwords = array("\\",'&',' ',"'",'"','/','*',',','<','>',"\r","\t","\n","#");
		foreach($badwords as $value)
		{
			if(strpos($string, $value) !== FALSE)
			{
				return TRUE;
			}
		}
		return FALSE;
	}
	
	
	function msg()
	{
		global $LANG;
		return iconv("GB2312","UTF-8",$LANG[$this->msg]);
	}
	//function get($userid = 0)
	function get_count($contentid)
	{
		$contentid = intval($contentid);
		return $this->db->get_one("SELECT * FROM `$this->table_count` WHERE `contentid`=$contentid");
	}
}
?>
