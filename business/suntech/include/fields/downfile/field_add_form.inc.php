<table cellpadding="2" cellspacing="1">
	<tr> 
      <td>����ģʽ</td>
      <td><input type="radio" name="setting[mode]" value="1"onclick="showservers(1)"/> ����ģʽ <input type="radio" name="setting[mode]" value="0" checked onclick="showservers(0)"/> ��ͨ����ģʽ</td>
    </tr>
	<tr id="servers" style="display:none;"> 
      <td>��������ַ</td>
      <td><textarea name="setting[servers]" rows="3" cols="60"  style="height:80px;width:400px;"></textarea></td>
    </tr>
	<tr> 
      <td>�ֶγ���</td>
      <td><input type="text" name="setting[size]" value="" size="5"></td>
    </tr>
	<tr> 
      <td>�ļ����ط�ʽ</td>
      <td><input type="radio" name="setting[downloadtype]" value="0" checked/> �����ļ���ַ <input type="radio" name="setting[downloadtype]" value="1"/> ͨ��PHP��ȡ</td>
    </tr>
</table>
<SCRIPT LANGUAGE="JavaScript">
<!--
	function showservers(flag)
	{
		if(flag) {
			$('#servers').css('display','');
		} else {
			$('#servers').css('display','none');
		}
	}
//-->
</SCRIPT>