<table cellpadding="2" cellspacing="1">
	<tr> 
      <td>�ı��򳤶�</td>
      <td><input type="text" name="setting[size]" value="<?=$size?>" size="10"></td>
    </tr>
	<tr> 
      <td>Ĭ��ֵ</td>
      <td><input type="text" name="setting[defaultvalue]" value="<?=$defaultvalue?>" size="40"></td>
    </tr>
	<tr> 
      <td>�Ƿ�Ϊ�����</td>
      <td><input type="radio" name="setting[ispassword]" value="1" <?=($ispassword ? 'checked' : '')?> /> �� <input type="radio" name="setting[ispassword]" value="0" <?=($ispassword ? '' : 'checked')?> /> ��</td>
    </tr>
</table>