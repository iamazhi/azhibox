	function author($field, $value, $fieldinfo)
	{
		extract($fieldinfo);
		if(!$value) $value = $defaultvalue;
		$infos = cache_read('author.php');
		$data = '<select name="" onchange="$(\'#'.$field.'\').val(this.value)" style="width:75px"><option>��������</option>';
		foreach($infos as $info)
		{
			$data .= "<option value='{$info[name]}'>{$info[name]}</option>\n";
		}
		$data .= '</select> <a href="###" onclick="SelectAuthor();">����&gt;&gt;</a>';
		return form::text('info['.$field.']', $field, $value, 'text', $size, $css, $formattribute).$data;
	}
