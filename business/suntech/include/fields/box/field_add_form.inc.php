<table cellpadding="2" cellspacing="1" onclick="javascript:$('#minlength').val(0);$('#maxlength').val(255);">
	<tr> 
      <td>ѡ���б�</td>
      <td><textarea name="setting[options]" rows="2" cols="20" id="options" style="height:100px;width:200px;">ѡ������1|ѡ��ֵ1</textarea></td>
    </tr>
	<tr> 
      <td>ѡ������</td>
      <td>
	  <input type="radio" name="setting[boxtype]" value="radio" checked onclick="$('#setcols').show();$('#setsize').hide();"/> ��ѡ��ť <br />
	  <input type="radio" name="setting[boxtype]" value="checkbox" onclick="$('#setcols').show();$('setsize').hide();"/> ��ѡ�� <br />
	  <input type="radio" name="setting[boxtype]" value="select" onclick="$('#setcols').hide();$('setsize').show();" /> ������ <br />
	  <input type="radio" name="setting[boxtype]" value="multiple" onclick="$('#setcols').hide();$('setsize').show();" /> ��ѡ�б��
	  </td>
    </tr>
<tbody id="setcols" style="display:block">
	<tr> 
      <td>�ֶ�����</td>
      <td>
	  <select name="setting[fieldtype]">
	  <option value="CHAR">�����ַ� CHAR</option>
	  <option value="VARCHAR">�䳤�ַ� VARCHAR</option>
	  <option value="TINYINT">���� TINYINT(3)</option>
	  <option value="SMALLINT">���� SMALLINT(5)</option>
	  <option value="MEDIUMINT">���� MEDIUMINT(8)</option>
	  <option value="INT">���� INT(10)</option>
	  </select>
	  </td>
    </tr>
	<tr> 
      <td>����</td>
      <td><input type="text" name="setting[cols]" value="5" size="5"> ÿ����ʾ��ѡ�����</td>
    </tr>
	<tr> 
      <td>ÿ�п��</td>
      <td><input type="text" name="setting[width]" value="80" size="5"> px</td>
    </tr>
</tbody>
<tbody id="setsize" style="display:none">
	<tr> 
      <td>�߶�</td>
      <td><input type="text" name="setting[size]" value="1" size="5"> ��</td>
    </tr>
</tbody>
	<tr> 
      <td>Ĭ��ֵ</td>
      <td><input type="text" name="setting[defaultvalue]" size="40"></td>
    </tr>
</table>