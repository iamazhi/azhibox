<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption>��ӹ��λ</caption>
    <tr >
    <th class="align_r" width="30%"><STRONG>���λ����</STRONG>
      </td>
    <td class="align_l"><input name="info[placename]" type="text" size="30" value="<?=$info["placename"]?>" equire="true" datatype="limit" min="1" max="16" msg="���λ���Ʋ��ܿգ�"/>  <font color="red">*</font></td>
    </tr>
   <tr >
    <th class="align_r" width="30%"><STRONG>���λ����</STRONG>
      </td>
    <td class="align_l"><input name="info[introduce]" type="text" size="50" value="<?=$info["introduce"]?>"/></td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><STRONG>���۸�</STRONG>
      </td>
    <td class="align_l"><input type="text" name="info[price]" value="<?=$info["price"]?>" size="8">Ԫ/�� </td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><STRONG>���λģ��</STRONG>
      </td>
    <td class="align_l">&nbsp;</td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><STRONG>���λ���</STRONG>
      </td>
    <td class="align_l"><input type="text" name="info[width]" value="<?=$info["width"]?>" size="8">px</td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><STRONG>���λ�߶�</STRONG>
    <td class="align_l"><input type="text" name="info[height]" value="<?=$info["height"]?>" size="8">px</td>
    </tr>
    <tr >
    <th class="align_r" width="30%"></td>
      <STRONG>������ʱ</STRONG>      <td class="align_l"><input type="radio" name="info[option]" value="1" id="s1_0" <?=$info["option"]==1 ? "checked" :""?>>ȫ���г�
        <input type="radio" name="info[option]" value="0" id="s1_1" <?=$info["option"]=="0" ? "checked" :""?>>����г�һ��</td>
    </tr>
    <tr >
    <th class="align_r" width="30%"></td>
      <STRONG>�Ƿ�����</STRONG>      
      <td class="align_l"><input type="radio" name="info[passed]" value="1" id="3_0" <?=$info["passed"]==1 ? "checked" :""?>>��
        <input type="radio" name="info[passed]"  id="3_1" value="0" id="3_0" <?=$info["passed"]==0 ? "checked" : "" ?> >��</td>
    </tr>
    <tr >
      <th class="align_r" width="30%"></td>
      <td class="align_l"><input type="submit" name="dosubmit" value=" ȷ�� " /> <input type="reset" name="reset" value=" ��� "></td>
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