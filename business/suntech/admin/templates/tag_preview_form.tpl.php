<?php 
defined('IN_PHPCMS') or exit('Access Denied');
include admin_tpl('header');
?>
<script type="text/javascript">
function doCheck()
{
<?php 
foreach($vars as $var)
{
	$varname = str_replace('$','',$var);
	$varname = str_replace("'",'',$varname);
?>
	if($('#var_<?=$varname?>').val()=='')
	{
		alert('<?=$var?> ��ֵ����Ϊ�գ�');
		$('#var_<?=$varname?>').focus();
		return false;
	}
<?php } ?>
	return true;
}
</script>

<body>
<form name="myform" method="get" action="?" onSubmit="javascript:return doCheck();">
<table cellpadding="0" cellspacing="1" class="table_form">
  <caption>{tag_<?=$tagname?>} ��ǩ������ֵ</caption>
  <tr>
    <th width="30%"><strong>������</strong></th>
    <td width="60%">����ֵ</td>
  </tr>
 <input type="hidden" name="tagname" value="<?=$tagname?>">
 <input type="hidden" name="mod" value="<?=$mod?>">
 <input type="hidden" name="file" value="<?=$file?>">
 <input type="hidden" name="action" value="<?=$action?>">
 <input name="ajax" type="hidden" value="<?=$ajax?>">
<?php 
foreach($vars as $k=>$var)
{
	$varname = str_replace('$','',$var);
	$varname = str_replace("'",'',$varname);
?>
<tr>
    <th><strong><?=$var?>��</strong></th>
    <td><input type="text" name="<?=$varname?>" id="var_<?=$varname?>" size="20"></td>
  </tr>
<?php
}
?>
<tr>
<th></th>
<td><input type="submit" name="dosubmit" value=" Ԥ�� ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="������һ��" onClick="javascript:history.back();"></td>
</tr>
</table>
</form>
<br/>
<table cellpadding="0" cellspacing="1" class="table_info" >
  <caption>��ʾ��Ϣ</caption>
  <tr>
    <td>
�����ǩ�д��ڱ�����Ԥ����ʱ������ȸ���Щ������ֵ����Ԥ�������Ը���ʵ�������ʱ��ֵ��<p>
<font color="red">���ñ�ǩ������</font><br />
<font color="blue">$mod</font> ��һ��������ʾģ��ID ��0 ��ʾ����ģ�ͣ�<br />
<font color="blue">$catid</font> ��һ��������ʾ��ĿID ��0 ��ʾ������Ŀ��<br />
<font color="blue">$specialid</font> ��һ��������ʾר��ID ��0 ��ʾ����ר�⣩<br />
<font color="blue">$typeid</font> ��һ��������ʾ���ID ��0 ��ʾ�������<br />
<font color="blue">$page</font> ��һ��������ʾҳ�� ��1 ��ʾ��һҳ��<br />
	</td>
  </tr>
</table>
</body>
</html>