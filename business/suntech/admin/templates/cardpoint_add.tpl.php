<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>


<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption>��ӵ㿨����</caption>
   
   <tr>
     <th class="align_r" width="25%"><STRONG>����</STRONG></th>
     <Td class="align_l"><input type="text" name="info[name]" value="" size="30" require="true" datatype="require" msg="����д��������" /></Td>
   </tr>
   
   <tr>
     <th class="align_r"><STRONG>����</STRONG></th>
     <Td class="align_l"><input type="text" name="info[point]" size="10"require="true" datatype="number" msg="����Ϊ����" msgid="point"/> ��<span id="point"/></Td>
   </tr>
   
   <tr>
     <th class="align_r"><STRONG>�۸�</STRONG></th>
     <Td class="align_l"><input type="text" name="info[amount]" value="" size="10" require="true" datatype="number" msg="����Ϊ����" msgid="amount"/> Ԫ<span id="amount"/></Td>
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