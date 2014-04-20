<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<body>
<form action="" method="post">
  <table width="664" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption>
    功能管理
    </caption>
    <tr>
      <th width="45"class="align_c">名称</th>
      <th width="208">描述</th>
      <th width="104">数据库表</th>
      <th width="54">生成</th>
      <th width="245">管理操作</th>
    </tr>
    
<?php if(is_array($infos)) {foreach($infos as $val){?>
    <tr>
      <td class="align_c"><?=$val["name"]?></td>
      <td class="align_c"><?=$val["description"]?></td>
      <td class="align_l"><?=DB_PRE?>c_<?=$val["tablename"]?></td>
      <td class="align_c"><?php if($val["auditing"]==1){echo"<font color=#ff0000>是</font>";}elseif($val["auditing"]==2){echo "否";}?></td>
      <td class="align_c"><a href="?file=model_field&action=manage&modelid=<?=$val["modelid"]?>">字段管理</a> | <?php if($val["employ"]==1) {echo "<a href='?file=model&action=employ&model=".$val["modelid"]."&type=1'>禁用</a>";}elseif($val["employ"]==2) {echo"<a href='?file=model&action=employ&model=".$val["modelid"]."&type=2'><font color=#FF0000>启用</font></a>";}?> | <a href="?file=model&action=edit&model=<?=$val["modelid"]?>">修改</a> | <? if($val["modelid"]==9){?><font color="#999999">删除</font><? }else{?><a href=javascript:confirmurl("?file=model&action=delete&model=<?=$val["modelid"]?>","确认要删除“<?=$val["name"]?>”模型吗？")>删除</a><? }?></td>
    </tr>
<?php }}?>


  </table>
<div id="pages"><?=$a->pages?></div>


</form>
</body>
</html>
