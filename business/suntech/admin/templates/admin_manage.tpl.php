<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require tpl('header');
?>
<body>
<table  align="center" cellpadding="0" cellspacing="1" class="table_list">
<caption>
    ����Ա����
    </caption>
    <tr>
    <td><a href="?file=<?=$file?>&action=add">��ӹ���Ա</a> | <a href="?file=<?=$file?>&action=manage">����Ա�б�</a> | <?php foreach($role as $k=>$v){?> <a href="?file=<?=$file?>&action=manage&roleid=<?=$v["roleid"]?>"><?=$v["name"]?></a> |<?php }?> </td>
    </tr>
</table>
<form action="" method="post">
  <table width="681" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption>
    ����Ա�б�
    </caption>

    <tr>
     <th class="align_c">ID</th>
     <th class="align_c">�û���</th>
     <th class="align_c">������ɫ</th>
     <th class="align_c">����¼IP</th>
     <th class="align_c">����¼ʱ��</th>
     <th class="align_c">��¼����</th>
     <th class="align_c">�������</th>
    </tr>
    <?php foreach($info as $v){?>
    <tr>
     <td class="align_c"><?=$v["userid"]?></td>
     <td class="align_c"><?=$v["username"]?></td>
     <td class="align_c"><?php foreach($ros as $r){ if($r["userid"]==$v["userid"]){?> <?php foreach($role as $ro){ if($ro["roleid"]==$r["roleid"]){?><?=$ro["name"]?><Br><?php }}}}?></td>
     <td class="align_c"><?=$v["lastloginip"]?></td>
     <td class="align_c"><?=date("Y-m-d H:i:s",$v["lastlogintime"])?></td>
     <td class="align_c"><?=$v["logintimes"]?></td>
     <td class="align_c"><?php if($v["userid"]==1){ echo "<font color='#999999'>�޸�</font> | <font color='#999999'>����</font> | <font color='#999999'>����</font>"; }else{ ?><a href="?file=<?=$file?>&action=edit&userid=<?=$v["userid"]?>">�޸�</a> | <?php if($v["disabled"]==1){?><a href="?file=<?=$file?>&action=disabled&disabled=0&userid=<?=$v["userid"]?>"><font color="#FF0000">����</font></a><?php } elseif($v["disabled"]==0){?><a href="?file=<?=$file?>&action=disabled&disabled=1&userid=<?=$v["userid"]?>">����</a><?php }?> | <a href="javascript:confirmurl('?file=<?=$file?>&action=delete&userid=<?=$v["userid"]?>', '��ȷ�ϳ�������Ա��<?=$v['username']?>����');">����</a><?php }?> </td>
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
