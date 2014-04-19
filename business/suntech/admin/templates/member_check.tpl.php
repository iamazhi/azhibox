<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

<form name="myform" action="" method="post">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>待审核会员列表</caption>
  <tr >
      <th width="5%">选中</th>
      <th width="5%">ID</th>
      <th width="20%">用户名</th>
      <th width="10%">所在地区</th>
      <th width="15%">注册时间</th>
      <th width="15%">注册IP</th>
      <th width="15%">管理操作</th>
     
    </tr>
    <?php foreach($info as $v) {?>
    <tr >
    <td class="align_c" ><input type="checkbox" name="userid[]" id="checkbox" value="<?=$v['userid']?>" /></td>
   
    <td class="align_c"><?=$v["userid"]?></td>
    <td class="align_c"><?=$v["username"]?></td>
    <td class="align_c"><? $ar=$a->get($table="area",$where="areaid=".$v["areaid"]."");echo $ar["name"];?></td>
    <td class="align_c"><?=date("Y-m-d H:i:s",$v["regtime"])?></td>
    <td class="align_c"><?=$v["regip"]?></td>
    <td class="align_c"><a href="?file=<?=$file?>&action=view&userid=<?=$v["userid"]?>&groupid=<?=$v["groupid"]?>&areaid=<?=$v["areaid"]?>&modelid=<?=$v["modelid"]?>">查看</a> | <a href="?file=<?=$file?>&action=note&userid=<?=$v["userid"]?>">备注</a> | <a href="?file=<?=$file?>&action=edit&groupid=<?=$v["groupid"]?>&areaid=<?=$v["areaid"]?>&modelid=<?=$v["modelid"]?>&userid=<?=$v["userid"]?>">修改</a> </td>
     
    </tr>
    <?php }?>
    </table>
    <div class="button_box">
    <input type="button" value="全选" onClick="checkall()">
    <input type="submit"  name="dosubmit" value="批量批准"> 
    <input type="button" name="delete" value="批量删除" onClick="myform.action='?file=<?=$file?>&action=delete';myform.submit();"> 

</div>
<div id="pages"><?=$a->pages?></div>
</form>

</body>
</html>