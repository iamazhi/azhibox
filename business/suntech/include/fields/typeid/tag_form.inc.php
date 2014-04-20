	function typeid($field, $value, $fieldinfo)
	{
		return "<input type=\"text\" name=\"info[$field]\" id=\"$field\" value=\"$value\" size=\"10\"> ".form::select_type('phpcms', 'select_'.$field, 'select_'.$field, 'ÇëÑ¡Ôñ', $value, 'onchange="$(\'#'.$field.'\').val(this.value)"',$this->modelid);
	}
