<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption>��ӻ�Ա��</caption>
    <tr >
    <th class="align_r" width="20%"><STRONG>���ƣ�</STRONG>
      </td>
    <td class="align_l"><input name="info[name]" type="text" value="<?=$info["name"]?>"size="30" require="true" datatype="limit" min="3" max="20" msg="�û�������������3���ַ�����20���ַ���"/></td>
    </tr>
   <tr >
    <th class="align_r" width="20%"><STRONG>������ܣ�</STRONG>
      </td><td class="align_l"><textarea name="info[description]" id="description"><?=$info["description"]?></textarea><?=form::editor('description', 'basic', '','100%', 350)?></td>
    </tr>
    
    <tr >
    <th class="align_r" width="20%"><STRONG>������ʣ�</STRONG>
      </td>
    <td class="align_l">
        <input type="radio" name="info[allowvisit]" value="1" id="1_0" <?=$info["allowvisit"]==1 ? "checked" :""?> >
        ��
        <input type="radio" name="info[allowvisit]" value="2" id="1_1" <?=$info["allowvisit"]==2 ? "checked" :""?>>
        ��</td>
    </tr>
    <tr >
    <th class="align_r" width="20%"><STRONG>����������</STRONG>
      </td>
    <td class="align_l">
        <input type="radio" name="info[allowsearch]" value="1" id="2_0" <?=$info["allowsearch"]==1 ? "checked" :""?>>
        ��
        <input type="radio" name="info[allowsearch]" value="2" id="2_1" <?=$info["allowsearch"]==2 ? "checked" :""?>>
        ��</td>
    </tr>
    <tr >
      <th class="align_r" width="20%"></td>
        <STRONG>��������</STRONG>
      <td class="align_l">
       <input type="radio" name="info[allowpost]" value="1" id="1_0" <?=$info["allowpost"]==1 ? "checked" :""?>>
        ��
        <input type="radio" name="info[allowpost]" value="2" id="1_1" <?=$info["allowpost"]==2 ? "checked" :""?>>
        ��</td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>�����Ա����������</STRONG>
      <td class="align_l">
        <input type="radio" name="info[allowupgrade]" value="1" id="1_0" <?=$info["allowupgrade"]==1 ? "checked" :""?>>
        ��
        <input type="radio" name="info[allowupgrade]" value="2" id="1_1" <?=$info["allowupgrade"]==2 ? "checked" :""?>>
        ��
        </td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>����۸�</STRONG><BR>
      <td class="align_l"><input type="text" name="info[price_y]" size="10" value="<?=$info["price_y"]?>"></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>���¼۸�</STRONG><BR>
      <td class="align_l"><input type="text" name="info[price_m]" size="10" value="<?=$info["price_m"]?>"></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>���ռ۸�</STRONG><BR>
      <td class="align_l"><input type="text" name="info[price_d]" size="10" value="<?=$info["price_d"]?>"></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>������Ϣ����</STRONG><BR>
      <td class="align_l"><input type="text" name="info[allowmessage]" size="10" value="<?=$info["allowmessage"]?>"></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>�Ƿ���ã�</STRONG><BR>
      <td class="align_l">
        <input type="radio" name="info[disabled]" value="1" id="1_0" <?=$info["disabled"]==1 ? "checked" :""?>>
        ��
        <input type="radio" name="info[disabled]" value="2" id="1_1" <?=$info["disabled"]==2 ? "checked" :""?>>
        ��
        </td>
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
</script>
</body>
</html>