<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption>��Ӳ���</caption>
    <tr >
    <th class="align_r" width="20%"><STRONG>��������:</STRONG>
      </td>
    <td class="align_l">
        <input name="typeid" type="radio" id="1_0" value="1" checked>
        ���(+)   
        <input type="radio" name="typeid" value="2" id="1_1">
      �ۿ�(-)  </td>
    </tr>
   <tr >
    <th class="align_r" width="20%"><STRONG>��ֵ����:</STRONG>
      </td><td class="align_l">
        <input name="info[type]" type="radio" id="2_0" value="amount" onclick="javascript:change(1);" checked />
        �ʽ�  
        <input type="radio" name="info[type]" value="point" id="2_1"onclick="javascript:change();"/>
        ����  </td>
    </tr>
    
    <tr >
    <th class="align_r" width="20%"><STRONG><font color="red">*</font>�û���:</STRONG>
      </td>
    <td class="align_l"><input type="text" name="info[username]" require="false" datatype="limit|ajax" url="?file=<?=$file?>&action=checkuser" min="3" max="20" msg="�û�����������3���ַ�����20���ַ� ��"/></td>
   
    <tr >
      <th class="align_r"><STRONG>����:</STRONG>          
      <td class="align_l"><input type="text" name="info[number]" size="10" require="true" datatype="currency|limit" min="1" max="16" msg="���������֣�">&nbsp;<font id = "numberid" name="numberid" style="color:red">Ԫ</font><span id="code1"></span></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>��������:</STRONG>    
      <td class="align_l"><textarea name="info[note]" cols="30" rows="10"></textarea></td>
    </tr>
    <tr >
      <th class="align_r" width="20%"></td>
      <td class="align_l"><input type="submit" name="dosubmit" value=" ȷ�� " /> <input type="reset" name="reset" value=" ��� "></td>
    </tr>
    </table>
</form>
<script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});
function change(msg)
{
    if(msg == 1)
    {
        $('#numberid').html("Ԫ");
    }
    else
    {
        $('#numberid').html("��");
    }
}
$().ready(function() {
	  $('form').checkForm(1);
	});
</script>
</body>
</html>