<table cellpadding="2" cellspacing="1">
	<tr> 
      <td>�ı�������</td>
      <td><input type="text" name="setting[rows]" value="<?=$rows?>" size="10"></td>
    </tr>
	<tr> 
      <td>�ı�������</td>
      <td><input type="text" name="setting[cols]" value="<?=$cols?>" size="10"></td>
    </tr>
	<tr> 
      <td>Ĭ��ֵ</td>
      <td><textarea name="setting[defaultvalue]" rows="2" cols="20" id="defaultvalue" style="height:60px;width:250px;"><?=$defaultvalue?></textarea></td>
    </tr>
	<tr> 
      <td>�Ƿ����ù������ӣ�</td>
      <td><input type="radio" name="setting[enablekeylink]" value="1" <?=($enablekeylink == 1 ? 'checked' : '')?> /> �� <input type="radio" name="setting[enablekeylink]" value="0" <?=($enablekeylink == 0 ? 'checked' : '')?> /> ��  <input type="text" name="setting[replacenum]" value="<?=$replacenum?>" size="4"> �滻���� ��������Ϊ�滻ȫ����</td>
    </tr>
	<tr> 
      <td>�Ƿ�����ʣ���ַ���ʾ��</td>
      <td><input type="radio" name="setting[checkcharacter]" value="1" <?=($checkcharacter ? 'checked' : '')?> /> �� <input type="radio" name="setting[checkcharacter]" value="0" <?=($checkcharacter ? '' : 'checked')?> /> �� <font color='#f00;'>���ô�������ַ��������ֵ</font></td>
    </tr>
</table>