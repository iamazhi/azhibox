	function typeid($field, $value, $fieldinfo)
	{
		extract($fieldinfo);
		if(!$value) $value = $defaultvalue;
		return form::select_type('phpcms', 'info['.$field.']', $field, '��ѡ��', $value, '', $this->modelid);
	}
