<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<table cellpadding="0" cellspacing="1" class="table_form">
<form action="?mod=<?=$mod?>&file=<?=$file?>&action=<?=$action?>" method="post" name="myform">
    <caption>�����Դ</caption>
	<tr> 
      <th><strong>��Դ����</strong></th>
      <td><input type="text" name="info[name]" size="30"> <font color="red">*</font></td>
    </tr>
	<tr> 
      <th><strong>��Դ��ַ</strong></th>
      <td><input type="text" name="info[url]" value="http://" size="50"> <font color="red">*</font></td>
    </tr>
	<tr> 
      <th><strong>����Ȩֵ</strong></th>
      <td><input type="text" name="info[listorder]" value="0" size="5"> <font color="red">*</font></td>
    </tr>
    <tr> 
      <td></th>
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