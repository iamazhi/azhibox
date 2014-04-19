<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<body>

<form name="myform" method="post" action="">
<table width="582" align="center" cellpadding="2" cellspacing="1" class="table_form">
  <caption>添加栏目</caption>
  <tr>
  <th><font color="red">*</font>  <strong>上级栏目</strong></th>
  <td><label>
  <select name='info[parentid]'>
  <option value='0'>无(做为一级地区)</option>
    <?=$is_tree?>
    </select>
  </label>

  </td>
  </tr>
     <tr>
      <th><strong>地区名称</strong></th>
      <td>
	  <textarea name="info[name]" cols="30" rows="10"></textarea><?=form::style('style', 'style','')?>
      <br/>允许批量添加，一行一个，点回车换行 
	  </td>
    
	<tr>
	 <th></th>
	 <td><input type="submit" name="dosubmit" value=" 确定 ">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" 重置 "></td>
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
