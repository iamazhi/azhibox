<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

<form name="myform" action="" method="post">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>����˻�Ա�б�</caption>
  <tr >
      <th width="5%">ѡ��</th>
      <th width="5%">ID</th>
      <th width="20%">�û���</th>
      <th width="10%">���ڵ���</th>
      <th width="15%">ע��ʱ��</th>
      <th width="15%">ע��IP</th>
      <th width="15%">�������</th>
     
    </tr>
    <?php foreach($info as $v) {?>
    <tr >
    <td class="align_c" ><input type="checkbox" name="userid[]" id="checkbox" value="<?=$v['userid']?>" /></td>
   
    <td class="align_c"><?=$v["userid"]?></td>
    <td class="align_c"><?=$v["username"]?></td>
    <td class="align_c"><? $ar=$a->get($table="area",$where="areaid=".$v["areaid"]."");echo $ar["name"];?></td>
    <td class="align_c"><?=date("Y-m-d H:i:s",$v["regtime"])?></td>
    <td class="align_c"><?=$v["regip"]?></td>
    <td class="align_c"><a href="?file=<?=$file?>&action=view&userid=<?=$v["userid"]?>&groupid=<?=$v["groupid"]?>&areaid=<?=$v["areaid"]?>&modelid=<?=$v["modelid"]?>">�鿴</a> | <a href="?file=<?=$file?>&action=note&userid=<?=$v["userid"]?>">��ע</a> | <a href="?file=<?=$file?>&action=edit&groupid=<?=$v["groupid"]?>&areaid=<?=$v["areaid"]?>&modelid=<?=$v["modelid"]?>&userid=<?=$v["userid"]?>">�޸�</a> </td>
     
    </tr>
    <?php }?>
    </table>
    <div class="button_box">
    <input type="button" value="ȫѡ" onClick="checkall()">
    <input type="submit"  name="dosubmit" value="������׼"> 
    <input type="button" name="delete" value="����ɾ��" onClick="myform.action='?file=<?=$file?>&action=delete';myform.submit();"> 

</div>
<div id="pages"><?=$a->pages?></div>
</form>

</body>
</html>