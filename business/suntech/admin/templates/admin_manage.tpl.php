<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require tpl('header');
?>
<body>
<table  align="center" cellpadding="0" cellspacing="1" class="table_list">
<caption>
    管理员设置
    </caption>
    <tr>
    <td><a href="?file=<?=$file?>&action=add">添加管理员</a> | <a href="?file=<?=$file?>&action=manage">管理员列表</a> | <?php foreach($role as $k=>$v){?> <a href="?file=<?=$file?>&action=manage&roleid=<?=$v["roleid"]?>"><?=$v["name"]?></a> |<?php }?> </td>
    </tr>
</table>
<form action="" method="post">
  <table width="681" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption>
    管理员列表
    </caption>

    <tr>
     <th class="align_c">ID</th>
     <th class="align_c">用户名</th>
     <th class="align_c">所属角色</th>
     <th class="align_c">最后登录IP</th>
     <th class="align_c">最后登录时间</th>
     <th class="align_c">登录次数</th>
     <th class="align_c">管理操作</th>
    </tr>
    <?php foreach($info as $v){?>
    <tr>
     <td class="align_c"><?=$v["userid"]?></td>
     <td class="align_c"><?=$v["username"]?></td>
     <td class="align_c"><?php foreach($ros as $r){ if($r["userid"]==$v["userid"]){?> <?php foreach($role as $ro){ if($ro["roleid"]==$r["roleid"]){?><?=$ro["name"]?><Br><?php }}}}?></td>
     <td class="align_c"><?=$v["lastloginip"]?></td>
     <td class="align_c"><?=date("Y-m-d H:i:s",$v["lastlogintime"])?></td>
     <td class="align_c"><?=$v["logintimes"]?></td>
     <td class="align_c"><?php if($v["userid"]==1){ echo "<font color='#999999'>修改</font> | <font color='#999999'>锁定</font> | <font color='#999999'>撤消</font>"; }else{ ?><a href="?file=<?=$file?>&action=edit&userid=<?=$v["userid"]?>">修改</a> | <?php if($v["disabled"]==1){?><a href="?file=<?=$file?>&action=disabled&disabled=0&userid=<?=$v["userid"]?>"><font color="#FF0000">解锁</font></a><?php } elseif($v["disabled"]==0){?><a href="?file=<?=$file?>&action=disabled&disabled=1&userid=<?=$v["userid"]?>">锁定</a><?php }?> | <a href="javascript:confirmurl('?file=<?=$file?>&action=delete&userid=<?=$v["userid"]?>', '你确认撤销管理员“<?=$v['username']?>”吗？');">撤消</a><?php }?> </td>
    </tr>
    <?php }?>
  </table>
  <div id="pages"><?=$a->pages?></div>
  </form>
<script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});

</script>
</body>
</html>
