<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption>����Ƽ�λ</caption>
   
   <tr>
     <th class="align_r" width="25%"><font color="red">*</font> <STRONG>�Ƽ�λ����</STRONG></th>
     <Td class="align_l"><input type="text" name="info[name]" value="<?=$info["name"]?>" size="30" require="true" datatype="require" msg="����д�Ƽ�λ����" /></Td>
   </tr>
   
   <tr>
     <th class="align_r"><font color="red">*</font> <STRONG>����Ȩֵ</STRONG></th>
     <Td class="align_l"><input type="text" name="info[listorder]" size="5" value="<?=$info["listorder"]?>"require="true" datatype="number" msg="����Ϊ����" msgid="point"/><span id="point"/></Td>
   </tr>
   
   <tr>
     <th class="align_r"><STRONG>ӵ���Ƽ�Ȩ�޵Ľ�ɫ</STRONG></th>
     <Td class="align_l"><? foreach($infos as $r){?><input boxid="roleids" name="roleids[]" id="roleids"  type="checkbox" value="<?=$r["roleid"]?>" <? foreach($roles as $v){ if($r["roleid"]==$v["roleid"]) {echo "checked";} }?> ><?=$r['name']?><? }?> </Td>
   </tr>
   
   <tr>
     <td class="align_r"></td>
     <Td class="align_l"><input type="submit" name="dosubmit" value="ȷ��"> <input type="reset" name="reset" value="���" /></Td>
   </tr>
 
    </table>
   
</form>
<script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});

</script>
</body>
</html>