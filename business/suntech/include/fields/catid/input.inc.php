	function catid($field, $value)
	{
		global $CATEGORY;
		if(!isset($CATEGORY[$value])) showmessage("��ѡ��Ŀ�����ڣ�");
		return $value;
	}
