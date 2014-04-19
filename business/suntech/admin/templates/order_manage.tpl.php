<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

 <form name="form" action="" method="get">
 <input name="file" type="hidden" value="<?=$file?>"><input name="action" type="hidden" value="<?=$action?>">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>订单管理</caption>
<tr>
  <td class="align_l"><a href="?file=<?=$file?>&action=manage">全部</a> | 
<a href="?file=<?=$file?>&action=manage&status=0"><font color="red">待付款</font></a>
 | <a href="?file=<?=$file?>&action=manage&status=1"><font color="orange">已付款</font></a>
 | <a href="?file=<?=$file?>&action=manage&status=2"><font color="blue">已发货</font></a>
 | <a href="?file=<?=$file?>&action=manage&status=3"><font color="green">交易成功</font></a>
 | <a href="?file=<?=$file?>&action=manage&status=4"><font color="gray">交易关闭</font></a></td>

</tr>
 <tr>
   <td class="align_l">
   <select name="status"><? foreach($status as $k=>$v){?><option value="<?=$k?>"><?=$v?></option><? }?></select>
   下单时间：<?=form::date('startdate')?> - <?=form::date('enddate')?>
   付款金额：<input type="text" name="minamount" value="" size="10">~<input type="text" name="maxamount" value="" size="10">
   <select name="field">
    <option value="orderid" <?=$field=="orderid" ? "selected" :""?> >订单ID</option>
    <option value="username" <?=$field=="username" ? "selected" :""?>>用户名</option>
   <option value="userid" <?=$field=="userid" ? "selected" :""?>>用户ID</option>
   <option value="goodsname" <?=$field=="goodsname" ? "selected" :""?>>产品名称</option>
   </select>
   <input type="text" name="q" value="<?=$q?>" size="">
   <select name="orderby">
    <option value="orderid desc">ID降序</option>
    <option value="orderid asc">ID升序</option>
   <option value="amount desc">金额降序</option>
   <option value="amount asc">金额升序</option>
   </select>
   <input type="submit" value="查询">
   </td>
  
 </tr>
    
</table>
</form>
<form name="myform" action="" method="post">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>订单列表</caption>
  <tr >
      <th width="3%">选中</th>
      <th width="3%">ID</th>
      <th width="25%">产品名称</th>
      <th width="5%">付款金额</th>
      <th width="9%">下单时间</th>
      <th width="5%">买家</th>
      <th width="7%">状态</th>
      <th width="10%">管理操作</th>
    </tr>
    <?php foreach($info as $v) {?>
    <tr >
    <td class="align_c" ><input type="checkbox" name="orderid[]" id="checkbox"value="<?=$v['orderid']?>" /></td>
   
    <td class="align_c"><?=$v["orderid"]?></td>
    <td class="align_l"><a href="<?=$v["goodsurl"]?>" target="_blank"><?=$v["goodsname"]?></a></td>
    <td class="align_c"><?=$v["amount"]?></td>
    <td class="align_c"><?=date("Y-m-d H:i:s",$v["time"])?></td>
    <td class="align_c"><?=$v["username"]?></td>
    <td class="align_c"><? if($v["status"]==0){?><font color="red">待付款</font><Br><a href="?file=<?=$file?>&action=status&status=4&orderid=<?=$v["orderid"]?>"><font color="red"><strong>取消订单</strong></font></a><? }elseif($v["status"]==1){?><font color="#FF9900">已付款</font><br/><a href="?file=<?=$file?>&action=status&status=2&orderid=<?=$v["orderid"]?>"><font color="red"><strong>确认发货</strong></font></a><? }elseif($v["status"]==2){?><font color="#0000FF">已发货</font><? }elseif($v["status"]==3){?><font color="#006600">交易成功</font><? }elseif($v["status"]==4){?><font color="#999999">交易关闭</font><? }?></td>
    <td class="align_c"><a href="?file=<?=$file?>&action=view&orderid=<?=$v["orderid"]?>">查看</a> | <? if($v["status"]==0){?><a href="?file=<?=$file?>&action=edit&orderid=<?=$v["orderid"]?>">修改</a><? }else{?><font color="#999999">修改</font><? }?> | <a href="?file=<?=$file?>&action=delete&orderid=<?=$v["orderid"]?>">删除</a></td>
    </tr>
    <?php }?>
    </table>
    
    <div class="button_box"><input type="button" value="全选" onClick="checkall()">
   <input type="button" name="delete" value="批量删除" onClick="myform.action='?file=<?=$file?>&action=delete';myform.submit();"> 
   </div>
<div id="pages"><?=$a->pages?></div>
</form>

</body>
</html>