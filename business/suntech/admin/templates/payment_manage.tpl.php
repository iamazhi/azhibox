<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>


<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>֧����ʽ�б� </caption>
    <tr >
    <th class="align_c" width="10%">֧����ʽ����</th>
    <th width="10%">����汾</th>
    <th width="10%">�������</th>
    <th width="10%">����</th>
    <th width="10%">����</th>
    <th width="10%">����</th>
    </tr>
    <? foreach($info as $v) {?>
   <tr>
     <Td class="align_c"><?=$v["pay_name"]?></Td>
     <Td class="align_c"><?=$v["version"]?></Td>
     <Td class="align_c"><?=$v["author"]?></Td>
     <Td class="align_c"><?=$v["pay_fee"]?>%</Td>
     <Td class="align_c"><?=$v["pay_order"]?></Td>
     <Td class="align_c"><a href="?file=<?=$file?>&action=edit&pay_id=<?=$v["pay_id"]?>">�޸�</a> <? if ($v["enabled"]==1){?><a href="?file=<?=$file?>&action=enabled&enabled=0&pay_id=<?=$v["pay_id"]?>">ж��</a><? }elseif($v["enabled"]==0){?><a href="?file=<?=$file?>&action=enabled&enabled=1&pay_id=<?=$v["pay_id"]?>">��װ</a><? }?></Td>
 
   </tr>
   <? }?>
    </table>
    
</form>
<script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});

</script>
</body>
</html>