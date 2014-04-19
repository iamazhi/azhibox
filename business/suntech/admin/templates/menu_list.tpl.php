<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<body>

<form action="" method="post">
  <table width="664" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption>
    [菜单管理] 
    </caption>
    <tr>
      <th width="45">排序</th>
      <th width="45">ID</th>
      <th width="500">名称</th>
      <th width="80">状态</th>
      <th width="80">管理操作</th>
    </tr>
    
<?=$category?>
  </table>
  <div class="button_box"><input name="排序" type="submit" value="排序" onClick="action='?file=menu&action=listorder'"/></div>
<div id="pages"><?=$menu->pages?></div>
</form>

</body>
</html>