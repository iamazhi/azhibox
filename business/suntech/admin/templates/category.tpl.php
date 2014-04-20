<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require tpl('header');
?>
<form action="" method="post">
  <table width="710" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption>
    栏目管理
    </caption>
    <tr>
      <th width="44">排序</th>
      <th width="24">ID</th>
      <th width="214">类别名称</th>
      <th width="58">栏目类型</th>
      <th width="67">绑定类型</th>
      <th width="43">访问</th>
      <th width="250">管理操作</th>
    </tr>
    <?=$category?>
    
  </table>
  
  <div class="button_box"><input name="排序" type="submit" value="排序" onclick="action='?file=category&action=listorder'"/></div>
</form>
</body>
</html>