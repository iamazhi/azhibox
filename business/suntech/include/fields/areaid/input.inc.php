	function areaid($field, $value)
	{
		global $AREA;
		if($value && !isset($AREA[$value])) showmessage("��ѡ���������ڣ�");
		return $value;
	}
