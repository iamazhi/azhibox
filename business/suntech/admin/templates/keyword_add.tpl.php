<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<table cellpadding="2" cellspacing="1" class="table_form">
<form action="?file=<?=$file?>&action=<?=$action?>" method="post" name="myform">
    <caption>��ӹؼ���</caption>
	<tr> 
      <th width="20%"><font color="red">*</font> <strong>�ؼ���</strong></th>
      <td><input type="text" name="info[tag]" size="50" maxlength="50" require="true" datatype="limit" min="2" max="50" msg="��������2���ַ�����50���ַ�" msgid="tag_notice"> <?=form::style('style',  $style)?><span id="tag_notice"></span></td>
    </tr>
	<tr> 
      <th><font color="red">*</font> <strong>����Ȩֵ</strong></th>
      <td><input type="text" name="info[listorder]" value="0" size="5" require="true" datatype="number" msg="����������"></td>
    </tr>
    <tr> 
      <th></th>
      <td> 
	  <input type="hidden" name="forward" value="?mod=<?=$mod?>&file=<?=$file?>&action=manage"> 
	  <input type="submit" name="dosubmit" value=" ȷ�� "> 
      &nbsp; <input type="reset" name="reset" value=" ��� ">
	  </td>
    </tr>
	</form>
</table>
</body>
</html>
<script language="javascript" type="text/javascript">
$().ready(function() {
	  $('form').checkForm(1);
	});
</script>