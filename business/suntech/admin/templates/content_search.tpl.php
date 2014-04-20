<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<?=$menu?>
<form  method="get" action="">
<input type="hidden" name="file" value="content"> 
<input type="hidden" name="action" value="<?=$search?>"> 
<input type="hidden" name="modelid" value="<?=$modelid?>"> 
<table align="center" cellpadding="0" cellspacing="1" class="table_list">
   <caption class="align_c">管理信息</caption>

	<tr> 
      <td class="align_r"width="25%"><strong>栏目</strong></td>
      <td><?=form::select_category('phpsin','0', 'catid','','不限栏目',$catid)?> </td>
    </tr>
    <tr> 
      <td class="align_r"width="25%"><strong>标题</strong></td>
      <td><?=form::text($fromtype='text',$fromname="q",'',$width="30",'','title')?> </td>
    </tr>
    <tr> 
      <td></td>
      <td>
	  <input type="submit" name="dosubmit" value=" 搜索 "> 
	  </td>
    </tr>
</table>
</form>
</body>
</html>
