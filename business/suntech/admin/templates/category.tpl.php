<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require tpl('header');
?>
<form action="" method="post">
  <table width="710" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption>
    ��Ŀ����
    </caption>
    <tr>
      <th width="44">����</th>
      <th width="24">ID</th>
      <th width="214">�������</th>
      <th width="58">��Ŀ����</th>
      <th width="67">������</th>
      <th width="43">����</th>
      <th width="250">�������</th>
    </tr>
    <?=$category?>
    
  </table>
  
  <div class="button_box"><input name="����" type="submit" value="����" onclick="action='?file=category&action=listorder'"/></div>
</form>
</body>
</html>