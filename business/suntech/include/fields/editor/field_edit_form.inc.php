<table cellpadding="2" cellspacing="1">
	<tr> 
      <td>�༭����ʽ</td>
      <td><input type="radio" name="setting[toolbar]" value="basic" <?=($toolbar == 'basic' ? 'checked' : '')?> /> ����� <input type="radio" name="setting[toolbar]" value="standard" <?=($toolbar == 'standard' ? 'checked' : '')?> /> ��׼�� <input type="radio" name="setting[toolbar]" value="full" <?=($toolbar == 'full' ? 'checked' : '')?> /> ȫ����</td>
    </tr>
	<tr> 
      <td>�༭����С</td>
      <td>�� <input type="text" name="setting[width]" value="<?=$width?>" size="4"> px �� <input type="text" name="setting[height]" value="<?=$height?>" size="4"> px</td>
    </tr>
	<tr> 
      <td>Ĭ��ֵ</td>
      <td><textarea name="setting[defaultvalue]" rows="2" cols="20" id="defaultvalue" style="height:100px;width:250px;"><?=$defaultvalue?></textarea></td>
    </tr>
	<tr> 
      <td>���ݴ洢��ʽ��</td>
      <td><input type="radio" name="setting[storage]" value="database" <?=$storage == 'database' ? 'checked' : ''?> /> ���ݿ�洢 <input type="radio" name="setting[storage]" value="file" <?=$storage == 'file' ? 'checked' : ''?> /> �ı��洢</td>
    </tr>
	<tr> 
      <td>�Ƿ����ù������ӣ�</td>
      <td><input type="radio" name="setting[enablekeylink]" value="1" <?=($enablekeylink == 1 ? 'checked' : '')?> /> �� <input type="radio" name="setting[enablekeylink]" value="0" <?=($enablekeylink == 0 ? 'checked' : '')?> /> ��  <input type="text" name="setting[replacenum]" value="<?=$replacenum?>" size="4"> �滻���� ��������Ϊ�滻ȫ����</td>
    </tr>
	<tr> 
      <td>�Ƿ񱣴�Զ��ͼƬ��</td>
      <td><input type="radio" name="setting[enablesaveimage]" value="1" <?=($enablesaveimage == 1 ? 'checked' : '')?> /> �� <input type="radio" name="setting[enablesaveimage]" value="0" <?=($enablesaveimage == 0 ? 'checked' : '')?> /> ��</td>
    </tr>
</table>