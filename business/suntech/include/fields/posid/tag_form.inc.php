	function posid($field, $value, $fieldinfo)
	{
	    $POS = cache_read('position.php');
		extract($fieldinfo);
		$POS[0] = '��ѡ��';
		ksort($POS);
		return form::select($POS, 'info['.$field.']', $field, $value);
	}