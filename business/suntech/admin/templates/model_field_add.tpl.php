<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body onLoad="is_ie();$('#setting').load('?mod=<?=$mod?>&file=<?=$file?>&action=setting_add&modelid=<?=$modelid?>&formtype='+myform.formtype.value);">
<?=$menu?>
<table cellpadding="0" cellspacing="1" class="table_form">
<form action="?mod=<?=$mod?>&file=<?=$file?>&action=<?=$action?>&modelid=<?=$modelid?>" method="post" name="myform">
    <caption>�����ֶ�</caption>
	<tr> 
      <th width="25%"><font color="red">*</font> <strong>�ֶ���</strong><br />
	  ֻ����Ӣ����ĸ�����ֺ��»�����ɣ����ҽ�����ĸ��ͷ�������»��߽�β
	  </th>
      <td><input type="text" name="info[field]" size="20" require="true" datatype="limit|ajax" min="1" max="20" url="?mod=<?=$mod?>&file=<?=$file?>&action=checkfield&modelid=<?=$modelid?>" msg="�ַ����ȷ�Χ����Ϊ1��10λ|"></td>
    </tr>
	<tr> 
      <th><font color="red">*</font> <strong>�ֶα���</strong><br />���磺���±���</th>
      <td><input type="text" name="info[name]" size="30" require="true" datatype="limit" min="1" max="50" msg="�ַ����ȷ�Χ����Ϊ1��50λ"></td>
    </tr>
	<tr> 
      <th><strong>�ֶ���ʾ</strong><br />��ʾ���ֶα����·���Ϊ����������ʾ</th>
      <td><textarea name="info[tips]" rows="2" cols="20" id="tips" style="height:60px;width:250px;"></textarea></td>
    </tr>
	<tr> 
      <th><strong>�ֶ�����</strong><br /></th>
      <td>
	  <select name="info[formtype]" id="formtype" onChange="javascript:$('#setting').load('?mod=<?=$mod?>&file=<?=$file?>&action=setting_add&modelid=<?=$modelid?>&formtype='+this.value);">
<?php 
foreach($fields as $type=>$name)
{
	  echo "<option value=\"$type\">$name</option>\n";
} 
?>
	  </select>
	  </td>
    </tr>
	<tr> 
      <th><strong>��ز���</strong><br />���ñ����������</th>
      <td><div id="setting"></div></td>
    </tr>
	<tr> 
      <th><strong>������������</strong><br />����ͨ���˴�����javascript�¼�</th>
      <td><input type="text" name="info[formattribute]" value="<?=$formattribute?>" size="50"></td>
    </tr>
	<tr> 
      <th><strong>������ʽ��</strong><br />���������CSS��ʽ��</th>
      <td><input type="text" name="info[css]" value="<?=$css?>" size="10"></td>
    </tr>
	<tr> 
      <th><strong>�ַ�����ȡֵ��Χ</strong><br />ϵͳ���ڱ����ύʱ������ݳ��ȷ�Χ�Ƿ����Ҫ������������Ƴ���������</th>
      <td>��Сֵ��<input type="text" name="info[minlength]" id="minlength" value="0" size="5"> ���ֵ��<input type="text" name="info[maxlength]" id="maxlength" value="" size="5"></td>
    </tr>
	<tr> 
      <th><strong>����У������</strong><br />ϵͳ��ͨ��������У������ύ�����ݺϷ��ԣ��������У������������</th>
      <td><input type="text" name="info[pattern]" id="pattern" value="<?=$pattern?>" size="40"> 
<select name="pattern_select" onChange="javascript:$('#pattern').val(this.value)">
<option value="">��������</option>
<?php 
foreach($patterns as $p)
{
	echo "<option value=\"{$p[pattern]}\">{$p[name]}</option>\n";
}
?>
</select>
	  </td>
    </tr>
	<tr> 
      <th><strong>����У��δͨ������ʾ��Ϣ</strong><br />���������ݲ���������У��ʱ��ϵͳ��ʾ��Ϣ</th>
      <td><input type="text" name="info[errortips]" value="<?=$errortips?>" size="50"></td>
    </tr>
	<tr> 
      <th><strong>ֵΨһ</strong></th>
      <td><input type="radio" name="info[isunique]" value="1"> �� <input type="radio" name="info[isunique]" value="0" checked> ��</td>
    </tr>
	<tr> 
      <th><strong>��Ϊ������Ϣ</strong><br />��ѡ��ֻ�����ӡ��޸���Ϣʱ�����ã�ѡ���ǡ�������Ϣ�Ļ���ѡ������ʾ�������ڸ߼�ѡ������ʾ</th>
      <td><input type="radio" name="info[isbase]" value="1"  checked> �� <input type="radio" name="info[isbase]" value="0"> �� </td>
    </tr>
	<tr> 
      <th><strong>��Ϊ��������</strong></th>
      <td><input type="radio" name="info[issearch]" value="1"> �� <input type="radio" name="info[issearch]" value="0" checked> ��</td>
    </tr>
	<tr> 
      <th><strong>��Ϊ��ǩĬ�϶�ȡ�ֶ�</strong></th>
      <td><input type="radio" name="info[isselect]" value="1"> �� <input type="radio" name="info[isselect]" value="0" checked> ��</td>
    </tr>
	<tr> 
      <th><strong>��Ϊ��ǩ��������</strong></th>
      <td><input type="radio" name="info[iswhere]" value="1"> �� <input type="radio" name="info[iswhere]" value="0" checked> ��</td>
    </tr>
	<tr> 
      <th><strong>��Ϊ��ǩ���������ֶ�</strong></th>
      <td><input type="radio" name="info[isorder]" value="1"> �� <input type="radio" name="info[isorder]" value="0" checked> ��</td>
    </tr>
	<tr> 
      <th><strong>��ǰ̨Ͷ������ʾ</strong></th>
      <td><input type="radio" name="info[isadd]" value="1"checked /> �� <input type="radio" name="info[isadd]" value="0" /> ��</td>
    </tr>
	<tr> 
      <th><strong>��Ϊȫվ������Ϣ</strong></th>
      <td><input type="radio" name="info[isfulltext]" value="1" checked/> �� <input type="radio" name="info[isfulltext]" value="0"/> ��</td>
    </tr>
	<tr> 
      <th><strong>��ֹ�����ֶ�ֵ�Ļ�Ա��</strong></th>
      <td><?=$unsetgroups?></td>
    </tr>
	<tr> 
      <th><strong>��ֹ�����ֶ�ֵ�Ľ�ɫ</strong></th>
      <td><?=$unsetroles?></td>
    </tr>
    <tr> 
      <th></th>
      <td> 
	  <input type="hidden" name="forward" value="?mod=<?=$mod?>&file=<?=$file?>&action=manage&modelid=<?=$modelid?>"> 
	  <input type="submit" name="dosubmit" value=" ȷ�� "> 
      &nbsp; <input type="reset" name="reset" value=" ��� ">
	  </td>
    </tr>
	</form>
</table>
</body>
</html>
<script LANGUAGE="javascript">
<!--
$().ready(function() {
	  $('form').checkForm(1);
	});
//-->
</script>