<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<body>
<form action="?file=category&action=add&gory=add" method="post">
  <table width="664" height="166" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption>
    ����ⲿ����
    </caption>
    <tr>
      <td class="align_r"><strong>�ϼ���Ŀ</strong></td>
      <td class="align_l"><?=$catename?>
      <input type="hidden" name="catid" value="<?=$catid?>">
      <input type="hidden" name="info[modelid]" value="0">
      <input type="hidden" name="info[modelname]" value="�ⲿ����">
      <input type="hidden" name="info[type]" value="<?=$type?>">
      </td>
    </tr>
    <tr>
      <td class="align_r"><strong>��������</strong></td>
      <td class="align_l"><label>
        <input name="info[name]" type="text" require="true" datatype="limit" min="1" max="50" size="30" msg="��������1���ַ�����50���ַ�"/>
      <font color="#FF0000">*</font></label></td>
    </tr>
    <tr>
      <td class="align_r"><strong>����ͼƬ</strong></td>
      <td class="align_l"><label>
        <input name="info[img]" type="text" id="img" size="30">
      </label></td>
    </tr>
    <tr>
      <td class="align_r"><strong>�ڵ�������ʾ</strong></td>
      <td>
          <input type="radio" name="info[ismenu]" value="1" id="RadioGroup1_0" checked>
          ��
          <input type="radio" name="info[ismenu]" value="0" id="RadioGroup1_1">
          ��</td>
    </tr>
    <tr>
      <td class="align_r"><strong>���ӵ�ַ</strong></td>
      <td class="align_l"><label>
        <input name="info[url]" type="text" require="true" datatype="limit" min="1" max="50" size="50" msg="���ӵ�ַ����Ϊ�գ�"/>
      <font color="#FF0000">*</font></label></td>
    </tr>
    <tr>
      <td width="171" class="align_c">&nbsp;</td>
      <td width="488" class="align_l"><label>
        <input type="submit" name="button" id="button" value="ȷ��" />
        <input type="reset" name="button2" id="button2" value="����" />
      </label></td>
    </tr>



  </table>
</form>
<script LANGUAGE="javascript">
<!--
$().ready(function() {
	  $('form').checkForm(1);
	});
//-->
</script>
</body>
</html>
