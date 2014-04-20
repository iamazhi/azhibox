<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<table cellpadding="0" cellspacing="1" class="table_form">
<form action="?file=<?=$file?>&action=<?=$action?>&sourceid=<?=$sourceid?>" method="post" name="myform">
    <caption>修改来源</caption>
	<tr> 
      <th><strong>来源名称</strong></th>
      <td><input type="text" name="info[name]" value="<?=$name?>" size="30"> <font color="red">*</font></td>
    </tr>
	<tr> 
      <th><strong>来源网址</strong></th>
      <td><input type="text" name="info[url]" value="<?=$url?>" size="50"> <font color="red">*</font></td>
    </tr>
	<tr> 
      <th><strong>排序权值</strong></th>
      <td><input type="text" name="info[listorder]"  value="<?=$listorder?>" size="5"> <font color="red">*</font></td>
    </tr>
    <tr> 
      <th></th>
      <td> 
	  <input type="hidden" name="forward" value="?mod=<?=$mod?>&file=<?=$file?>&action=manage"> 
	  <input type="submit" name="dosubmit" value=" 确定 "> 
      &nbsp; <input type="reset" name="reset" value=" 清除 ">
	  </td>
    </tr>
	</form>
</table>
</body>
</html>