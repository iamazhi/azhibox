<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require tpl('header');
?>
<SCRIPT LANGUAGE="JavaScript">
<!--

function alterUC(eID) {
	$("#table tbody").hide();
	$("#"+eID).show();
}

//-->
</SCRIPT>
<body>
<?php ?>
<form action="" name="myform" method="post">
  <table  align="center" cellpadding="0" cellspacing="1" class="table_form">
    <caption class="align_c">����Զ������</caption>
    <tr>
      <th class="align_r" width="25%"><strong>�������ƣ�</strong></th>
      <td><input type="text" name="info[varname]" size="15" require="true" datatype="limit|ajax" url="?file=<?=$file?>&action=varname" min="3" max="15" msg="���Ʊ���,��������3���ַ�����20���ַ� ��"></td>
       
    </tr>
    <tr>
      <th class="align_r"><strong>���ͣ�</strong></th>
      <td>
        <input name="info[type]" type="radio" value="0" onClick="alterUC('var')" checked>�Զ������
        <input name="info[type]" type="radio" value="1" onClick="alterUC('tag')">�Զ����ǩ
        </td>
    </tr>
    <tr>
      <th class="align_r"><strong>�Զ�����룺</strong><br/>������'�������壬����""�ţ����ã�</th>
      <td>
      <table cellpadding="0" cellspacing="0" id="table">
       <tbody id="var" style="display:none">
       <tr>
       <td><textarea name='info[showvar]' cols='84' rows='1'></textarea></td>
       </tr>
       </tbody>
       
       <tbody id="tag" style="display:none">
       <tr>
       <td><textarea name='info[showtag]' cols='84' rows='15'></textarea></td>
       </tr>
       </tbody>
       </table>
       
      </td>
    </tr>
    
    <tr>
    <Td></Td>
    <td> <input type="submit" name="dosubmit" value=" ��� ">&nbsp;&nbsp;&nbsp;&nbsp;
 <input type="reset" name="submit" value=" ���� ">&nbsp;&nbsp;&nbsp;&nbsp;
</td>
    </tr>
  </table>

</form>
</body>
</html>
<script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});
alterUC('var');
</script>