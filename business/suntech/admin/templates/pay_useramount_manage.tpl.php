<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

 <form name="form" action="" method="get">
 <input name="file" type="hidden" value="<?=$file?>"><input name="action" type="hidden" value="<?=$action?>">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>��ѯ���׼�¼</caption>
<tr>
  <th class="align_c" width="8%">��Ա��</th>
  <th class="align_c" width="10%">����ʱ��</th>
  <th class="align_c" width="5%">����Ա</th>
  <th class="align_c" width="10%">���ʱ��</th>
  <th class="align_c" width="8%">֧����ʽ</th>
  <th class="align_c" width="8%">����״̬</th>
  <th class="align_c" width="5%">����</th>
</tr>
 <tr>
   <td class="align_c"><input type="text" name="username" size="15" value="<?=$_GET["username"]?>"></td>
   <td class="align_c"><?=form::date('beginadddate')?> - <?=form::date('enddaddate')?></td>
   <td class="align_c"><input type="text" name="inputer"  size="10"></td>
   <td class="align_c"><?=form::date('begindate')?> - <?=form::date('enddate')?></td>
   <td class="align_c"><select name="payname">
                       <? foreach($payment as $r){?>
                       <option value="<?=$r["pay_name"]?>"><?=$r["pay_name"]?></option>
                       <? }?></select></td>
   <td class="align_c"><select name="ispay"><option>����״̬</option><option value="1">�Ѿ���</option><option value="0">δȷ��</option></select></td>
   <td class="align_c"><input type="submit" value="����"></td>
 </tr>
    
</table>
</form>
<form name="myform" action="" method="post">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>�����б�</caption>
  <tr >
      <th width="5%">ȫѡ</th>
      <th width="7%">��Ա����</th>
      <th width="7%">����ʱ��</th>
      <th width="7%">֧����</th>
      <th width="5%">�ʽ�</th>
      <th width="10%">֧����ʽ</th>
      <th width="7%">����״̬</th>
      <th width="10%">����Ա</th>
      <th width="10%">���ʱ��</th>
      <th width="10%">����</th>
    </tr>
    <?php foreach($info as $v) {?>
    <tr >
    <td class="align_c" ><input type="checkbox" name="ids[]" id="checkbox"value="<?=$v['id']?>" /></td>
   
    <td class="align_c"><?=$v["username"]?></td>
    <td class="align_c"><?=date("Y-m-d",$v["addtime"])?></td>
    <td class="align_c"><?=$v["sn"]?></td>
    <td class="align_c"><?=$v["amount"]?></td>
    <td class="align_c"><?=$v["payment"]?></td>
    <td class="align_c"><?=$v["ispay"]==1 ? "<font color=red>�Ѿ���</font>" : "δȷ��"?></td>
    <td class="align_c"><?=$v["inputer"]?></td>
    <td class="align_c"><?=$v["paytime"]==0 ? "" : date("Y-m-d",$v["paytime"])?></td>
    <td class="align_c"><? if($v["ispay"]==1) {echo "<a href='?file=$file&action=view&id=$v[id]'><font color=red>�鿴</font></a>";}else{ ?> <a href="javascript:if(confirm('ȷ��Ҫ�����')) location='?file=useramount&action=check&id=<?=$v["id"]?>'">���</a><? }?> <a href="">ɾ��</a></td>
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