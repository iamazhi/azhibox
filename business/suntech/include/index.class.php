<?php
class player
{
	var $db;
	var $table;

	function __construct()
    {
		global $db;
		$this->db = &$db;
		$this->table = DB_PRE.'style';
    }

	function player()
	{
		$this->__construst();
	}

	function get($playerid)
	{
		$where = "LIMIT=3";
		$info = $this->db->get_one("SELECT * FROM $this->table LIMIT 3");
		return $info;
	}
}
?>