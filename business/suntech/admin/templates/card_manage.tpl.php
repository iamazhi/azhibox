<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<table  cellpadding="1" align="center"  cellspacing="1" class="table_list">
<caption>��ѯ�㿨</caption>
<tr>
  <Td><a href="?file=<?=$file?>&action=manage">ȫ���㿨</a> | <a href="?file=<?=$file?>&action=manage&status=1">δʹ�õĵ㿨</a> | <a href="?file=<?=$file?>&action=manage&status=2">��ʹ�õĵ㿨</a> </Td>
</tr>
</table>

<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>����㿨</caption>
    <tr >
    <th class="align_c" width="5%">ѡ��</th>
    <th width="10%">����</th>
    <th width="5%">����</th>
    <th width="5%">��ֵ</th>
    <th width="5%">����</th>
    <th width="10%">������</th>
    <th width="10%">������</th>
    <th width="10%">ʹ����</th>
    <th width="10%">��������</th>
    <th width="10%">��ֵ����</th>
    <th width="10%">����IP</th>
    <th width="10%">״̬</th>
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
     <Td class="align_c"><?=$v["status"]==1 ? "<font color=red>��ʹ��</font>" : "δʹ��"?></Td>
   </tr>
   <? }?>
    </table>
    <div class="button_box"><input type="button" value="ȫѡ" onClick="checkall()"> 
    <input type="button" name="delete" value="ɾ��" onClick="myform.action='?file=<?=$file?>&action=delete';myform.submit();"> </div>
    <div id="pages"><?=$a->pages?></div>
</form>
<script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});

</script>
</body>
</html>