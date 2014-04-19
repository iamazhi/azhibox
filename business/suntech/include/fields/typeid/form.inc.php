	function typeid($field, $value, $fieldinfo)
	{
		extract($fieldinfo);
		if(!$value) $value = $defaultvalue;
		return form::select_type('phpcms', 'info['.$field.']', $field, 'ÇëÑ¡Ôñ', $value, '', $this->modelid);
	}
