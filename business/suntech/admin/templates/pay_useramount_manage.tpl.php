<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

 <form name="form" action="" method="get">
 <input name="file" type="hidden" value="<?=$file?>"><input name="action" type="hidden" value="<?=$action?>">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>查询交易记录</caption>
<tr>
  <th class="align_c" width="8%">会员名</th>
  <th class="align_c" width="10%">申请时间</th>
  <th class="align_c" width="5%">操作员</th>
  <th class="align_c" width="10%">审核时间</th>
  <th class="align_c" width="8%">支付方式</th>
  <th class="align_c" width="8%">到款状态</th>
  <th class="align_c" width="5%">操作</th>
</tr>
 <tr>
   <td class="align_c"><input type="text" name="username" size="15" value="<?=$_GET["username"]?>"></td>
   <td class="align_c"><?=form::date('beginadddate')?> - <?=form::date('enddaddate')?></td>
   <td class="align_c"><input type="text" name="inputer"  size="10"></td>
   <td class="align_c"><?=form::date('begindate')?> - <?=form::date('enddate')?></td>
   <td class="align_c"><select name="payname">
                       <? foreach($payment as $r){?>
                       <option value="<?=$r["pay_name"]?>"><?=$r["pay_name"]?></option>
                       <? }?></select></td>
   <td class="align_c"><select name="ispay"><option>到款状态</option><option value="1">已经完</option><option value="0">未确认</option></select></td>
   <td class="align_c"><input type="submit" value="搜索"></td>
 </tr>
    
</table>
</form>
<form name="myform" action="" method="post">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>财务列表</caption>
  <tr >
      <th width="5%">全选</th>
      <th width="7%">会员名称</th>
      <th width="7%">申请时间</th>
      <th width="7%">支付号</th>
      <th width="5%">资金</th>
      <th width="10%">支付方式</th>
      <th width="7%">到款状态</th>
      <th width="10%">操作员</th>
      <th width="10%">审核时间</th>
      <th width="10%">操作</th>
    </tr>
    <?php foreach($info as $v) {?>
    <tr >
    <td class="align_c" ><input type="checkbox" name="ids[]" id="checkbox"value="<?=$v['id']?>" /></td>
   
    <td class="align_c"><?=$v["username"]?></td>
    <td class="align_c"><?=date("Y-m-d",$v["addtime"])?></td>
    <td class="align_c"><?=$v["sn"]?></td>
    <td class="align_c"><?=$v["amount"]?></td>
    <td class="align_c"><?=$v["payment"]?></td>
    <td class="align_c"><?=$v["ispay"]==1 ? "<font color=red>已经完</font>" : "未确认"?></td>
    <td class="align_c"><?=$v["inputer"]?></td>
    <td class="align_c"><?=$v["paytime"]==0 ? "" : date("Y-m-d",$v["paytime"])?></td>
    <td class="align_c"><? if($v["ispay"]==1) {echo "<a href='?file=$file&action=view&id=$v[id]'><font color=red>查看</font></a>";}else{ ?> <a href="javascript:if(confirm('确定要审核吗？')) location='?file=useramount&action=check&id=<?=$v["id"]?>'">审核</a><? }?> <a href="">删除</a></td>
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