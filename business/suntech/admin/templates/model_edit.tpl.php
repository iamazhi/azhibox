<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<body>
<form action="?file=model&action=edit&saveedit=<?=$modelid?>" method="post">
  <table width="664" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption>
    �޸�<?=$name?>����
    </caption>

    <tr>
      <td class="align_r">�������ƣ�</td>
      <td class="align_l"><label>
        <input type="text" name="info[name]" value="<?=$name?>"require="true" datatype="limit" min="1" max="50" msg="��������1���ַ�����50���ַ�"/>
      </label></td>
    </tr>
    <tr>
      <td class="align_r">������</td>
      <td class="align_l"><label>
        <textarea name="info[description]" cols="30" rows="5"><?=$description?></textarea>
      </label></td>
    </tr>
    <tr>
      <td class="align_r"><strong>���ݱ���</strong>��</td>
      <td class="align_l"><?=DB_PRE?>c_
  
<input name="info[tablename]" type="text" size="12" value="<?=$tablename?>"regexp="^[a-z0-9_]+$" require="true" truedatatype="limit|custom" min="1" max="50"  msg="�ַ����ȷ�Χ����Ϊ1��50λ|ֻ��Ϊ���֡�����ĸ���»���"> 
     </td>
    </tr>
    <tr>
      <td class="align_r"><strong>ǰ̨������Ϣ�Ƿ���Ҫ���</strong></td>
      <td class="align_l"><p>
<input type="radio" name="info[auditing]" value="1" <?php if($auditing==1){echo "checked='checked'";}?>/>
          ��
<input type="radio" name="info[auditing]" value="2" <?php if($auditing==2){echo "checked='checked'";}?>  />
          ��
      </td>
    </tr>
    <tr>
      <td width="182" class="align_r">&nbsp;</td>
      <td width="477" class="align_l"><label>
        <input type="submit" name="button" id="button" value="ȷ��" />
        <input type="reset" name="button2" id="button2" value="���" />
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
