<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

<form name="myform" action="" method="post">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption><?=$info["username"]?>  的备注</caption>
  <tr >
      <td  class="align_c"><textarea name="info[note]" cols="80" rows="15"><?=$info["note"]?></textarea><br/>请在下面记录该会员的备注信息（只有管理员才能看到）</th>
    </tr>
   <tr>
     <td class="align_c"><input type="submit" name="dosubmit" value=" 修改 " /></td>
   </tr>
    </table>
    
</form>

</body>
</html>