<table cellpadding="2" cellspacing="1" onclick="javascript:$('#minlength').val(0);$('#maxlength').val(255);">
	<tr> 
      <td>�����ϴ�����Ƶ��С</td>
      <td><input type="text" name="setting[upload_maxsize]" value="<?=$upload_maxsize?>" size="5">KB ��ʾ��1KB=1024Byte��1MB=1024KB *<br />���������������ϴ�����Ϊ<font color="red"><?=ini_get('upload_max_filesize')?></font>���������ֵ��С�ڻ����<font color="red"><?=ini_get('upload_max_filesize')?></font></td>
    </tr>
	<tr> 
      <td>�����ϴ���Ƶ����</td>
      <td><input type="text" name="setting[upload_allowext]" value="<?=$upload_allowext?>" size="40"></td>
    </tr>
	<tr>
	  <td>�����ϴ�����Ƶ����</td>
	  <td><input type="text" name="setting[upload_items]" value="<?=$upload_items?>" size="10" /></td>
	</tr>
	<tr>
	  <td>��Ƶ������</td>
	  <td><textarea name="setting[servers]" rows="3" cols="60"  style="height:80px;width:400px;"><?=$servers?></textarea></td>
	</tr>
	<tr>
		<td>����������</td>
		<td><a href="?mod=phpcms&file=player&action=manage">������������</a></td>
	</tr>
</table>