<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<body>
<form method="post" name="myform" id="myform" action="?mod=<?=$mod?>&file=<?=$file?>&action=<?=$action?>">
<table cellpadding="2" cellspacing="1" class="table_list">
    <caption>���ݱ��Ż����޸�</caption>
<tr>
<th><strong>ѡ��</strong></th>
<th><strong>���ݱ���</strong></th>
</tr>
<?php
if(is_array($tables)){
	foreach($tables as $id => $table){
?>
  <tr>
    <td  class="align_c"><input type="checkbox" name="tables[]" value="<?=$table?>"></td>
    <td><?=$table?></td>
	</td>
</tr>
<?php
	}
}
?>
  <tr>
    <td class="align_c"><a href="###" onClick="javascript:$('input[type=checkbox]').attr('checked', true)">ȫѡ</a>/<a href="###" onClick="javascript:$('input[type=checkbox]').attr('checked', false)">ȡ��</a></td>
      <td>
      <input type="radio" name="operation" value="repair">�޸���&nbsp;&nbsp;
      <input type="radio" name="operation" value="optimize" checked>�Ż���&nbsp;&nbsp;
	  <input type="submit" name="dosubmit" value=" �ύ "></td>
  </tr>
	</form>
</table>
</body>
</html>

