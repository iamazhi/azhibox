<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

<form name="myform" action="?file=<?=$file?>&action=passed" method="post">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>������λ</caption>
  <tr >
      <th width="5%">����</th>
      <th width="10%">��Ա��</th>
      <th width="25%">����</th>
      <th width="5%">��Ա��</th>
      <th width="5%">����</th>
      <th width="5%">����</th>
      <th width="5%">ϵͳ��</th>
      <th width="15%">�������</th>
     
    </tr>
    <?php foreach($info as $value) {?>
    <tr >
    <td class="align_c" ><input type="text" name="listorders[<?=$value['groupid']?>]" value="<?=$value['listorder']?>" size="4" /></td>
   
    <td class="align_c"><?=$value["name"]?></td>
    <td class="align_l"><?=$value["description"]?></td>
    <td class="align_c"><?php $r=$db->get_one("SELECT count(*) AS number FROM ".DB_PRE."member where groupid=".$value["groupid"]."");
	                       $number = $r['number'];echo "<strong>$number</strong>";?></td>
    <td class="align_c"><?=$value["allowpost"]==1 ? "<font color=red>��</font>" :""?></td>
    <td class="align_c"><?=$value["allowvisit"]==1 ? "<font color=red>��</font>" :""?></td>
    <td class="align_c"><?=$value["issystem"]==1 ? "<font color=red>��</font>" :""?></td>
    <td class="align_c"><a href="?file=<?=$file?>&action=group_edit&groupid=<?=$value["groupid"]?>">�޸�</a> |<?php if($value["issystem"]==1){?> <font color="#999999">����</font> | <font color="#999999">ɾ��</font><?php }else{?> <?php if($value["disabled"]==1){?><a href="?file=<?=$file?>&action=group_disabled&groupid=<?=$value["groupid"]?>&disabled=2">����</a><? }else{?><a href="?file=<?=$file?>&action=group_disabled&groupid=<?=$value["groupid"]?>&disabled=1"><font color="#0000FF">����</font></a><?php }?> | <a href="?file=<?=$file?>&action=group_delete&groupid=<?=$value["groupid"]?>">ɾ��</a> <?php }?></td>
     
    </tr>
    <?php }?>
    </table>
    <div class="button_box">
   <input type="button" name="listorder" value="����" onClick="myform.action='?file=<?=$file?>&action=group_listorder';myform.submit();"> 
  

</div>
<div id="pages"><?=$a->pages?></div>
</form>

</body>
</html>