<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require tpl('header');
?>
<body>
<table  align="center" cellpadding="0" cellspacing="1" class="table_list">
<caption>
    ����Ա����
    </caption>
    <tr>
    <td><a href="?file=<?=$file?>&action=add">��ӹ���Ա</a> | <a href="?file=<?=$file?>&action=manage">����Ա�б�</a> | <?php foreach($role as $k=>$v){?> <a href="?file=<?=$file?>&action=manage&roleid=<?=$v["roleid"]?>"><?=$v["name"]?></a> |<?php }?> </td>
    </tr>
</table>
<form action="" method="post">
  <table width="681" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption>
    ��ӹ���Ա
    </caption>

    <tr>
      <td width="25%" class="align_r">�û�����</td>
      <td class="align_l"><input type="text" name="username" value="" size="20" require="true" datatype="limit|ajax" url="?file=admin&action=checkuser" min="3" max="20" msg="�û�����������3���ַ�����20���ַ� ��"/></td>
    </tr>
    <tr>
      <td class="align_r">������ɫ��</td>
      <td class="align_l">
      <?php foreach($role as $k=>$v){?>
      <input type="checkbox" name="roleids[]" value="<?=$v['roleid']?>" id="1_<?=$k?>"><?=$v["name"]?>(<?=$v["description"]?>)<Br/>
      <?php }?></td>
    </tr>
    <tr>
      <td class="align_r">�����ʺţ�</td>
      <td class="align_l">
          <input type="radio" name="disabled" value="1" id="RadioGroup1_0">
          ��
          <input type="radio" name="disabled" value="0" id="RadioGroup1_1" checked>
          ��</td>
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
