<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require tpl('header');
?>
<body>
<form action="" method="post">
  <table width="681" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption>
    ��Ӳ˵�
    </caption>

    <tr>
      <td class="align_r">�˵����ƣ�</td>
      <td width="558" class="align_l"><?=$info["name"]?></td>
    </tr>
    <tr>
      <td class="align_r"><font color="red">*</font> <strong>�˵�����</strong>��</td>
      <td class="align_l"><label>
        <input type="text" name="info[name]" require="true" datatype="limit" min="6" max="16" msg="��������2���ַ�����20���ַ�"/>
        <input type="hidden" name="info[pid]" value="<?=$info["menuid"]?>"/>
      </label></td>
    </tr>
    <tr>
      <td class="align_r">���ӵ�ַ��</td>
      <td class="align_l"><input name="info[url]" type="text" size="50" /></td>
    </tr>
    <tr>
      <td class="align_r">��ʾ�ı���</td>
      <td class="align_l"><label>
        <input type="text" name="info[title]" />
      </label></td>
    </tr>
    <tr>
      <td class="align_r">�������ͼ�꣺</td>
      <td class="align_l"><label>
        <input type="text" name="info[icon]" />
      </label></td>
    </tr>
    <tr>
      <td class="align_r">������ر�ͼ�꣺</td>
      <td class="align_l"><label>
        <input type="text" name="info[iconOpen]" />
      </label></td>
    </tr>
    <tr>
      <td class="align_r">�Ƿ���ʾ�˵���</td>
      <td class="align_l">
       �� <input name="info[disabled]" type="radio" value="0" id="Group1_0" checked=checked/> �� <input name="info[disabled]" type="radio" value="1" id="Group1_2" />
      </td>
    </tr>
    <tr>
      <td class="align_r">&nbsp;</td>
      <td class="align_l"><label>
        <input type="submit" name="dosubmit"  value="�ύ" />
        <input type="reset" name="button2"  value="����" />
      </label></td>
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
