	function posid($field, $value, $fieldinfo)
	{
		if(!defined('IN_ADMIN')) return false;
	    $POS = cache_read('position.php');
		extract($fieldinfo);
		array_unshift($POS, '��ѡ��');
		return form::select($POS, $field, $field, $value);
	}
