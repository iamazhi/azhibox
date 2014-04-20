<?php
class tag
{
	var $module;
	var $tag_path;
	var $tag_config_path;
	var $pages;
	var $number;
	var $TAG;
	var $issave = 0;

    function __construct($module)
    {
		global $db;
		$this->db = &$db;
		$this->table = DB_PRE."tag";
		$this->module = $module;
		$this->tag_path = TPL_ROOT;
		$this->tag_config_path = $this->tag_path;
		//$this->tag_config_path = $this->tag_path.'/'.$this->module.'/';
		$this->TAG = cache_read('tag.inc.php', $this->tag_path);
		$this->TAG_CONFIG = cache_read('tag_config.inc.php', $this->tag_config_path);
    }

	function tag($module)
	{
		$this->__construct($module);
	}

	function get_tag_config($tagname)
	{
		return isset($this->TAG_CONFIG[$tagname]) ? $this->TAG_CONFIG[$tagname] : false;
	}

	function get_tag($tagname)
	{
		return isset($this->TAG[$tagname]) ? $this->TAG[$tagname] : false;
	}

	function get_tagname($string)
	{

        return preg_match("/\{tag_([^}]+)\}/", $string, $m) ? $m[1] : $string;
	}

	function preview($tagname, $config, $setting = array())
	{
		if(!is_array($config) || empty($tagname)) return false;
		$config = new_stripslashes($config);
		extract($config);
		foreach($config['var_name'] as $i=>$key)
		{
			if($key) $setting[$key] = $config['var_value'][$i];
		}
		$setting = preg_replace("/'([$][^']+)'/", "\\1", str_replace("\n", '', var_export($setting, true)));
		$preview['module'] = $this->module;
		$preview['template'] = $template;
		$preview['sql'] = $sql;
		$preview['page'] = is_numeric($page) ? intval($page) : $page;
		$preview['number'] = $number;
		eval("\$setting=$setting;");
		$preview['var_description'] = $setting;
		return $preview;
	}

	function update($tagname, $config, $setting = array())
	{
		if(!is_array($config) || empty($tagname)) return false;
        $config = new_stripslashes($config);
		extract($config);
		if(!isset($page)) $page = 0;
		if(!isset($number)) $number = 100;
		// is hei
		if($config['var_name'])
		{
		foreach($config['var_name'] as $i=>$key)
		{
			if($key) $setting[$key] = $config['var_value'][$i];
		}
		}
		$setting = preg_replace("/'([$][^']+)'/", "\\1", str_replace("\n", '', var_export($setting, true)));
		if(isset($where['catid']) && $where['catid'] && $page)
		{
			$catid = $where['catid'];
			$this->TAG[$tagname] = "tag('$this->module', '$template', \"$sql\", $page, $number, $catid)";//, $setting
			$tagcode = "tag(\'$this->module\', \'$template\', \"$sql\", $page, $number, $catid)";
		}
		else
		{
			$this->TAG[$tagname] = "tag('$this->module', '$template', \"$sql\", $page, $number)";//, $setting
			$tagcode = "tag(\'$this->module\', \'$template\', \"$sql\", $page, $number)";
		}
		$config['tagcode'] = $this->TAG[$tagname];
		$this->TAG_CONFIG[$tagname] = $config;
		$this->save();
		/**判断是否可以添加**/
		
		$info['tagname'] = $tagname;
		$info['introduce'] = $config['introduce'];
		$info['sql'] = $config['sql'];
		$info['modelid']=$config['modelid'];
		$info['type'] = $config['type'];
		$info['module'] = $this->module;
		$info['page'] = $config['page'];
		$info['number'] = $number;
		$info['orderby'] = $config['orderby'];
		$info['selectfields']  = addslashes(var_export($config["selectfields"], TRUE));
		$info['where']  = addslashes(var_export($where, TRUE));
		$info['tagcode'] = $tagcode;
		
		if(!$this->tags("tagname='$tagname'"))
		{
		  $info["tag"] = "{tag_".$tagname."}\n $config[tag]\n{/tag}";
		  $this->db->insert($this->table, $info);
		  }
		else
		{
		    $info['tag']=$config['tag'];
			$this->edit($info,$tagname);
			}
		return true;
	}

	function delete($tagname)
	{
		unset($this->TAG[$tagname]);
		$this->db->query("DELETE FROM $this->table WHERE tagname='$tagname'");
		$this->save();
		return true;
	}

	function save()
	{
		cache_write('tag.inc.php', $this->TAG, $this->tag_path);
		//cache_write('tag_config.inc.php', $this->TAG_CONFIG, $this->tag_config_path);
	}
	
	function tags($where)
	{
		if($where){$where="WHERE $where";}
		$data = $this->db->get_one("SELECT * FROM $this->table $where");
		return $data;
	}
	
	function edit($info, $tagname)
	{
		if(!is_array($info)) return false;
		$r=$this->tags("tagname='$tagname'");
		if($info['type']=="sql")
		{
			$info['type']=$r['type'];
			$info['iscustom']=1;
			}
			else
			{
				$info['iscustom']=0;
				}
		$this->db->update($this->table,$info, "  tagname='$tagname'");
		return true;
	}

	function listinfo($where = '', $order = '', $page = 1, $pagesize = 50)
	{
        if($where) $where = " WHERE $where";//where设定
		if($order) $order = " ORDER BY $order";//排序
		$page = max(intval($page), 1);
        $offset = $pagesize*($page-1);
        $limit = " LIMIT $offset, $pagesize";
		$r = $this->db->get_one("SELECT count(*) as number FROM $this->table $where");
        $number = $r['number'];
	
        $this->pages = pages($number, $page, $pagesize);//翻页
		
		$array = array();
		$result = $this->db->query("SELECT * FROM $this->table $where $order $limit");
		$point = $amount = '0';
		while($r = $this->db->fetch_array($result))
		{
			$array[] = $r;
		}
		$this->number = $this->db->num_rows($result);
        $this->db->free_result($result);
		return $array;
	    }
		
	function listorder($info)//排序
	 {
		if(!is_array($info)) return false;
		foreach($info as $id=>$listorder)
		{
			$id = intval($id);
			$listorder = intval($listorder);
			$this->db->query("UPDATE $this->table SET `listorder`=$listorder WHERE tagid='$id'");
		}
		return true;
	}
}
?>