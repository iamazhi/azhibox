<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

<form name="myform" action="" method="post">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption><?=$info["username"]?>  �ı�ע</caption>
  <tr >
      <td  class="align_c"><textarea name="info[note]" cols="80" rows="15"><?=$info["note"]?></textarea><br/>���������¼�û�Ա�ı�ע��Ϣ��ֻ�й���Ա���ܿ�����</th>
    </tr>
   <tr>
     <td class="align_c"><input type="submit" name="dosubmit" value=" �޸� " /></td>
   </tr>
    </table>
    
</form>

</body>
</html>