<table cellpadding="2" cellspacing="1">
	<tr> 
      <td>�ֶγ���</td>
      <td><input type="text" name="setting[size]" value="<?=$size?>" size="5"></td>
    </tr>
	<tr> 
      <td>�ļ����ط�ʽ</td>
      <td><input type="radio" name="setting[downloadtype]" value="0" <?=($downloadtype == 0 ? 'checked' : '')?>/> �����ļ���ַ <input type="radio" name="setting[downloadtype]" value="1" <?=($downloadtype == 1 ? 'checked' : '')?>/> ͨ��PHP��ȡ</td>
    </tr>
</table>