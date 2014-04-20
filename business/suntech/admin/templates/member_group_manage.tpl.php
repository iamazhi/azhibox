<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

<form name="myform" action="?file=<?=$file?>&action=passed" method="post">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>管理广告位</caption>
  <tr >
      <th width="5%">排序</th>
      <th width="10%">会员组</th>
      <th width="25%">服务</th>
      <th width="5%">会员数</th>
      <th width="5%">发布</th>
      <th width="5%">访问</th>
      <th width="5%">系统组</th>
      <th width="15%">管理操作</th>
     
    </tr>
    <?php foreach($info as $value) {?>
    <tr >
    <td class="align_c" ><input type="text" name="listorders[<?=$value['groupid']?>]" value="<?=$value['listorder']?>" size="4" /></td>
   
    <td class="align_c"><?=$value["name"]?></td>
    <td class="align_l"><?=$value["description"]?></td>
    <td class="align_c"><?php $r=$db->get_one("SELECT count(*) AS number FROM ".DB_PRE."member where groupid=".$value["groupid"]."");
	                       $number = $r['number'];echo "<strong>$number</strong>";?></td>
    <td class="align_c"><?=$value["allowpost"]==1 ? "<font color=red>√</font>" :""?></td>
    <td class="align_c"><?=$value["allowvisit"]==1 ? "<font color=red>√</font>" :""?></td>
    <td class="align_c"><?=$value["issystem"]==1 ? "<font color=red>√</font>" :""?></td>
    <td class="align_c"><a href="?file=<?=$file?>&action=group_edit&groupid=<?=$value["groupid"]?>">修改</a> |<?php if($value["issystem"]==1){?> <font color="#999999">禁用</font> | <font color="#999999">删除</font><?php }else{?> <?php if($value["disabled"]==1){?><a href="?file=<?=$file?>&action=group_disabled&groupid=<?=$value["groupid"]?>&disabled=2">禁用</a><? }else{?><a href="?file=<?=$file?>&action=group_disabled&groupid=<?=$value["groupid"]?>&disabled=1"><font color="#0000FF">启用</font></a><?php }?> | <a href="?file=<?=$file?>&action=group_delete&groupid=<?=$value["groupid"]?>">删除</a> <?php }?></td>
     
    </tr>
    <?php }?>
    </table>
    <div class="button_box">
   <input type="button" name="listorder" value="排序" onClick="myform.action='?file=<?=$file?>&action=group_listorder';myform.submit();"> 
  

</div>
<div id="pages"><?=$a->pages?></div>
</form>

</body>
</html>