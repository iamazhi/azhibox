<?php 
class payment
{
	var $db;
	var $table;
    var $pages;
    var $number;
	var $user_id;
	var $modelid;
    function __construct()
    {
		global $db ,$LANG;
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
		return $this->db->update($this->table."pay_payment",$data,$where);
	}
	/**
	  *
	  *	@params
	  *	@return
	  */
	 function read_modules( $directory = "." )
	 {
		 $dir = @opendir( $directory );
		 $set_modules = true;
		 $modules = array();
		 while ( false !== ( $file = @readdir( $dir ) ) )
		 {
			 if ( preg_match( "/^.*?\\.php\$/", $file ) )
			 {
				 include_once( $directory."/".$file );
			 }
		 }
		 @closedir( $dir );
		 unset( $set_modules );
		 foreach ( $modules as $key => $value )
		 {
			kmodel( $modules[$key] );
		 }
		 kmodel( $modules );
		 return $modules;
	 }

	/**
	 *	取得支付插件列表
	 *	@params string $code
	 *	@return array
	 */
	function get_payment( $code = '')
	{
		$modules = $this->read_modules(PHP_ROOT.'member/include');
        $config = array();
		foreach ($modules as $payment)
		{
			if ( empty($code) || $payment['code'])
			{
				
				include_once ($this->load_lang($payment['code']));
				$config = array();
				foreach ($payment['config'] as $conf)
				{
					$name = $conf['name'];
					$conf['name'] = $LANG[$name];//echo $conf['name'];
					if ( 'select' == $conf['type'])
					{
						$conf['range'] = $LANG[$name.'_range'];
					}
					$config[$name] = $conf;
				}
			}
			$payment_info[$payment['code']] = array(
				"pay_id" => 0,
				"pay_code" => $payment['code'],
				"pay_name" => $LANG[$payment['code']],//支付中文名字
				"pay_desc" => $LANG[$payment['desc']],
				"pay_fee" => '0',
				"config" => $config,
				"is_cod" => $payment['is_cod'],
				"is_online" => $payment['is_online'],
				"enabled" => '0',
				"model_order" => "",
				"author" => $payment['author'],
				"website" => $payment['website'],
				"version" => $payment['version']
				);
		}
		if (empty($code))
		{
			return $payment_info;
		}
		else
		{
			return empty($payment['code'])? array() : $payment_info[$code];
		}
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
	function load_lang($filename = '')
	{
		
		return PHP_ROOT.'languages/'.LANG.'/payment/'.$filename.'.php';
		
		
	}
}
?>
