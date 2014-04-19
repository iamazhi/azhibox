<?php
class member_update
{
	var $modelid;
	var $fields;
	var $userid;
	var $tablename;

    function __construct($modelid, $userid)
    {
		global $db, $MODEL;
		$this->db = &$db;

		$this->modelid = intval($modelid);
		$this->userid = intval($userid);
		$this->tablename = DB_PRE.'member_'.$MODEL[$this->modelid]['tablename'];

		$result = $this->db->get_one("SELECT userid FROM $this->tablename WHERE userid='$this->userid'");
		if(!$result)
		{
			$data = array('userid'=>$this->userid);
			$this->db->update($this->tablename, $data);
		}
		$this->fields = cache_read($this->modelid.'_fields.inc.php', CACHE_MODEL_PATH);
    }

	function member_update($modelid, $userid)
	{
		$this->__construct($modelid, $userid);
	}

	function update($data)
	{
		$info = array();
		foreach($data as $field=>$value)
		{
			if(!isset($this->fields[$field])) continue;
			$func = $this->fields[$field]['formtype'];
			$info[$field] = method_exists($this, $func) ? $this->$func($field, $value) : $value;
		}
		return $info;
	}

	
	function areaid($field, $value)
	{
		if(!$value) return false;
		$data = array('userid'=>$this->userid, $field=>$value);
		$this->db->update($this->tablename, $data, "userid='$this->userid'");
		return true;
	}
	
	function catids($field, $value)
	{
		global $CATEGORY;
		if(!$value) return false;
		$_array = explode(',',$value);
		$this->db->query("DELETE FROM `".DB_PRE."yp_relation` WHERE `userid`='$this->userid'");
		
		$r = $this->db->get_one("SELECT `catids` FROM `".DB_PRE."member_company` WHERE `userid`='$this->userid'");
		$catids = explode(',',$r['catids']);
		foreach($catids AS $_v)
		{
			foreach($CATEGORY AS $catid=>$c)
			{
				if(trim($c['catname']) == trim($_v)) break;
			}
			if(trim($_v))
			{
				$this->db->query("UPDATE `".DB_PRE."category` SET `citems`=`citems`-1 WHERE `catid`='$catid'");
			}
		}
		foreach($_array AS $_v)
		{
			foreach($CATEGORY AS $catid=>$c)
			{
				if(trim($c['catname']) == trim($_v)) break;
			}
			if(trim($_v))
			{
				$this->db->query("INSERT INTO `".DB_PRE."yp_relation` (`userid`,`catid`) VALUES ('$this->userid','$catid')");
				$this->db->query("UPDATE `".DB_PRE."category` SET `citems`=`citems`+1 WHERE `catid`='$catid'");
			}
		}
		return true;
	}
	function editor($field, $value)
	{
	    global $attachment;
		if(!$value) return false;
		$data = array('userid'=>$this->userid, $field=>$value);
		$this->db->update($this->tablename, $data, "userid='$this->userid'");
		return $attachment->upload($field, $value);
	}	
	function groupid($field, $value)
	{
		if(!$value) return false;
		$data = array('userid'=>$this->userid, $field=>$value);
		$this->db->update($this->tablename, $data, "userid='$this->userid'");
		return true;
	}
	function image($field, $value)
	{
		$aid = intval($GLOBALS[$field.'_aid']);
		if($aid < 1) return false;
		return $this->db->query("UPDATE `".DB_PRE."attachment` SET `userid`=$this->userid WHERE `aid`=$aid");
	}

	function number($field, $value)
	{
		if(!$value) return false;
		$data = array('userid'=>$this->userid, $field=>$value);
		$this->db->update($this->tablename, $data, "userid='$this->userid'");
		return true;
	}}
?>