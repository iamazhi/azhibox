<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<body>

<form name="myform" method="post" action="">
<table width="582" align="center" cellpadding="2" cellspacing="1" class="table_form">
  <caption>�����Ŀ</caption>
  <tr>
  <th><font color="red">*</font>  <strong>�ϼ���Ŀ</strong></th>
  <td><label>
  <select name='info[parentid]'>
  <option value='0'>��(��Ϊһ������)</option>
    <?=$is_tree?>
    </select>
  </label>

  </td>
  </tr>
     <tr>
      <th><strong>��������</strong></th>
      <td>
	  <textarea name="info[name]" cols="30" rows="10"></textarea><?=form::style('style', 'style','')?>
      <br/>����������ӣ�һ��һ������س����� 
	  </td>
    
	<tr>
	 <th></th>
	 <td><input type="submit" name="dosubmit" value=" ȷ�� ">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" ���� "></td>
	</tr>
</table>
</form>

<script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});
</script>
</body>
</html>
