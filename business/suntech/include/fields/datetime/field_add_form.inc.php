<table cellpadding="2" cellspacing="1" bgcolor="#ffffff">
	<tr> 
      <td><strong>ʱ���ʽ��</strong></td>
      <td>
	  <input type="radio" name="setting[dateformat]" value="date" checked>���ڣ�<?=date('Y-m-d')?>��<br />
	  <input type="radio" name="setting[dateformat]" value="datetime">����+ʱ�䣨<?=date('Y-m-d H:i:s')?>��<br />
	  <input type="radio" name="setting[dateformat]" value="int">���� ��ʾ��ʽ��
	  <select name="setting[format]">
	  <option value="Y-m-d H:i:s"><?=date('Y-m-d H:i:s')?></option>
	  <option value="Y-m-d H:i"><?=date('Y-m-d H:i')?></option>
	  <option value="Y-m-d"><?=date('Y-m-d')?></option>
	  <option value="m-d"><?=date('m-d')?></option>
	  </select>
	  </td>
    </tr>
	<tr> 
      <td><strong>Ĭ��ֵ��</strong></td>
      <td>
	  <input type="radio" name="setting[defaulttype]" value="0" checked/>��<br />
	  <input type="radio" name="setting[defaulttype]" value="1"/>��ǰʱ��<br />
	  <input type="radio" name="setting[defaulttype]" value="2"/>ָ��ʱ�䣺<input type="text" name="setting[defaultvalue]" value="<?=$defaultvalue?>" size="22"></td>
    </tr>
</table>