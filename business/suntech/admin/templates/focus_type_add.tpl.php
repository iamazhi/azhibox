<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

 <form name="form" action="" method="post">
 <input name="info[pid]" type="hidden" value="<?=$pid?>">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>添加分类 </caption>
<tr>
  <td class="align_r" width="30%"><strong>分类名称</strong></td>
  <td ><input name="info[name]" type="text" size="30" require="true" datatype="limit" min="1" max="16" msg="请填写分类名称！"></td>
 </tr>
 <tr>
  <td class="align_r">颜色</td><td><?=form::style('style', 'style',$info["style"])?></td>
 </tr>
 <tr>
  <td class="align_r"><strong>分类描述</strong></td>
  <td><textarea name="info[description]" cols="50" rows="10"></textarea></td>
 </tr>
<tr>
<td></td><td><input type="submit" name="dosubmit" value=" 确定 " /> <input type="reset" name="reset" value=" 清除 "></td>
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