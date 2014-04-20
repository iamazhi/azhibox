<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<form action="" method="post" name="myfrom">
  <table width="710" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption>
    地区管理
    </caption>
    <tr>
      <th width="5%">排序</th>
      <th width="5%">ID</th>
      <th width="50%">地区名称</th>
      <th width="20%">管理操作</th>
    </tr>
    <?=$category?>
    
  </table>
  
  <div class="button_box"><input name="排序" type="submit" value="排序" onclick="action='?file=<?=$file?>&action=listorder'"/></div>
</form>
</body>
</html>