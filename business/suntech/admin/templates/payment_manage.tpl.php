<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>


<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>支付方式列表 </caption>
    <tr >
    <th class="align_c" width="10%">支付方式名称</th>
    <th width="10%">插件版本</th>
    <th width="10%">插件作者</th>
    <th width="10%">费用</th>
    <th width="10%">排序</th>
    <th width="10%">操作</th>
    </tr>
    <? foreach($info as $v) {?>
   <tr>
     <Td class="align_c"><?=$v["pay_name"]?></Td>
     <Td class="align_c"><?=$v["version"]?></Td>
     <Td class="align_c"><?=$v["author"]?></Td>
     <Td class="align_c"><?=$v["pay_fee"]?>%</Td>
     <Td class="align_c"><?=$v["pay_order"]?></Td>
     <Td class="align_c"><a href="?file=<?=$file?>&action=edit&pay_id=<?=$v["pay_id"]?>">修改</a> <? if ($v["enabled"]==1){?><a href="?file=<?=$file?>&action=enabled&enabled=0&pay_id=<?=$v["pay_id"]?>">卸载</a><? }elseif($v["enabled"]==0){?><a href="?file=<?=$file?>&action=enabled&enabled=1&pay_id=<?=$v["pay_id"]?>">安装</a><? }?></Td>
 
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