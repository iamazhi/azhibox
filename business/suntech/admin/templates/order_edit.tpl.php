<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>修改订单 </caption>
   <tr>
    <td class="align_r" width="20%">产品：</td>
    <td> <a href="<?=$info["goodsurl"]?>" target="_blank"><?=$info["goodsname"]?></a></td>
   </tr>
   
   <tr>
    <td class="align_r">单价：</td>
    <td><input type="text" name="info[amount]" value="<?=$info["amount"]?>" size="10">元/<?=$info["unit"]?></td>
   </tr>
   
   <tr>
    <td class="align_r">数量：</td>
    <td><input type="text" name="info[number]"  value="<?=$info["number"]?>"size="5"></td>
   </tr>
   
   <tr>
    <td class="align_r">运费：</td>
    <td><input type="text" name="" value="<?=$info["carriage"]?>"  size="5"></td>
   </tr>
   
   <tr>
    <td class="align_r">付款金额：</td>
    <td><font color="#FF0000"><strong><?=$info["amount"]?>元</strong></font></td>
   </tr>
   
   <tr>
    <td class="align_r">订单状态：</td>
    <td><? if($info["status"]==0){?><font color="#FF0000"><strong>待付款</strong></font><? }elseif($info["status"]==1){?><font color="#FF6600">已付款</font><? }?></td>
   </tr>
   
   <tr>
    <td class="align_r">买家：</td>
    <td><?=$info["username"]?></td>
   </tr>
   
   <tr>
    <td class="align_r">下单时间：</td>
    <td><?=date("Y-m-d H:i:s",$info["time"])?></td>
   </tr>
   
   <tr>
    <td class="align_r"></td>
    <td> <input type="submit"  name="dosubmit"value="确定"></td>
   </tr>
    </table>
    
</form>
<script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});

</script>
</body>
</html>