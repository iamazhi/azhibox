<table cellpadding="2" cellspacing="1">
	<tr> 
      <td>ѡ���б�</td>
      <td><textarea name="setting[options]" rows="2" cols="20" id="options" style="height:100px;width:200px;"><?=$options?></textarea></td>
    </tr>
	<tr> 
      <td>ѡ������</td>
      <td>
	  <input type="radio" name="setting[boxtype]" value="radio" <?=$boxtype == 'radio' ? 'checked' : ''?>  onclick="$('#setcols').show();$('#setsize').hide();"/> ��ѡ��ť <br />
	  <input type="radio" name="setting[boxtype]" value="checkbox" <?=$boxtype == 'checkbox' ? 'checked' : ''?>  onclick="$('#setcols').show();$('#setsize').hide();"/> ��ѡ�� <br />
	  <input type="radio" name="setting[boxtype]" value="select" <?=$boxtype == 'select' ? 'checked' : ''?> onclick="$('#setcols').hide();$('#setsize').show();" /> ������ <br />
	  <input type="radio" name="setting[boxtype]" value="multiple" <?=$boxtype == 'multiple' ? 'checked' : ''?>  onclick="$('#setcols').hide();$('#setsize').show();"/> ��ѡ�б��
	  </td>
    </tr>
<tbody id="setcols" style="display:<?=($boxtype == 'radio' || $boxtype == 'checkbox') ? 'block' : 'none'?>">
	<tr> 
      <td>�ֶ�����</td>
      <td>
	  <select name="setting[fieldtype]">
	  <option value="CHAR" <?=$fieldtype == 'CHAR' ? 'selected' : ''?>>�����ַ� CHAR</option>
	  <option value="VARCHAR" <?=$fieldtype == 'VARCHAR' ? 'selected' : ''?>>�䳤�ַ� VARCHAR</option>
	  <option value="TINYINT" <?=$fieldtype == 'TINYINT' ? 'selected' : ''?>>���� TINYINT(3)</option>
	  <option value="SMALLINT" <?=$fieldtype == 'SMALLINT' ? 'selected' : ''?>>���� SMALLINT(5)</option>
	  <option value="MEDIUMINT" <?=$fieldtype == 'MEDIUMINT' ? 'selected' : ''?>>���� MEDIUMINT(8)</option>
	  <option value="INT" <?=$fieldtype == 'INT' ? 'selected' : ''?>>���� INT(10)</option>
	  </select>
	  </td>
    </tr>
	<tr> 
      <td>����</td>
      <td><input type="text" name="setting[cols]" value="<?=$cols?>" size="5"> ÿ����ʾ��ѡ�����</td>
    </tr>
	<tr> 
      <td>ÿ�п��</td>
      <td><input type="text" name="setting[width]" value="<?=$width?>" size="5"> px</td>
    </tr>
</tbody>
<tbody id="setsize" style="display:<?=($boxtype == 'select' || $boxtype == 'multiple') ? 'block' : 'none'?>">
	<tr> 
      <td>�߶�</td>
      <td><input type="text" name="setting[size]" value="<?=$size?>" size="5"> ��</td>
    </tr>
</tbody>
	<tr> 
      <td>Ĭ��ֵ</td>
      <td><input type="text" name="setting[defaultvalue]" value="<?=$defaultvalue?>" size="40"></td>
    </tr>
</table>