<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

 <form name="form" action="" method="get">
 <input name="file" type="hidden" value="<?=$file?>"><input name="action" type="hidden" value="<?=$action?>">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption>���λ��ѯ</caption>
<tr>
  <th class="align_c">
 
  <input name="passed" type="radio" value="" id="1_0" <?php if(!$passed or $passed==""){echo "checked";}?> onClick="location='?file=<?=$file?>&action=<?=$action?>'" >ȫ��
        <input name="passed" type="radio" value="1"  id="1_1"<?=$passed==1 ? "checked":""?> onClick="location='?file=<?=$file?>&action=<?=$action?>&passed=1&name=<?=$name?>'">����
        <input name="passed" type="radio" value="2"  id="1_2"<?=$passed==2 ? "checked":""?> onClick="location='?file=<?=$file?>&action=<?=$action?>&passed=2&name=<?=$name?>'">
        ����                          
       
          <select name="select" id="select">
            <option value="placename" <?=$select=="placename" ? "selected":""?>>����</option>
            <option value="introduce" <?=$select=="introduce" ? "selected":""?>>����</option>
            <option value="placeid" <?=$select=="placeid" ? "selected":""?>>ID</option>
          </select>
        
<input name="name" type="text" value="<?=$name?>">
<input type="submit" name="dosubmit" value="����" /></td>
           
      </th>
</tr>
    
</table>
</form>
<form name="myform" action="?file=<?=$file?>&action=passed" method="post">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>������λ</caption>
  <tr >
      <th width="5%">ѡ��</th>
      <th width="15%">���λ����</th>
      <th width="18%">����</th>
      <th width="10%">�ߴ�</th>
      <th width="5%">״̬</th>
      <th width="5%">�����</th>
      <th width="7%">�۸�</th>
      <th width="20%">�������</th>
    </tr>
    <?php foreach($info as $value) {?>
    <tr >
    <td class="align_c" ><input type="checkbox" name="placeid[]" id="checkbox"value="<?=$value['placeid']?>" /></td>
   
    <td class="align_c"><?=$value["placename"]?></td>
    <td class="align_c"><?=$value["introduce"]?></td>
    <td class="align_c"><?=$value["width"]?>��<?=$value["height"]?></td>
    <td class="align_c"><?=$value["passed"]==1 ? "<font color=#006600>����</font>": ""?><?=$value["passed"]==2 ? "<font color=red>����</font>": ""?></td>
    <td class="align_c"><?=$value["items"]?></td>
    <td class="align_c"><?=$value["price"]?></td>
    <td class="align_c"><a href="?file=ads&action=add&placeid=<?=$value["placeid"]?>">��ӹ��</a> | <a href="?file=ads&action=manage&expired=&placeid=<?=$value["placeid"]?>">����б�</a> | <a href="?file=<?=$file?>&action=edit&placeid=<?=$value["placeid"]?>">�༭</a> | <a href="?file=<?=$file?>&action=loadjs&placeid=<?=$value["placeid"]?>">���ô���</a></td>
    </tr>
    <?php }?>
    </table>
    <div class="button_box"><input type="button" value="ȫѡ" onClick="checkall()">
  
   <input type="submit"  name="passed2" value="��������"> 
  
   <input type="submit" name="passed1" value="��������"> 
   
   <input type="button" name="delete" value="����ɾ��" onClick="myform.action='?file=<?=$file?>&action=delete';myform.submit();"> 
  

</div>
<div id="pages"><?=$a->pages?></div>
</form>

</body>
</html>