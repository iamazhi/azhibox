<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<form action="" method="post" name="myfrom">
  <table width="710" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption>
    ��������
    </caption>
    <tr>
      <th width="5%">����</th>
      <th width="5%">ID</th>
      <th width="50%">��������</th>
      <th width="20%">�������</th>
    </tr>
    <?=$category?>
    
  </table>
  
  <div class="button_box"><input name="����" type="submit" value="����" onclick="action='?file=<?=$file?>&action=listorder'"/></div>
</form>
</body>
</html>