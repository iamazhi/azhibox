<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption>��ӻ�Աģ��</caption>
    <tr >
    <th class="align_r" width="20%"><STRONG>��Աģ������:</STRONG>
      </td>
    <td class="align_l"><input name="model[name]" type="text" size="30" require="true" datatype="limit" min="3" max="20" msg="3��20���ַ������ð����Ƿ��ַ���"/> <font color="red">*</font></td>
    </tr>
   <tr >
    <th class="align_r" width="20%"><STRONG>��Աģ������:</STRONG>
      </td><td class="align_l"><textarea name="model[description]" cols="30" rows="10"></textarea></td>
    </tr>
    
    <tr >
    <th class="align_r" width="20%"><STRONG>���ݱ���:</STRONG>
      </td>
    <td class="align_l"><?=DB_PRE?>_member_<input type="text" name="model[tablename]" value="" size="10" require="true" datatype="limit" min="1" max="30" msg="��������Ϊ����1��С��30���ֽ���,���ð����Ƿ��ַ�! ��"/> <font color="red">*</font></td>
   
    <tr >
      <th class="align_r" width="20%"></td>
      <td class="align_l"><input name="model[workflowid]" type="hidden" value="2"><input name="model[disabled]" type="hidden" value="1"><input type="submit" name="dosubmit" value=" ȷ�� " /> <input type="reset" name="reset" value=" ��� "></td>
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