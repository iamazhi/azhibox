<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

 <form name="form" action="" method="get">
 <input name="file" type="hidden" value="<?=$file?>"><input name="action" type="hidden" value="<?=$action?>">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>��������</caption>
<tr>
  <td class="align_l"><a href="?file=<?=$file?>&action=manage">ȫ��</a> | 
<a href="?file=<?=$file?>&action=manage&status=0"><font color="red">������</font></a>
 | <a href="?file=<?=$file?>&action=manage&status=1"><font color="orange">�Ѹ���</font></a>
 | <a href="?file=<?=$file?>&action=manage&status=2"><font color="blue">�ѷ���</font></a>
 | <a href="?file=<?=$file?>&action=manage&status=3"><font color="green">���׳ɹ�</font></a>
 | <a href="?file=<?=$file?>&action=manage&status=4"><font color="gray">���׹ر�</font></a></td>

</tr>
 <tr>
   <td class="align_l">
   <select name="status"><? foreach($status as $k=>$v){?><option value="<?=$k?>"><?=$v?></option><? }?></select>
   �µ�ʱ�䣺<?=form::date('startdate')?> - <?=form::date('enddate')?>
   �����<input type="text" name="minamount" value="" size="10">~<input type="text" name="maxamount" value="" size="10">
   <select name="field">
    <option value="orderid" <?=$field=="orderid" ? "selected" :""?> >����ID</option>
    <option value="username" <?=$field=="username" ? "selected" :""?>>�û���</option>
   <option value="userid" <?=$field=="userid" ? "selected" :""?>>�û�ID</option>
   <option value="goodsname" <?=$field=="goodsname" ? "selected" :""?>>��Ʒ����</option>
   </select>
   <input type="text" name="q" value="<?=$q?>" size="">
   <select name="orderby">
    <option value="orderid desc">ID����</option>
    <option value="orderid asc">ID����</option>
   <option value="amount desc">����</option>
   <option value="amount asc">�������</option>
   </select>
   <input type="submit" value="��ѯ">
   </td>
  
 </tr>
    
</table>
</form>
<form name="myform" action="" method="post">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>�����б�</caption>
  <tr >
      <th width="3%">ѡ��</th>
      <th width="3%">ID</th>
      <th width="25%">��Ʒ����</th>
      <th width="5%">������</th>
      <th width="9%">�µ�ʱ��</th>
      <th width="5%">���</th>
      <th width="7%">״̬</th>
      <th width="10%">�������</th>
    </tr>
    <?php foreach($info as $v) {?>
    <tr >
    <td class="align_c" ><input type="checkbox" name="orderid[]" id="checkbox"value="<?=$v['orderid']?>" /></td>
   
    <td class="align_c"><?=$v["orderid"]?></td>
    <td class="align_l"><a href="<?=$v["goodsurl"]?>" target="_blank"><?=$v["goodsname"]?></a></td>
    <td class="align_c"><?=$v["amount"]?></td>
    <td class="align_c"><?=date("Y-m-d H:i:s",$v["time"])?></td>
    <td class="align_c"><?=$v["username"]?></td>
    <td class="align_c"><? if($v["status"]==0){?><font color="red">������</font><Br><a href="?file=<?=$file?>&action=status&status=4&orderid=<?=$v["orderid"]?>"><font color="red"><strong>ȡ������</strong></font></a><? }elseif($v["status"]==1){?><font color="#FF9900">�Ѹ���</font><br/><a href="?file=<?=$file?>&action=status&status=2&orderid=<?=$v["orderid"]?>"><font color="red"><strong>ȷ�Ϸ���</strong></font></a><? }elseif($v["status"]==2){?><font color="#0000FF">�ѷ���</font><? }elseif($v["status"]==3){?><font color="#006600">���׳ɹ�</font><? }elseif($v["status"]==4){?><font color="#999999">���׹ر�</font><? }?></td>
    <td class="align_c"><a href="?file=<?=$file?>&action=view&orderid=<?=$v["orderid"]?>">�鿴</a> | <? if($v["status"]==0){?><a href="?file=<?=$file?>&action=edit&orderid=<?=$v["orderid"]?>">�޸�</a><? }else{?><font color="#999999">�޸�</font><? }?> | <a href="?file=<?=$file?>&action=delete&orderid=<?=$v["orderid"]?>">ɾ��</a></td>
    </tr>
    <?php }?>
    </table>
    
    <div class="button_box"><input type="button" value="ȫѡ" onClick="checkall()">
   <input type="button" name="delete" value="����ɾ��" onClick="myform.action='?file=<?=$file?>&action=delete';myform.submit();"> 
   </div>
<div id="pages"><?=$a->pages?></div>
</form>

</body>
</html>