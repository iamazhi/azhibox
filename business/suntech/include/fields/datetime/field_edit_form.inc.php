<table cellpadding="2" cellspacing="1" bgcolor="#ffffff">
	<tr> 
      <td><strong>ʱ���ʽ��</strong></td>
      <td>
	  <input type="radio" name="setting[dateformat]" value="date" <?=($dateformat == 'date' ? 'checked' : '')?> />���ڣ�<?=date('Y-m-d')?>��<br />
	  <input type="radio" name="setting[dateformat]" value="datetime" <?=($dateformat == 'datetime' ? 'checked' : '')?> />����+ʱ�䣨<?=date('Y-m-d H:i:s')?>��<br />
	  <input type="radio" name="setting[dateformat]" value="int" <?=($dateformat == 'int' ? 'checked' : '')?> />���� ��ʾ��ʽ��
	  <select name="setting[format]">
	  <option value="Y-m-d H:i:s" <?=($format == 'Y-m-d H:i:s' ? 'selected' : '')?>><?=date('Y-m-d H:i:s')?></option>
	  <option value="Y-m-d H:i" <?=($format == 'Y-m-d H:i' ? 'selected' : '')?>><?=date('Y-m-d H:i')?></option>
	  <option value="Y-m-d" <?=($format == 'Y-m-d' ? 'selected' : '')?>><?=date('Y-m-d')?></option>
	  <option value="m-d" <?=($format == 'm-d' ? 'selected' : '')?>><?=date('m-d')?></option>
	  </select>
	  </td>
    </tr>
	<tr> 
      <td><strong>Ĭ��ֵ��</strong></td>
      <td>
	  <input type="radio" name="setting[defaulttype]" value="0" <?=($defaulttype == 0 ? 'checked' : '')?>/> ��<br />
	  <input type="radio" name="setting[defaulttype]" value="1" <?=($defaulttype == 1 ? 'checked' : '')?>/> ��ǰʱ��<br />
	  <input type="radio" name="setting[defaulttype]" value="2" <?=($defaulttype == 2 ? 'checked' : '')?>/> ָ��ʱ��  <input type="text" name="setting[defaultvalue]" value="<?=$defaultvalue?>" size="19"></td>
    </tr>
</table>