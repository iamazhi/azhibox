<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

 <form name="form" action="" method="get">
 <input name="file" type="hidden" value="<?=$file?>"><input name="action" type="hidden" value="<?=$action?>">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption>������������</caption>
<tr>
  <th class="align_c">
 
   <b>��ʾѡ�</b>
        <input name="passed" type="radio" value="1" id="1_0" <?php if(!$passed and !$elite or $passed==1){echo "checked";}?> onClick="location='?file=<?=$file?>&action=<?=$action?>&passed=1&name=<?=$name?>'" >
        <A href="?file=<?=$file?>&action=<?=$action?>&passed=1&name=<?=$name?>">����˵�����</a>
        <input name="passed" type="radio" value="2"  id="1_1"<?=$passed==2 ? "checked":""?> onClick="location='?file=<?=$file?>&action=<?=$action?>&passed=2&name=<?=$name?>'">
        <A href="?file=<?=$file?>&action=<?=$action?>&passed=2&name=&elite">δ��˵�����</a>
          
           <input name="elite" type="radio" id="1_2" value="1" <?php if($elite==1){echo "checked";}?> onClick="location='?file=<?=$file?>&action=<?=$action?>&name=<?=$name?>&elite=1'">
           <a href="?file=<?=$file?>&action=<?=$action?>&name=<?=$name?>&elite=1">�Ƽ�����</a> 
          
         
           �ؼ��֣�<input name="name" type="text" value="<?=$name?>">   <input type="submit" name="dosubmit" value="����" /></td>
           
      </th>
</tr>
    
</table>
</form>
<form name="myform" action="" method="post">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>������������</caption>
  <tr >
      <th width="5%">ѡ��</th>
      <th width="5%">����</th>
      <th width="20%">��վ����</th>
      <th width="10%">��������</th>
      <th width="10%">��������</th>
      <th width="10%">�������</th>
      <th width="20%">����</th>
    </tr>
    <?php foreach($info as $value) {?>
    <tr >
    <td class="align_c"><input type="checkbox" name="focusid[]" value="<?=$value['focusid']?>" /></td>
    <td class="align_c"><input type="text" name="listorders[<?=$value['focusid']?>]" value="<?=$value['listorder']?>" size="4" /></td>
    <td class="align_c"><a href="<?=$value["url"]?>" target="_blank"><?=output::style($value['name'], $value['style'])?></a> <font color="red"><?=$value["elite"]==1 ?" �Ƽ�" : "" ?></font></td>
  
    <td class="align_c"><? $k=$a->get($table='category',$where="menuid=".$value["typeid"]."");?><a href="?file=<?=$file?>&action=<?=$action?>&typeid=<?=$value["typeid"]?>&passed=<?=$value["passed"]?>"><?=$k["name"]?></a></td>
    <td class="align_c">ͼƬ</td>
    <td class="align_c"><?=$value["hits"]?></td>
    <td class="align_c"><a href="?file=<?=$file?>&action=edit&focusid=<?=$value["focusid"]?>&typeid=<?=$value["typeid"]?>">�޸�</a> | <?php if($value["elite"]==1){?><a href="?file=<?=$file?>&action=hot&elite=2&focusid=<?=$value["focusid"]?>">ȡ���Ƽ�</a><?php }else{?><a href="?file=<?=$file?>&action=hot&elite=1&focusid=<?=$value["focusid"]?>">�Ƽ�����</a><?php }?></td>
    </tr>
    <?php }?>
    </table>
    <div class="button_box"><span style="width:60px"><a href="###" onClick="javascript:$('input[type=checkbox]').attr('checked', true)">ȫѡ</a>/<a href="###" onClick="javascript:$('input[type=checkbox]').attr('checked', false)">ȡ��</a></span>
   <input type="button" name="listorder" value="��������" onClick="myform.action='?file=<?=$file?>&action=listorder';myform.submit();"> 
   <input type="button" name="delete" value="ɾ������" onClick="myform.action='?file=<?=$file?>&action=delete';myform.submit();"> 
   <?php if($passed==1){?>
   <input type="button" name="delete" value="ȡ�����" onClick="myform.action='?file=<?=$file?>&action=passed_break';myform.submit();"> 
   <?php }else{?>
   <input type="button" name="delete" value="�������" onClick="myform.action='?file=<?=$file?>&action=passed';myform.submit();"> 
   <?php }?>
   <input type="button" name="delete" value="�Ƽ�����" onClick="myform.action='?file=<?=$file?>&action=hotlink';myform.submit();"> 
   <input type="button" name="delete" value="ȡ���Ƽ�" onClick="myform.action='?file=<?=$file?>&action=hotlink_break';myform.submit();"> 

</div>
<div id="pages"><?=$a->pages?></div>
</form>

</body>
</html>