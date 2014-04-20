<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>


<form name="myform" action="?file=<?=$file?>&action=passed" method="post">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>会员模型管理</caption>
  <tr >
      <th width="10%">模型名称</th>
      <th width="15%">模型描述</th>
      <th width="18%">数据表</th>
      <th width="5%">会员数</th>
      <th width="5%">状态</th>
      <th width="20%">管理操作</th>
    </tr>
    <?php foreach($info as $value) {?>
    <tr >
    <td class="align_c" ><strong><?=$value["name"]?></strong></td>
   
    <td class="align_c"><?=$value["description"]?></td>
    <td class="align_c"><?=DB_PRE."memeber_".$value["tablename"]?></td>
    <td class="align_c"><? $r=$db->get_one("SELECT count(*) AS number FROM ".DB_PRE."member where modelid=".$value["modelid"]."");
	                       $number = $r['number'];echo "<strong>$number</strong>";?></td>
    <td class="align_c"><?=($info['disabled']==1)?'':'<font color="red">√</font>'?></td>
    <td class="align_c"><a href="?file=member_model_field&action=manage&modelid=<?=$value["modelid"]?>">字段管理</a> | <? if($value["disabled"]==1){?><a href="?file=<?=$file?>&action=edit&modelid=<?=$value["modelid"]?>">修改</a> | <a href="?file=<?=$file?>&action=disabled&disabled=2&modelid=<?=$value["modelid"]?>">禁用</a><? }else{?><a href="?file=<?=$file?>&action=edit&modelid=<?=$value["modelid"]?>">修改</a> | <a href="?file=<?=$file?>&action=disabled&disabled=1&modelid=<?=$value["modelid"]?>"><font color="#0000FF">启用</font></a><? }?> | <?php if($value['tablename'] == 'detail') { ?>
	<font color="#cccccc">删除</font>
	<?php } else { ?> <a href="?file=<?=$file?>&action=delete&modelid=<?=$value["modelid"]?>">删除</a> <? }?></td>
    </tr>
    <?php }?>
    </table>
</form>
<table cellpadding="0" align="center" cellspacing="1" class="table_list">
	<caption>提示信息</caption>
	<tr>
		<td>
		1、请谨慎删除模型，当模型里存在会员时请先将该模型里的会员导到其他会员模型中。<br />
		2、移动模型会员，将会把原有模型里的会员信息删除，将不能修复。
		</td>
	</tr>
</table>

</body>
</html>
