<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

 <form name="form" action="" method="get">
 <input name="file" type="hidden" value="<?=$file?>"><input name="action" type="hidden" value="<?=$action?>">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>��Ա����</caption>
  <tr>
  <td>��Աģ�ͣ�<?php foreach($model as $s){?><a href="?file=<?=$file?>&action=<?=$action?>&modelid=<?=$s["modelid"]?>"><?=$s["name"]?></a> <?php } ?></td>
  </tr>
  
  <tr>
  <td>����Ա�飺<?php foreach($group as $g){?><?php if($g["issystem"]==1){?><a href="?file=<?=$file?>&action=<?=$action?>&groupid=<?=$g["groupid"]?>"><?=$g["name"]?></a> <?php }} ?></td>
  </tr>
  
  <tr>
  <td>��չ��Ա�飺<?php foreach($group as $g){?><?php if($g["issystem"]==2){?><a href="?file=<?=$file?>&action=<?=$action?>&groupid=<?=$g["groupid"]?>"><?=$g["name"]?></a> <?php }} ?></td>
  </tr>
    
</table>
</form>
<form name="myform" action="" method="post">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>��Ա�б�</caption>
  <tr >
      <th width="5%">ѡ��</th>
      <th width="10%">�û��� </th>
      <th width="15%">��Ա��</th>
      <th width="6%">��Աģ��</th>
      <th width="7%">�ʽ� </th>
      <th width="7%">����</th>
      <th width="10%">����¼</th>
      <th width="20%">�������</th>
    </tr>
    <?php foreach($info as $value) {?>
    <tr >
    <td class="align_c" ><input type="checkbox" name="userid[]" id="checkbox" value="<?=$value['userid']?>" /></td>
   
    <td class="align_c"><a href="?file=<?=$file?>&action=view&userid=<?=$value["userid"]?>&groupid=<?=$value["groupid"]?>&areaid=<?=$value["areaid"]?>&modelid=<?=$value["modelid"]?>"><?=$value["username"]?></a></td>
    <td class="align_c"><?php $groupname=$a->get($table='member_group',$where="groupid=".$value["groupid"]."");?><?=$groupname["name"]?></td>
    <td class="align_c"><?php $modelid=$a->get($table='model',$where="modelid=".$value["modelid"]."");?><?=$modelid["name"]?></td>
    <td class="align_c"><?=$value["amount"]?></td>
    <td class="align_c"><?=$value["point"]?></td>
    <td class="align_c"><?php $log=$a->get($table='member_info',$where="userid=".$value["userid"]."");?><?=$log["lastlogintime"]==0 ? "" : date("Y-m-d H:i:s",$log["lastlogintime"])?></td>
     <td class="align_c"> <a href="?file=<?=$file?>&action=edit&groupid=<?=$value["groupid"]?>&areaid=<?=$value["areaid"]?>&modelid=<?=$value["modelid"]?>&userid=<?=$value["userid"]?>">�޸�</a> | <a href="?file=<?=$file?>&action=note&userid=<?=$value["userid"]?>">��ע</a> | <?php 
	                                                     if($adminid["adminid"]==$value["username"]) 
	 {?><font color="#999999">����</font> | <font color="#999999">ɾ��</font> <?php }else{ ?><?php if($value["disabled"]==1){?><a href="?file=<?=$file?>&action=disabled&disabled=2&userid=<?=$value["userid"]?>">����</a><?php }else{?><a href="?file=<?=$file?>&action=disabled&disabled=1&userid=<?=$value["userid"]?>"><font color="#0000FF">����</font></a><?php }?> | <a href="javascript:confirmurl('?file=<?=$file?>&action=delete&userid=<?=$value["userid"]?>','ȷ��ɾ����')">ɾ��</a> <?php }?></td>
     
    </tr>
    <?php }?>
    </table>
    <div class="button_box"><input type="button" value="ȫѡ" onClick="checkall()">
  
   <input type="submit"  name="disabled2" value="��������" onClick="myform.action='?file=<?=$file?>&action=disabled';myform.submit();"> 
  
   <input type="submit" name="disabled1" value="��������" onClick="myform.action='?file=<?=$file?>&action=disabled';myform.submit();"> 
   
   <input type="button" name="delete" value="����ɾ��" onClick="myform.action='?file=<?=$file?>&action=delete';myform.submit();"> 
  

</div>
<div id="pages"><?=$a->pages?></div>
</form>
<form action="" method="get">
<input name="file" type="hidden" value="<?=$file?>"><input name="action" type="hidden" value="<?=$action?>">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
<caption>��Ա����</caption>
<tr>
  <td class="align_c">��Ա�飺��ѡ��<select name="groups"/>
     <?php foreach($group as $v){?> <option value="<?=$v["groupid"]?>" <?=$v["groupid"]==$groups ? "selected":""?> ><?=$v["name"]?></option><?php }?>
      </select>
      ״̬��<select name="disabled"/>
      <option value="">����</option>
      <option value="1" <?=$disabled==1 ?"selected":""?>>����</option>
      <option value="2" <?=$disabled==2 ?"selected":""?>>����</option>
      
      </select>��Ա����<input type="text" name="username" value="<?=$username?>"> <input type="submit" name="search" value="����">
      </td>
</tr>
</table>

</body>
</html>
