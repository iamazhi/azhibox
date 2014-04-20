<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

    
<table cellpadding="0" cellspacing="0" border="0" width="100%" align="center">
		<tr>
           <td width="50%" valign="top" bgcolor="#FFFFFF">
    <table cellpadding="0" cellspacing="1" class="table_list">
      <caption>订单信息</caption>
		<tr>
           <td width="20%" class="align_r">订单ID：</td>
           <td><?=$info["orderid"]?></td>            
        </tr>
        <tr>
          <td class="align_r">产品：</td>
          <td><a href="<?=$info["goodsurl"]?>" target="_blank"><?=$info["goodsname"]?></a></td>
        </tr>
        <tr>
          <td class="align_r">单价：</td>
          <td><?=$info["amount"]?>元/<?=$info["unit"]?></td>
        </tr>
        <tr>
          <td class="align_r">数量：</td>
          <td><?=$info["number"]?>个</td>
        </tr>
        <tr>
          <td class="align_r">运费：</td>
          <td><?=$info["carriage"]?>元</td>
        </tr>
		<tr>
          <td class="align_r">付款金额：</td>
          <td><span style="color:red;font-weight:bold">￥<?=$info["amount"]?>元</span></td>
        </tr>
        <tr>
          <td class="align_r">下单时间：</td>
          <td><?=date("Y-m-d H:i:s",$info["time"])?></td>
        </tr>
	</table>
		   </td>
           <td valign="top" bgcolor="#FFFFFF">
    <table cellpadding="0" cellspacing="1" class="table_list">
      <caption>收货信息</caption>
		<tr>
           <td class="align_r" width="20%">收货人：</th>
           <td><?=$info["consignee"]?></td>            
        </tr>
        <tr>
          <td class="align_r">区域：</td>
          <td><? $r=$a->get($table="area",$where="areaid='$info[areaid]'");echo $r["name"]?></td>
        </tr>
        <tr>
          <td class="align_r">电话：</td>
          <td><?=$info["telephone"]?></td>
        </tr>
        <tr>
          <td class="align_r">手机：</td>
          <td><?=$info["mobile"]?></td>
        </tr>
        <tr>
          <td class="align_r">地址：</td>
          <td><?=$info["address"]?></td>
        </tr>
        <tr>
          <td class="align_r">邮编：</td>
          <td><?=$info["postcode"]?></td>
        </tr>
        <tr>
          <td class="align_r">留言：</td>
          <td><?=$info["note"]?></td>
        </tr>
	</table>
    
		   </td>            
        </tr>
	</table>
<table cellpadding="0" cellspacing="1" class="table_list" align="center">
  <caption>订单处理记录</caption>
  <tr>
	<th width="120">操作时间</th>
	<th width="120">订单状态</th>
    <th>备注</th>
    <th width="80">操作者</th>
    <th width="100">IP</th>
 </tr>
 <? foreach($infos as $v) {?>
<tr>
  <td class="align_c"><?=date("Y-m-d H:i:s",$v["time"])?></td>
  <td class="align_c"><?=$status[$v['laststatus']]?>=><?=$status[$v['status']]?></td>
  <td><?=$v["note"]?></td>
  <td class="align_c"><a href="?file=member&action=view&userid=<?=$user["userid"]?>&groupid=<?=$user["groupid"]?>&areaid=<?=$user["areaid"]?>&modelid=<?=$user["modelid"]?>"><?=$v["username"]?></a></td>
  <td class="align_c"><?=$v["ip"]?></td>
</tr>
<? }?>
</table>
</body>
</html>