	
	function pages($field, $value, $fieldinfo)
	{
		extract($fieldinfo);
		if($value)
		{
			$v = explode('|', $value);
			$data = "<select name=\"info[paginationtype]\" id=\"paginationtype\" onchange=\"if(this.value==1)\$('#paginationtype1').css('display','');else\$('#paginationtype1').css('display','none');\">";
			$type = array('����ҳ', '�Զ���ҳ', '�ֶ���ҳ');
			if($v[0]==1) $con = 'style="display:"';
			else $con = 'style="display:none"';
			foreach($type as $i => $val)
			{
				if($i==$v[0]) $tag = 'selected';
				else $tag = '';
				$data .= "<option value=\"$i\" $tag>$val</option>";
			}
			$data .= "</select> &nbsp;&nbsp;&nbsp;&nbsp;<strong><font color=\"#0000FF\">ע��</font></strong><font color=\"#0000FF\">�ֶ���ҳʱ������������Ҫ��ҳ������༭������ġ�</font> ��ҳ <font color=\"#0000FF\">�����ɡ������</font> �ӱ��� <font color=\"#0000FF\">����������ÿƪ��ҳ�ı��⡣</font><div id=\"paginationtype1\" $con>�Զ���ҳʱ��ÿҳ��Լ�ַ���������HTML��ǣ�<strong> <input name=\"info[maxcharperpage]\" type=\"text\" id=\"maxcharperpage\" value=\"$v[1]\" size=\"8\" maxlength=\"8\"></strong></div>";
			return $data;
		}
		else
		{
			return "<select name=\"info[paginationtype]\" id=\"paginationtype\" onchange=\"if(this.value==1)\$('#paginationtype1').css('display','');else \$('#paginationtype1').css('display','none');\">
                <option value=\"0\">����ҳ</option>
                <option value=\"1\">�Զ���ҳ</option>
                <option value=\"2\">�ֶ���ҳ</option>
            </select> &nbsp;&nbsp;&nbsp;&nbsp;<strong><font color=\"#0000FF\">ע��</font></strong><font color=\"#0000FF\">�ֶ���ҳʱ������������Ҫ��ҳ������༭������ġ�</font> ��ҳ <font color=\"#0000FF\">�����ɡ������</font> �ӱ��� <font color=\"#0000FF\">����������ÿƪ��ҳ�ı��⡣</font>
			<div id=\"paginationtype1\" style=\"display:none\">�Զ���ҳʱ��ÿҳ��Լ�ַ���������HTML��ǣ�<strong> <input name=\"info[maxcharperpage]\" type=\"text\" id=\"maxcharperpage\" value=\"10000\" size=\"8\" maxlength=\"8\"></strong></div>";
		}
	}