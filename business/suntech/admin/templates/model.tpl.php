<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<body>
<form action="" method="post">
  <table width="664" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption>
    ���ܹ���
    </caption>
    <tr>
      <th width="45"class="align_c">����</th>
      <th width="208">����</th>
      <th width="104">���ݿ��</th>
      <th width="54">����</th>
      <th width="245">�������</th>
    </tr>
    
<?php if(is_array($infos)) {foreach($infos as $val){?>
    <tr>
      <td class="align_c"><?=$val["name"]?></td>
      <td class="align_c"><?=$val["description"]?></td>
      <td class="align_l"><?=DB_PRE?>c_<?=$val["tablename"]?></td>
      <td class="align_c"><?php if($val["auditing"]==1){echo"<font color=#ff0000>��</font>";}elseif($val["auditing"]==2){echo "��";}?></td>
      <td class="align_c"><a href="?file=model_field&action=manage&modelid=<?=$val["modelid"]?>">�ֶι���</a> | <?php if($val["employ"]==1) {echo "<a href='?file=model&action=employ&model=".$val["modelid"]."&type=1'>����</a>";}elseif($val["employ"]==2) {echo"<a href='?file=model&action=employ&model=".$val["modelid"]."&type=2'><font color=#FF0000>����</font></a>";}?> | <a href="?file=model&action=edit&model=<?=$val["modelid"]?>">�޸�</a> | <? if($val["modelid"]==9){?><font color="#999999">ɾ��</font><? }else{?><a href=javascript:confirmurl("?file=model&action=delete&model=<?=$val["modelid"]?>","ȷ��Ҫɾ����<?=$val["name"]?>��ģ����")>ɾ��</a><? }?></td>
    </tr>
<?php }}?>


  </table>
<div id="pages"><?=$a->pages?></div>


</form>
</body>
</html>
