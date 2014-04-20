<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>


<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>推荐位管理</caption>
    <tr >
    <th class="align_c" width="3%">选中</th>
    <th width="3%">ID</th>
    <th width="10%">推荐位名称</th>
    <th width="5%">数据量</th>
    <th width="10%">操作</th>
    </tr>
    <? foreach($info as $v) {?>
   <tr>
     <Td class="align_c"><input type="text" name="listorders[<?=$v['posid']?>]" value="<?=$v['listorder']?>" size="4" /></Td>
     <Td class="align_c"><?=$v["posid"]?></Td>
     <Td class="align_c"><?=$v["name"]?></Td>
     <Td class="align_c"><?=$pos->count($v["posid"])?></Td>
     <Td class="align_c"><a href="?file=<?=$file?>&action=edit&posid=<?=$v["posid"]?>">修改</a> | <a href="javascript:confirmurl('?file=<?=$file?>&action=delete&posid=<?=$v["posid"]?>', '是否删除该推荐位')">删除</a></Td>
 
   </tr>
   <? }?>
    </table>
    <div class="button_box"><input type="button" name="listorder" value=" 更新排序 " onClick="myform.action='?file=<?=$file?>&action=listorder';myform.submit();">  </div>
    <div id="pages"><?=$pos->pages?></div>
</form>
<script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});

</script>
</body>
</html>