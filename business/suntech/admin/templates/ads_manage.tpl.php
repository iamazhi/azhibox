<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

 <form name="form" action="" method="get">
 <input name="file" type="hidden" value="<?=$file?>"><input name="action" type="hidden" value="<?=$action?>">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>���λ��ѯ</caption>
  <tr>
  <th>���λ</th>
  <th>���״̬</th>
  <th>���״̬</th>
  <th>�ͻ�״̬</th>
  <th>�ͻ���</th>
  <th>����</th>
  </tr>
<tr>
<td width="15%" class="align_c">ѡ����λ<select name="placeid" id="placeid" onChange="location='?file=<?=$file?>&action=<?=$action?>&expired=<?=$expired?>&placeid='+this.value">                                            <option value="">ѡ����λ</option>
<? foreach($into as $v) {?><option value="<?=$v["placeid"]?>" <?=$v["placeid"]==$placeid ? "selected" :""?>><?=$v["placename"]?></option><? }?></select></td>
  <td class="align_c">
  <input name="expired" type="radio" id="3_0" onClick="location='?file=<?=$file?>&action=<?=$action?>&placeid=<?=$placeid?>&expired=3'" value="3" <?=$expired==3 ? "checked":""?>>
  �ȴ�����б�
<input name="expired" type="radio" value="1" id="3_1" onClick="location='?file=<?=$file?>&action=<?=$action?>&placeid=<?=$placeid?>&expired=1'" <?=$expired==1 ? "checked": !$expired ?"checked" :""?>>
  ��������б�
  <input name="expired" type="radio" value="2" id="3_2" onClick="location='?file=<?=$file?>&action=<?=$action?>&placeid=<?=$placeid?>&expired=2'" <?=$expired==2 ? "checked":""?>>���ڹ���б�
  </td>
  <td class="align_c">
  <input name="passed" type="radio" value="1" id="4_0" <?=$passed==1 ? "checked" :""?>>���
  <input name="passed" type="radio" value="2" id="4_1" <?=$passed==2 ? "checked" :""?>>δ���
  </td>
  
  <td class="align_c">
 
  <input name="status" type="radio" value="1" id="1_0" <?=$status==1 ? "checked" :""?>>����
  <input name="status" type="radio" value="2" id="1_1" <?=$status==2 ? "checked" :""?>>�ر�                                
       
         
   <td>     
<input name="name" type="text" value="<?=$name?>"></td>
<td><input type="submit" name="dosubmit" value="����" /></td>
           
      </td>
</tr>
    
</table>
</form>
<form name="myform" action="?file=<?=$file?>&action=passed" method="post">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>������λ</caption>
  <tr >
      <th width="5%">ѡ��</th>
      <th width="15%">���λ����</th>
      <th width="15%">�������λ</th>
      <th width="6%">��ǰ�ͻ�</th>
      <th width="7%">��ʼ����</th>
      <th width="7%">��������</th>
      <th width="7%">���</th>
      <th width="10%">�ͻ�״̬</th>
      <th width="10%">�������</th>
    </tr>
    <?php foreach($info as $value) {?>
    <tr >
    <td class="align_c" ><input type="checkbox" name="adsid[]" id="checkbox" value="<?=$value['adsid']?>" /></td>
   
    <td class="align_c"><?=$value["adsname"]?></td>
    <td class="align_c"><? $placename=$a->get($table='ads_place',$where="placeid=".$value["placeid"]."");?><?=$placename["placename"]?></td>
    <td class="align_c"><?=$value["username"]?></td>
    <td class="align_c"><?=date("Y.m.d",$value["fromdate"])?></td>
    <td class="align_c"><?=date("Y.m.d",$value["todate"])?></td>
    <td class="align_c"><?=$value["passed"]==1 ? "<font color=grenn>���</font>" :"<font color=red>δͨ��</font>"?></td>
    <td class="align_c"><?=$value["status"]==1 ? "<font color=grenn>����</font>" :"<font color=red>�ر�</font>"?></td>
     <td class="align_c"> <a href="?file=<?=$file?>&action=edit&adsid=<?=$value["adsid"]?>&placeid=<?=$value["placeid"]?>">�޸�</a> </td>
     
    </tr>
    <?php }?>
    </table>
    <div class="button_box"><input type="button" value="ȫѡ" onClick="checkall()">
  
   <input type="submit"  name="passed2" value="�������ȡ��"> 
  
   <input type="submit" name="passed1" value="�������ͨ��"> 
   
   <input type="button" name="delete" value="����ɾ��" onClick="myform.action='?file=<?=$file?>&action=delete';myform.submit();"> 
  

</div>
<div id="pages"><?=$a->pages?></div>
</form>

</body>
</html>