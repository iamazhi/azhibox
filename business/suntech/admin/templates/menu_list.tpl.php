<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<body>

<form action="" method="post">
  <table width="664" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption>
    [�˵�����] 
    </caption>
    <tr>
      <th width="45">����</th>
      <th width="45">ID</th>
      <th width="500">����</th>
      <th width="80">״̬</th>
      <th width="80">�������</th>
    </tr>
    
<?=$category?>
  </table>
  <div class="button_box"><input name="����" type="submit" value="����" onClick="action='?file=menu&action=listorder'"/></div>
<div id="pages"><?=$menu->pages?></div>
</form>

</body>
</html>