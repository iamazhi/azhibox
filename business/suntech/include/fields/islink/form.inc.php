	function islink($field, $value, $fieldinfo)
	{
		extract($fieldinfo);
		if($value)
		{
			$linkurl = $this->content_url;
			$disabled = '';
			$checked = 'checked';
		}
		else
		{
			$value = $defaultvalue;
			$disabled = 'disabled';	
			$checked = '';
		}
		$strings = '<input type="hidden" name="info['.$field.']" value="99"><input type="text" name="info[linkurl]" id="linkurl" value="'.$linkurl.'" size="50" maxlength="255" '.$disabled.'> <font color="#FF0000"><label><input name="info['.$field.']" type="checkbox" id="islink" value="1" onclick="ruselinkurl();" '.$checked.'> ת������</label></font><br/><font color="#FF0000">���ʹ��ת���������������ֱ����ת������������Ч</font>';
		return $strings;
	}
