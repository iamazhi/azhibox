<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<table  cellpadding="1" align="center"  cellspacing="1" class="table_list">
<caption>查询点卡</caption>
<tr>
  <Td><a href="?file=<?=$file?>&action=manage">全部点卡</a> | <a href="?file=<?=$file?>&action=manage&status=1">未使用的点卡</a> | <a href="?file=<?=$file?>&action=manage&status=2">已使用的点卡</a> </Td>
</tr>
</table>

<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>管理点卡</caption>
    <tr >
    <th class="align_c" width="5%">选中</th>
    <th width="10%">卡号</th>
    <th width="5%">类型</th>
    <th width="5%">面值</th>
    <th width="5%">点数</th>
    <th width="10%">有限期</th>
    <th width="10%">生成者</th>
    <th width="10%">使用者</th>
    <th width="10%">生成日期</th>
    <th width="10%">充值日期</th>
    <th width="10%">生成IP</th>
    <th width="10%">状态</th>
    </tr>
    <? foreach($info as $v) {?>
   <tr>
     <Td class="align_c"><input type="checkbox" name="id[]" id="checkbox"value="<?=$v['id']?>" /></Td>
     <Td class="align_c"><?=$v["cardid"]?></Td>
     <Td class="align_c"><? $r=$a->get($table="pay_pointcard_type",$where="ptypeid=$v[ptypeid]");echo $r["name"];?></Td>
     <Td class="align_c"><?=$v["amount"]?></Td>
     <Td class="align_c"><?=$v["point"]?></Td>
     <Td class="align_c"><?=date("Y-m-d",$v["endtime"])?></Td>
     <Td class="align_c"><?=$v["inputer"]?></Td>
     <Td class="align_c"><?=$v["username"]?></Td>
     <Td class="align_c"><?=date("Y-m-d",strtotime($v["mtime"]))?></Td>
     <Td class="align_c"><?=substr($v["regtime"],0,10)?></Td>
     <Td class="align_c"><?=$v["regip"]?></Td>
     <Td class="align_c"><?=$v["status"]==1 ? "<font color=red>已使用</font>" : "未使用"?></Td>
   </tr>
   <? }?>
    </table>
    <div class="button_box"><input type="button" value="全选" onClick="checkall()"> 
    <input type="button" name="delete" value="删除" onClick="myform.action='?file=<?=$file?>&action=delete';myform.submit();"> </div>
    <div id="pages"><?=$a->pages?></div>
</form>
<script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});

</script>
</body>
</html>