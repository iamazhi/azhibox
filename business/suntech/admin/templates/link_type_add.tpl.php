<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

 <form name="form" action="" method="post">
 <input name="info[pid]" type="hidden" value="<?=$pid?>">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>��ӷ��� </caption>
<tr>
  <td class="align_r" width="30%"><strong>��������</strong></td>
  <td ><input name="info[name]" type="text" size="30" require="true" datatype="limit" min="1" max="16" msg="����д�������ƣ�"></td>
 </tr>
 <tr>
  <td class="align_r">��ɫ</td><td><?=form::style('style', 'style',$info["style"])?></td>
 </tr>
 <tr>
  <td class="align_r"><strong>��������</strong></td>
  <td><textarea name="info[description]" cols="50" rows="10"></textarea></td>
 </tr>
<tr>
<td></td><td><input type="submit" name="dosubmit" value=" ȷ�� " /> <input type="reset" name="reset" value=" ��� "></td>
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