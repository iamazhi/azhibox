	function image($field, $value, $fieldinfo)
	{
		global $catid,$PHPCMS;
		extract($fieldinfo);
		if(!$value) $value = $defaultvalue;
		$data = $isselectimage ? " <input type='button' value='���...' style='cursor:pointer;' onclick=\"file_select('$field', $catid, 1)\">" : '';
		$getimg = $get_img ? '<input type="checkbox" name="info[getpictothumb]" value="1" checked /> �������µ�һ��ͼƬΪ����ͼ' : '';
		if(defined('IN_ADMIN'))
		{
			return "<input type=\"text\" name=\"info[$field]\" id=\"$field\" value=\"$value\" size=\"$size\" class=\"$css\" $formattribute/> <input type=\"hidden\" name=\"{$field}_aid\" id=\"{$field}_aid\" value=\"0\"> <input type=\"button\" name=\"{$field}_upimage\" id=\"{$field}_upimage\" value=\"�ϴ�ͼƬ\" style=\"width:60px\" onclick=\"javascript:openwinx('?mod=phpcms&file=upload_field&uploadtext={$field}&modelid={$modelid}&catid={$catid}&fieldid={$fieldid}','upload','450','350')\"/> $data <input name=\"cutpic\" type=\"button\" id=\"cutpic\" value=\"�ü�ͼƬ\" onclick=\"CutPic('$field','$PHPCMS[siteurl]')\"/>{$getimg}";
		}
		else
		{
			return "<input type=\"text\" name=\"info[$field]\" id=\"$field\" value=\"$value\" size=\"$size\" class=\"$css\" $formattribute/> <input type=\"hidden\" name=\"{$field}_aid\" id=\"{$field}_aid\" value=\"0\"> <input type=\"button\" name=\"{$field}_upimage\" id=\"{$field}_upimage\" value=\"�ϴ�ͼƬ\" style=\"width:60px\" onclick=\"javascript:openwinx('".PHPCMS_PATH."upload_field.php?uploadtext={$field}&modelid={$modelid}&catid={$catid}&fieldid={$fieldid}','upload','450','350')\"/> <input name=\"cutpic\" type=\"button\" id=\"cutpic\" value=\"�ü�ͼƬ\" onclick=\"CutPic('$field','$PHPCMS[siteurl]')\"/>";
		}
	}
