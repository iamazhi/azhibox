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
   <caption class="align_c">������Ϣ</caption>

	<tr> 
      <td class="align_r"width="25%"><strong>��Ŀ</strong></td>
      <td><?=form::select_category('phpsin','0', 'catid','','������Ŀ',$catid)?> </td>
    </tr>
    <tr> 
      <td class="align_r"width="25%"><strong>����</strong></td>
      <td><?=form::text($fromtype='text',$fromname="q",'',$width="30",'','title')?> </td>
    </tr>
    <tr> 
      <td></td>
      <td>
	  <input type="submit" name="dosubmit" value=" ���� "> 
	  </td>
    </tr>
</table>
</form>
</body>
</html>
