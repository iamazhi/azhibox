<table cellpadding="2" cellspacing="1">
	<tr> 
      <td>�ı��򳤶�</td>
      <td><input type="text" name="setting[size]" value="<?=$size?>" size="5"></td>
    </tr>
	<tr> 
      <td>�����ϴ����ļ���С</td>
      <td><input type="text" name="setting[upload_maxsize]" value="<?=$upload_maxsize?>" size="5">KB ��ʾ��1KB=1024Byte��1MB=1024KB *</td>
    </tr>
	<tr> 
      <td>�����ϴ����ļ�����</td>
      <td><input type="text" name="setting[upload_allowext]" value="<?=$upload_allowext?>" size="50"></td>
    </tr>
	<tr> 
      <td>�Ƿ񱣴��ļ���С</td>
      <td><input type="radio" name="setting[issavefilesize]" value="1" <?=($issavefilesize ? 'checked' : '')?>/> �� <input type="radio" name="setting[issavefilesize]" value="0" <?=($issavefilesize ? '' : 'checked')?>/> ��</td>
    </tr>
	<tr> 
      <td>�ļ����ط�ʽ</td>
      <td><input type="radio" name="setting[downloadtype]" value="0" <?=($downloadtype == 0 ? 'checked' : '')?>/> �����ļ���ַ <input type="radio" name="setting[downloadtype]" value="1" <?=($downloadtype == 1 ? 'checked' : '')?>/> ͨ��PHP��ȡ</td>
    </tr>
</table>