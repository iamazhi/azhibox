<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>


<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>����㿨����</caption>
    <tr >
    <th class="align_c" width="3%">ѡ��</th>
    <th width="3%">ID</th>
    <th width="10%">����</th>
    <th width="5%">����</th>
    <th width="5%">�۸�</th>
    <th width="10%">����</th>
    </tr>
    <? foreach($info as $v) {?>
   <tr>
     <Td class="align_c"><input type="checkbox" name="ptypeid[]" id="checkbox"value="<?=$v['ptypeid']?>" /></Td>
     <Td class="align_c"><?=$v["ptypeid"]?></Td>
     <Td class="align_c"><?=$v["name"]?></Td>
     <Td class="align_c"><?=$v["point"]?></Td>
     <Td class="align_c"><?=$v["amount"]?></Td>
     <Td class="align_c"><a href="?file=<?=$file?>&action=edit&ptypeid=<?=$v["ptypeid"]?>">�޸�</a></Td>
 
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